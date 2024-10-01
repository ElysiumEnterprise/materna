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
        <img src="{{url('assets/img/banners-perfils/default-banner.png')}}" alt="">
        @else

        <img src="{{url('assets/img/banners-perfils/'.$user->perfils->bannerPerfil)}}" alt="">
        @endif
      </div>
       
      
      <div class="cols__container">
        <div class="left__col">
          <div class="img__container">
            <img src="{{asset('assets/img/foto-perfil/'.$perfil->fotoPerfil)}}" alt="Anna Smith" />
            <span></span>
          </div>
          <h2>{{$user->nome}}</h2>
          @if($user->idUsuario != $userAuth->idUsuario)
            <button type="button" onclick="abrirModalDenuncia()">Denunciar</button>
          @endif

          <ul class="about">
            <li><span>4,073</span>Seguidores</li>
            <li><span>{{$user->perfils->qtddSeguidores}}</span>Seguindo</li>
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