<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postagem;
use App\Models\Curtidas;
use Illuminate\Support\Facades\Auth;

class CurtidasController extends Controller
{
    public function salvarCurtida(Request $request)
    {
        $post = Postagem::find($request->postId);
        $post->curtidas()->create(['idUsuario' => auth()->id()]);
    
        return response()->json(['totalCurtidas' => $post->curtidas()->count()]);
    }
    
    public function removerCurtida(Request $request)
    {
        $post = Postagem::find($request->postId);
        $post->curtidas()->where('idUsuario', auth()->id())->delete();
    
        return response()->json(['totalCurtidas' => $post->curtidas()->count()]);
    }
            public function toggleCurtida(Request $request, $postId)
            {
            $user = auth()->user();

            $curtida = $user->curtidas()->where('idPostagem', $postId)->first();

            if ($curtida) {
                // Se já curtiu, remove a curtida
                $curtida->delete();
                return response()->json(['message' => 'Curtida removida!']);
            } else {
                // Se não curtiu, adiciona uma nova curtida
                $user->curtidas()->create(['idPostagem' => $postId]);
                return response()->json(['message' => 'Curtida salva!']);
            }
        }


}
