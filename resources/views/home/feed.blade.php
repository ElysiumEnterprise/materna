@extends('templates.template-home')

<!-- Links CSS-->
<link rel="stylesheet" href="{{url('assets/css/style-feed.css')}}">
@section('link-css')

@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->
    <div class="cont-feed">
        <section class="cont-post">
            <div class="post-head">
                
                    <img src="{{url('assets/img/img-home/avatar.jpg')}}" class="img-fluid foto-perfil" alt="">
                
                
                    <small>Juliana</small>
                
            </div>
            <div class="conteudo-post">
                <div class="cont-arquivo">
                    <img src="{{url('assets/img/img-home/teste.jpeg')}}" class="img-fluid img-arquivo" alt="">
                </div>
                <div class="cont-icons">
                    <div class="icons-principais">
                        <i class="fa-regular fa-heart"></i>
                        <i class="fa-regular fa-comment"></i>
                        <i class="fa-regular fa-paper-plane"></i>
                    </div>
                    <div class="icon-salvos">
                        <i class="fa-regular fa-bookmark"></i>
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
@section('cont-home')

@endsection