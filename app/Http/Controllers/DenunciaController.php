<?php

namespace App\Http\Controllers;

use App\Mail\DenunciaMail;
use App\Models\Denuncia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DenunciaController extends Controller
{

    public function store(Request $request, $idUsuario){
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
            'detalheDenuncia' => $request->detalhesDenuncia,
        ]);

        return redirect()->back()->with('status', 'Denúncia realizada com sucesso!');
    }
    public function aceitarDenuncia($idDenuncia){

        $denuncia = Denuncia::find($idDenuncia);

        $denuncia->denuciaVerificada = 1;
        $denuncia->update();

        $motivoDenuncia = $denuncia->motivoDenuncia;

        $usuario = $denuncia->usuarios;

        $qtddDenuncia = $usuario->qtddDenuncia;

        $nomeUsuario = $usuario->nome;

        $usuario->qtddDenuncias = Denuncia::where('idUsuario', $usuario->idUsuario)->where('denuciaVerificada', 1)->count();

        if($usuario->qtddDenuncias >= 3){
            $usuario->isSuspenso = 1;
        }else{
            Mail::to('machado.gui.oliveira@gmail.com')->send(new DenunciaMail($motivoDenuncia, $nomeUsuario, $qtddDenuncia));
        }

        $usuario->save();

       

        return redirect()->back()->with('message', "Denúncia de ID ". $idDenuncia. " verificada!");
    }

    public function recusarDenuncia($idDenuncia){

        $denuncia = Denuncia::find($idDenuncia);

        $denuncia->delete();

        return redirect()->back()->with('message', "Denúncia de ID ". $idDenuncia. " deleteda!");
    }
}
