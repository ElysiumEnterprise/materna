@extends('templates.template-home')

<!-- Links CSS-->

@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-feed.css')}}">
@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->
    
@section('cont-home')
    <div class="cont-feed">


    <!-- api para mudar o feed -->

       <!-- Seção do Select para Escolher o Conteúdo -->
       <div class="cont-select">
       <select id="conteudo-select" onchange="atualizarImagem()">
            <label for="conteudo-select">Escolha um Conteúdo:</label>
                <option>Selecione um conteúdo</option>
                <option value="alimentacao">Alimentação</option>
                <option value="gravidez">Gravidez</option>
                <option value="maes_solo">Mães Solo</option>
                <option value="receitas">Receitas</option>
                <option value="lazer">Lazer</option>
                <!-- Adicione mais opções conforme necessário -->
            </select>
        </div>

        <!-- terminou -->
        
        <div class="cont-post">
        @foreach($postagens as $postagem)
            
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

                            <button type="button" class="like-button" data-postagem-id="{{ $postagem->idPostagem }}">
                                <i class="fa-regular fa-heart" id="heart-icon-{{ $postagem->idPostagem }}"></i>
                            </button>
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
            @endforeach
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
                <a href="#">Trending</a>
                <a href="#">Dicas</a>
            </div>

            <div class="cont-assuntos">
                
                <div class="assuntos">
                <h5 class="txt-assuntos">Assuntos das Comunidades</h5>
                </div>

                <section class='card-assunto'>
                    <div class="teste">
                    <img src="{{ url('assets/img/icons/Alimentação.png') }}" alt="" class="img-assunto">
                    <img src="{{ url('assets/img/icons/Maternidade Solo.png') }}" alt="" class="img-assunto">
                    <img src="{{ url('assets/img/icons/Puerperio.png') }}" alt="" class="img-assunto">

                    <div class="texto-card">
                        <a href="#" class="link-card"><h4 class="txt-card-assunto"></h4></a>
                    </div>
                    </div>
                    
                    
                </section>

                <section class='card-assunto'>
                    <div class="teste">
                   
                    <img src="{{ url('assets/img/icons/Gestação.png') }}" alt="" class="img-assunto">
                    <img src="{{ url('assets/img/icons/Amamentação.png') }}" alt="" class="img-assunto">
                    <img src="{{ url('assets/img/icons/eduacatioon.png') }}" alt="" class="img-assunto">
                   
                    <div class="texto-card">
                        <a href="#" class="link-card"><h4 class="txt-card-assunto"></h4></a>
                    </div>
                    </div>
                    
                </section>

                <section class='card-assunto'>
                <div class="teste">
                
                   
                    <div class="texto-card">
                        <a href="#" class="link-card"><h4 class="txt-card-assunto"></h4></a>
                    </div>
                    </div>
                </section>

                <section class='card-assunto'>
                <div class="teste">
               
                    <div class="texto-card">
                        <a href="#" class="link-card"><h4 class="txt-card-assunto"></h4></a>
                    </div>
                    </div>
                </section>

                <section class='card-assunto'>
                <div class="teste">
                
                  
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

            </div>
        </section>
    </div>
@endsection

<Script>
    $(document).on('click', '.like-button', function() {
    var postId = $(this).data('postagem-id');
    var heartIcon = $('#heart-icon-' + postId);

    $.ajax({
        url: '/curtir',
        type: 'POST',
        data: {
            idPostagem: postId,
            _token: '{{ csrf_token() }}' // Adicione seu token CSRF
        },
        success: function(response) {
            if (response.status === 'curtido') {
                heartIcon.addClass('fas').removeClass('far'); // Altera o ícone para "curtido"
            } else {
                heartIcon.addClass('far').removeClass('fas'); // Altera o ícone para "não curtido"
            }
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
});
</Script>