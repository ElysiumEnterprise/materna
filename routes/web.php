<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function(){
    return view('index');
});

Route::get('/cadastro', function(){
    return view('cadastro');
});