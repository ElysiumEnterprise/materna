<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentariosController extends Controller
{
    //Função para cadastrar o comentario
    public function store(Request $request, $idPostagem){

        $request->validate(
            [
                'inputComentarioModal' => 'required|max:250',
            ],
            [
                'inputComentarioModal.required' => 'Você precisa preencher o campo!',
                'inputComentarioModal.max' => 'O comentário atingiu o limite de 250 caracteres',
            ]
        );

        if(Auth::check()){
            $userAuth = Auth::user();

            $idPerfilAuth = $userAuth->perfils->idPerfil;

            $comentario = Comentarios::create([
                'idPerfil' => $idPerfilAuth,
                'idPostagem' => $idPostagem,
                'conteudo' => $request->inputComentarioModal,
            ]);

            

            $comentarioJSON = Comentarios::with(['perfils'])->where('idComentario', $comentario->idComentario)->first();

            return response()->json([
                'status'=>'Comentário enviado',
                'comentarios'=> $comentarioJSON,
            ]);

        }else{
            return redirect()->route('/')->with('error', 'Logue na Materna para seguir uma pessoa!');
        }
    }

    //Listagem de comentários da postagem

    public function show($idPostagem){

        $comentarios = Comentarios::with(['perfils'])->where('idPostagem', $idPostagem)->latest()->get();

        return response()->json(['comentarios' => $comentarios]);
    }


    //Deletagem de comentários

    public function destroy($idPostagem, $idComentario){
        
    }
}
