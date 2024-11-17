@extends('templates.template-adm')

@section('link-css')
    <link rel="stylesheet" href="{{url('assets/css/clientes-adm.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/denuncias-adm.css')}}">
@endsection

@section('cont-adm')
    <div class="cont-denuncias">
        <div class="cont-change-page">
            <a href="{{route('list-denuncias-pendentes')}}">Denúncias Pendentes</a>
            <a href="{{route('list-denuncias-verificadas')}}">Denúncias Verificadas</a>
        </div>

        <div class="cont-info-denuncias">
            @if($denunciasPendentes->isEmpty())
                <div class="cont-status">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <p>Sem denúncias pendentes</p>
                </div>
            @else
                <div class="cont-lista-denuncias">
                    @foreach($denunciasPendentes as $denuncia)
                        <section class="card-denuncia">
                            <div class="cont-header-denuncia">
                                <h3>{{$denuncia->usuarios->nome}}</h3>
                                <small>{{$denuncia->created_at}}</small>
                            </div>
                            <div class="cont-motivo">
                                <h4>{{$denuncia->motivoDenuncia}}</h4>
                            </div>
                            <div class="cont-info">
                                <p>{{$denuncia->detalheDenuncia}}</p>
                                <div class="cont-btn-escolhas">
                                    <button type="button" class="btn-check" onclick="abrirModalAceitarDenuncia('{{$denuncia->idDenuncia}}', `{{route('aceitar.denuncia', ['idDenuncia' => ':idDenuncia'])}}`)"><i class="fa-solid fa-check"></i></button>
                                    <button type="button" onclick="abrirModalRecusarDenuncia('{{$denuncia->idDenuncia}}', `{{route('recusar.denuncia', ['idDenuncia' => ':idDenuncia'])}}`)" class="btn-close"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>
                            
                        </section>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <div class="box-modal-aceitar-denuncia" id="box-modal">
        <dialog class="modal-aceitar-denuncia">
            <div class="cont-modal">
                <p>Escreva o motivo da escolha do resultado da denúncia:</p>
                <form action="" method="post" class="form-aceitar">
                    @csrf
                    @method('PUT')
                    <textarea name="txtEsclarecimento" id="txtEsclarecimento" placeholder="Digite o esclarecimento aqui..."></textarea>
                    <div class="cont-btn">
                        <button type="submit">Confirmar</button>
                        <button type="button" onclick="fecharModalAceitarDenuncia()">Cancelar</button>
                    </div>
                    
                </form>
            </div>
        </dialog>
    </div>
    <div class="box-modal-recusar-denuncia" id="box-modal">
        <dialog class="modal-recusar-denuncia">
            <div class="cont-modal">
                <p>Escreva o motivo da escolha do resultado da denúncia:</p>
                <form action="" method="post" class="form-recusar">
                    @csrf
                    @method('DELETE')
                    <textarea name="txtEsclarecimento" id="txtEsclarecimento" placeholder="Digite o esclarecimento aqui..."></textarea>
                    <div class="cont-btn">
                        <button type="submit">Confirmar</button>
                        <button type="button" onclick="fecharModalRecusarDenuncia()">Cancelar</button>
                    </div>
                    
                </form>
            </div>
        </dialog>
    </div>
@endsection

@section('scripts')
    <script src="{{url('assets/js/dashboard/script-denuncias.js')}}"></script>
@endsection