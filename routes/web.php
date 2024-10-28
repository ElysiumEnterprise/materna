<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExclusaoController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\PDFGenerateController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UsuarioController;
use App\Mail\TestMail;
use App\Models\Usuario;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\PreferenciasController;
use App\Http\Controllers\SeguidoresController;
use App\Http\Controllers\UserPreferenciasController;
use App\Models\Seguidores;

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

Route::get('/login-adm', [LoginController::class, 'goLoginADM'])->name('go.login.adm');

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

//Cadastro de postagem

Route::post('/home/feed', [PostagemController::class, 'store'])->name('cad.post');
//Route::get('/home/feed', [FeedController::class, 'go_feed'])->name('feed');

//Dashboard
Route::get('/dashboard/home', [DashboardController::class, 'goDashboard'])->name('go.dashboard');



Route::get('/dashboard/usuarios', [UsuarioController::class, 'show'])->name('usuarios.adm');

Route::get('/dashboard/anunciantes', [UsuarioController::class, 'showAnunciantes'])->name('anunciantes.adm');

Route::get('/dashboard/clientes', [UsuarioController::class, 'showCliente'])->name('clientes.adm');
//

Route::post('/dashboard/usuarios', [UsuarioController::class, 'buscarUsuario'])->name('buscar.usuario');

//Informações do usuário

Route::get('/dashboard/info-usuario/{idUsuario}', [InfoUserController::class, 'goInfoUserADM'])->name('info.user');

//Deletagem do usuário via ADM

Route::delete('/dashboard/info-usuario/{idUsuario}', [UsuarioController::class, 'destroyViaADM'])->name('user.destroy.adm');

//ir para as denúncias verificadas do usuário

Route::get('/dashboard/denuncias-verificadas/{idUser}', [InfoUserController::class, 'goListagemDenunciasVerificadas'])->name('go.list-denuncias-verificadas');

//Ações que determinam se a denúncia foi aceita ou não
Route::put('/dashboard/denuncia/{idDenuncia}', [DenunciaController::class, 'aceitarDenuncia'])->name('aceitar.denuncia');

Route::delete('/dashboard/denuncia/{idDenuncia}', [DenunciaController::class, 'recusarDenuncia'])->name('recusar.denuncia');
//
Route::get('/home/configuracoes', function(){
    return view('home.configuracoes.configuracoes-gerais');
});
Route::get('/home/feed/{idUsuario}', [InfoUserController::class, 'goInfoUserHome'])->name('perfil');

Route::post('/home/perfil/{idUsuario}', [DenunciaController::class, 'store'])->name('cad.denuncia');

Route::get('/home/perfil-anunciante', function(){
    return view('home.perfilAnunciante');
});


Route::get('/home/comunidades', function(){
    return view('home.comunidades');
});

Route::get('/home/preferencias', function(){
    return view('home.preferencias');
});

Route::get('/home/salvos', function(){
    return view('home.salvos');
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



Route::get('/home/preferencias', function () {
    return view('/home/preferencias'); // Ajuste para o nome correto da sua view
})->name('/home/preferencias');

// Rota para salvar as preferências
Route::post('/home/preferencias', [PreferenciasController::class, 'salvarPreferencias'])->name('salvar.preferencias');

//Rota para criação do perfil

Route::get('/criar-perfil', function(){
    return view('criacao-perfil');
})->name('criacao-perfil');

Route::post('/criar-perfil', [PerfilController::class, 'store'])->name('cadastrar.perfil');
//Rotas para gera pdf

Route::get('/pdf/relatorio', [PDFGenerateController::class, 'gerarPDFRelatorioHoje'])->name('pdf.relatorio');


Route::post('/seguir-perfil/{idPerfil}', [SeguidoresController::class, 'seguirPerfil'])->name('seguir.perfil');

Route::post('/parar-seguir-perfil/{idPerfil}', [SeguidoresController::class, 'pararSeguirPerfil'])->name('parar.seguir.perfil');

//Ir para lista de seguindo

Route::get('/lista-seguindo/{idPerfil}', [PerfilController::class, 'showPerfilsSeguindo'])->name('go.list.seguindo');

//Ir para lista de seguidores

Route::get('/lista-seguidores/{idPerfil}', [PerfilController::class, 'showPerfilsSeguidores'])->name('go.list.seguidores');

//Remover seguidores 

Route::delete('/remover-seguidor/{idPerfil}/{idUserAuth}', [SeguidoresController::class, 'removerSeguidor'])->name('remover-seguidor');

//Suspender manualmente na lista de usuários

Route::post('/suspender-usuario/{idUsuario}', [UsuarioController::class, 'suspenderUser'])->name('suspender-user');

//Ativar o usuário após ser suspenso
Route::get('/ativar-usuario/{idUsuario}', [UsuarioController::class, 'ativarUser'])->name('ativar-user');

//Rota para listar as denuncias verificadas
Route::get('/dashboard/list-denuncias-pendentes', [DenunciaController::class, 'listarDenunciasPendentes'])->name('list-denuncias-pendentes');

//Rota para listar as denuncias verificadas
Route::get('/dashboard/list-denuncias-verificadas', [DenunciaController::class, 'listarDenunciasVerificadas'])->name('list-denuncias-verificadas');