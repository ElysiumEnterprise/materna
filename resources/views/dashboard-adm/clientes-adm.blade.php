@extends('templates.template-adm')

<!-- Links CSS-->

@section('link-css')

    <link rel="stylesheet" href="{{url('assets/css/clientes-adm.css')}}">
@endsection

@section('cont-adm')
    <div class="cont-clientes">
        
        <div class="cont-lista-users">
            <div class="cont-titulo">
                <h3>Usuários Cadastrados no Sistema</h3>
            </div>
            
            <hr>
            <div class="cont-filtro">
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
                        <div class="cont-btn-acoes">
                            <button type="button" onclick="abrirModalAtivar('{{$user->idUsuario}}', `{{route('ativar-user', ['idUsuario' => ':idUsuario'])}}`)"><i class="fa-sharp fa-regular fa-user-unlock"></i></button>
                            <button type="button" onclick="abrirModalSuspender('{{$user->idUsuario}}', `{{route('suspender-user', ['idUsuario' => ':idUsuario'])}}`)">
                            <i class="fa-sharp fa-regular fa-user-lock"></i>
                            </button>
                            <button type="button" onclick="abrirModalDeletar('{{$user->idUsuario}}', `{{route('user.destroy.adm', ['idUsuario' => ':idUsuario'])}}`)"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </section>
                    <hr>
                    @endforeach
                

            @else
                @if(session('message'))
                <div class="cont-status">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <p>{{session('message')}}</p>
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
    <div class="box-modal-suspender" id="box-modal">
        <dialog class="modal-suspender">
            <div class="cont-modal">
                <p>Tem certeza que deseja suspender esse usuário? Se sim, escreva o motivo abaixo:</p>
                <form action="" method="post" class="form-suspender">
                    @csrf
                    <textarea name="motivo" id="motivo" placeholder="Digite o motivo da suspensão aqui..."></textarea>
                    <button type="submit">Suspender</button>
                    <button type="button" onclick="fecharModalSuspender()">Cancelar</button>
                </form>
            </div>
        </dialog>
    </div>
    <div class="box-modal-deletar" id="box-modal">
        <dialog class="modal-deletar-user">
            <p>Tem certeza que deseja deletar esse usuário? Se sim, escreva o motivo abaixo:</p>
            <form action="" method="post" class="form-delete">
                @csrf
                @method('DELETE')
                <textarea name="motivoExclusao" id="motivoExclusao" placeholder="Digite o motivo aqui..."></textarea>
                <button type="submit">Deletar</button>
                <button type="button" onclick="fecharModalDeletar()"></button>
            </form>
        </dialog>
    </div>
    <div class="box-modal-ativar" id="box-modal">
        <dialog class="modal-ativar">
            <p>Tem certeza que deseja ativar esse usuário novamente para a Materna?</p>
            <a href="" class="action-ativar">Ativar</a>
            <button type="button">Cancelar</button>
        </dialog>
    </div>
@endsection

@section('scripts')
    <script src="{{url('assets/js/dashboard/script-filtro-clientes.js')}}"></script>
    <script src="{{url('assets/js/dashboard/script-clientes.js')}}"></script>
@endsection

