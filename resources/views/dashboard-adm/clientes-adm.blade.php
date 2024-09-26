@extends('templates.template-adm')

<!-- Links CSS-->

@section('link-css')

    <link rel="stylesheet" href="{{url('assets/css/clientes-adm.css')}}">
@endsection

@section('cont-adm')
    <div class="cont-clientes">
        <div class="cont-card-num-cadastro">
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
        </div>
        <div class="cont-lista-users">
            <div class="cont-titulo">
                <h3>Usuários Cadastrados no Sistema</h3>
            </div>
            
            <hr>
            <div class="cont-filtro">
                <div class="cont-buttons">
                    <button type="button" id="btn-todos">Todos</button>
                    <button type="button" id="btn-cliente">Mães</button>
                    <button type="button" id="btn-anunciante">Anunciante</button>
                </div>
                
                <div class="cont-buscador">
                    <form action="{{route('buscar.usuario')}}" method="post">
                        @csrf
                        <input type="search" name="buscador" id="buscador" placeholder="Procure aqui...">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass" ></i></button>
                    </form>
                </div>
            </div>
            <div class="lista-user">
            @if($users->isNotEmpty())
                
                    @foreach($users as $user)
                    <section class="card-user">
                        <a href="{{route('info.user', $user->idUsuario)}}">
                            <div class="cont-img">
                                <img src="{{ url('assets/img/foto-perfil/' . $user->perfils->fotoPerfil) }}" class="img-fluid">
                                
                            </div>
                            <div class="cont-info-user">
                                <h1>{{ $user->nome }}</h1>
                                
                            </div>
                        </a>
                    </section>
                    <hr>
                    @endforeach
                

            @else
                @if(session('message'))
                <div class="cont-status">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <p>{{ session('message') }}</p>
                </div>
                @else
                <div class="cont-status">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <p>Usuário não encontrado</p>
                </div>
                @endif
            @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{url('assets/js/dashboard/script-filtro-clientes.js')}}"></script>
@endsection

