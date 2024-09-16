<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExclusaoController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UsuarioController;
use App\Mail\TestMail;
use App\Models\Usuario;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('index');
})->name('index');

//Cadastro e login
Route::get('/cadastro-user', function(){
    return view('cadastro-cliente');
});

Route::get('/cadastro-anunciante', function(){
    return view('cadastro-anunciante');
});

Route::post('login',[LoginController::class, 'logarUsuario'])->name('form-logar');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

//Login de ADM

Route::get('/login-adm', function(){
    return view('login-adm');
});

Route::post('/login-adm', [LoginController::class, 'logarADM'])->name('form.logar.adm');

//Redefinição de senha
Route::get('/senha', function(){
    return view('senha');
});

Route::post('/senha', [ResetPasswordController::class, 'sendResetLinkEmail'])->name('password.reset');

Route::get('/codigo', function(){
    return view('codigo');
});

Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('passord.reset');

Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/home/notificacoes', function(){
    return view('home.notificacoes');
});

Route::get('/home/feed', [FeedController::class, 'go_feed'])->name('home.feed');

//Route::get('/home/feed', [FeedController::class, 'go_feed'])->name('feed');

Route::get('/dashboard/home', function(){
    return view('dashboard-adm.dashboard-home');
});

Route::get('/home/configuracoes', function(){
    return view('home.configuracoes.configuracoes-gerais');
});
Route::get('/home/perfil-user', function(){
    return view('home.perfil');
})->name('perfil');

Route::get('/home/perfil-anunciante', function(){
    return view('home.perfilAnunciante');
});


Route::get('/home/comunidades', function(){
    return view('home.comunidades');
});


//Formulário de cadastro

Route::prefix('form-cadastro')->group(function(){
    Route::post('cadastro-cliente', [CadastroController::class, 'cadastrar_cliente'])->name('form-cadastro.cliente');
    Route::post('cadastro-anunciante', [CadastroController::class, 'cadastrar_anunciante'])->name('form-cadastro.anunciante');
});



//Configurações 
Route::get('/home/configuracoes/{idPerfil}', [PerfilController::class, 'config'])->name('perfil.config');

//Editar a conta
Route::get('/home/configuracoes/editar-conta/{idPerfil}', [PerfilController::class, 'editar'])->name('perfil.editar');
Route::put('/home/configuracoes/editar-conta/{idPerfil}', [PerfilController::class, 'update'])->name('perfil.update');

Route::delete('home/configuracoes/editar-conta/{idPerfil}', [UsuarioController::class, 'destroy'])->name('user.destroy');


//Editar o usuario

Route::get('/home/configuracoes/editar-usuario/{idUser}', [UsuarioController::class, 'edit'])->name('user.edit');
Route::put('/home/configuracoes/editar-usuario/{idUser}', [UsuarioController::class, 'update'])->name('user.update');

Route::get('/home/mensagens', function(){
    return view('home.mensagens');
});



// caso o usuário não esteja autenticado, ele seja redirecionado para a página de login.

Route::get('/index', [LoginController::class, 'index'])->name('index');

Route::middleware(['auth'])->group(function() {
    Route::get('/index',[LoginController::class, 'index'])->name('index');
});

// verificar se o usuario esta logado 

