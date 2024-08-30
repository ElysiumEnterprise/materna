<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postagem;

class PostagemController extends Controller
{
    public function store(Request $request){
        $rules = [
            'descPost' => 'max:255',
        ];

        $messages = [
            'descPost.max' => 'A descrição da Postagem atingiu o limite de 255 caracteres!',
        ];

        if ($request->hasFile('imgPost')&& $request->file('imgPost')->isValid()) {
            $requestImage = $request->imgPost;

            $extension = $requestImage->extension();

            $nomeImg = md5($requestImage->getClientOriginalName().strtotime('now')).'.'.$extension;

            $requestImage->move(public_path('assets/img/file-posts'), $nomeImg);
            
        }else{
            return redirect()->back()->with('errorFile', 'Nenhum arquivo foi selecionado!');
        }


        $request->validate($rules, $messages);
    }
}
