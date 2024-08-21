<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Perfil;

class LoginController extends Controller
{
    public function logarUsuario(Request $request){
        if(!$usuario=Usuario::where('email', 'like', $request->email)->where('senha', 'like', $request->senha)){
            return redirect()->back();
        }else{
            $perfil = Perfil::where('idUsuario', $usuario->idUsuario);

            return view('home.feed', compact('perfil'));
        }
    }
}
