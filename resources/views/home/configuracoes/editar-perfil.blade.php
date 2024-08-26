@extends('templates.template-home')

<!-- Links CSS-->

@php
    $user = Auth::user();
@endphp
@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-config-perfil.css')}}">
@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->

@section('cont-home')
    <div class="cont-box-modal">
        <dialog class='modal-excluir'>
            <div class="cont-modal">
                <h1>Tem Certeza?</h1>
                <div class="cont-desc">
                    <p>Voce perderá todos os seus dados, como postagens, comentários, mensagens e outros dados!</p>
                </div>
                <div class="cont-btn-escolha">
                    <form action="{{ route('user.destroy', $user->idUsuario) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir Perfil</button>
                    </form>
                    <button type="button" onclick="fecharModal()">Cancelar</button>
                </div>
            </div>
        </dialog>
    </div>
    <div class='cont-editar-perfil'>
    
        <h1>Editar Perfil: {{$perfil->nickname}}</h1>
        <h2>{{session('message')}}</h2>
        <form action="{{route('perfil.update',$perfil->idPerfil)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="input-group">
                <div class="cont-img">
                    <label for="imgPerfil" class = 'label-img'>
               
                        <img src="{{asset('assets/img/foto-perfil/'.$perfil->fotoPerfil)}}" class="pefil-logo img-fluid" alt="Foto de perfil">
                
                
                    </label>
                </div>
                <div class="cont-mudar-img">
                    <label for="imgPerfil" class="btnImg">Alterar Foto</label>
                    <small class="nomeArquivo">Nenhum arquivo selecionado</small>
                    <input type="file" class="input-file" name="imgPerfil" id="imgPerfil">
                </div>
                
            </div>
            <div class="input-group">
                <label for="nickname">Mudar nome de usuário</label>
                <div class="cont-error">
                    <small class="errorMessage">@error('nickname'){{$message}}@enderror{{session('errorNickname')}}</small>
                </div>
                
                <input type="text" class="input-edit" name="nickname" id="nickname" value='{{$perfil->nickname}}'>
            </div>
            <div class="input-group">
                <label for="bio">Mudar Biografia</label>
                <div class="cont-error">
                    <small class="errorMessage"> @error('bio'){{$message}}@enderror</small>
                </div>
                
                <textarea name="bio" id="bio" res>{{$perfil->biography}}</textarea>
            </div>
            <input type="submit" value="Mudar">
        </form>
        <div class="cont-destroy-perfil">
            <h2>Excluir Perfil</h2>
        
        <button type="button" onclick="abrirModal()">Excluir Perfil</button>
        </div>
    </div>
    
    

@endsection

@section('scripts')
    <script src="{{url('assets/js/home/editar-perfil.js')}}"></script>
@endsection