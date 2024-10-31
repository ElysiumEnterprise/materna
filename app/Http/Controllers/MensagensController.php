<?php

namespace App\Http\Controllers;

use App\Events\PursherBroadcast;
use App\Models\Mensagen;
use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\PerfilMensagens;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MensagensController extends Controller
{
    public function index($idPerfilReceptor){
        // $perfilsSeguindo = Perfil::with(['seguindo'])->where('idPerfil', $idPerfil)->get();
        
        // $perfilsSeguidores = Perfil::with(['seguidores'])->where('idPerfil', $idPerfil)->get();

        // return view('home.list-perfils-mensagens', compact('perfilsSeguindo', 'perfilsSeguidores'));

        

    }

    public function escolherPerfil($idPerfil){

        $perfilMensagem = Perfil::with(['usuarios'])->where('idPerfil', $idPerfil)->first();


        $userAuth = Auth::user();
        $perfilAuth = $userAuth->perfils;

        $perfilEmissor = $perfilAuth->idPerfil;

        //Pegar as mensagens caso existam

        $mensagens = Mensagen::with(['emissores', 'receptores'])->whereHas('emissores', function($query) use ($perfilEmissor){
            $query->where('idPerfilEmissor', $perfilEmissor);
        })
        ->whereHas('receptores', function($query) use ($idPerfil){
            $query->where('idPerfilReceptor', $idPerfil);
        })->orderBy('created_at', 'asc')
        ->get();

        return view('home.mensagens', compact('perfilMensagem', 'mensagens'));
    }

    public function enviarMensagem(Request $request){
        $userAuth = Auth::user();

        $perfilAuth = $userAuth->perfils;

        //Associar aos perfils emissor e receptor

        $perfilEmissor = $perfilAuth->idPerfil;
        $perfilReceptor = $request->idPerfilReceptor;

        $mensagem = Mensagen::create([
            'conteudoMensagem' => $request->txtMessage,
            'dataEnvio' => Carbon::now()->toDateString(),
        ]);

        //Cadastrar na tabela perfil_mensagens

        PerfilMensagens::create([
            'idPerfilEmissor' => $perfilEmissor,
            'idPerfilReceptor' => $perfilReceptor,
            'idMensagem' => $mensagem->idMensagem,
        ]);
        
        broadcast(new PursherBroadcast($request->txtMessage, $userAuth->idUsuario))->toOthers();

        return response()->json(['status' => 'Mesagem enviada!']);
    }
}