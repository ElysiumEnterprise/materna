<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use App\Models\Curtidas;
use App\Models\Seguidores;
use App\Models\Visualizacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GraficoAnuncianteController extends Controller
{
    public function getGeralGraficoPerfilAdd(){

        $userAuth = Auth::user();

        $idPerfilAuth = $userAuth->perfils->idPerfil;

        //Obter ps números de curtidas de todas as postagens daquele anunciante
        
        $countCurtidas = Curtidas::where('idPostagem', function($query) use ($idPerfilAuth){
            $query->select('idPostagem')->from('postagems')->where('idPerfil', $idPerfilAuth);
        })->count();

        //Obter os números de visualizações de todas postagens do anunciante
        $countViews = Visualizacoes::where('idPostagem', function($query) use ($idPerfilAuth){
            $query->select('idPostagem')->from('postagems')->where('idPerfil', $idPerfilAuth);
        })->count();

        //Obter os números de comentários

        $countComentarios = Comentarios::where('idPostagem', function($query) use ($idPerfilAuth){
            $query->select('idPostagem')->from('postagems')->where('idPerfil', $idPerfilAuth);
        })->count();

        //Obter os números de seguidores

        $countSeguidores = Seguidores::where('idPerfilSeguindo', $idPerfilAuth);

        //Retorna em formato JSON

        return response()->json([
            'labels' => ['Curtidas', 'Comentários', 'Visualizações', 'Seguidores'],
            'data' => [$countCurtidas, $countComentarios, $countViews, $countSeguidores],
        ]);
    }

    public function gerarGraficoBarPost($idPostagem){
        $userAuth = Auth::user();

        $idPerfilAuth = $userAuth->perfils->idPerfil;

        //Pegar a quantidade de curtidas de uma postagem
        $countCurtidas = Curtidas::where('idPostagem', $idPostagem)->count();

        //Pegar a quantidade de visualizações de todos

        $countViews = Visualizacoes::where('idPostagem', $idPostagem)->count();

        //Pegar a quantidade de comentários da postagem

        $countComentarios = Comentarios::where('idPostagem', $idPostagem)->count();

        return response()->json([
            'labels' => ['Curtidas', 'Comentários', 'Visualizações'],
            'data' => [$countCurtidas, $countComentarios, $countViews],
        ]);
    }

    public function gerarGraficoPizzaPost($idPostagem){

        
        $userAuth = Auth::user();

        $idPerfilAuth = $userAuth->perfils->idPerfil;

        //Obter seguidores 
        $idSeguidores = Seguidores::where('idPerfilSeguindo', $idPerfilAuth)->pluck('idPerfilSeguidor');

        //Contar visualizações por seguidores da postagem

        $countViewsSeguidores = Visualizacoes::where('idPostagem', $idPostagem)->whereIn('idPerfil', $idSeguidores)->count();

        //Contar as visualizações nova da postagem

        $countViewsNews = Visualizacoes::where('idPostagem', $idPostagem)->whereNotIn('idPerfil', $idSeguidores)->count();

       

        return response()->json([
            'labels' => ['Seguidores', 'Não Seguidores'],
            'data' => [$countViewsSeguidores, $countViewsNews]
        ]);
    }
}
