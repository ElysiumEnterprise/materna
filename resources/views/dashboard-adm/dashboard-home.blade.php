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

    <link rel="stylesheet" href="{{url('assets/css/style-dashboard.css')}}">
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
                <a href="#">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#">
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
            <h1>Dashboard</h1>

            <div class="date">
                <input type="date">
            </div>

            <div class="insights">

                <div class="sales">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        
                        <div class="left">
                            <h3 class="titulo-card">Cadastros</h3>
                            <h1>89</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>

                    <small class="text-muted">Últimas 24 Horas</small>
                </div>

                <div class="expenses">
                    <span class="material-icons-sharp">bar_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3 class="titulo-card">Postagens</h3>
                            <h1>267</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>


                        </div>
                    </div>

                    <small class="text-muted">Últimas 24 horas</small>
                </div>

                <div class="income">
                    <span class="material-icons-sharp">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3 class="titulo-card">Anúncios</h3>
                            <h1>13</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>

                    <small class="text-muted">Últimas 24 horas</small>
                </div>
            </div>

            <div class="recent-orders">
                <h2>Pedidos Recentes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nome do produto</th>
                            <th>Número do produto</th>
                            <th>Pagamento</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Anúncio</td>
                            <td>854697</td>
                            <td>Pix</td>
                            <td class="warning">Esperando</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>Publi</td>
                            <td>1658547</td>
                            <td>Dinheiro</td>
                            <td class="success">Concluída</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>Colaboração</td>
                            <td>8934567</td>
                            <td>Pix</td>
                            <td class="success">Concluída</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>Publi</td>
                            <td>2386971</td>
                            <td>Pix</td>
                            <td class="warning">Esperando</td>
                            <td class="primary">Detalhes</td>
                        </tr>
                    </tbody>
                </table>

                

                <a href="#">Mostrar tudo</a>
            </div>
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
                    </div>
                </div>
            </div>

            <div class="recent-updates">
                <h2>Atualizações recentes</h2>
                <div class="updates">

                    <div class="update">
                        <div class="profile-photo">
                            <img src="{{url('assets/img/Dashboard/albert-dera-ILip77SbmOE-unsplash.jpg')}}">
                        </div>

                        <div class="message">
                            <p><b>João</b>recebeu seu pedido</p>
                            <small class="text-muted">10 minutos atrás</small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src="{{url('assets/img/Dashboard/erik-lucatero-d2MSDujJl2g-unsplash.jpg')}}">
                        </div>

                        <div class="message">
                            <p><b>Marcos</b>recebeu seu pedido</p>
                            <small class="text-muted">19 minutos atrás</small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src="{{url('assets/img/Dashboard/prince-akachi-J1OScm_uHUQ-unsplash.jpg')}}">
                        </div>

                        <div class="message">
                            <p><b>Sônia</b>recebeu seu pedido</p>
                            <small class="text-muted">35 minutos atrás</small>
                        </div>
                    </div>

                </div>
            </div>

            

                

            </div>
        </div>


        
    </div>

    <script src="{{url('assets/js/dashboard/script-dashboard.js')}}"></script>
</body>
</html>