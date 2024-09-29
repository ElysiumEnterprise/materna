@php

    $user = Auth::user();

@endphp
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="{{url('assets/css/style-dashboard.css')}}">
    @yield('link-css')
</head>
<body>
    
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="{{url('assets/img/Dashboard/logo.png')}}">
                    <h2>Materna</h2>
                </div>

                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="{{route('go.dashboard')}}">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="{{route('usuarios.adm')}}">
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Clientes</h3>
                </a>


                <a href="#">
                    <span class="material-icons-sharp">insights</span>
                    <h3>Análise</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Mensagens</h3>
                    <span class="message-count">15</span>
                </a>


                <a href="#">
                    <span class="material-icons-sharp">report_gmailerrorred</span>
                    <h3>Relatórios</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Configurações</h3>
                </a>

                <a href="{{route('logout')}}">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>

            </div>
        </aside>

       
        <main>
            @yield('cont-adm')
        </main>

        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>

                <div class="theme-toggler">
                    <span class="material-icons-sharp">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>


                <div class="profile">
                    <div class="info">
                        <p><b>{{$user->nome}}</b></p>
                        <small class="text-muted">Adm</small>
                    </div>

                    <div class="profile-photo">
                        <img src="{{url('assets/img/foto-perfil/user-icon-default.png')}}">
                    </div>+
                </div>
            </div>

            <div class="recent-updates">
                <h2>Atualizações recentes</h2>

                <div class="updates">
                @foreach($ultimosUsuarios as $usuario)
                @php
                    
                    if($usuario->created_at->diffInMinutes(now()) => 60){
                        if($usuario->created_at->diffInHours(now()) =>24){



                        }else{
                            $tempoPassado = $usuario->created_at->diffInHours(now()). '';
                        }

                    }else{
                        $tempoPassado = $usuario->created_at->diffInMinutes(now());
                    }
                @endphp
                    <div class="update">
                        <a href="{{route('')}}"></a>
                        <div class="profile-photo">
                            <img src="{{url('assets/img/foto-perfil/'.$usuario->perfils->fotoPerfil)}}">
                        </div>

                        <div class="message">
                            <p><b>{{$usuario->nome}}</b>se cadastrou a Materna!</p>
                            <small class="text-muted">{{$minutosPassados}}</small>
                        </div>
                    </div>
                @endforeach
                    
                </div>
            </div>

            

                

            </div>
        </div>


        
    </div>

    <script src="{{url('assets/js/dashboard/script-dashboard.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>