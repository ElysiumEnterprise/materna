@extends('templates.template-home')

<!-- Links CSS-->

@php
    $userAuth = Auth::user();

    $perfil = $userAuth->perfils;
@endphp
@section('links-css')

<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{url('assets/css/style-perfil.css')}}">

    
    
@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->
    
@section('cont-home')
<div class="cont-perfil">
<div class="header__wrapper">
      <div class="cont-banner">
        @if($user->perfils->bannerPerfil == null ||$user->perfils->bannerPerfil == '')
          @if($user->idUsuario == $userAuth->idUsuario)
          <a href="{{route('perfil.editar', $user->idUsuario)}}">
            <img src="{{url('assets/img/banners-perfils/default-banner.png')}}" alt="">
          </a>
          @else

          <img src="{{url('assets/img/bg.jpeg')}}" alt="">
          @endif
        
        @else

        <img src="{{url('assets/img/banners-perfils/'.$user->perfils->bannerPerfil)}}" alt="">
        @endif
      </div>
       
      
      <div class="cols__container">
        <div class="left__col">
          <div class="img__container">
            <img src="{{asset('assets/img/foto-perfil/'.$user->perfils->fotoPerfil)}}" alt="Anna Smith" />
            <span></span>
          </div>
          <h2>{{$user->nome}}</h2>
          @if($user->idUsuario != $userAuth->idUsuario)
            @if($hasSeguindo)
              <form action="{{route('parar.seguir.perfil', $user->perfils->idPerfil)}}" method="post">
                @csrf
                <button type="submit">Deixar de Seguir</button>
              </form>

            @else
              <form action="{{route('seguir.perfil', $user->perfils->idPerfil)}}" method="post">
                @csrf
                <button type="submit">Seguir</button>
              </form>
            @endif
            <button type="button" onclick="abrirModalDenuncia()">Denunciar</button>
            <button type="button" onclick="goMessage('{{$user->perfils->idPerfil}}')">Mensagem</button>
          @endif

          <ul class="about">
            <li><a href="{{route('go.list.seguidores', $user->perfils->idPerfil)}}"><span>{{$user->perfils->qtddSeguidores}}</span>Seguidores</a></li>
            <li><a href="{{route('go.list.seguindo', $user->perfils->idPerfil)}}"><span>{{$user->perfils->qtddSeguindo}}</span>Seguindo</a></li>
            <li><span>0</span>Visualização</li>
          </ul>

          <div class="content">
            <p>
              Bio
            </p>
            <p>
                {{$user->perfils->biography}}

            </p>

           
          </div>
        </div>
        <div class="right__col">
          <nav>
           
           
          </nav>
          @if($user->perfils->postagems->isNotEmpty())  
          <div class="photos">
            @foreach($user->perfils->postagems as $postagem)
            <button type="button" onclick="abrirInfoPost('{{$postagem->idPostagem}}', '{{$postagem->fotoPost}}')">
              <img src="{{url('assets/img/file-posts/'.$postagem->fotoPost)}}" alt="Photo" />
            </button>
            
            
            @endforeach
          </div>
          @else
            <div class="cont-status-post">
            <i class="fa-solid fa-image"></i>
            <p>Esse usuário não tem postagens!</p>
            </div>
        @endif
        </div>
      </div>
    </div>
         
      <div class="box-modal-post">
        <dialog class="modal-denuncia">
        <div class="cont-header-modal">
                <button type="button" onclick="fecharModalDenuncia()"><i class="fa-solid fa-xmark"></i></button>
                </div>
            <div class="cont-modal-denuncia">
                
                <form action="{{route('cad.denuncia', $user->idUsuario)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="cont-assunto">
                            <label for="motivoDenuncia">Motivo da Denúncia @error('motivoDenuncia'): {{$message}}@enderror</label>
                            <input type="text" name="motivoDenuncia" id="motivoDenuncia" placeholder="Digite o motivo da denúncia aqui">
                        </div>
                        <div class="cont-desc">
                            <label for="detalhesDenuncia">Detalhes @error('detalhesDenuncia'): {{$message}}@enderror</label>
                            <textarea name="detalhesDenuncia" id="detalhesDenuncia"></textarea>
                        </div>

                        <div class="cont-btn-criar-post">
                            <button type="submit">Denunciar</button>
                        </div>
                    </section>
                </form>
            </div>
        </dialog>
    </div>

    <div class="box-modal-post-perfil">
      <dialog class="modal-post-perfil">
        <div class="cont-header-modal">
          
          <button type="button" onclick="fecharModalPostPerfil()">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        <div class="cont-info-post">
          <!-- Container da imagem do lado esquerdo -->
          <div class="cont-img-post">
              <img src="" class="img-fluid img-modal-post" alt="">
          </div>
          <!-- Container das informações da postagem -->
           <div class="cont-lado-direito">
            <div class="cont-info-rendimento">
              <div class="icon">
                  <i class="fa-solid fa-heart"></i>
                  <small class="num-curtidas"></small>
              </div>
              <div class="icon">
                  <i class="fa-regular fa-comment" style="right:12%"></i>
                  <small class="num-comentarios"></small>
              </div>
              <div class="icon">
                  <i class="fa-solid fa-eye"></i>
                  <small class="num-views"></small>
              </div>
            </div>
            <!-- Container de descrição -->
            <div class="cont-desc">
              <p class="txtDesc"></p>
            </div>
            <!-- Container de comentários -->
              <div class="cont-comentarios">
                <h6>Comentários</h6>
                <!-- Aqui serão as sections vinda do banco de dados de todos os comentários dessa postagem -->
                <div class="cont-card-comentarios">

                </div>
                <form action="" method="post" class="form-comentar">
                  <input type="text" name="txtComentario" id="txtComentario">
                  <button type="submit">
                    <span class="material-symbols-outlined">send</span>
                  </button>
                </form>
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
</div>

        <script src="{{url('assets/js/home/modal-denuncia.js')}}"></script>

          </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
  <script>
    function goMessage(id){

      const idPerfil= parseInt(id);

      location.href = `/home/mensagens/${idPerfil}`

    }
  </script>
  <script src="{{url('assets/js/home/script-post.js')}}"></script>
@endsection