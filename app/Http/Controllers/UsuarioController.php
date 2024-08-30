<?php

namespace App\Http\Controllers;

use App\Models\Anunciante;
use App\Models\TelefoneUser;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function show(){

        $user = Auth::user();

        
    }
    
    public function edit($idUser){
        if (!$usuario = Usuario::where('idUsuario', $idUser)->first()){
            return redirect()->back();  
        }
            $usuario= Usuario::with('telefone_users')->findOrFail($idUser);

            //Verificar se o usuário é anunciante
            
            $hasAnunciante = $usuario->anunciantes()->exists();
            
            return view('home.configuracoes.editar-user',compact('usuario', 'hasAnunciante'));
        
          
    }

    public function update(Request $request, $idUser){
        //validação dos campos

        $rules =[
                'nome' => 'required||max:255|min:10', //Requer o campo, ao menos 5 caracteres e no máximo 255 caracteres
                //'senha' => 'required||min:8', //Requer o campo e deve ser um e-mail no formato correto
                'telefone'=>'required||regex:/^\(\d{2}\)\d{4,5}-\d{4}$/',
                'dt' => 'required||before:today',
                'email'=>'required||email',
             ];
        $messages = [
                'nome.required'=> 'Preencha esse campo corretamente!',//Criamos uma mensagem personalizada para quando o tipo required não for satisfeito
                'nome.max'=>'O campo atingiu o limite de caracteres!',
                'nome.min'=>'Nome inválido',
                
                'dt.required'=>'Preencha esse campo!',
                'dt.before'=>'Data inválida',

                /*'senha.required'=>'Preencha esse campo corretamente',
                'senha.min'=>'A senha não tem no mínimo 8 caracteres',*/

                'telefone.required'=>'Preencha esse campo!',
                'telefone.regex'=>'Tipo de telefone inválido',

                'email.required'=>'Preencha esse campo corretamente!',
                'email.email'=>'Email inválido',
            ];
            
            if($request->has('hasAnuciante') && $request->input('hasAnunciante')){
                $rules['cnpj'] = 'required|min:14'; // Campo adicional para anunciantes
                $messages['cnpj.required'] = 'Preencha esse campo!';
                $messages['cnpj.min'] = 'Tipo de CNPJ é inválido!';
            }
            
        $request->validate($rules, $messages);

        $usuario = Usuario::findOrFail($idUser);

        //Verificar se existe um email e telfone existente no banco
        
        $existEmail = Usuario::where('email', $request->email)->where('idUsuario', "!=", $idUser)->exists();
        $existTel = TelefoneUser::where('numTelefone', $request->telefone)->where('idUsuario', "!=", $idUser)->exists();

        if($existEmail){
            return redirect()->back()->with('errorEmail', 'Email já cadastrado!');
        }

        if($existTel){
            return redirect()->back()->with('errorTel', 'Telefone já cadastrado!');
        }


        //Verificar se há o campo de CNPJ caso o usuário seja anunciante
        if ($request->has('cnpj')) {
            $existCNPJ = Anunciante::where('cnpjAnunciante', $request->cnpj)->where('idUsuario', '!=', $idUser)->exists();

            if ($existCNPJ) {
                return redirect()->back()->with('errorCNPJ', 'CNPJ já cadastrado!');
            }else{
                $anunciante = Anunciante::where('idUsuario', $idUser)->first();

                $anunciante->nomeAnunciante=$request->nome;
                $anunciante->cnpjAnunciante = $request->cnpj;

                $anunciante->save();
            }

        }
       

        
        //Fazer o update
        
        

        //Verficar se o usuário é anunciante

       
        $usuario->nome=$request->nome;
        $usuario->email=$request->email;
        $usuario->dtNasc= $request->dt;
        //$usuario->senha=Hash::make($request->senha);
        $usuario->save();

        $telefone = TelefoneUser::where('idUsuario', $idUser)->first();

        $telefone->numTelefone = $request->telefone;
        $telefone->save();      

        return redirect()->route('user.edit', $usuario)->with('sucess', 'Usuario atualizado com sucesso!');
        //return redirect()->route('perfil.editar', $idUser)->with('sucess', 'Usuário atualizado com sucesso!');

    }

    public function destroy($idUser){
        $user = Usuario::with(['telefone_users', 'perfils'])->find($idUser);
        $exist = Anunciante::where('idUsuario', $idUser)->exists();
        if($exist){
            $anunciante = Anunciante::where('idUsuario', $idUser);
            $anunciante->delete();
        }
        if($user){
            //Deletar telefones associado
            $user->telefone_users()->delete();

            //Deletar perfil

            $user->perfils()->delete();

            //Deletar usuário

            $user->delete();

            return redirect('/');
        }
    }
}
