<?php

namespace App\Http\Controllers;

use App\Events\PursherBroadcast;
use Illuminate\Http\Request;
use App\Models\Perfil;

class PursherController extends Controller
{
    public function index($idPerfil){
        $perfilsSeguindo = Perfil::with(['seguindo'])->where('idPerfil', $idPerfil)->get();
        
        $perfilsSeguidores = Perfil::with(['seguidores'])->where('idPerfil', $idPerfil)->get();

        return view('home.home.list-perfils-mensagens', compact('perfilsSeguindo', 'perfilsSeguidores'));
    }

    public function broadcast(Request $request){
        broadcast(new PursherBroadcast($request->get('message')))->toOthers();

        return view('home.mensagens', ['message' => $request->get('message')]);
    }

    public function receive(Request $request){
        return view('home.mensagens', ['message' => $request->get('message')]);
    }
}
