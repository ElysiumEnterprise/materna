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
                    @foreach ($postagens as $post)
                        <section class="card-post">
                            <div class="post-head">
                                <img src="{{ url('assets/img/img-home/foto-perfil-teste/perfil-3.jpg') }}" class="img-fluid foto-perfil" alt="">
                                <small class="txt-perfil">{{ $post->perfils->nickname}}</small> <!-- Exibindo o nome do usuário da postagem -->
                            </div>
                            <div class="conteudo-post">
                                <div class="cont-arquivo">
                                    <img src="{{ url('assets/img/img-home/teste.jpeg') }}" class="img-fluid img-arquivo" alt=""> <!-- Exibindo a imagem da postagem -->
                                </div>
                                <div class="cont-icons">
                                    <div class="icons-principais">
                                        <button type="button" onclick="curtirPost(this, '{{ $post->idPostagem }}')">
                                            <i class="fa{{ $post->curtidas->contains('idUsuario', auth()->id()) ? '-solid' : '-regular' }} fa-heart"></i>
                                        </button>
                                        <span>{{ $post->curtidas_count }} curtidas</span> <!-- Exibindo o número de curtidas -->
                                    </div>
                                    <div class="icon-salvos">
                                        <button type="button">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="cont-legenda">
                                    <small>{{$post->perfils->nickname }} <span>{{ $post->legenda }}</span></small>
                                </div>
                                <div class="cont-num-comentarios">
                                    <small>Ver todos os {{ $post->comentarios_count }} comentários</small>
                                </div>
                            </div>
                        </section>
                    @endforeach


            <section class="card-post">
                <div class="post-head">
                    <img src="{{ url('assets/img/img-home/avatar.jpg') }}" class="img-fluid foto-perfil" alt="">
                    <small class="txt-perfil">Juliana</small>
                </div>
                <div class="conteudo-post">
                    <div class="cont-arquivo">
                        <img src="{{ url('assets/img/img-home/teste-2.png') }}" class="img-fluid img-arquivo" alt="">
                    </div>
                    <div class="cont-icons">
                        <div class="icons-principais">
                            <button type="button" onclick="curtirPost(this,1)">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                            <button type="button"><i class="fa-regular fa-comment"></i></button>
                          
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



<script>
function curtirPost(button, postId) {
    const icon = button.querySelector('i');

    if (icon.classList.contains('fa-regular')) {
        icon.classList.remove('fa-regular');
        icon.classList.add('fa-solid');

        fetch('/salvar-curtida', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ postId: postId })
        }).then(response => {
            if (response.ok) {
                response.json().then(data => {
                    button.nextElementSibling.textContent = `${data.totalCurtidas} curtidas`;
                });
            }
        }).catch(error => {
            console.error('Erro ao salvar a curtida:', error);
        });
    } else {
        icon.classList.remove('fa-solid');
        icon.classList.add('fa-regular');

        fetch('/remover-curtida', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ postId: postId })
        }).then(response => {
            if (response.ok) {
                response.json().then(data => {
                    button.nextElementSibling.textContent = `${data.totalCurtidas} curtidas`;
                });
            }
        }).catch(error => {
            console.error('Erro ao remover a curtida:', error);
        });
    }
}

</script>

@endsection