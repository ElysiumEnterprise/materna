@extends('templates.template-home')

<!-- Links CSS-->

@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-feed.css')}}">
    
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
                        
                        
                            <small>{{$post->nickname}}</small>
                        
                    </div>
                    <div class="conteudo-post">
                        <div class="cont-arquivo">
                            <img src="{{url('assets/img/file-post/'.$post->fotoPost)}}" class="img-fluid img-arquivo" alt="">
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
                            <small>{{$post->perfils}} <span>{{$post->descPostagem}}</span></small>
                        </div>
                        
                    </div>
                </section>
                @endforeach
            @endif
            
        </div>

        <section class="cont-tipo-feed">
           
            <div class="cont-assuntos">
                <h5>Informações sobre Anúncios</h5>
                <section class='card-assunto'>
                    <h4>Alcances</h4>
                    <i class="fa-solid fa-ellipsis"></i>
                </section>
                <section class='card-assunto'>
                    <h4>Renda geral</h4>
                    <i class="fa-solid fa-ellipsis"></i>
                </section>
                <section class='card-assunto'>
                    <h4>Análise Geral do Anúncio</h4>
                    <i class="fa-solid fa-ellipsis"></i>
                </section>
            </div>
        </section>
    </div>
@endsection