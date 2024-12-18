<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{

    public function goLoginADM(){
        return view('login-adm');
    }

    public function logarUsuario(Request $request){

        $request->validate(
            [
                'email'=>'required||email',
                'senha'=>'required||min:8',
            ],
            [
                'email.required'=>'Preencha esse campo!',
                'email.email'=>"Email inválido",
                'senha.required'=>"Preencha esse campo",
                'senha.min'=>'A senha deve conter 8 caracteres!',
            ]
            );
        

        ////////////////////////////////////////////////////////////////////////////////////

        /* alterar modo de login com remember de altomaticamente 
        método de login para incluir remember_token automaticamente */

         $credentials = [
            'email'=> $request->email,
            'password'=> $request->senha,
         ];
         
         if(Auth::attempt($credentials)){ /* true força a opção de lembrar me */
            /* autenticação deu certo */
            $usuario = Auth::user();
            if($usuario->isSuspenso == true || $usuario->isSuspenso == 1){
                Auth::logout();
                return redirect()->back()->with('status','Você não pode logar na Materna devido a suspensão de sua conta!')->withInput();
            }
            if($usuario->idNivelUsuario==1){

                // AQUI INICIO PARA CONTEUDO

                if (is_null(auth()->user()->preferencias)) {
                    return redirect()->route('/home/preferencias'); // Ajuste para o nome correto da sua rota de preferências
                }else{

                // FIM MUDANÇA

                return redirect()->intended('/home/feed');
                }


            }else if($usuario->idNivelUsuario==3){
                if(!Perfil::where('idUsuario', $usuario->idUsuario)->exists()){
                    return redirect()->intended('/criar-perfil');
                }else{
                    return redirect()->intended('/home/perfil-anunciante');
                }
                
            }else{
                Auth::logout();
                return redirect()->back()->with(['status' => 'Opa! Você é um ADM!', 'message' => 'Clique aqui para logar na sua área!', 'link' => '/login-adm'])->withInput();
            }

            
            
         }

         /* se der ruim e falhar */
         return redirect()->back()->withErrors(['email' => 'Dados invalidos, faça seu cadastro ou login'])->withInput();
        }
        
        public function index()
        {
            if(Auth::check()){
                // logado
                return view('home.feed');
            }else{
                // não estiver
                return redirect()->route('index');
        }
    }

    public function logarADM(Request $request){
        
        $request->validate(
            [
                'email' => 'required||email',
                'senha' => 'required||min:8',
            ],
            [
                'email.required' => 'Preencha esse campo!',
                'email.email' => 'Email inválido!',

                'senha.required' => 'Preencha esse campo!',
                'senha.min' => 'A senha deve conter no mínimo 8 caracteres!'
            ]
        );

        $credentials = [
            'email' => $request->email,
            'password' => $request->senha,
        ];

        if (Auth::attempt($credentials)) {
            $usuario = Auth::user();
            
            if ($usuario->idNivelUsuario==2) {
                return redirect()->intended('/dashboard/home');
            }else {
                Auth::logout();
                return redirect()->back()->with(['status'=> 'Opa, você não é um ADM!', 'message' => 'Clique aqui para logar na sua área!' , 'link'=>'/'])->withInput();
            }
        }else{
            return redirect()->back()->with(['status'=> 'Email ou senha inválidos!'])->withInput();
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}
