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
use App\Http\Controllers\ComunidadeController;
use App\Mail\TestMail;
use App\Models\Usuario;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\PostagensController;

use App\Http\Controllers\ComentariosController;

use App\Http\Controllers\CurtidasController;
use App\Http\Controllers\GraficoAnuncianteController;
use App\Http\Controllers\PreferenciasController;
use App\Http\Controllers\SeguidoresController;
use App\Http\Controllers\UserPreferenciasController;
use App\Models\Seguidores;
use Laravel\Reverb\Protocols\Pusher\Http\Controllers\PusherController;
use App\Http\Controllers\MensagensController;
use App\Http\Controllers\VisualizacoesController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::post('/pusher/auth', function () {
    return Auth::user() ? response()->json(Auth::user()) : abort(403);
});

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

Route::get('/home/perfil-anunciante', [FeedController::class, 'feedAnunciante'])->name('go.feed.anunciante');


Route::get('/home/comunidades', function(){
    return view('home.comunidades');
});

Route::get('/home/preferencias', function(){
    return view('home.preferencias');
});

Route::get('/home/salvos', [CurtidasController::class, 'mostrarPostagensCurtidas']);


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

Route::get('/home/mensagens/{idPerfil}', [MensagensController::class, 'index'])->name('list.mensagens');

Route::get('/home/mensagens/{idPerfil}', [MensagensController::class, 'escolherPerfil'])->name('mensagens.perfil');
//Enviar mensagem para o perfil

Route::post('/home/mensagens/enviar', [MensagensController::class, 'enviarMensagem'])->name('enviar.mensagem');

// escolher contato
Route::get('/home/quem', function(){
    return view('home.contatos');
});

Route::get('/home/preferencias', function(){
    return view('home.preferencias');
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




Route::get('/feed', [FeedController::class, 'mostrarFeed']);

Route::get('/home/mensagens/buscar-novas/{idPerfil}', [MensagensController::class, 'buscarNovasMensagens'])->name('busca-mensagens');


//Route::post('/criar-postagem', [PostagensController::class, 'criarPostagem'])->name('criar-postagem');

//Obter as views de seguidores ou não
Route::get('/get-count-views', [VisualizacoesController::class, 'getCountViews'])->name('get.view.count');

//Obter as informações para o gráfico de barras geral de todos os anúncios do anunciante autenticado

Route::get('/get-data-geral-perfil-add', [GraficoAnuncianteController::class, 'getGeralGraficoPerfilAdd'])->name('get.data.perfil.add');




Route::post('/curtidas/salvar', [CurtidasController::class, 'salvarCurtida'])->name('curtidas.salvar');
Route::post('/curtidas/remover', [CurtidasController::class, 'removerCurtida'])->name('curtidas.remover');
Route::post('/curtidas/toggle/{postId}', [CurtidasController::class, 'toggleCurtida'])->name('curtidas.toggle');

//Salvar as curtidas
Route::post('/salvar-curtida/{idPostagem}', [CurtidasController::class, 'salvarCurtida'])->name('salvar-curtida');

// Remover a curtida
Route::delete('/remover-curtida/{idPostagem}', [CurtidasController::class, 'removerCurtida'])->name('remover-curtida');



//Gerar gráficos para mostrar da postagem selecionada

Route::get('/gerar-grafico-pizza-post/{idPostagem}', [GraficoAnuncianteController::class, 'gerarGraficoPizzaPost'])->name('gera-grafic-pizza-post');
Route::get('/gerar-grafico-barras-post/{idPostagem}', [GraficoAnuncianteController::class, 'gerarGraficoBarPost'])->name('gerar-grafic-bar-post');

//Deletar Postagem com o seu idPostagem
Route::delete('/deletar-postagem/{idPostagem}', [PostagemController::class, 'destroy'])->name('destroy.post');

// Rota para salvar comentários
Route::post('/comentarios/{idPostagem}', [ComentariosController::class, 'store'])->name('store.comentario');



//Rota para cadastrar as visualizações
Route::post('/visualizar-post/{idPostagem}', [VisualizacoesController::class, 'store'])->name('view.post');

//Visualizar uma postagem:
Route::get('/mostrar-postagem/{idPostagem}', [PostagemController::class, 'showPostagem'])->name('show.post');

//Rota para mostrar os comentários

Route::get('/mostrar-comentarios-post/{idPostagem}',[ComentariosController::class, 'show'])->name('show.chat.post');

Route::get('/comunidades', [ComunidadeController::class, 'showComunidades'])->name('comunidades');


Route::get('/criar-comunidade', function(){
    return view('comunidades');
})->name('comunidades');

Route::post('/criar-comunidade', [ComunidadeController::class, 'cadastrarComunidade'])->name('criacao.comunidade');



// Rota para mostrar todas as comunidades de um perfil
Route::get('/perfil/{idPerfil}/comunidades', [ComunidadeController::class, 'showComunidadesdoPerfil'])
    ->name('comunidades.perfil');

// Rota para ingressar em uma comunidade
Route::post('/comunidade/{idComunidade}/ingressar/{idPerfil}', [ComunidadeController::class, 'ingressarComunidade'])
    ->name('comunidade.ingressar');

// Rota para exibir o formulário de criação de uma comunidade
Route::get('/comunidade/criar', [ComunidadeController::class, 'mostrarFormularioCriacao'])
    ->name('comunidade.criar');

// Rota para salvar a nova comunidade
Route::post('/comunidade/criar', [ComunidadeController::class, 'salvarComunidade'])
    ->name('comunidade.salvar');
