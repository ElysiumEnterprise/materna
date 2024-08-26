@extends('templates.template-home')

<!-- Links CSS-->

@php
    $user = Auth::user();

    $perfil = $user->perfils;
@endphp
@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-perfil.css')}}">
@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->
    
@section('cont-home')
    <div class="cont-feed">
        <div class="cont-post">
            <section class="card-post">
                <div class="post-head">
                    
                        <img src="{{asset('assets/img/foto-perfil/'.$perfil->fotoPerfil)}}" class="img-fluid foto-perfil" alt="">
                    
                        <small>{{$user->nome}}</small>
                        <small>Pampers</small>
                    
                </div>
                <div class="conteudo-post">
                    <div class="cont-arquivo">
                        <img src="{{url('assets/img/img-home/pampers 9.jpg')}}" class="img-fluid img-arquivo" alt="">
                    </div>
                    <div class="cont-icons">
                        <div class="icons-principais">

                            <button type="button"><i class="fa-regular fa-heart"></i></button>
                            <button type="button"><i class="fa-regular fa-comment"></i></button>
                            <button type="button"><i class="fa-regular fa-paper-plane"></i></button>
                            
                        </div>
                        <div class="icon-salvos">
                            <button type="button">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            
                        </div>
                    </div>
                    <div class="cont-legenda">
                        <small>Juliana <span>Legenda aqui</span></small>
                    </div>
                    <div class="cont-num-comentarios">
                        <small>Ver todos os 10 comentários</small>
                    </div>
                </div>
            </section>
            <section class="card-post">
                <div class="post-head">
                    
                        <img src="{{url('assets/img/img-home/anun.jpg')}}" class="img-fluid foto-perfil" alt="">
                    
                    
                        <small>Fernado</small>
                    
                </div>
                <div class="conteudo-post">
                    <div class="cont-arquivo">
                        <img src="{{url('assets/img/img-home/teste.jpeg')}}" class="img-fluid img-arquivo" alt="">
                    </div>
                    <div class="cont-icons">
                        <div class="icons-principais">

                            <button type="button"><i class="fa-regular fa-heart"></i></button>
                            <button type="button"><i class="fa-regular fa-comment"></i></button>
                            <button type="button"><i class="fa-regular fa-paper-plane"></i></button>
                            
                        </div>
                        <div class="icon-salvos">
                            <button type="button">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            
                        </div>
                    </div>
                    <div class="cont-legenda">
                        <small>Juliana <span>Legenda aqui</span></small>
                    </div>
                    <div class="cont-num-comentarios">
                        <small>Ver todos os 10 comentários</small>
                    </div>
                </div>
            </section>
        </div>

        <section class="cont-tipo-feed">
            <div class="cont-link-feed">
                <a href="">Para Você</a>
                <a href="">Tranding</a>
            </div>
            <div class="cont-assuntos">
                <h5>Assuntos da Comunidades</h5>
                <section class='card-assunto'>
                    <h4>Mãe Solo</h4>
                    <i class="fa-solid fa-ellipsis"></i>
                </section>
                <section class='card-assunto'>
                    <h4>Gravidez</h4>
                    <i class="fa-solid fa-ellipsis"></i>
                </section>
                <section class='card-assunto'>
                    <h4>Receitas</h4>
                    <i class="fa-solid fa-ellipsis"></i>
                </section>
                <section class='card-assunto'>
                    <h4>Adolescência</h4>
                    <i class="fa-solid fa-ellipsis"></i>
                </section>
            </div>
        </section>
    </div>
@endsection