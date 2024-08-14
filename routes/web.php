<?php

use Illuminate\Support\Facades\Route;

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