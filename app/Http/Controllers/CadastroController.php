<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use App\Models\TelefoneUser;
use App\Models\Anunciante;
use App\Models\Perfil;

class CadastroController extends Controller
{

    public function cadastrar_cliente(Request $request){

        $request->validate(
            [
                'nomeCliente' => 'required||max:255|min:10', //Requer o campo, ao menos 5 caracteres e no máximo 255 caracteres
                'emailCliente' => 'required||email', //Requer o campo e deve ser um e-mail no formato correto
                'dtCliente' => 'required||before_or_equal:today',
                'telCliente'=> 'required||regex:/^\(\d{2}\)\d{4,5}-\d{4}$/',
                'senhaCliente'=>'required||min:8'
            ],
            [
                'nomeCliente.required'=> 'Preencha esse campo!',//Criamos uma mensagem personalizada para quando o tipo required não for satisfeito

                'emailCliente.required'=>"Preencha esse campo!",
                'emailCliente.email'=>'Digite um email válido!',

                'dtCliente.required'=>'Preencha esse campo',
                'dtCliente.before_or_equal'=>'Data inválida',

                'telCliente.required'=>"Preencha esse campo",
                'telCliente.regex'=>'Essa telefone está em um formato inválido!',

                'senhaCliente.required' => 'Preencha esse campo',
                'senhaCliente.min'=> "Essa senha precisa conter 8 caracteres!",
                              
            ]
        );

        $exist=Usuario::where('email', $request->emailCliente)->exists();
            if($exist){
                return redirect()->back()->with('message', "Email já existente!");
            }
            
        
        else{
            $usuario = Usuario::create([
                'nome' => $request->nomeCliente,
                'email'=> $request->emailCliente,
                'senha'=> $request->senhaCliente,
                'dtNasc'=> $request->dtCliente,
                'idNivelUsuario'=> 1,
            ]);
    
            $perfil = Perfil::create([
                'idUsuario'=>$usuario->idUsuario,
                'nickname'=>$usuario->nome,
            ]);
    
            TelefoneUser::create([
                'idUsuario'=> $usuario->idUsuario,
                'numTelefone' => $request->telCliente
            ]);
    
            
            return view('/home/feed', compact('perfil'));
        }

        
    }

    public function cadastrar_anunciante(Request $request){

        $request->validate(
            [
                'nomeAnunciante' => 'required||max:255|min:10', //Requer o campo, ao menos 5 caracteres e no máximo 255 caracteres
                'emailAnunciante' => 'required||email', //Requer o campo e deve ser um e-mail no formato correto
                'dtAnunciante' => 'required||before_or_equal:today',
                'telAnunciante'=> 'required||regex:/^\(\d{2}\)\d{4,5}-\d{4}$/',
                'senhaAnunciante'=>'required||min:8',
                'cnpjAnunciante'=>'required||min:14'
            ],
            [
                'nomeAnunciante.required'=> 'Preencha esse campo!',//Criamos uma mensagem personalizada para quando o tipo required não for satisfeito

                'emailAnunciante.required'=>"Preencha esse campo!",
                'emailCliente.email'=>'Digite um email válido!',

                'dtAnunciante.required'=>'Preencha esse campo',
                'dtCliente.before_or_equal'=>'Data inválida',

                'telAnunciante.required'=>"Preencha esse campo",
                'telCliente.regex'=>'Essa telefone está em um formato inválido!',

                'senhaAnunciante.required' => 'Preencha esse campo',
                'senhaAnunciante.min'=> "Essa senha precisa conter 8 caracteres!",

                'cnpjAnunciante.required'=>'Preencha esse campo!',
                'cnpjAnunciante.min'=>"Formato de cnpj inválido!",
                              
            ]
        );
        
        $exist=Usuario::where('email', $request->emailCliente)->exists();
        if($exist){
            return redirect()->back()->with('message', "Email já existente!");
        }else{
            $usuario = Usuario::create([
                'nome' => $request->nomeAnunciante,
                'email'=> $request->emailAnunciante,
                'senha'=> $request->senhaAnunciante,
                'dtNasc'=> $request->dtAnunciante,
                'idNivelUsuario'=> 3,
            ]);
    
            TelefoneUser::create([
                'idUsuario'=> $usuario->idAnunciante,
                'numTelefone' => $request->telAnunciante
            ]);
    
            Anunciante::create([
                'nomeAnunciante'=>$request->nomeAnunciante,
                'cnpjAnunciante'=>$request->cnpjAnunciante,
            ]);
    
            return view('/home/feed');
        }

        

    }
}
