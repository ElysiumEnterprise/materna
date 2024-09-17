@extends('templates.template-home')

<!-- Links CSS-->

@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-feed.css')}}">
@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->
    
@section('cont-home')
    <div class="cont-feed">
        
        <div class="cont-post">
            
            <section class="card-post">
                <div class="post-head">
                    
                        <img src="{{url('assets/img/img-home/foto-perfil-teste/perfil-3.jpg')}}" class="img-fluid foto-perfil" alt="">
                    
                    
                        <small class="txt-perfil">Daniela</small>
                    
                </div>
                <div class="conteudo-post">
                    <div class="cont-arquivo">
                        <img src="{{url('assets/img/img-home/teste.jpeg')}}" class="img-fluid img-arquivo" alt="">
                    </div>
                    <div class="cont-icons">
                        <div class="icons-principais">

                            <button type="button"><i class="fa-regular fa-heart"></i></button>
                            <button type="button"><i class="fa-regular fa-message"></i></button>
                            <button type="button"><i class="fa-regular fa-paper-plane"></i></button>
                            
                        </div>
                        <div class="icon-salvos">
                            <button type="button">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            
                        </div>
                    </div>
                    <div class="cont-legenda">
                        <small>Daniela <span>Mais um final de semana cuidando de meus filhos</span></small>
                    </div>
                    <div class="cont-num-comentarios">
                        <small>Ver todos os 10 comentários</small>
                    </div>
                </div>
            </section>
            <section class="card-post">
                <div class="post-head">
                    
                        <img src="{{url('assets/img/img-home/avatar.jpg')}}" class="img-fluid foto-perfil" alt="">
                    
                    
                        <small class="txt-perfil">Juliana</small>
                    
                </div>
                <div class="conteudo-post">
                    <div class="cont-arquivo">
                        <img src="{{url('assets/img/img-home/teste-2.png')}}" class="img-fluid img-arquivo" alt="">
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
                <a href="#">Para Você</a>
                <a href="#">Tranding</a>
            </div>

            <div class="cont-assuntos">
                <h5>Assuntos da Comunidades</h5>

                <section class='card-assunto'>
                    <div class="teste">
                    <i class="fa-solid fa-circle-info icon"></i>
                    <div class="texto-card">
                        <a href="#" class="link-card"><h4 class="txt-card-assunto">Adolescência</h4></a>
                    </div>
                    </div>
                    
                    
                </section>

                <section class='card-assunto'>
                    <div class="teste">
                    <i class="fa-solid fa-circle-info icon"></i>
                    <div class="texto-card">
                        <a href="#" class="link-card"><h4 class="txt-card-assunto">Gravidez</h4></a>
                    </div>
                    </div>
                    
                </section>

                <section class='card-assunto'>
                <div class="teste">
                    <i class="fa-solid fa-circle-info icon"></i>
                    <div class="texto-card">
                        <a href="#" class="link-card"><h4 class="txt-card-assunto">Mães Solo</h4></a>
                    </div>
                    </div>
                </section>

                <section class='card-assunto'>
                <div class="teste">
                    <i class="fa-solid fa-circle-info icon"></i>
                    <div class="texto-card">
                        <a href="#" class="link-card"><h4 class="txt-card-assunto">Receitas</h4></a>
                    </div>
                    </div>
                </section>

            </div>
        </section>
    </div>
@endsection