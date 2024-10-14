<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Usuario;
use App\Models\TelefoneUser;
use App\Models\Anunciante;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    
    public function store(Request $request){
        $request->validate(
            [
                'nickname' => 'required||min:5|max:250',
                'biography' => 'required||min:5|max:250'
            ],
            [
                'nickname.required' => 'Preencha esse campo!',
                'nickname.min' => 'O nome de usuário precisa ter, no mínimo, 5 caracteres!',
                'nickname.max'=> 'O nome atingiu o limite de 250 caracteres',

                'biography.required' => 'Preencha esse campo!',
                'biography.min' => 'A biografia precisa ter, no mínimo, 5 caracteres!',
                'biography.max' => 'Esse campo atingiu o limite de 250 caracteres!',
            ]
        );
        if(Auth::check()){


            $user = Auth::user();

            if(Perfil::where('nickname', $request->nickname)->exists()){
                return redirect()->back()->with('errorNickEqual', 'Nome de usuário já existente!');
            }

            if ($request->hasFile('imgPerfil') && $request->file('imgPerfil')->isValid()) {

                $fileImgPerfil = $request->imgPerfil;
                
                $extension = $fileImgPerfil->extension();
    
                $nomeImgPerfil = md5($fileImgPerfil->getClientOriginalName().strtotime('now')).'.'.$extension;
    
                $fileImgPerfil->move(public_path('assets/img/foto-perfil'),$nomeImgPerfil);
    
    
            }else{
                return redirect()->back()->with('errorImgPerfil', 'Imagem não selecionada ou tipo de arquivo inválido!');
            }
    
            if ($request->hasFile('imgCapa') && $request->file('imgCapa')->isValid()) {
                
                $fileImgCapa = $request->imgCapa;
    
                $extension = $fileImgCapa->extension();
    
                $nomeImgCapa = md5($fileImgCapa->getClientOriginalName().strtotime('now')).'.'.$extension;
    
                $fileImgCapa->move(public_path('assets/img/banners-perfils'), $nomeImgCapa);
            }else{
                return redirect()->back()->with('errorCapa', 'Imagem não selecionada ou tipo de arquivo inválido!');
            }
    
            Perfil::create([
                'nickname' => $request->nickname,
                'biography' => $request->biography,
                'fotoPerfil' => $nomeImgPerfil,
                'bannerPerfil' => $nomeImgCapa,
                'idUsuario' => $user->idUsuario, 
            ]);

            return redirect()->route('home.feed');
        }else{
            return redirect()->route('index')->withErrors('Você precisa estar logado para criar seu perfil!');
        }
       

    }


    public function show(){

        $user = Auth::user();

        $perfil = $user->perfils;

    }

    public function config($idPerfil){
        if (!$perfil = Perfil::where('idPerfil', $idPerfil)->first()){
            return redirect()->back();  
          }
          return view('home.configuracoes.configuracoes-gerais', compact('perfil'));
    }

    public function editar($idPerfil){
        
        if (!$perfil = Perfil::where('idPerfil', $idPerfil)->first()){
          return redirect()->back();  
        }
        return view('home.configuracoes.editar-perfil', compact('perfil'));

    }

    public function update(Request $request, $idPerfil){
        
        //validação dos campos
        $request->validate(
            [
                'nickname' => 'required||max:255|min:5', //Requer o campo, ao menos 5 caracteres e no máximo 255 caracteres
                'bio' => 'max:255', //Requer o campo e deve ser um e-mail no formato correto
                
            ],
            [
                'nickname.required'=> 'Preencha esse campo corretamente!',//Criamos uma mensagem personalizada para quando o tipo required não for satisfeito
                'bio.max' => 'O bio atingiu o limite de 255 caracteres',
            ]
        );

        $exist=Perfil::where('nickname', $request->nickname)->where('idPerfil', '!=', $idPerfil)->exists();
        if($exist){
            return redirect()->back()->with('errorNickname', 'Esse nome de usuário já existe!');
        }

        $perfil = Perfil::findOrFail($idPerfil);

        //Atualização da imagem
        if($request->hasFile('imgPerfil') && $request->file('imgPerfil')->isValid()){


            $requestImage = $request->imgPerfil;

            $extension = $requestImage ->extension();

            $imgName = md5($requestImage->getClientOriginalName().strtotime('now'))."." . $extension;

            $requestImage->move(public_path('assets/img/foto-perfil'), $imgName);
            /*$request->imgPerfil = $imgName;*/
            $perfil->fotoPerfil = $imgName;
        }
        
        if($request->hasFile('imgCapa') && $request->file('imgCapa')->isValid()){

            $requestImage = $request->imgCapa;

            $extension = $requestImage->extension();

            $imgName = md5($requestImage->getClientOriginalName().strtotime('now')).".".$extension;

            $requestImage->move(public_path('assets/img/banners-perfils'), $imgName);

            $perfil->bannerPerfil = $imgName;

        }

        $perfil->biography=$request->bio;
        $perfil->update($request->all());

        return redirect()->route('perfil.editar', $perfil )->with('message', 'Perfil atualizado com sucesso');
    }

    public function showPerfilsSeguindo($idPerfil){
        $perfilsSeguindo = Perfil::with('seguindo')->find($idPerfil);

        return view('home.seguindo', compact('perfilsSeguindo'));
    }

    public function showPerfilsSeguidores($idPerfil){
        $perfilsSeguidores = Perfil::with('seguidores')->find($idPerfil);

        return view('home.seguidores', compact('perfilsSeguidores'));
    }
    public function destroy($idPerfil){

        
    }
}
