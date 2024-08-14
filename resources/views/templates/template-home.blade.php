<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/styles-home.css')}}">
    @yield('links-css')
    <title>Home</title>
</head>
<body>
    <section class="nav-lateral">
        <nav id="sidebar">
            <div id="sidebar_content">
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
        
                <ul id="side_items">
                    <li class="side-item active">
                        <a href="#">
                        <i class="fa-solid fa-magnifying-glass" style="color: #ffb6c1;"></i>
                            <span class="item-description">
                                Explorar
                            </span>
                        </a>
                    </li>
        
                    <li class="side-item">
                        <a href="#">
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
                </ul>
        
                <button type="button" id="open_btn">
                    <i id="chevron_right" class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
    
            <div id="logout">
                <button id="logout_btn">
                    <i class="fa-solid fa-gear" style="color: #ffb6c1;"></i>
                    <span class="item-description">
                        Configuraçoes
                    </span>
                </button>
            </div>
        </nav>
    </section>
    <main>
        
        
        <section class="conteudo-home">
            @yield('cont-home')
        </section>
    </main>
    
   
    <script src="{{url('assets/js/home/script.js')}}"></script>
   
</body>
</html>