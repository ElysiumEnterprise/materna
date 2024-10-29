@extends('templates.template-home')

<!-- Links CSS-->

@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-list-mensagens')}}">
@endsection

@section('cont-home')

    <div class="cont-mensagens">
        <div class="cont-titulo">
            <h1>Mensagens</h1>
        </div>
        <div class="cont-list-perfils">
        @foreach($perfilsSeguindo as $perfil)
                @if($perfil->seguindo->isNotEmpty())
                    @foreach($perfil->seguindo as $perfilSeguindo)
                        <section class="card-seguidores">
                            <a href="{{route('perfil', $perfilSeguindo->usuarios->idUsuario)}}">
                                <img src="{{asset('assets/img/foto-perfil/'.$perfilSeguindo->fotoPerfil)}}" class="perfil-logo img-fluid" alt="Foto de Perfil">
                                <div class="cont-desc-perfil">
                                    <small class="txt-nickname">{{$perfilSeguindo->usuarios->nome}}</small>
                                </div>
                            </a>
                        </section>
                    @endforeach
                @else
                    <div class="cont-status">
                        <i class="fa-solid fa-person-circle-exclamation"></i>
                        
                            <p>Por favor, digite o usuário que deseja enviar mensagens!</p>
                    
                    </div>
                @endif

                @endforeach
                @foreach($perfilsSeguidores as $perfil)
                    @if($perfil->seguidores->isNotEmpty())
                        @foreach($perfil->seguidores as $perfilSeguidor)
                            <section class="card-seguidores">
                                <a href="{{route('perfil', $perfilSeguidor->usuarios->idUsuario)}}">
                                    <img src="{{asset('assets/img/foto-perfil/'.$perfilSeguidor->fotoPerfil)}}" class="perfil-logo img-fluid" alt="Foto de Perfil">
                                    <div class="cont-desc-perfil">
                                        <small class="txt-nickname">{{$perfilSeguidor->usuarios->nome}}</small>
                                    </div>
                                    
                                </a>
                                
                            </section>
                        @endforeach
                    
                    @endif
                @endforeach
        </div>
    </div>

@endsection
