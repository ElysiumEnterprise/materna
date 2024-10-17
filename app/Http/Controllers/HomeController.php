<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Postagem;
use App\Models\Usuario;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function buscarParaVoce(Request $request){
        $perfils = Perfil::where('nickname', 'LIKE', '%'.$request->itemSearch.'%')->get();

        //$users = Usuario::where('nome', 'LIKE', '%'.$request->itemSearch.'%')->get();

        $postagens = Postagem::where('descPostagem', 'LIKE', '%'.$request->itemSearch)->get();

        if($perfils->isEmpty()){
            $perfils->collect();
        }

        if($postagens->isEmpty()){
            $postagens->collect();
        }
        return view('home.busca-para-voce', compact('perfils', 'postagens'));
   }
}
