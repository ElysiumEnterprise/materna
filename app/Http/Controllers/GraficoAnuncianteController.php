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
}
