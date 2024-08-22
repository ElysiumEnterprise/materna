<?php

namespace App\Http\Controllers;

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
        $exist=Usuario::where('email', $request->email)->exists();
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
            
        }
        /*if(!$usuario=Usuario::where('email', 'like', $request->email)->where('senha', 'like', $request->senha)){
            return redirect()->back();
        }else{
            $perfil = Perfil::where('idUsuario', $usuario->idUsuario);

            return view('home.feed', compact('perfil'));
        }*/
    }
}
