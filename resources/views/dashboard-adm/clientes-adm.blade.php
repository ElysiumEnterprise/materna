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
            <div class="cont-filtro">
                <button type="button" id="btn-todos">Todos</button>
                <button type="button" id="btn-cliente">Mães</button>
                <button type="button" id="btn-anunciante">Anunciante</button>
                <div class="cont-buscador">
                    <form action="{{route('buscar.usuario')}}" method="post">
                        @csrf
                        <input type="search" name="buscador" id="buscador">
                        <button type="submit">Buscar</button>
                    </form>
                </div>
            </div>
           
            @if($users->isNotEmpty())
                <div class="lista-user">
                    @foreach($users as $user)
                    <a href="{{$user->idUsuario}}">
                        <div class="card-user">
                            <img src="{{ url('assets/img/foto-perfil/' . $user->perfils->fotoPerfil) }}" class="img-fluid">
                            <h1>{{ $user->nome }}</h1>
                            <h1>{{ $user->perfils->nickname }}</h1>
                        </div>
                    </a>
            @endforeach
                </div>
            @else
                @if(session('message'))
                    <p>{{ session('message') }}</p>
                @else
                    <p>Nenhum usuário encontrado.</p>
                @endif
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{url('assets/js/dashboard/script-filtro-clientes.js')}}"></script>
@endsection

