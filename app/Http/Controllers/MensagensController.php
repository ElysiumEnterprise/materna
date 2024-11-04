<?php

namespace App\Http\Controllers;

use App\Events\PursherBroadcast;
use App\Models\Mensagen;
use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\PerfilMensagens;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

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
        })->orWhere(function($query) use ($perfilEmissor, $idPerfil) {
            $query->whereHas('emissores', function($q) use ($idPerfil) {
                $q->where('idPerfilEmissor', $idPerfil);
            })->whereHas('receptores', function($q) use ($perfilEmissor) {
                $q->where('idPerfilReceptor', $perfilEmissor);
            });
        })
        ->orderBy('created_at', 'asc')
        ->get();

        // Obtém o maior ID de mensagem
        $ultimoIdMensagem = $mensagens->max('idMensagem');

        return view('home.mensagens', compact('perfilMensagem', 'mensagens', 'ultimoIdMensagem'));
    }

    public function enviarMensagem(Request $request){

        $request->validate([
            'txtMessage' => 'required|string'
        ]);

        

        $userAuth = Auth::user();
        

        $perfilAuth = $userAuth->perfils;

        broadcast(new PursherBroadcast($request->txtMessage, $userAuth->idUsuario))->toOthers();
        
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
        
        

        return response()->json(['status' => 'Mesagem enviada!']);
    }

    public function buscarNovasMensagens(Request $request, $idPerfil){
        try {
            $userAuth = Auth::user();

            if (!$userAuth) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
    
            $idPerfilEmissor = $userAuth->perfils->idPerfil;
            if (!$idPerfilEmissor) {
                return response()->json(['error' => 'Perfil não encontrado'], 404);
            }

            $idPerfilReceptor = $idPerfil;
            $ultimoIdMensagem = $request->query('ultimoIdMensagem', 0);
            //Buscar novas mensagens
            
            
            $mensagens = Mensagen::with(['emissores', 'receptores'])->where('idMensagem', '>', $ultimoIdMensagem)->where(function ($query) use ($idPerfilEmissor, $idPerfilReceptor) {
            $query->whereHas('emissores', function ($q) use ($idPerfilEmissor) {
                $q->where('idPerfilEmissor', $idPerfilEmissor);
            })->whereHas('receptores', function ($q) use ($idPerfilReceptor) {
                $q->where('idPerfilReceptor', $idPerfilReceptor);
            });
        })
        ->orWhere(function ($query) use ($idPerfilEmissor, $idPerfilReceptor) {
            $query->whereHas('emissores', function ($q) use ($idPerfilReceptor) {
                $q->where('idPerfilEmissor', $idPerfilReceptor);
            })->whereHas('receptores', function ($q) use ($idPerfilEmissor) {
                $q->where('idPerfilReceptor', $idPerfilEmissor);
            });
        })->where('statusLeitura', false)
        ->orderBy('created_at', 'asc')
        ->get();

        if ($ultimoIdMensagem !== 'null') {
            $mensagens->where('idMensagem', '>', $ultimoIdMensagem);
        }

    
        $mensagensIds = $mensagens->pluck('idMensagem');

        Mensagen::whereIn('idMensagem', $mensagensIds)->update(['statusLeitura' => true]);
    
            return response()->json(['mensagens' => $mensagens]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        
    }
}
