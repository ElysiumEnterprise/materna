<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use App\Models\Usuario;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function goDashboard(){
        $countCadastros = Usuario::where('idNivelUsuario', '!=', 2)->count();

        $countPostagens = Postagem::count();

        $countPostADD = Postagem::where('isADD', "!=", 0)->count();
        
        $anunciantes = Usuario::with(['perfils','perfils.postagems'])->where('idNivelUsuario', 3)->latest()->take(5)->get();



        return view('dashboard-adm.dashboard-home', compact('countCadastros', 'countPostagens', 'countPostADD', 'anunciantes'));
    }
}
