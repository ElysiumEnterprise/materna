<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Perfil;

class LoginController extends Controller
{
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
        /*$exist=Usuario::where('email', $request->email)->exists();
        if($exist){
            if($usuario = Usuario::where('email', $request->email)->where('senha', $request->senha)->first()){
                $perfil = Perfil::where('idUsuario', $usuario->idUsuario);
                return view('home.feed', compact('perfil'));
            }else{
                return redirect()->back()->with('error', 'Email ou senha incorreto!');
            }

            


            
            //return redirect()->view('home.feed', compact('perfil'));
            
        }else{
            return redirect()->back()->with('error', "Email não encontrado!");
            
        }*/
        /*if(!$usuario=Usuario::where('email', 'like', $request->email)->where('senha', 'like', $request->senha)){
            return redirect()->back();
        }else{
            $perfil = Perfil::where('idUsuario', $usuario->idUsuario);

            return view('home.feed', compact('perfil'));
        }*/



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

            if($usuario->idNivelUsuario==1){
                return redirect()->intended('/home/feed');
            }else if($usuario->idNivelUsuario==3){
                return redirect()->intended('/home/perfil-anunciante');
            }else{
                return redirect()->intended('/dashboard/home');
            }
            
            
         }

         /* se der ruim e falhar */
         return redirect()->back()->withErrors(['email' => 'Dados invalidos, faça seu cadastro ou login']);
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

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}
