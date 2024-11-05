<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Postagem;
use App\Models\Postagens;
use App\Models\Categoria;

class FeedController extends Controller
{
    public function go_feed()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->idNivelUsuario == 1) {
                return $this->mostrarFeed(); // Mostra o feed com base nas preferências do usuário
            } elseif ($user->idNivelUsuario == 3) {
                return view('home.perfilAnunciante');
            }
        } else {
            return redirect()->route('login')->withErrors('Você precisa estar logado para acessar essa página.');
        }
    }

    public function mostrarFeed()
    {
        $user = auth()->user(); // Obtém o usuário autenticado

        if ($user && $user->preferencias) {
            // Decodifica as preferências do JSON
            $preferencias = json_decode($user->preferencias);
            
            // Busca as postagens com base nas preferências do usuário
            $postagens = Postagens::whereIn('categoria', $preferencias)->with('categorias')->get();
        } else {
            // Caso o usuário não tenha preferências, mostra todas as postagens
            $postagens = Postagens::with('categorias')->get();
        }

        return view('home.feed', compact('postagens')); // Passa as postagens para a view
    }

        
}