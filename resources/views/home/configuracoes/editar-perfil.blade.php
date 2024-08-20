@extends('templates.template-home')

<!-- Links CSS-->

@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-config-perfil.css')}}">
@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->

@section('cont-home')
    <div class='cont-editar-perfil'>
        <h1>Editar Perfil {{$perfil->idPerfil}}</h1>
        <form action="{{route('perfil.update',$perfil->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="input-group">
                <label for="imgPefil">Mudar imagem do perfil</label>
                <input type="file" name="imgPerfil" id="imgPerfil">
            </div>
            <div class="input-group">
                <label for="nickname">Mudar nome de usuário</label>
                <input type="text" name="nickname" id="nickname" value='{{$perfil->nickname}}'>
            </div>
            <div class="input-group">
                <label for="bio">Mudar Biografia</label>
                <textarea name="bio" id="bio" value='{{$perfil->biography}}'></textarea>
            </div>
            <input type="submit" value="Mudar">
        </form>
    </div>

    <form action="{{ route('profile.destroy', $perfil->idPerfil) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir Perfil</button>
</form>

@endsection