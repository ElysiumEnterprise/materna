<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Usuario;
use App\Models\TelefoneUser;
use App\Models\Anunciante;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    


    public function show(){

        $user = Auth::user();

        $perfil = $user->perfils;

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
                'bio' => 'max:255', //Requer o campo e deve ser um e-mail no formato correto
                
            ],
            [
                'nickname.required'=> 'Preencha esse campo corretamente!',//Criamos uma mensagem personalizada para quando o tipo required não for satisfeito
                'bio.max' => 'O bio atingiu o limite de 255 caracteres',
            ]
        );

        $exist=Perfil::where('nickname', $request->nickname)->where('idPerfil', '!=', $idPerfil)->exists();
        if($exist){
            return redirect()->back()->with('errorNickname', 'Esse nome de usuário já existe!');
        }

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
        
        if($request->hasFile('imgCapa') && $request->file('imgCapa')->isValid()){

            $requestImage = $request->imgCapa;

            $extension = $requestImage->extension();

            $imgName = md5($requestImage->getClientOriginalName().strtotime('now')).".".$extension;

            $requestImage->move(public_path('assets/img/banners-perfils'), $imgName);

            $perfil->bannerPerfil = $imgName;

        }

        $perfil->biography=$request->bio;
        $perfil->update($request->all());

        return redirect()->route('perfil.editar', $perfil )->with('message', 'Perfil atualizado com sucesso');
    }
    public function destroy($idPerfil){

        
    }
}
