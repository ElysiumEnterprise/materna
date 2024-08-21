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
                
                <label for="imgPerfil">Mudar imagem do perfil</label>
                <input type="file" class="input-file" name="imgPerfil" id="imgPerfil">
            </div>
            <div class="input-group">
                <label for="nickname">Mudar nome de usuário</label>
                <input type="text" name="nickname" id="nickname" value='{{$perfil->nickname}}'>
            </div>
            <div class="input-group">
                <label for="bio">Mudar Biografia</label>
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