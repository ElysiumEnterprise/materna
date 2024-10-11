<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Seguidores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeguidoresController extends Controller
{
    public function seguirPerfil($idPerfilSeguindo){

        if(Auth::check()){

            $userAuth = Auth::user();
            $perfilUserAuth = $userAuth->perfils;

            Seguidores::create([
                'idPerfilSeguindo' => $idPerfilSeguindo,
                'idPerfilSeguidor' => $perfilUserAuth->idPerfil,
            ]);

            $perfilSeguindo = Perfil::where('idPerfil', $idPerfilSeguindo)->get();

            $perfilSeguindo->qtddSeguidores = Seguidores::where('idPerfilSeguindo', $idPerfilSeguindo)->count();

            $perfilSeguindo->save();

            $perfilUserAuth->qttdSeguindo = Seguidores::where('idPerfilSeguidor', $perfilUserAuth->idPerfil)->count();

            $perfilUserAuth->save();

            return redirect()->back();

        }else{
            return redirect()->route('/')->with('error', 'Logue na Materna para seguir uma pessoa!');
        }

    }

    public function pararSeguirPerfil($idPerfilSeguindo){

        if (Auth::check()) {
            
            $userAuth = Auth::user();
            $perfilUserAuth = $userAuth->perfils;

            $seguidor = Seguidores::where('idPerfilSeguidor', $perfilUserAuth->idPerfil);

            $seguidor->delete();

            $perfilSeguindo = Perfil::where('idPerfil', $idPerfilSeguindo)->get();

            $perfilSeguindo->qtddSeguidores = Seguidores::where('idPerfilSeguindo', $idPerfilSeguindo)->count();

            $perfilSeguindo->save();

            $perfilUserAuth->qttdSeguindo = Seguidores::where('idPerfilSeguidor', $perfilUserAuth->idPerfil)->count();

            $perfilUserAuth->save();

            return redirect()->back();


        }else{
            return redirect()->route('/')->with('error', 'Você precisa estar logado para executar essa ação!');
        }

    }
}
