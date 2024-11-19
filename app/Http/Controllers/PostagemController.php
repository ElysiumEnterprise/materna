<?php

namespace App\Http\Controllers;

use App\Models\CategoriaPost;
use App\Models\Comentarios;
use App\Models\Curtidas;
use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Models\Postagem;
use App\Models\Visualizacoes;
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
       dd($idPostagem);
        if (Auth::check()) {
            $userAuth = Auth::user();

            $perfilAuth =$userAuth->perfils;

            if (Postagem::where('idPerfil', $perfilAuth->idPerfil)->where('idPostagem', $idPostagem)->exists()) {

                
                $postagem = Postagem::where('idPerfil', $perfilAuth->idPerfil)->where('idPostagem', $idPostagem)->first();
                

                $postagem->delete();

                return redirect()->back()->with('status', 'Postagem deletada com sucesso!');
            }else{
                return redirect()->back()->with('status', 'Erro ao tentar deletar a postagem!');
            }

        }else{
            return redirect()->route('/')->with('status', 'Você não pode executar essa ação');
        }
    }

    public function showPostagem($idPostagem){

        if (Postagem::where('idPostagem', $idPostagem)->exists()) {
            $postagem = Postagem::with(['comentarios', 'perfils'])->where('idPostagem', $idPostagem)->first();

            //Quantidade de curtidas:
            $countCurtidas = Curtidas::where('idPostagem', $idPostagem)->count();

            //Pegar a quantidade de comentários:
            $countComentarios = Comentarios::where('idPostagem', $idPostagem)->count();

            //Pegar a quantidade de visualizações
            $countViews = Visualizacoes::where('idPostagem', $idPostagem)->count();


            //Retornar em JSON:
            return response()->json([
                'descPostagem' => $postagem->descPostagem,
                'dataPost' => $postagem->created_at,
                'totalCurtidas' => $countCurtidas,
                'totalViews' => $countViews,
                'totalComentarios'=> $countComentarios,
                'comentarios'=> $postagem->comentarios(),
            ]);


        }else{
            return response()->json([
                'messsage' => 'Não foi possível encontrar a Postagem!'
            ]);
        }

    }

    public function mostrarPostagens()
    {
    // Obter as postagens, caso existam
    $postagens = Postagem::all();

    if ($postagens->isEmpty()) {
        // Tratar o caso onde não há postagens
        return view('home.comunidades', ['mensagem' => 'Nenhuma postagem encontrada.']);
    }

    return view('home.comunidades', compact('postagens'));
    }

}
