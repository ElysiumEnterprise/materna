<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use App\Models\TelefoneUser;
use App\Models\Anunciante;
use App\Models\Perfil;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{

    public function cadastrar_cliente(Request $request){

        $request->validate(
            [
                'nomeCliente' => 'required||max:255|min:10', //Requer o campo, ao menos 5 caracteres e no máximo 255 caracteres
                'emailCliente' => 'required||email', //Requer o campo e deve ser um e-mail no formato correto
                'dtCliente' => 'required||before_or_equal:today',
                'telCliente'=> 'required||regex:/^\(\d{2}\)\d{4,5}-\d{4}$/',
                'password'=>'required||min:8|confirmed'
            ],
            [
                'nomeCliente.required'=> 'Preencha esse campo!',//Criamos uma mensagem personalizada para quando o tipo required não for satisfeito

                'emailCliente.required'=>"Preencha esse campo!",
                'emailCliente.email'=>'Digite um email válido!',

                'dtCliente.required'=>'Preencha esse campo',
                'dtCliente.before_or_equal'=>'Data inválida',

                'telCliente.required'=>"Preencha esse campo",
                'telCliente.regex'=>'Essa telefone está em um formato inválido!',

                'password.required' => 'Preencha esse campo',
                'password.min'=> "Essa senha precisa conter 8 caracteres!",
                'password.confirmed' => 'As senhas não são iguais'            
            ]
        );

        $exist=Usuario::where('email', $request->emailCliente)->exists();
            if($exist){
                return redirect()->back()->with('error', "Email já existente!");
            }
            
        
        else{
            $exist=TelefoneUser::where('numTelefone', $request->telCliente)->exists();

            if($exist){
                return redirect()->back()->with('errorTel', "Telefone já existente!");
            }
            $usuario = Usuario::create([
                'nome' => $request->nomeCliente,
                'email'=> $request->emailCliente,
                'senha'=> Hash::make($request->password),
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
            
            Auth::login($usuario);

            return redirect()->intended('/home/feed');
            
            //return view('/home/feed', compact('perfil'));
        }

        
    }

    public function cadastrar_anunciante(Request $request){

        $request->validate(
            [
                'nomeAnunciante' => 'required||max:255|min:10', //Requer o campo, ao menos 5 caracteres e no máximo 255 caracteres
                'emailAnunciante' => 'required||email', //Requer o campo e deve ser um e-mail no formato correto
                'dtAnunciante' => 'required||before_or_equal:today',
                'telAnunciante'=> 'required||regex:/^\(\d{2}\)\d{4,5}-\d{4}$/',
                'password'=>'required||min:8|confirmed',
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

                'password.required' => 'Preencha esse campo',
                'password.min'=> "Essa senha precisa conter 8 caracteres!",
                'password.confirmed'=> "As senhas não são iguais!",

                'cnpjAnunciante.required'=>'Preencha esse campo!',
                'cnpjAnunciante.min'=>"Formato de cnpj inválido!",
                              
            ]
        );
        
        if ($request->has('cnpjAnunciante')) {
            $existCNPJ = Anunciante::where('cnpjAnunciante', $request->cnpjAnunciante)->exists();
            
            if ($existCNPJ) {
              
                return redirect()->back()->with('errorCNPJ', 'CNPJ inválido! Este CNPJ já está cadastrado.');
            } 
        }




        $exist=Usuario::where('email', $request->emailAnunciante)->exists();
        if($exist){
            return redirect()->back()->with('error', "Email já existente!");
        }else{
            $exist=TelefoneUser::where('numTelefone', $request->telAnunciante)->exists();

            if($exist){
                return redirect()->back()->with('errorTel', "Telefone já existente!");
            }
            $usuario = Usuario::create([
                'nome' => $request->nomeAnunciante,
                'email'=> $request->emailAnunciante,
                'senha'=> Hash::make($request->password),
                'dtNasc'=> $request->dtAnunciante,
                'idNivelUsuario'=> 3,
            ]);
    
            TelefoneUser::create([
                'idUsuario'=> $usuario->idUsuario,
                'numTelefone' => $request->telAnunciante
            ]);
    
            Anunciante::create([
                'idUsuario'=>$usuario->idUsuario,
                'nomeAnunciante'=>$request->nomeAnunciante,
                'cnpjAnunciante'=>$request->cnpjAnunciante,
            ]);

            Perfil::create([
                'idUsuario'=>$usuario->idUsuario,
                'nickname'=>$usuario->nome,
            ]);

            Auth::login($usuario);

            return redirect()->intended('/home/feed');
        }

        

    }
}

