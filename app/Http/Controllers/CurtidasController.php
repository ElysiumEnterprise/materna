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
        
        if (!$post) {
            return response()->json(['message' => 'Postagem não encontrada'], 404);
        }
        
        // Cria a curtida se não existir
        $post->curtidas()->firstOrCreate([
            'idUsuario' => auth()->id(),
        ]);
    
        // Retorna a contagem de curtidas atualizada
        return response()->json(['totalCurtidas' => $post->curtidas()->count()]);
    }
    
    public function removerCurtida(Request $request)
    {
        $post = Postagem::find($request->postId);
        
        if (!$post) {
            return response()->json(['message' => 'Postagem não encontrada'], 404);
        }
    
        // Remove a curtida associada ao usuário
        $post->curtidas()->where('idUsuario', auth()->id())->delete();
    
        // Retorna a contagem de curtidas atualizada
        return response()->json(['totalCurtidas' => $post->curtidas()->count()]);
    }

   }
