<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postagem;
use App\Models\Curtidas;
use Illuminate\Support\Facades\Auth;

class CurtidasController extends Controller
{
        public function salvar(Request $request)
        {
            $postId = $request->input('postId');
            // Salvar a curtida no banco de dados
            Curtida::create([
                'idUsuario' => auth()->id(),
                'idPostagem' => $postId
            ]);
            return response()->json(['success' => true]);
        }

        public function remover(Request $request)
        {
            $postId = $request->input('postId');
            // Remover a curtida do banco de dados
            Curtida::where('idUsuario', auth()->id())
                    ->where('idPostagem', $postId)
                    ->delete();
            return response()->json(['success' => true]);
        }

}
