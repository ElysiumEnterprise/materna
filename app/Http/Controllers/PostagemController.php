<?php

namespace App\Http\Controllers;

use App\Models\CategoriaPost;
use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Models\Postagem;
use Illuminate\Support\Facades\Auth;

class PostagemController extends Controller
{
    public function store(Request $request){

        $user = Auth::user();

        if ($user->idNivelUsuario == 3) {
            $isAdd = true;
        }else{
            $isAdd = false;
        }

        $perfil = Perfil::where('idUsuario', $user->idUsuario)->first();

        $rules = [
            'descPost' => 'max:255',
        ];


        $messages = [
            'descPost.max' => 'A descrição da Postagem atingiu o limite de 255 caracteres!',
        ];
        $opcoesCategorias = $request->input('categoriasPost',[]);
        
        
        if ($request->hasFile('imgPost')&& $request->file('imgPost')->isValid()) {
            $requestImage = $request->imgPost;

            $extension = $requestImage->extension();

            $nomeImg = md5($requestImage->getClientOriginalName().strtotime('now')).'.'.$extension;

            $requestImage->move(public_path('assets/img/file-posts'), $nomeImg);
            
        }else{
            return redirect()->back()->with('errorFile', 'Nenhum arquivo foi selecionado!');
        }


        $request->validate($rules, $messages);

        $postagem = Postagem::create([
            'descPostagem' => $request->descPost,
            'idPerfil' => $perfil->idPerfil,
            'fotoPost' => $nomeImg,
            'dataPost' => today(),
            'horaPost' => now()->format('H:i:s'),
            'isADD'=> $isAdd,
        ]);

        foreach($opcoesCategorias as $opcaoCategoria){
            CategoriaPost::create([
                'idPostagem' => $postagem->idPostagem,
                'idCategoria' => intval($opcaoCategoria),
            ]);
        }

        return redirect()->back();
    }

    public function destroy($idPostagem){
       
        if (Auth::check()) {
            $userAuth = Auth::user();

            $perfilAuth =$userAuth->perfils;

            if (Postagem::where('idPerfil', $perfilAuth->idPerfil)->where('idPostagem', $idPostagem)->exists()) {
                $postagem = Postagem::where('idPerfil', $perfilAuth->idPerfil)->where('idPostagem', $idPostagem)->get();
                
                $postagem->delete();

                return redirect()->back()->with('status', 'Postagem deletada com sucesso!');
            }else{
                return redirect()->back()->with('status', 'Erro ao tentar deletar a postagem!');
            }

        }else{
            return redirect()->route('/')->with('status', 'Você não pode executar essa ação');
        }
    }
}
