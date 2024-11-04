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

@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->

@section('cont-home')
    <div class="grid-container">
                    
                    
                    <div class="right1">
                        <div class="user"> 
                            <img src="{{asset('assets/img/foto-perfil/'.$perfilMensagem->fotoPerfil)}}" class="img-fluid3" >
                            
                            <div class="right3">
                                <h1 class="txt-titulo">{{$perfilMensagem->usuarios->nome}}</h1>
                                <h7 class="right2">{{$perfilMensagem->nickname}}</h7>
                            </div>
                
                        </div>
                   
                    
                        <br>
                       

                        <div class="chat__messages_card">
                            @foreach($mensagens as $mensagem)
                            
                                @foreach ($mensagem->emissores as $emissor)
                                @php
                                    // Verifica se o emissor é o usuário autenticado
                                    $classePosicao = ($emissor->idPerfil === auth()->user()->perfils->idPerfil) ? 'message__self' : 'message__other';
                                @endphp
                                <div class="card-mensagem {{$classePosicao}}">
                                    <div class="cont-header">
                                        <p>{{ $emissor->nickname }}</p>
                                    </div>
                                    <div class="cont-desc">
                                        <strong>{{$mensagem->conteudoMensagem}}</strong>
                                        <img src="{{asset('assets/img/foto-perfil/'.$emissor->fotoPerfil)}}" class="img-fluid3" >
                                    </div>
                                        
                                </div>

                                
                                
                                @endforeach
                                    
                               
                            @endforeach
                            
                            <!--<img src="{{asset('assets/img/foto-perfil/'.$perfil->fotoPerfil)}}" class="img-fluid3" >
                            
                            <div class="message__self"><span class="message__sender">{{$perfil->nickname}}</span>
                            Oi tudo bem?
                            </div>

                            <img src="{{asset('assets/img/foto-perfil/'.$perfilMensagem->fotoPerfil)}}" class="img-fluid5" >
                            <div class="message__other">
                                <span class="message__sender">{{$perfilMensagem->usuarios->nome}}</span>
                                To bem, como foi a semana?
                            </div>
                        -->
                        </div>
                    

                        <div class="cont-form">
                        <form class="chat__form" method="post" action='{{route("enviar.mensagem")}}'>
                            @csrf
                            <input type="hidden" name="idPerfilReceptor" id="idPerfilReceptor" value="{{ $perfilMensagem->idPerfil }}">
                            <div class="icons-chat">

                            <span class="material-symbols-outlined icon">
                                text_fields
                                </span>

                                </div>

                            <input type="text" name='txtMessage' id="txtMessage" class="chat__input" required />
                            <button type="submit" class="chat__button">
                                <span class="material-symbols-outlined">send</span>
                            </button>
                        </form>
                    </div>
                       
                </div>
                    
        <div id="chatContainer" hidden data-idUsuario="{{$user->idUsuario}}"></div>
        <div id="contIdPerfil" hidden data-idPerfil="{{$perfilMensagem->idPerfil}}"></div>
        <div id="contIdPerfilAuth" hidden data-idPerfilAuth="{{$perfil->idPerfil}}"></div>
        <div id="contUltimoIdMensagem" hidden data-ultimoIdMensagem="{{ $mensagens->last()->idMensagem ?? 0 }}"></div>
                        
    </div>
@endsection

@section('scripts')
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    @vite(['resources/js/app.js'])


@endsection