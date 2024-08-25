@extends('templates.template-home')

<!-- Links CSS-->
@php
    $user= Auth::user();
@endphp
@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-config-gerais.css')}}">
@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->

@section('cont-home')
    <div class="cont-config-gerais">
        <h1>Configurações</h1>
        <div class="cont-item-config">
            <section class="card-config">
                <a href="{{route('perfil.editar', $perfil->idPerfil)}}">
                <img src="{{asset('assets/img/foto-perfil/'.$perfil->fotoPerfil)}}" class="pefil-logo img-fluid" alt="Foto de perfil">
                    <div class="cont-desc-config">
                    <small class="txt-nickname">{{$perfil->nickname}}</small>
                    <h6 class="txt-item">Configurar Conta</h6>
                    </div>
                </a>
            </section>
            <section class="card-config">
                <a href="{{route('user.edit', $user)}}">
                <img src="{{asset('assets/img/foto-perfil/user-icon-default.png')}}" class="pefil-logo img-fluid" alt="Foto de perfil">
                    <div class="cont-desc-config">
                    <h6 class="txt-item">Editar Usuário</h6>
                    </div>
                </a>
            </section>
            
        </div>
        <div class="cont-logout">
            <div class="btn">
                <a href="{{route('logout')}}">Sair</a>
            </div>
            
        </div>
    </div>
@endsection