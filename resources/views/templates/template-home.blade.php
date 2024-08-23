<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/styles-home.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style-modal-post.css')}}">
    @yield('links-css')
    <title>Home</title>
</head>
<body>
    <header>
        
            
            
            
    </header>
    
    <main>
    <nav id="sidebar">
                <div id="sidebar_content">
                    <a href="">
                        <div id="user">
                            <img src="{{url('assets/img/img-home/avatar.jpg')}}" id="user_avatar" alt="Avatar">
                
                            <p id="user_infos">
                                <span class="item-description">
                                    Julia
                                </span>
                                <span class="item-description">
                                    Mãe de dois
                                </span>
                            </p>
                        </div>
                    </a>
                    
            
                    <ul id="side_items">
                        <li class="side-item active">
                            <a href="/home/feed{idPerfil}">
                            <i class="fa-solid fa-magnifying-glass" style="color: #ffb6c1;"></i>
                                <span class="item-description">
                                    Explorar
                                </span>
                            </a>
                        </li>
            
                        <li class="side-item">
                            <a href="/home/mensagens">
                                <i class="fa-solid fa-envelope" style="color: #ffb6c1;"></i>
                                <span class="item-description">
                                    Mensagens
                                </span>
                            </a>
                        </li>
            
                        <li class="side-item">
                            <a href="#">
                                <i class="fa-solid fa-face-smile" style="color: #ffb6c1;"></i>
                                <span class="item-description">
                                    Cominidades
                                </span>
                            </a>
                        </li>
            
                        <li class="side-item">
                            <a href="/home/notificacoes">
                                <i class="fa-solid fa-bell"  style="color: #ffb6c1;"></i>
                                <span class="item-description">
                                    Notificações
                                </span>
                            </a>
                        </li>

                        <li class="side-item" onclick="abrirModalPost()">
                            <button type="button" onclick="abrirModalPost()">
                            <i class="fa-solid fa-image"  style="color: #ffb6c1;"></i>
                                <span class="item-description">
                                    Postar
                                </span>
                            </button>
                            
                        </li>
                    </ul>
            
                    <button type="button" id="open_btn">
                        <i id="chevron_right" class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
        
                <div id="logout">
                    <a href="{{route('perfil.config', 4)}}" id="logout_btn">
                        <i class="fa-solid fa-gear" style="color: #ffb6c1;"></i>
                        <span class="item-description">
                            Configuraçoes
                        </span>
                    </a>
                </div>
            </nav>
        <section class='nav-header-conteudo'>
            <nav class='nav-top'>
                <div class="cont-nav-titulo">
                    <img src="{{url('assets/img/logo/Logo-Materna-Branco.png')}}" alt="Imagem logo materna" class="img-logo">
                </div>
                <div class="cont-buscador">
                    <form action="" method="post">
                        <input type="search" name="item-search" id="item-search" placeholder="Procure aqui...">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass" ></i></button>
                    </form>
                </div>
                
            </nav>
        </section>
        <div class="conteudo-home">
            @yield('cont-home')
        </div>
        
        
        
    </main>

    <div class="box-modal-post">
        <dialog class="modal-post">
            <div class="cont-modal-post">
                <div class="cont-header-modal">
                <button type="button" onclick="fecharModalPost()"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="cont-img-post">
                        <div class="input-group">
                            <label for="imgArquivo">
                                <img src="{{url('assets/img/img-home/teste.jpeg')}}" alt="Arquivo do Post">
                            </label>
                            <label for="imgArquivo" class="btnImg">Adicionar Arquivo</label>
                            <input type="file" name="imgArquivo" id="imgArquivo">
                        </div>    
                    </section>
                    <section class="section-info">
                        <div class="cont-perfil">
                            <img src="{{url('assets/img/img-home/avatar.jpg')}}" id="user_avatar" alt="Avatar">
                            <small>Julia</small>
                        </div>
                        <div class="cont-desc">
                            <div class="cont-input-group">
                                <label for="descPost">Descrição da Postagem</label>
                                <textarea name="descPost" id="descPost" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="cont-categoria">
                            <div class="input-group">
                                <label for="">Gravidez</label>
                                <input type="checkbox" name="categoriaPost" id="categoriaPost" value="Gravidez">
                            </div>
                            <div class="input-group">
                                <label for="">Primeiros cuidados</label>
                                <input type="checkbox" name="categoriaPost" id="categoriaPost" value="Primeiro cuidados">
                            </div>
                            <div class="input-group">
                                <label for="">Mãe Solos</label>
                                <input type="checkbox" name="categoriaPost" id="categoriaPost" value="Gravidez">
                            </div>
                        </div>
                        <div class="cont-btn-criar-post">
                            <button type="submit">Postar</button>
                        </div>
                    </section>
                </form>
            </div>
        </dialog>
    </div>
    
   @yield('scripts')
    <script src="{{url('assets/js/home/script.js')}}"></script>
    <script src="{{url('assets/js/home/post.js')}}"></script>
</body>
</html>