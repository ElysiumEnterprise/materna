<?php

namespace App\Http\Controllers;

use App\Models\Seguidores;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function goInfoUserHome($idUsuario){

        $userAuth = Auth::user();
        $perfilAuth = $userAuth->perfils;

        $user = Usuario::with(['perfils', 'perfils.postagems', 'nivel_usuarios'])->where('idUsuario', $idUsuario)->first();

        //Verificar se esse usuário está sendo seguido pelo usuário autenticado
        if($user->idUsuario!=$userAuth->idUsuario){
            $hasSeguindo = Seguidores::where('idPerfilSeguidor', $perfilAuth->idPerfil)->where('idPerfilSeguindo', $user->perfils->idPerfil)->exists();
        }else{
            $hasSeguindo = false;
        }
        
        
        
        return view('home.perfil', compact('user', 'hasSeguindo'));
    }
    
}
