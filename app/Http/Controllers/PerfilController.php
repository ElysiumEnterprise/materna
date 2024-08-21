<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Usuario;
use App\Models\TelefoneUser;
use App\Models\Anunciante;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    


    public function show($idPerfil){

    }

    public function config($idPerfil){
        if (!$perfil = Perfil::where('idPerfil', $idPerfil)->first()){
            return redirect()->back();  
          }
          return view('home.configuracoes.configuracoes-gerais', compact('perfil'));
    }

    public function editar($idPerfil){
        
        if (!$perfil = Perfil::where('idPerfil', $idPerfil)->first()){
          return redirect()->back();  
        }
        return view('home.configuracoes.editar-perfil', compact('perfil'));

    }

    public function update(Request $request, $idPerfil){
        
        //validação dos campos
        $request->validate(
            [
                'nickname' => 'required||max:255|min:5', //Requer o campo, ao menos 5 caracteres e no máximo 255 caracteres
                'bio' => 'required||max:255', //Requer o campo e deve ser um e-mail no formato correto
                
            ],
            [
                'nickname.required'=> 'Preencha esse campo corretamente!',//Criamos uma mensagem personalizada para quando o tipo required não for satisfeito
                'bio.required'=>"Preencha o campo de biografia corretamente!",
            ]
        );
        $perfil = Perfil::findOrFail($idPerfil);

        //Atualização da imagem
        if($request->hasFile('imgPerfil') && $request->file('imgPerfil')->isValid()){

            $requestImage = $request->imgPerfil;

            $extension = $requestImage ->extension();

            $imgName = md5($requestImage->getClientOriginalName().strtotime('now'))."." . $extension;

            $requestImage->move(public_path('assets/img/foto-perfil'), $imgName);
            /*$request->imgPerfil = $imgName;*/
            $perfil->fotoPerfil = $imgName;
        }
        $perfil->biography=$request->bio;
        $perfil->update($request->all());

        return redirect()->route('perfil.editar', $perfil )->with('message', 'Perfil atualizado com sucesso');
    }
    public function destroy($idPerfil){
        // Encontrar o usuário pelo ID
        $perfil = Perfil::findOrFail($idPerfil);

        $idUsuario = $perfil->idUsuario;
        
        $tel = TelefoneUser::findOrFail($idUsuario);

        $usuario = Usuario::findOrFail($idUsuario);

        /*// Deletar a foto de perfil se existir
        if ($user->foto) {
            Storage::delete($user->foto);
        }
*/
        // Excluir o usuário do banco de dados
        $perfil->delete();
        $tel->delete();
        $usuario->delete();

        
    }
}
