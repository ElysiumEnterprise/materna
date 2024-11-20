@extends('templates.template-home')

<!-- Links CSS-->

@section('links-css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{url('assets/css/style-feed.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style-modal-analise.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style-perfil.css')}}">
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
                       
                        <section class="card-post" data-post-id="{{$post->idPostagem}}">
                            <div class="post-head">
                                <img src="{{ url('assets/img//foto-perfil/'.$post->perfils->fotoPerfil) }}" class="img-fluid foto-perfil" alt="">
                                <small class="txt-perfil">{{ $post->perfils->nickname}}</small> <!-- Exibindo o nome do usuário da postagem -->
                            </div>
                            <div class="conteudo-post">
                                <div class="cont-arquivo">
                                    <img src="{{ url('assets/img/file-posts/'.$post->fotoPost) }}" class="img-fluid img-arquivo" alt=""> <!-- Exibindo a imagem da postagem -->
                                </div>
                                 <!-- Informações do Post -->
                               
                                <div class="cont-icons">
                                    <div class="icons-principais">
                                        <button type="button" onclick="curtirPost(this, '{{ $post->idPostagem }}')">
                                            <i class="fa{{ $post->curtidas->contains('idUsuario', auth()->id()) ? '-solid' : '-regular' }} fa-heart"></i>
                                        </button>
                                        <span>{{ $post->curtidas_count }}</span> <!-- Exibindo o número de curtidas -->
                                        
                                                <!-- Botão Comentários -->
                                        <button type="button" onclick="abrirModalComentarios('{{ $post->idPostagem }}', `{{ route('store.comentario', ['idPostagem' => ':idPostagem']) }}`, '{{ $post->fotoPost }}')">
                                            <i class="fa-regular fa-comment"></i>
                                        </button>
                                </div>
                            </div>
                        </section>
                    @endforeach
                    

                  

            <section class="card-post">
               
            </section>
        </div>


        <section class="cont-tipo-feed">

            <div class="cont-link-feed">
               
                <a href="#">Dicas</a>
            </div>

            <div class="cont-assuntos">
                
                <div class="assuntos">
                <h5 class="txt-assuntos"></h5>
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

  <!-- Modal de Comentários -->
  <div class="box-modal-comentarios box-modal">
        <dialog class="modal-comentarios-post">
            <div class="cont-modal-comentarios">
                <div class="cont-header-modal">
                    <button type="button" onclick="fecharModalComentarios()">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <h4 id="nomePerfilModal"></h4> <!-- Local para o nome do perfil -->
                </div>
                <div class="cont-info-comentarios">
                    <div class="cont-img">
                        <img src="" class="img-fluid img-post-comentario" alt="" id="img-modal-post" style="height: 560px; width: auto; object-fit: cover; border-radius: 8px; display: block; margin: 0 auto; margin-bottom:20%;">
                        
                    </div>
                       <!-- Container das informações da postagem -->
                    <div class="cont-card-comentarios">
                      
                        <div class="chat-scroll">
                            <!-- Comentários serão carregados aqui -->
                        </div>
                    </div>
                </div>
                <div class="cont-form">
                    <form action="" method="post" class="form-comentar" style="display: flex; align-items: center; gap: 10px; padding-left:20px;">
                        @csrf
                        <input type="text" name="inputComentarioModal" required id="inputComentarioModal" placeholder="Digite seu comentário..."  style="flex: 1; border-radius: 15px; border: 1px solid black; padding: 8px; outline: none; font-size: 16px; width: 70%; bac">
                        
                        <button type="submit" style= " border: none; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; cursor: pointer; align-self: center;" ><span class="material-symbols-outlined">send</span></button>
                    </form>
                </div>
            </div>
        </dialog>
    </div>
</div>

<script>
function curtirPost(button, postId) {
    console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'))
    const icon = button.querySelector('i');

    if (icon.classList.contains('fa-regular')) {
        icon.classList.remove('fa-regular');
        icon.classList.add('fa-solid');

        fetch(`/salvar-curtida/${postId}`, {
            method: 'POST',
            headers: {
                
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            
        }).then(response => {
            if (response.ok) {
                response.json().then(data => {
                    button.nextElementSibling.textContent = `${data.totalCurtidas}`;
                });
            }else{
                return response.json();
            }
        }).catch(error => {
            console.error('Erro ao salvar a curtida:', error);
        });
    } else {
        icon.classList.remove('fa-solid');
        icon.classList.add('fa-regular');

        fetch(`/remover-curtida/${postId}`, {
            method: 'DELETE',
            headers: {
                
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        }).then(response => {
            if (response.ok) {
                response.json().then(data => {
                    button.nextElementSibling.textContent = `${data.totalCurtidas}`;
                });
            }
        }).catch(error => {
            console.error('Erro ao remover a curtida:', error);
        });
    }
}
</script>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{url('assets/js/home/visualizacoes.js')}}"></script>
    <script src="{{url('assets/js/home/script-comentarios.js')}}"></script>
@endsection