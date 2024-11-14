<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postagem;
use App\Models\Curtidas;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CurtidasController extends Controller
{
    public function salvarCurtida($idPostagem)
    {

        //Verificar se o usuário está autenticado
       
        
            if(Auth::check()){
                $userAuth = Auth::user();
                $userId = $userAuth->idUser;
                //Verificando se existe a postagem
                if (Postagem::where('idPostagem', $idPostagem)->exists()) {
                    //Cadastrar a curtida no banco de dados
                    $postagem = Postagem::where('idPostagem', $idPostagem)->first();
                    try{
                        Curtidas::create([
                            'idUsuario' => $userAuth->idUsuario,
                            'idPostagem' => $idPostagem,
                        ]); 

                        $postagem->curtidas_count = Curtidas::where('idPostagem', $postagem->idPostagem)->count();

                        $postagem->update();

                    }catch (\Exception $e) {
                        
                        return response()->json(['message' => $e], 500);
                    }

                    //Retorna a contagem de curtida

                    return response()->json([
                        'totalCurtidas' => Curtidas::where('idPostagem', $idPostagem)->count(),
                    ]);

                }else{
                    
                    return response()->json(['message' => 'Postagem não encontrada'], 404);
                }
            }else{
                
                return response()->json(['message' => 'Você precisa estar logado para executar essa ação!'], 401);
            }
        
    }
    
    public function removerCurtida($idPostagem)
    {
       
         if(Auth::check()){
            $userAuth = Auth::user();

            //Verificando se existe a postagem
            if (Postagem::where('idPostagem', $idPostagem)->exists()) {
                
                //Remover a curtida no banco de dados
                $curtida = Curtidas::where('idPostagem', $idPostagem)->where('idUsuario', $userAuth->idUsuario)->first();

                //Ação de deletar

                $curtida->delete();

                $postagem = Postagem::where('idPostagem', $idPostagem)->first();

                $postagem->curtidas_count = Curtidas::where('idPostagem', $idPostagem)->count();

                //Retorna a contagem de curtida

                return response()->json([
                    'totalCurtidas' => Curtidas::where('idPostagem', $idPostagem)->count(),
                ]);

            }else{
                return response()->json(['message' => 'Postagem não encontrada'], 404);
            }
        }else{
            return redirect()->route('/')->with('status', 'Você precisa estar logado para executar essa ação!');
        }
    }

   }
