@php
    $user = Auth::user();

    $perfil = $user->perfils;
@endphp

@extends('templates.template-home')

<!-- Links CSS-->

@section('links-css')
<link rel="stylesheet" href="{{url('assets/css/style-mensagens.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="{{url('assets/css/style-notificacoes.css')}}">
<link rel="stylesheet" href="{{url('assets/css/style-contatos.css')}}">
@endsection


<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->

@section('cont-home')
    <div class="grid-container">
                    
                    
                    <div class="right1">
                    <h2>Mensagens</h2>
                        <div class="contato">
                             <ul id="side_items">
                                @foreach($perfils as $perfil)
                                    <li class="side-item">
                                    <a href="{{route('mensagens.perfil', $perfil->idPerfil)}}">
                                        <img src="{{ url('assets/img/foto-perfil/'.$perfil->fotoPerfil) }}" alt="" class="img-assunto img-fluid">
                                            <span class="item-description">
                                            {{$perfil->usuarios->nome}}
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                                

                        
                        </div>


             
    </div>
@endsection

@section('scripts')
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    @vite(['resources/js/app.js'])


@endsection