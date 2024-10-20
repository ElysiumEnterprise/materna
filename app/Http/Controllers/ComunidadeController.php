<?php

namespace App\Http\Controllers;

use App\Models\Comunidades;
use App\Models\ComunidadesCategoria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComunidadeController extends Controller
{
    public function cadastrarComunidade(Request $request){
        $request->validate(
            [
                'fotoComunidade' => 'required',
                'nomeComunidade' => 'required||max:250|min:5',
                'descComunidade' => 'required||max:250|min:5',
            ],
            [
                'fotoComunidade.required' => 'Preencha esse campo!',

                'nomeComunidade.required' => 'Preencha esse campo!',
                'nomeComunidade.max' => 'O nome atingiu o limite de 250 caracteres',
                'nomeComunidade.min' => 'O nome precisa ter no mínimo 5 caracteres!',

                'descComunidade.required' => 'Preencha esse campo!',
                'descComunidade.max' => 'A descrição atingiu o limite de 250 caracteres!',
                'descComunidade.min' => 'A descrição precisa ter no mínimo 5 caracteres'
            ]
        );
        if (Auth::check()) {
            $userAuth = Auth::user();
            $perfilAuth = $userAuth->perfils;

            if (Comunidades::where('nomeComunidade', 'LIKE', $request->nomeComunidade)->exists()) {
                return redirect()->back()->with('errorName', 'Esse nome já está sendo utilizado!');
            }

            if ($request->hasFile('fotoComunidade') && $request->file('fotoComunidade')->isValid()) {
                $requestImage = $request->fotoComunidade;

                $extension = $requestImage->extension();

                $nomeImg = md5($requestImage->getClientOriginalName().strtotime('now').'.'.$extension);

                $requestImage->move(public_path('assets/img/foto-comunidades'), $nomeImg);
            }else{
                return redirect()->back()->with('errorFile', 'Não foi selecionado nenhum arquivo!');
            }
            $opcoesCategoria = $request->input('categoriasComunidades',[]);

            $comunidade = Comunidades::create([
                'fotoComunidade' => $requestImage,
                'nomeComunidade' => $request->nomeComunidade,
                'descComunidade' => $request->descComunidade,
                'dtCriacaoComunidade' => Carbon::date('now'),
                'idPerfilCriador' => $perfilAuth->idPerfil,
            ]);

            foreach($opcoesCategoria as $opcao){
                ComunidadesCategoria::create([
                    'idComunidade' => $comunidade->idComunidade,
                    'idCategoria' => $opcao
                ]);
            }

            //Aqui precisa carregar a rota após o cadastro
        }else{
            return redirect()->route('/')->with('status', 'Você precisa estar logado para executar essa ação');
        }
    }

    public function destroy($idComunidade, $idPerfilAuth){
        $userAuth = Auth::user();

        $perfilAuth = $userAuth->perfils;

        if (Auth::check() && $idPerfilAuth == $perfilAuth->idPerfil) {
            
        }else{
            return redirect()->back()->with('status', 'Você não pode executar essa ação!');
        }
    }
}
