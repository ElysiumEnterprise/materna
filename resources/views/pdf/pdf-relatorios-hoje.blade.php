<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{public_path('assets/css/style-pdf-relatorios.css')}}">
    <title>{{$titulo}}</title>
</head>
<body>
    <header>
        <div class="cont-img">
            <img src="{{public_path('assets/img/logo/Logo-Materna.png')}}" alt="Logo da Materna">
        </div>
        <div class="cont-titulo">
            <h1>{{$titulo}}</h1>
        </div>
        <div class="cont-desc">
            <p>Esse relatório foi gerado na data : {{$data}}</p>
        </div>
    </header>
        
    

    <div class="cont-conteudo">
        <section class='section-relatorio'>
            <h3>Cadastros</h3>
            <div class="cont-card-relatorio">
                <div class="card-relatorio">
                <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        
                        <div class="left">
                            <h3 class="titulo-card">Cadastros Realizados ao Todo</h3>
                            <h1>{{$countCadastros}}</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>
                </div>
                <div class="card-relatorio">
                <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        
                        <div class="left">
                            <h3 class="titulo-card">Cadastros Realizados no Mês:</h3>
                            <h1>{{$countCadastradosMonth}}</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-relatorio">
            <h3>Postagens</h3>
            <div class="cont-card-relatorio">
                <div class="card-relatorio">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        
                        <div class="left">
                            <h3 class="titulo-card">Postagens Realizadas ao Todo</h3>
                            <h1>{{$countPostagens}}</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>
                </div>
                <div class="card-relatorio">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        
                        <div class="left">
                            <h3 class="titulo-card">Postagens Realizadas no Mês</h3>
                            <h1>{{$countPostagensMes}}</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="section-relatorio">
            <h3>Anúncios</h3>
            <div class="cont-card-relatorio">
                <div class="card-relatorio">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        
                        <div class="left">
                            <h3 class="titulo-card">Anúncios Gerados ao Todo</h3>
                            <h1>{{$countPostADD}}</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>
                </div>
                <div class="card-relatorio">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        
                        <div class="left">
                            <h3 class="titulo-card">Anúncios Gerados no Mês</h3>
                            <h1>{{$countPostADDMes}}</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-relatorio">
            <h3>Denúncias</h3>
            <div class="cont-card-relatorio">
                <div class="card-relatorio">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        
                        <div class="left">
                            <h3 class="titulo-card">Denúncias Feitas ao Todo</h3>
                            <h1>{{$countDenuncias}}</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>
                </div>
                <div class="card-relatorio">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        
                        <div class="left">
                            <h3 class="titulo-card">Denúncias Feitas no Mês</h3>
                            <h1>{{$countDenunciasMes}}</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>
                </div>
                <div class="card-relatorio">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        
                        <div class="left">
                            <h3 class="titulo-card">Denúncias Verificadas no Total</h3>
                            <h1>{{$countDenunciasChecadasTotal}}</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>
                </div>
                <div class="card-relatorio">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        
                        <div class="left">
                            <h3 class="titulo-card">Denúncias Verificadas no Mês</h3>
                            <h1>{{$countDenunciasChecadasMes}}</h1>
                        </div>

                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>