<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function editar($idPerfil){
        
        
        
        if (!$perfil = Perfil::where('idPerfil', $idPerfil)->first()){
          return redirect()->back();  
        }
        return view('home.configuracoes.editar-perfil', compact('perfil'));

    }

    public function show($idPerfil){

    }

    public function update(Request $request, $idPerfil){

        
        
        $perfil = Perfil::findOrFail($idPerfil);

        
        $perfil->update($request->all());

        return redirect()->route('perfil.editar')->with('message', 'Perfil atualizado com sucesso');
    }
}
