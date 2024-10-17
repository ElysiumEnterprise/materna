<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Seguidores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeguidoresController extends Controller
{
    public function seguirPerfil($idPerfil){

        if(Auth::check()){

            $userAuth = Auth::user();
            $perfilUserAuth = $userAuth->perfils;

            Seguidores::create([
                'idPerfilSeguindo' => $idPerfil,
                'idPerfilSeguidor' => $perfilUserAuth->idPerfil,
            ]);

            $perfilSeguindo = Perfil::find($idPerfil);

            $perfilSeguindo->qtddSeguidores = Seguidores::where('idPerfilSeguindo', $idPerfil)->count();

            $perfilSeguindo->save();

            $perfilUserAuth->qtddSeguindo = Seguidores::where('idPerfilSeguidor', $perfilUserAuth->idPerfil)->count();

            $perfilUserAuth->save();

            return redirect()->back();

        }else{
            return redirect()->route('/')->with('error', 'Logue na Materna para seguir uma pessoa!');
        }

    }

    public function removerSeguidor($idPerfil, $idUsuarioAuth){
        $userAuth = Auth::user();
        
        if (Auth::check() && $userAuth->idUsuario == $idUsuarioAuth) {
            $perfilUserAuth = $userAuth->perfils;

            $seguidor  = Seguidores::where('idPerfilSeguidor', $idPerfil)->where('idPerfilSeguindo', $perfilUserAuth->idPerfil);

            $seguidor->delete();

            $perfilSeguindo = Perfil::find($idPerfil);

            $perfilSeguindo->qtddSeguindo = Seguidores::where('idPerfilSeguindo', $idPerfil)->count();

            $perfilSeguindo->save();

            $perfilUserAuth->qtddSeguidores= Seguidores::where('idPerfilSeguidor', $perfilUserAuth->idPerfil)->count();

            $perfilUserAuth->save();

            return redirect()->back();
        }else{
            
            return redirect()->back()->with('error', 'Você não tem autorização para executar essa ação');
        }
    }

    public function pararSeguirPerfil($idPerfil){

        if (Auth::check()) {
            
            $userAuth = Auth::user();
            $perfilUserAuth = $userAuth->perfils;

            $seguidor = Seguidores::where('idPerfilSeguidor', $perfilUserAuth->idPerfil);

            $seguidor->delete();

            $perfilSeguindo = Perfil::find($idPerfil);

            $perfilSeguindo->qtddSeguidores = Seguidores::where('idPerfilSeguindo', $idPerfil)->count();

            $perfilSeguindo->save();

            $perfilUserAuth->qtddSeguindo = Seguidores::where('idPerfilSeguidor', $perfilUserAuth->idPerfil)->count();

            $perfilUserAuth->save();

            return redirect()->back();


        }else{
            return redirect()->route('/')->with('error', 'Você precisa estar logado para executar essa ação!');
        }

    }
    
}
