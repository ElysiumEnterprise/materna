<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seguidores;
use App\Models\Visualizacoes;
use App\Models\Postagem;

class VisualizacoesController extends Controller
{
    public function store(){

    }

    public function getCountViews(){
        $userAuth = Auth::user();

        $idPerfilAuth = $userAuth->perfils->idPerfil;
        //Obter seguidores 
        $idSeguidores = Seguidores::where('idPerfilSeguindo', $idPerfilAuth)->pluck('idPerfilSeguidor');

        //Obter todas as postagens do usuários

        $idPostagens = Postagem::where('idPerfil', $idPerfilAuth)->pluck('idPostagem');
        //Contar visualizações por seguidores da conta

        $countViewsSeguidores = Visualizacoes::whereIn('idPostagem', $idPostagens)->whereIn('idPerfil', $idSeguidores)->count();

        $countViewsNews = Visualizacoes::whereIn('idPostagem', $idPostagens)->whereNotIn('idPerfil', $idSeguidores)->count();

        return response()->json([
            'labels' => ['Seguidores', 'Não Seguidores'],
            'data' => [$countViewsSeguidores, $countViewsNews]
        ]);
    }
}
