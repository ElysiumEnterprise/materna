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
<link rel="stylesheet" href="{{url('assets/css/style-contato.css')}}">
@endsection


<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->

@section('cont-home')
    <div class="grid-container">
                    
                    
                    <div class="right1">
                        <div class="contato">
                             <ul id="side_items">
                                <li class="side-item">
                                  <a href="{{route('mensagens.perfil', 28)}}">
                                    <img src="{{ url('assets/img/jj.jpg') }}" alt="" class="img-assunto">
                                        <span class="item-description">
                                        Johnson & Johnson
                                        </span>
                                    </a>
                                </li>
                    
                                <li class="side-item">
                                   <a>
                                    <img src="{{ url('assets/img/foto6.jpg') }}" alt="" class="img-assunto"> 
                                        <span class="item-description">
                                            Mensagens
                                        </span>
                                    </a>
                                </li>
                    
                                <li class="side-item">
                                    <a>
                                    <img src="{{ url('assets/img/foto7.jpg') }}" alt="" class="img-assunto">
                                        <span class="item-description">
                                            Comunidades
                                        </span>
                                    </a>
                                </li>
                    
                                <li class="side-item">
                                    <a>
                                    <img src="{{ url('assets/img/foto2.jpg') }}" alt="" class="img-assunto">
                                        <span class="item-description">
                                            Notificações
                                        </span>
                                    </a>
                                </li>

                        
                        </div>


             
    </div>
@endsection

@section('scripts')
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    @vite(['resources/js/app.js'])


@endsection