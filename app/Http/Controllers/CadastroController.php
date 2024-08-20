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
        $usuario = Usuario::create([
            'nome' => $request->nomeCliente,
            'email'=> $request->emailCliente,
            'senha'=> $request->senhaCliente,
            'dtNasc'=> $request->dtCliente,
            'idNivelUsuario'=> 1,
        ]);

        $perfil = Perfil::create([
            'idUsuario'=>$usuario->id,
            'nickname'=>$usuario->nome,
        ]);

        TelefoneUser::create([
            'idUsuario'=> $usuario->id,
            'numTelefone' => $request->telCliente
        ]);

        
        return view('/home/feed', compact('perfil'));
    }

    public function cadastrar_anunciante(Request $request){

        $usuario = Usuario::create([
            'nome' => $request->nomeAnunciante,
            'email'=> $request->emailAnunciante,
            'senha'=> $request->senhaAnunciante,
            'dtNasc'=> $request->dtAnunciante,
            'idNivelUsuario'=> 3,
        ]);

        TelefoneUser::create([
            'idUsuario'=> $usuario->id,
            'numTelefone' => $request->telAnunciante
        ]);

        Anunciante::create([
            'nomeAnunciante'=>$request->nomeAnunciante,
            'cnpjAnunciante'=>$request->cnpjAnunciante,
        ]);

        return view('/home/feed');

    }
}
