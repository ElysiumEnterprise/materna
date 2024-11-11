<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seguidores;
use App\Models\Visualizacoes;

class VisualizacoesController extends Controller
{
    public function store(){

    }

    public function getCountViews(){
        $userAuth = Auth::user();

        $idPerfilAuth = $userAuth->perfils->idPerfil;
        //Obter seguidores 
        $idSeguidores = Seguidores::where('idPerfilSeguindo', $idPerfilAuth)->pluck('idPerfilSeguidor');

        //Contar visualizações por seguidores da conta

        $countViewsSeguidores = Visualizacoes::where('idPostagem', function($query) use ($idPerfilAuth){
            $query->select('idPostagem')->from('postagems')->where('idPerfil', $idPerfilAuth);
        })->whereIn('idPerfil', $idSeguidores)->count();

        $countViewsNews = Visualizacoes::where('idPostagem', function($query) use ($idPerfilAuth){
            $query->select('idPostagem')->from('postagems')->where('idPerfil', $idPerfilAuth);
        })->whereNotIn('idPerfil', $idSeguidores)->count();

        return response()->json([
            'labels' => ['Seguidores', 'Não Seguidores'],
            'data' => [$countViewsSeguidores, $countViewsNews]
        ]);
    }
}
