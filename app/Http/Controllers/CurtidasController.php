<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postagem;
use App\Models\Curtidas;

class CurtidasController extends Controller
{
    public function toggleLike(Request $request, $id)
    {
        // Encontra a postagem pelo ID
        $post = Postagem::find($id); 

        // Verifica se a postagem existe
        if (!$post) {
            return response()->json(['error' => 'Postagem não encontrada'], 404);
        }

        // Verifica se o usuário já curtiu a postagem
        $like = Curtidas::where('idUsuario', auth()->id())
                        ->where('idPostagem', $post->id)
                        ->first();

        // Se a curtida já existe, remove a curtida
        if ($like) {
            $like->delete();
            $status = 'unliked';
        } else {
            // Caso contrário, adiciona uma nova curtida
            Curtidas::create([
                'idUsuario' => auth()->id(),
                'idPostagem' => $post->id
            ]);
            $status = 'liked';
        }

        // Conta o total de curtidas da postagem
        $curtidasCount = Curtidas::where('idPostagem', $post->id)->count();

        // Retorna o status e a contagem de curtidas
        return response()->json(['status' => $status, 'curtidas_count' => $curtidasCount]);
    }
}
