@extends('templates.template-adm')

<!-- Links CSS-->

@section('link-css')

    <link rel="stylesheet" href="{{url('assets/css/info-clientes-adm.css')}}">
@endsection

@section('cont-adm')
    <div class="cont-clientes">
        
        <div class="cont-back">
            <a href="{{route('info.user', $user->idUsuario)}}"><i class="fa-solid fa-arrow-left"></i></a>
        </div>

        <div class="cont-header-user">
            
            <h1>Denúncias Verificadas do Usuário {{$user->nome}}</h1>
        </div>

        <div class="cont-info-user">
            

            <div class="cont-info-denuncias">
                
                @if($user->denuncias->isEmpty() || $user->denuncias->where('denuciaVerificada', 1)->count() == 0)
                <div class="cont-status">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <p>Sem denúncias verificadas</p>
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
                                    
                                </div>
                            </section>
                            
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    
@endsection


