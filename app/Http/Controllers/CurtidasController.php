<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postagem;
use App\Models\Curtidas;
use Illuminate\Support\Facades\Auth;

class CurtidasController extends Controller
{
    public function toggleLike(Request $request)
    {
        $idUsuario = Auth::id();
        $idPostagem = $request->input('idPostagem');

        // Verifica se a postagem existe
        $postagem = Postagem::find($idPostagem);
        if (!$postagem) {
            return response()->json(['status' => 'erro', 'mensagem' => 'Postagem não encontrada'], 404);
        }

        // Verifica se já existe uma curtida
        $curtida = Curtidas::where('idUsuario', $idUsuario)->where('idPostagem', $idPostagem)->first();

        if ($curtida) {
            // Se existir, remove a curtida
            $curtida->delete();
            return response()->json(['status' => 'descurtido']);
        } else {
            // Caso contrário, adiciona a curtida
            Curtidas::create(['idUsuario' => $idUsuario, 'idPostagem' => $idPostagem]);
            return response()->json(['status' => 'curtido']);
        }
    }
}
