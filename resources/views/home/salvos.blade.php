@extends('templates.template-home')

@section('links-css')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{url('assets/css/salvos.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style-modal-analise.css')}}">
@endsection

@section('cont-home')
<div class="cont-salvos">
    <div class="cont-titulo">
        <h2>Itens Salvos</h2>
    </div>
    @if($curtidas->isNotEmpty())
        <div class="cont-posts-curtidos">
            @foreach($curtidas as $postCurtida)

                <section class="cont-img">
                    <img src="{{url('assets/img/file-posts/'.$postCurtida->postagem->fotoPost)}}" onclick="abrirInfoPost('{{$postCurtida->postagem->idPostagem}}', '{{$postCurtida->postagem->fotoPost}}', `{{ route('store.comentario', ['idPostagem' => ':idPostagem']) }}`)" alt="" class="img-salvos img-fluid">
                </section>
            @endforeach
        </div>
        
    
    @else
        <div class="cont-status">
            <i class="fa-solid fa-circle-exclamation"></i>
            <p class="txt-status">Você ainda não curtiu nenhuma postagem</p>
        </div>
    @endif

  



</div>
<div class="box-modal-post-perfil">
      <dialog class="modal-post-perfil">
        <div class="cont-header-modal header-post-info">
          <button type="button" class="btn-deletar" onclick="abrirModalDeletePost()">
            <i class="fa-solid fa-trash"></i>
          </button>
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
                <h6 class="txtTituloComentario">Comentários</h6>
                <!-- Aqui serão as sections vinda do banco de dados de todos os comentários dessa postagem -->
                <div class="cont-card-comentarios">
                    <div class="chat-scroll">
                            <!-- Comentários serão carregados aqui -->
                    </div>
                </div>
                <form action="" method="post" class="form-comentar">
                  @csrf
                  <input type="text" name="inputComentarioModal" required id="inputComentarioModal">
                  <button type="submit">
                    <span class="material-symbols-outlined">send</span>
                  </button>
                </form>
              </div>
           </div>
          
          
        </div>
      </dialog>
    </div>
@endsection

@section('scripts')
  <script src="{{url('assets/js/home/script-post.js')}}"></script>
@endsection