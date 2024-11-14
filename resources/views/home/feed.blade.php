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
                                <img src="{{ url('assets/img//foto-perfil/'.$post->perfils->fotoPerfil) }}" class="img-fluid foto-perfil" alt="">
                                <small class="txt-perfil">{{ $post->perfils->nickname}}</small> <!-- Exibindo o nome do usuário da postagem -->
                            </div>
                            <div class="conteudo-post">
                                <div class="cont-arquivo">
                                    <img src="{{ url('assets/img/file-posts/'.$post->fotoPost) }}" class="img-fluid img-arquivo" alt=""> <!-- Exibindo a imagem da postagem -->
                                </div>
                                <div class="cont-icons">
                                    <div class="icons-principais">
                                        <button type="button" onclick="curtirPost(this, '{{ $post->idPostagem }}')">
                                            <i class="fa{{ $post->curtidas->contains('idUsuario', auth()->id()) ? '-solid' : '-regular' }} fa-heart"></i>
                                        </button>
                                        <span>{{ $post->curtidas_count }}</span> <!-- Exibindo o número de curtidas -->
                                               

                                               <!-- Comentários da Postagem -->
                                    <div class="comentarios-postagem" id="comentarios{{ $post->idPostagem }}">
                                        @foreach ($post->comentarios->take(100) as $comentario)

                                            <div class="comentario">
                                                <strong>{{ $comentario->perfils->nickname }}:</strong>
                                                <span>{{ $comentario->conteudo }}</span>
                                            </div>
                                        @endforeach

                                        @if($post->comentarios_count > 100)
                                            <button class="btn-ver-mais" onclick="verMaisComentarios('{{ $post->idPostagem }}')">Ver mais comentários</button>
                                        @endif
                                    </div>

                                    <!-- Botão para abrir o Modal de Comentários -->
                                    <button class="coment" type="button" onclick="abrirModalComentario('{{ $post->idPostagem }}')">
                                        <i class="fa-regular fa-comment" style="right:12%"></i>
                                    </button>
                                </div>
                            </div>
                        </section>
                    @endforeach

                   <!-- Modal de Comentário -->
                    <div id="modalComentario" class="modal" style="display: none;">
                        <div class="modal-content">
                            <span class="close" onclick="fecharModalComentario()">&times;</span>
                            <h2>Comentar na Postagem</h2>
                            <input type="text" id="inputComentarioModal" placeholder="Escreva seu comentário...">
                            <button onclick="enviarComentarioModal()">Comentar</button>
                        </div>
                    </div>

            <section class="card-post">
               
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


let postagemAtual = null;

// Função para abrir o modal de comentários
function abrirModalComentario(idPostagem) {
    postagemAtual = idPostagem; // Define qual postagem está sendo comentada
    document.getElementById("modalComentario").style.display = "block"; // Exibe o modal
}

// Função para fechar o modal de comentários
function fecharModalComentario() {
    document.getElementById("modalComentario").style.display = "none"; // Oculta o modal
    document.getElementById("inputComentarioModal").value = ''; // Limpa o campo de comentário
}

// Função para enviar o comentário
function enviarComentarioModal() {
    const conteudo = document.getElementById("inputComentarioModal").value;

    if (!conteudo) {
        alert("Você precisa preencher o campo!");
        return;
    }

    fetch(`/comentarios/${postagemAtual}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ txtComentario: conteudo })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'Comentário enviado') {
            // Adiciona o novo comentário à postagem
            const novoComentario = document.createElement('div');
            novoComentario.classList.add('comentario');
            novoComentario.innerHTML = `<strong>Você</strong>: ${conteudo}`;
            
            // Exibe o novo comentário na postagem atual
            const comentariosPostagem = document.querySelector(`#postagem${postagemAtual} .comentarios-postagem`);
            comentariosPostagem.appendChild(novoComentario);

            // Limpa o campo de comentário
            document.getElementById("inputComentarioModal").value = '';
            fecharModalComentario(); // Fecha o modal após enviar
        } else {
            alert("Erro ao enviar o comentário.");
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert("Erro ao enviar o comentário.");
    });
}

// Função para carregar mais comentários
function verMaisComentarios(idPostagem) {
    fetch(`/comentarios/${idPostagem}`)
    .then(response => response.json())
    .then(data => {
        if (data.comentarios) {
            const comentariosPostagem = document.querySelector(`#comentarios${idPostagem}`);
            comentariosPostagem.innerHTML = ''; // Limpa os comentários atuais

            // Adiciona todos os comentários
            data.comentarios.forEach(comentario => {
                const comentarioDiv = document.createElement('div');
                comentarioDiv.classList.add('comentario');
                comentarioDiv.innerHTML = `<strong>${comentario.perfils.nickname}:</strong> <span>${comentario.conteudo}</span>`;
                comentariosPostagem.appendChild(comentarioDiv);
            });
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert("Erro ao carregar mais comentários.");
    });
}

</script>

@endsection