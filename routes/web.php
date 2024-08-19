<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\PerfilController;

Route::get('/', function () {
    return view('index');
});


Route::get('/cadastro-user', function(){
    return view('cadastro-cliente');
});

Route::get('/cadastro-anunciante', function(){
    return view('cadastro-anunciante');
});

Route::get('/senha', function(){
    return view('senha');
});

Route::get('/codigo', function(){
    return view('codigo');
});

Route::get('/nova-senha', function(){
    return view('novasenha');
});

Route::get('/home/notificacoes', function(){
    return view('home.notificacoes');
});

Route::get('/home/feed', function(){
    return view('home.feed');
});

Route::get('/dashboard/home', function(){
    return view('dashboard-adm.dashboard-home');
});

Route::get('/home/configuracoes', function(){
    return view('home.configuracoes.configuracoes-gerais');
});

//Formulário de cadastro

Route::prefix('form-cadastro')->group(function(){
    Route::post('cadastro-cliente', [CadastroController::class, 'cadastrar_cliente'])->name('form-cadastro.cliente');
    Route::post('cadastro-anunciante', [CadastroController::class, 'cadastrar_anunciante'])->name('form-cadastro.anunciante');
});

Route::get('/home/configuracoes/editar-conta/{idPerfil}', [PerfilController::class, 'editar'])->name('perfil.editar');
Route::put('/home/configuracoes/editar-conta/{idPerfil}', [PerfilController::class, 'update'])->name('perfil.update');