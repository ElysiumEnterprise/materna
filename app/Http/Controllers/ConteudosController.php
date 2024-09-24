<?php

namespace App\Http\Controllers;

use App\Models\Conteudo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ConteudoController extends Controller
{
    public function salvarConteudo(Request $request)
    {
        // Valida o conteúdo
        $request->validate([
            'conteudo' => 'required|array', // Certifique-se de que o conteúdo foi enviado
            'conteudo.*' => 'string', // Cada conteúdo deve ser uma string
        ]);

        $usuario = Auth::user(); // Obtém o usuário autenticado

        // Aqui você pode salvar o conteúdo no banco de dados
        foreach ($request->conteudo as $item) {
            // Exemplo: Você pode criar uma tabela de conteúdo se ainda não tiver
            // Conteudo::create(['user_id' => $usuario->id, 'conteudo' => $item]);

            // Para simplificar, você pode armazenar o conteúdo em um campo JSON no modelo User (se aplicável)
            // $usuario->conteudo = json_encode($request->conteudo); 
        }

        // Atualiza o campo primeiro_login para false
     

