<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class InfoUserController extends Controller
{
    
    //Ir para a tela de informações do usuário no adm 

    public function goInfoUserADM($idUser){

        $user = Usuario::with(['perfils', 'telefone_users', 'perfils.postagems', 'denuncias', 'nivel_usuarios'])->where('idUsuario', $idUser)->first();
        
        
        return view('dashboard-adm.info-cliente-adm', compact('user'));
    }

    public function goListagemDenunciasVerificadas($idUser){
        $user = Usuario::with('denuncias')->where('idUsuario', $idUser)->first();
        
        return view('dashboard-adm.denuncias-verificadas', compact('user'));
    }
    
}
