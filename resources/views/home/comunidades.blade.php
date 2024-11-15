@extends('templates.template-home')

<!-- Links CSS-->

@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-comunidades.css')}}"> 
    <link rel="stylesheet" href="{{url('assets/css/style-feed.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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

                <div class="icon">
                
                    <button type="button" id="btn-abrir-modal" onclick="abrirModalComunidade()"><i class="fa-solid fa-plus icon-plus" ></i></button> 
                </div>

            </div>

            <div id="modal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Criar comunidade</h5>
                    </div>

                    <div class="modal-body">
                        <div class="cont-form">
                            <form action="" method="post">
                            @csrf
                            <div class="cont-img-comunidade">
                                <label for="imgComunidade">
                                <img src="{{url('assets/img/foto-perfil/user-icon-default.png')}}" class="img-fluid img-perfil" alt="Foto da comunidade">
                                </label>
                                <label for="imgComunidade" class="btn-mudar-img">Inserir foto da comunidade</label>
                                <input type="file" name="imgPerfil" id="imgPerfil" hidden accept="image/*" value="{{old('imgComunidade')}}">
                            </div>

                            <div class="input-group">
                                <label for="nickname">Nome da Comunidade: <span class="errorField">@error('nickname'){{$message}}@enderror {{session('errorNickEqual')}}</span></label>
                                <input type="text" name="nickname" id="nickname" placeholder="Crie um nome para a comunidade" value="{{old('nickname')}}">
                            </div>

                            <div class="input-group">
                                <label for="imgCapa">Adicionar Capa de Perfil para a Comunidade:<span class="errorField">{{session('errorCapa')}}</span></label>
                                <label for="imgCapa" id='drag-area-banner'>
                                <input type="file" name="imgCapa" id="imgCapa" hidden accept="image/*" value="{{old('imgCapa')}}">
                                <div class="img-view-banner">
                                    <div class="icon">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                    </div>
                                    <h5>Arraste e solte aqui sua imagem ou clique aqui</h5>
                                </div>
                                </label>
                            </div>

                            <div class="input-group">
                                <label for="biography">Biografia: <span class="errorField">@error('biography'){{$message}}@enderror</span></label>
                            <textarea name="biography" id="biography" placeholder="Conte sobre sua comunidade para outras pessoas!" value="{{old('biography')}}"></textarea>
                            </div>


                            </form>
                        </div>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn criar">Criar</button>
                    </div>

                    <span class="close">&times;</span>
                    
                </div>
            </div>

           

            <!--

            <div class="modal fade" id="meuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Criar comunidade</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              </button>
            </div>

            <div class="modal-body">
                
            <div class="cont-form">
        <form action="{{route('cadastrar.perfil')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="cont-img-comunidade">
                <label for="imgComunidade">
                        <img src="{{url('assets/img/foto-perfil/user-icon-default.png')}}" class="img-fluid img-perfil" alt="Foto da comunidade">
                </label>
                <label for="imgComunidade" class="btn-mudar-img">Inserir foto da comunidade</label>
                <input type="file" name="imgPerfil" id="imgPerfil" hidden accept="image/*" value="{{old('imgComunidade')}}">
            </div>

            <div class="input-group">
                <label for="nickname">Nome da Comunidade: <span class="errorField">@error('nickname'){{$message}}@enderror {{session('errorNickEqual')}}</span></label>
                <input type="text" name="nickname" id="nickname" placeholder="Crie um nome para a comunidade" value="{{old('nickname')}}">
            </div>

            <div class="input-group">
                <label for="imgCapa">Adicionar Capa de Perfil para a Comunidade:<span class="errorField">{{session('errorCapa')}}</span></label>
                <label for="imgCapa" id='drag-area-banner'>
                    <input type="file" name="imgCapa" id="imgCapa" hidden accept="image/*" value="{{old('imgCapa')}}">
                    <div class="img-view-banner">
                        <div class="icon">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </div>
                        <h5>Arraste e solte aqui sua imagem ou clique aqui</h5>
                    </div>
                </label>
            </div>

            <div class="input-group">
                <label for="biography">Biografia: <span class="errorField">@error('biography'){{$message}}@enderror</span></label>
               <textarea name="biography" id="biography" placeholder="Conte sobre sua comunidade para outras pessoas!" value="{{old('biography')}}"></textarea>
            </div>

        </form>
        </div>

              </div>
        
              <div class="modal-footer">
                <button type="button" class="btn fecha" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn criar">Criar</button>
        
              </div>
            </div>
        </div>
      </div>
-->
            
            
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

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{url('assets/js/modal-comunidades.js')}}"></script>
@endsection

