<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria; // Importando a classe Categoria
use App\Models\Postagens;



class PreferenciasController extends Controller
{
    public function salvarPreferencias(Request $request)
    {
        // Verifique se o usuário está autenticado
        if (auth()->check()) {
            $user = auth()->user(); // Obtém o usuário autenticado

            // Valida se pelo menos uma preferência foi selecionada
            $request->validate([
                'preferencias' => 'required|array',
            ]);

            // Salva as preferências no banco de dados
            $user->preferencias = json_encode($request->preferencias); // Armazena como JSON
            $user->save();

              // Filtra os posts com base nas preferências
          
        
           
            // Redireciona para a tela do feed
            return redirect()->route('criacao-perfil'); // Ajuste para o nome correto da sua rota de feed
        } else {
            return redirect()->route('index')->withErrors('Você precisa estar logado para salvar preferências.');
        }
    }
}
