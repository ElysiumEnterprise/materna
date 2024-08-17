<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use App\Models\TelefoneUser;

class CadastroController extends Controller
{

    public function cadastrarCliente(Request $request){
        $usuario = Usuario::create([
            'nome' => $request->nomeCliente,
            'email'=> $request->emailCliente,
            'senha'=> $request->senhaCliente,
            'dtNasc'=> $request->dtCliente,
            'nivelUsuario'=> 'Cliente',
        ]);

        TelefoneUser::create([
            'idUsuario'=> $usuario,
            'numTelefone' => $request->telCliente
        ]);

        echo 'Cadastro feito com sucesso';
    }
}
