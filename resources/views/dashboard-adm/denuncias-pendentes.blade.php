@extends('templates.template-adm')

@section('link-css')
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
                                    <form action="{{route('aceitar.denuncia', $denuncia->idDenuncia)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn-check"><i class="fa-solid fa-check"></i></button>
                                    </form>
                                    <form action="{{route('recusar.denuncia', $denuncia->idDenuncia)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-close"><i class="fa-solid fa-xmark"></i></button>
                                    </form>
                                </div>
                            </div>
                            
                        </section>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection