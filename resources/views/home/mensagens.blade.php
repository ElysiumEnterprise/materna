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
                    <div class="left">
                        <div class="teset">
                            <h1> Mensagens</h1>
                            <br>
                            <br>
                            <br>
                            <div class="chat__messages">
                                <div class="message__other2">
                                    <img src="{{url('assets/img/img-home/foto-perfil-teste/perfil-3.jpg')}}" class="img-fluid5" >
                                    <div>
                                        <span class="message__sender2">@carla_fernanda</span>
                                        <h6 class="message__sender3">mensagem recebida</h6>
                                    </div>
                                  
                                    <span class="material-symbols-outlined">
                                        stars
                                        </span>
                                  
                                </div>
                              
                                <div class="message__other2">
                                    <img src="{{url('assets/img/img-home/foto-perfil-teste/perfil-4.jpg')}}" class="img-fluid5" >
                                    <div>
                                        <span class="message__sender2">@maria_benedita</span>
                                        <h6 class="message__sender3">mensagem recebida</h6>
                                    </div>
                                  
                                </div>
    
                                <div class="message__other2">
                                    <img src="{{url('assets/img/img-home/foto-perfil-teste/perfil-05.png')}}" class="img-fluid5" >
                                    <div>
                                        <span class="message__sender2">@gabrielle_lima</span>
                                        <h6 class="message__sender3">mensagem recebida</h6>
                                    </div>
                                  
                                  
                                </div>
                            </div>
    
                        </div>
                        <div class="teste">
                            <div class="vertical-line"></div>
                        </div>
                     
                   
                   
                    </div>
                    
                    <div class="right1">
                        <div class="user"> 
                            <img src="{{url('assets/img/img-home/foto-perfil-teste/perfil-3.jpg')}}" class="img-fluid3" >
                            <div class="right3">
                                <h1 >Carla Fernanda</h1>
                                <h7 class="right2">@carla_fernanda</h7>
                            </div>
                
                        </div>
                   
                    
                        <br>
                        <br>
                        <br>
                        <div class="chat__messages">
                            <img src="{{asset('assets/img/foto-perfil/'.$perfil->fotoPerfil)}}" class="img-fluid3" >
                            
                            <div class="message__self"><span class="message__sender">{{$perfil->nickname}}</span>
                            Oi tudo bem?
                        </div>
                            <img src="{{url('assets/img/img-home/foto-perfil-teste/perfil-3.jpg')}}" class="img-fluid5" >
                            <div class="message__other">
                                <span class="message__sender">@carla_fernanda</span>
                                To bem, como foi a semana?
                            </div>
                        </div>
                    

                        <form class="chat__form">
                            <span class="material-symbols-outlined">
                                sentiment_satisfied
                                </span>
                            <span class="material-symbols-outlined">
                                text_fields
                                </span>
                            <input type="text" class="chat__input" required />
                            <button type="submit" class="chat__button">
                                <span class="material-symbols-outlined">
                                    mic
                                    </span>
                            </button>
                        </form>
                       
                    </div>
                </div>
@endsection