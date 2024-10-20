@extends('templates.template-home')
    
@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-seguidores.css')}}">
@endsection

@section('cont-home')
    <div class="cont-seguidores">
    
        <h1>Seguindo</h1>
        <div class="cont-card-perfils">
           
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
                        
                            <p>Esse usuário não está seguindo ninguém!</p>
                    
                    </div>
                @endif

                @endforeach
                
          
        </div>
    </div>
@endsection