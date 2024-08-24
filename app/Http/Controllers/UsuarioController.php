<?php

namespace App\Http\Controllers;

use App\Models\TelefoneUser;
use Illuminate\Http\Request;
use App\Models\Usuario;


class UsuarioController extends Controller
{
    public function edit($idUser){
        if (!$usuario = Usuario::where('idUsuario', $idUser)->first()){
            return redirect()->back();  
        }
            $usuario= Usuario::with('telefone_users')->findOrFail($idUser);   
            
            return view('home.configuracoes.editar-user',compact('usuario'));
        
          
    }

    public function update(Request $request, $idUser){
        //validação dos campos

        $request->validate(

            [
                'nome' => 'required||max:255|min:10', //Requer o campo, ao menos 5 caracteres e no máximo 255 caracteres
                'senha' => 'required||min:8', //Requer o campo e deve ser um e-mail no formato correto
                'telefone'=>'required||regex:/^\(\d{2}\)\d{4,5}-\d{4}$/',
                'email'=>'required||email',
            ],
            [
                'nome.required'=> 'Preencha esse campo corretamente!',//Criamos uma mensagem personalizada para quando o tipo required não for satisfeito
                'nome.max'=>'O campo atingiu o limite de caracteres!',
                'nome.min'=>'Nome inválido',

                'senha.required'=>'Preencha esse campo corretamente',
                'senha.min'=>'A senha não tem no mínimo 8 caracteres',

                'telefone.required'=>'Preencha esse campo!',
                'telefone.regex'=>'Tipo de telefone inválido',

                'email.required'=>'Preencha esse campo corretamente!',
                'email.email'=>'Email inválido',
                
            ]

            
        );
        //Verificar se existe um email existente no banco
        
        $existEmail = Usuario::where('email', $request->email)->where('idUsuario', "!=", $idUser)->exists();
        $existTel = TelefoneUser::where('numTelefone', $request->telefone)->where('idUsuario', "!=", $idUser)->exists();

        if($existEmail){
            return redirect()->back()->with('errorEmail', 'Email já cadastrado!');
        }

        if($existTel){
            return redirect()->back()->with('errorTel', 'Telefone já cadastrado!');
        }

        //Fazer o update
        
        $usuario = Usuario::findOrFail($idUser);

        $usuario->nome=$request->nome;
        $usuario->email=$request->email;
        $usuario->senha=$request->senha;
        $usuario->save();

        $telefone = TelefoneUser::where('idUsuario', $idUser)->first();

        $telefone->numTelefone = $request->telefone;
        $telefone->save();      

        return redirect()->route('user.edit', $usuario)->with('sucess', 'Usuario atualizado com sucesso!');
        //return redirect()->route('perfil.editar', $idUser)->with('sucess', 'Usuário atualizado com sucesso!');

    }

    public function destroy($idUser){
        
    }
}
