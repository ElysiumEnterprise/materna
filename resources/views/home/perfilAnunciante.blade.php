@extends('templates.template-home')

<!-- Links CSS-->

@section('links-css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{url('assets/css/style-feed.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style-modal-analise.css')}}">
@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->
    
@section('cont-home')
    <div class="cont-feed">
        <div class="cont-post">
            @if($postagens->isEmpty())
                
                <div class="cont-status">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <p>Você ainda não gerou nenhum anúncio</p>
                </div>
            @else
                @foreach($postagens as $post)
                    <section class="card-post">
                    <div class="post-head">
                        
                            <img src="{{url('assets/img/foto-perfil/'.$post->perfils->fotoPerfil)}}" class="img-fluid foto-perfil" alt="">
                        
                        
                            <small>{{$post->perfils->nickname}}</small>
                        
                    </div>
                    <div class="conteudo-post">
                        <div class="cont-arquivo">
                            <img src="{{url('assets/img/file-posts/'.$post->fotoPost)}}" class="img-fluid img-arquivo" alt="">
                        </div>
                        <div class="cont-icons">
                            <div class="icons-principais">
                                
                                <button type="button"><i class="fa-regular fa-heart"></i></button>
                                <button type="button" onclick="abrirModalComentarios('{{$post->idPostagem}}', `{{route('store.comentario', ['idPostagem'=> ':idPostagem'])}}`, '{{$post->fotoPost}}')"><i class="fa-regular fa-comment"></i></button>
                                
                                <button type="button" onclick="abrirModalPostAnalise('{{$post->idPostagem}}', '{{$post->fotoPost}}')"><i class="fa-solid fa-chart-line"></i></button>
                                
                                
                            </div>
                            <div class="icon-salvos">
                                <button type="button" onclick="abrirModalDeletar('{{$post->idPostagem}}', `{{route('destroy.post', ['idPostagem' => ':idPostagem'])}}`)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                
                            </div>
                        </div>
                        <div class="cont-legenda">
                            {{$post->descPostagem}}</span></small>
                        </div>
                        
                    </div>
                </section>
                @endforeach
            @endif
            
        </div>

        <section class="cont-tipo-feed">
           
            <div class="cont-analise">
                <h5>Informações sobre Anúncios</h5>
                @if($postagens->isNotEmpty())
                <section class='card-analise-grafico'>
                    <h4>Alcances</h4>
                    <div class="grafico">

                        <canvas id="myChart1" width="200px" height="200px"></canvas>

                    </div>
                </section>
                <section class='card-analise-grafico'>
                    <h4>Renda geral</h4>
                    <div class="grafico">

                        <canvas id="myChart2" width="200px" height="200px"></canvas>

                    </div>
                </section>
                <section class='card-analise-grafico'>
                    <h4>Análise Geral dos Anúncios</h4>
                    <div class="grafico">

                        <canvas id="myChart3" width="200px" height="200px"></canvas>

                    </div>
                </section>
                @else

                    <div class="cont-status">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <p>Você ainda não têm anúncios feitos!</p>
                    </div>

                @endif
            </div>
        </section>
    </div>
    <div class="box-modal-post-analise box-modal" >
        <dialog class="modal-analise-post">
            <div class="cont-modal-post-analise">
                <div class="cont-header-modal">
                    <button type="button" onclick="fecharModalPostAnalise()">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <h4 id="nomePerfilModal"></h4> <!-- Local para o nome do perfil -->
                </div>
                <div class="cont-conteudo-analise">
                    <div class="cont-img-post">
                        <img src="" alt="" id="img-modal-post" class="img-fluid img-post">
                    </div>
                    <div class="cont-graficos">
                        <h4>Informações do Anúncio</h4>
                        <div class="cont-row-grafico">
                            <div class="grafico">
                                <h5>Visualizações</h5>
                                <canvas id="chartPost1" width="200px" height="300px"></canvas>
                            </div>
                            <div class="grafico">
                                <h5>Análise Geral</h5>
                                <canvas id="chartPost2" width="200px" height="300px"></canvas>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </dialog>
    </div>
    <div class="box-modal-deletar box-modal">
        <dialog class="modal-deletar-post">
            <div class="cont-modal">
                <p>Tem certeza que deseja deletar esse anúncio? Todos os comentários, curtidas e Visualizações serão perdidas ao executar essa ação!</p>
                <form action="" method="post" class="form-delete">
                    @csrf
                    @method('DELETE')
                    <div class="cont-btn">
                        <button type="submit">Deletar</button>
                        <button type="button" onclick="fecharModalDeletar()">Cancelar</button>
                    </div>
                </form>
            </div>
            
        </dialog>
    </div>
    <div class="box-modal-comentarios box-modal">
        <dialog class="modal-comentarios-post">
            
            <div class="cont-modal-comentarios">
                <div class="cont-header-modal">
                    <button type="button" onclick="fecharModalComentarios()">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="cont-info-comentarios">
                    <div class="cont-img">
                        <img src="" class="img-fluid img-post-comentario" alt="" style="height: 560px; width: auto; object-fit: cover; border-radius: 8px; display: block; margin: 0 auto; margin-bottom:20%;">
                    </div>
                    <div class="cont-card-comentarios">
                        <div class="chat-scroll">
                            <!-- Cards dos comentários ficarão aqui via Javascript -->  
                        </div>
                        
                        
                    </div>
                </div>
                <div class="cont-form">
                    <form action="" method="post" class="form-comentar" style="display: flex; align-items: center; gap: 10px; padding-left:20px;">
                        <input type="text" name="inputComentarioModal" required id="inputComentarioModal" placeholder="Digite seu comentário..." style="flex: 1; border-radius: 15px; border: 1px solid black; padding: 8px; outline: none; font-size: 16px; width: 70%;">
                        <button type="submit" style= " border: none; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; cursor: pointer; align-self: center;" ><span class="material-symbols-outlined">send</span></button>
                    </form>
                </div>
                
                
            </div>
        </dialog>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{url('assets/js/home/graficos.js')}}"></script>
    <script src="{{url('assets/js/home/analise-post.js')}}"></script>
    <script src="{{url('assets/js/home/script-comentarios.js')}}"></script>
@endsection