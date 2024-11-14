@extends('templates.template-home')

<!-- Links CSS-->

@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-comunidades.css')}}"> 
    <link rel="stylesheet" href="{{url('assets/css/style-feed.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->
    
@section('cont-home')
    <div class="cont-feed">
    <div class="linha-vertical"></div>

        <div class="cont-post">
           <div class="vamosver">

            <div class="teste">
                    <a>
                        <h1 class="comun">Comunidades</h1>
                    </a>   
            </div>

            <div class="icons">

                <div class="icon1">
                    <span class="material-symbols-outlined" >
                        search
                    </span>
                </div>

                <div class="icon2">
                    <span class="material-symbols-outlined">
                    person_add
                    </span>
                </div>

            </div>
            
           </div>
           
           
            <section class="card-post">
          
               
     

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
                    
                        <img src="{{url('assets/img/img-home/avatar.jpg')}}" class="img-fluid foto-perfil" alt="">
                    
                    
                        <small>Juliana</small>
                    
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
                <a href="#">Comunidades do momento</a>    
            </div>

            <div class="cont-assuntos">


                <section class='card-assunto'>
                    <div class="teste-icon">
                        <img src="{{ url('assets/img/icons/Alimentação.png') }}" alt="" class="img-assunto">
                        <img src="{{ url('assets/img/icons/Maternidade Solo.png') }}" alt="" class="img-assunto">
                        <img src="{{ url('assets/img/icons/Puerperio.png') }}" alt="" class="img-assunto">
                        <div class="texto-card">
                            <a href="#" class="link-card"><h4 class="txt-card-assunto"></h4></a>
                        </div>
                    </div>
                </section>

                <section class='card-assunto'>
                    <div class="teste-icon">
                        <img src="{{ url('assets/img/icons/Gestação.png') }}" alt="" class="img-assunto">
                        <img src="{{ url('assets/img/icons/Amamentação.png') }}" alt="" class="img-assunto">
                        <img src="{{ url('assets/img/icons/eduacatioon.png') }}" alt="" class="img-assunto">
                        <div class="texto-card">
                            <a href="#" class="link-card"><h4 class="txt-card-assunto"></h4></a>
                        </div>
                    </div>
                </section>

                <section class='card-assunto'>
                    <div class="teste-icon">
                        
                        <div class="texto-card">
                            <a href="#" class="link-card"><h4 class="txt-card-assunto"></h4></a>
                        </div>
                    </div>
                </section>

                <section class='card-assunto'>
                    <div class="teste-icon">
                      
                        <div class="texto-card">
                            <a href="#" class="link-card"><h4 class="txt-card-assunto"></h4></a>
                        </div>
                    </div>
                </section>

                <section class='card-assunto'>
                    <div class="teste-icon">
                       
                        <div class="texto-card">
                            <a href="#" class="link-card"><h4 class="txt-card-assunto"></h4></a>
                        </div>
                    </div>
                </section>

                <div class="linha"></div>

                <div class="anuncios">
                    <img src="{{url('assets/img/foto-perfil/1b8de8ad259433a134b6159043c17f33.png')}}" alt="Imagem de anúncio" class="img-anuncio">
                    <img src="{{url('assets/img/jj.jpg')}}" alt="Imagem de anúncio" class="img-anuncio">
                </div>

            </div>
        </section>
    </div>
@endsection