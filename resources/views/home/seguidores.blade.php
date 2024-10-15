@extends('templates.template-home')
    
@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-seguidores.css')}}">
@endsection

@section('cont-home')
    <div class="cont-seguidores">
    
        <h1>Seguidores</h1>
        <div class="cont-card-perfils">
           
                @foreach($perfilsSeguidores as $perfil)
                @if($perfil->seguidores->isNotEmpty())
                    @foreach($perfil->seguidores as $perfilSeguidor)
                        <section class="card-seguidores">
                            <a href="{{route('perfil', $perfilSeguidor->usuarios->idUsuario)}}">
                                <img src="{{asset('assets/img/foto-perfil/'.$perfilSeguidor->fotoPerfil)}}" class="perfil-logo img-fluid" alt="Foto de Perfil">
                                <div class="cont-desc-perfil">
                                    <small class="txt-nickname">{{$perfilSeguidor->usuarios->nome}}</small>
                                </div>
                                
                            </a>
                            @if($isAuth)
                                    <div class="cont-remover-seguidor">
                                        <button type="button" onclick="abrirModalRemoverSeguidor()">Remover Seguidor</button>
                                    </div>
                                @endif
                        </section>
                    @endforeach
                @else
                    <div class="cont-status">
                        <i class="fa-solid fa-person-circle-exclamation"></i>
                        
                            <p>Esse usuário não têm seguidores!</p>
                    
                    </div>
                @endif

                @endforeach
                
          
        </div>
    </div>
    <div class="box-modal-remover-seguidor">
        <dialog class="modal-remove">
            <div class="cont-modal">
                <p>Tem certeza que deseja remover esse seguidor?</p>
                    <form action="" method="post">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit">Remover</button>
                        <button type="button" onclick="fecharModalRemove()">Cancelar</button>
                    </form>
            </div>
        </dialog>
    </div>
@endsection

@section('scripts')
    <script src="{{url('assets/js/home/modal-remove.js')}}"></script>
@endsection