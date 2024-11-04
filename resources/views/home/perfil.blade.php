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
            <li><span>200,543</span>Visualização</li>
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
            <img src="{{url('assets/img/file-posts/'.$postagem->fotoPost)}}" alt="Photo" />
            
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
@endsection