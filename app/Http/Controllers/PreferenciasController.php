<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreferenciasController extends Controller
{
    public function mostrarPreferencias()
    {
        return view('preferencias'); // Retorna a view das preferências
    }

    public function salvarPreferencias(Request $request)
    {
        // Pega o usuário autenticado
        $usuario = Auth::user();

        // Validação das preferências
        $request->validate([
            'preferencias' => 'required|array|min:1',
        ], [
            'preferencias.required' => 'Selecione pelo menos uma preferência!',
        ]);

        // Salva as preferências no banco de dados
        $usuario->preferencias = json_encode($request->preferencias);
        $usuario->primeiro_login = false; // Define que o usuário não está mais no primeiro login
        $usuario->save();

        // Redireciona o usuário para o feed ou outra página
        return redirect()->route('/home/feed')->with('success', 'Preferências salvas com sucesso!');
    }
}
