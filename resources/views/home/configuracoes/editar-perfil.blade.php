@extends('templates.template-home')

<!-- Links CSS-->

@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-config-perfil.css')}}">
@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->

@section('cont-home')
    <div class='cont-editar-perfil'>
        <h1>Editar Perfil: {{$perfil->nickname}}</h1>
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
                    <small class="errorMessage">@error('nickname'){{$message}}@enderror</small>
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
        <form action="{{ route('profile.destroy', $perfil->idPerfil) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir Perfil</button>
        </form>
        </div>
    </div>

    

@endsection

@section('scripts')
    <script src="{{url('assets/js/home/editar-perfil.js')}}"></script>
@endsection