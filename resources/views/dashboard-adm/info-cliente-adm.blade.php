@extends('templates.template-adm')

<!-- Links CSS-->

@section('link-css')

    <link rel="stylesheet" href="{{url('assets/css/info-clientes-adm.css')}}">
@endsection

@section('cont-adm')
    <div class="cont-clientes">
        <div class="cont-status-acoes">
                <h1>{{session('message')}}</h1>
            </div>
        <div class="cont-header-user">
            
            <div class="cont-img">
                <img src="{{ url('assets/img/foto-perfil/'. $user->perfils->fotoPerfil) }}" class="img-fluid">
            </div>
            <div class="cont-nome">
                <h2>Nome: {{$user->nome}}</h2>
                <h3>Nickname: {{$user->perfils->nickname}}</h3>
            </div>
            <div class="cont-acoes-user">
               
                <button type="button" onclick="abrirModal()">Excluir</button>
            </div>
        </div>

        <div class="cont-info-user">
            <div class="cont-num-user">
                
                    <h5>Publicações: {{$user->perfils->postagems->count()}}</h5>
                    <h5>Denúncias: {{$user->denuncias->where('denuciaVerificada', 1)->count()}}</h5>
                    <h5>Cadastrado em: {{$user->created_at}}</h5>
               
            </div>

            <div class="cont-tipo-conta">
                <h2>Tipo da Conta:</h2>
                <h3>{{$user->nivel_usuarios->descNivel}}</h3>
            </div>

            <div class="cont-contato">
                <h2>Contatos</h2>
                <div class="cont-desc-contato">
                    <h3>{{$user->email}}</h3>

                    @foreach($user->telefone_users as $telefone)
                        <h3>{{$telefone->numTelefone}}</h3>
                    @endforeach
                </div>
            </div>

            <div class="cont-info-denuncias">
                <h2>Denúncias Pendentes</h2>
                <div class="cont-filtro-denuncias">
                            
                            <a href="{{route('go.list-denuncias-verificadas', $user->idUsuario)}}">Visualizar Denúncias Verificadas</a>
                        </div>
                @if($user->denuncias->isEmpty() || $user->denuncias->where('denuciaVerificada', 1)->count() >0)
                <div class="cont-status">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <p>Sem denúncias pendentes</p>
                </div>
                @else
                    <div class="lista-denuncias">
                        
                        @foreach($user->denuncias as $denuncia)
                           
                            <section class="card-denuncia">
                                <div class="cont-header-denuncia">
                                    <h3>Motivo: {{$denuncia->motivoDenuncia}}</h3>
                                    <small>{{$denuncia->created_at}}</small>
                                </div>
                                <div class="cont-info">
                                    <div class="cont-detalhes">
                                        <p>{{$denuncia->detalheDenuncia}}</p>
                                    </div>
                                    <div class="cont-escolha-denuncia">
                                        <form action="{{route('aceitar.denuncia', $denuncia->idDenuncia)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"><i class="fa-solid fa-check"></i></button>
                                        </form>
                                        <form action="{{route('recusar.denuncia', $denuncia->idDenuncia)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class="fa-solid fa-xmark"></i></button>
                                        </form>
                                       
                                    </div>
                                </div>
                            </section>
                            
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="cont-box-modal">
        <dialog class='modal-excluir'>
            <div class="cont-modal">
                <h1>Tem Certeza?</h1>
                <div class="cont-desc">
                    <p>Esse usuário não poderá mais acessar a rede Materna e perderá seus dados!</p>
                </div>
                <div class="cont-btn-escolha">
                    <form action="{{ route('user.destroy.adm', $user->idUsuario) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir Perfil</button>
                    </form>
                    <button type="button" onclick="fecharModal()">Cancelar</button>
                </div>
            </div>
        </dialog>
    </div>
@endsection
@section('scripts')
    <script src="{{url('assets/js/dashboard/script-modal-exclusao.js')}}"></script>
@endsection

