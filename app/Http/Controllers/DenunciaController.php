<?php

namespace App\Http\Controllers;

use App\Mail\DenunciaAprovadaEmissorMail;
use App\Mail\DenunciaMail;
use App\Mail\SuspensoMail;
use App\Models\Denuncia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DenunciaController extends Controller
{

    public function store(Request $request, $idUsuario){

        $usuarioAuth = Auth::user();

        $request->validate(
            [
                'motivoDenuncia' => 'required||min:3',
                'detalhesDenuncia' => 'required||min:10'
            ],
            [
                'motivoDenuncia.required' => 'Preencha esse campo!',
                'motivoDenuncia.min' => 'Esse campo precisa ter no mínimo 3 caracteres!',

                'detalhesDenuncias.required' => 'Preencha esse campo!',
                'detalhesDenuncias.min' => 'Esse campo precisa ter no mínimo 10 caracteres!'
            ]
        );

        Denuncia::create([
            'motivoDenuncia' => $request->motivoDenuncia,
            'idUsuario'=> $idUsuario,
            'idUsuarioEmissor'=> $usuarioAuth->idUsuario,
            'detalheDenuncia' => $request->detalhesDenuncia,
        ]);

        return redirect()->back()->with('status', 'Denúncia realizada com sucesso!');
    }
    public function aceitarDenuncia(Request $request, $idDenuncia){

        $request->validate(
            [
                'txtEsclarecimento' => 'required||max:250|min:5',
            ],
            [
                'txtEsclarecimento.required' => 'Preencha esse campo!',
                'txtEsclarecimento.max' => 'O campo atingiu o limite de 250 caracteres!',
                'txtEsclarecimento.min' => 'O campo precisa ter, no mínimo, 5 caracteres!'
            ]
        );
        $denuncia = Denuncia::find($idDenuncia);

        $denuncia->denuciaVerificada = 1;
        $denuncia->update();

        $motivoDenuncia = $denuncia->motivoDenuncia;

        $usuario = $denuncia->usuarios;

        $qtddDenuncia = $usuario->qtddDenuncias;

        $nomeUsuario = $usuario->nome;

        $usuario->qtddDenuncias = Denuncia::where('idUsuario', $usuario->idUsuario)->where('denuciaVerificada', 1)->count();

        
        Mail::to('machado.gui.oliveira@gmail.com')->send(new DenunciaMail($motivoDenuncia, $nomeUsuario, $qtddDenuncia));
        
        Mail::to('machado.gui.oliveira@gmail.com')->send(new DenunciaAprovadaEmissorMail($denuncia->usuarioEmissor->nome, 'Aprovada', $denuncia->usuarios->nome, $denuncia->motivoDenuncia, $request->txtEsclarecimento));

        $usuario->save();

        return redirect()->back()->with('message', "Denúncia de ID ". $idDenuncia. " verificada!");
    }

    public function recusarDenuncia(Request $request, $idDenuncia){

        $request->validate(
            [
                'txtEsclarecimento' => 'required||max:250|min:5',
            ],
            [
                'txtEsclarecimento.required' => 'Preencha esse campo!',
                'txtEsclarecimento.max' => 'O campo atingiu o limite de 250 caracteres!',
                'txtEsclarecimento.min' => 'O campo precisa ter, no mínimo, 5 caracteres!'
            ]
        );

        $denuncia = Denuncia::find($idDenuncia);

        Mail::to('machado.gui.oliveira@gmail.com')->send(new DenunciaAprovadaEmissorMail($denuncia->usuarioEmissor->nome, 'Recusada', $denuncia->usuarioEmissor->nome, $denuncia->motivoDenuncia, $request->txtEsclarecimento));
        
        $denuncia->delete();

        return redirect()->back()->with('message', "Denúncia de ID ". $idDenuncia. " deleteda!");
    }

    public function listarDenunciasPendentes(){
        if(Auth::check() && Auth::user()->idNivelUsuario == 2){
            $denunciasPendentes = Denuncia::with(['usuarios'])->latest()->where('denuciaVerificada', 0)->get();

            if ($denunciasPendentes->isEmpty()) {
                $denunciasPendentes->collect();
                return view('dashboard-adm.denuncias-pendentes', compact('denunciasPendentes'))->with('Não há denúncias pendentes');
            }else{
                return view('dashboard-adm.denuncias-pendentes', compact('denunciasPendentes'));
            }
        }else{
            return redirect()->back()->with('statusError', 'Você não pode executar essa ação');
        }
    }

    public function listarDenunciasVerificadas(){
        if (Auth::check() && Auth::user()->idNivelUsuario==2) {
            $denunciasVerificadas = Denuncia::with(['usuarios'])->latest()->where('denuciaVerificada', 1)->get();

            if($denunciasVerificadas->isEmpty()){
                $denunciasVerificadas->collect();
                return view('dashboard-adm.denuncias-gerais-verificadas', compact('denunciasVerificadas'))->with('statusErro', 'Não há denúncias verificadas!');
            }else{
                return view('dashboard-adm.denuncias-gerais-verificadas', compact('denunciasVerificadas'));
            }
        }
    }
}
