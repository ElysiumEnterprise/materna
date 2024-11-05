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

    // Verifica se o usuário tem preferências salvas
    if ($user && $user->preferencias) {
        $preferencias = json_decode($user->preferencias);

        // Caso a coluna 'categoria' tenha valores separados por vírgulas, usamos FIND_IN_SET
        $postagens = Postagens::where(function($query) use ($preferencias) {
            foreach ($preferencias as $categoria) {
                $query->orWhereRaw("FIND_IN_SET(?, `categoria`)", [$categoria]);
            }
        })->get();
    } else {
        // Se não houver preferências, mostra todas as postagens
        $postagens = Postagens::all();
    }

    return view('home.feed', compact('postagens'));
}}