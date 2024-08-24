@extends('templates.template-home')

<!-- Links CSS-->

@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-config-user.css')}}">
@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->

@section('cont-home')
   
    <div class='cont-editar-perfil'>
    
        <h1>Editar Usuario: {{$usuario->nome}}</h1>
        <h2>{{session('sucess')}}</h2>
        <form action="{{route('user.update',$usuario->idUsuario)}}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="input-group">
                <label for="nome">Mudar seu nome</label>
                <div class="cont-error">
                    <small class="errorMessage">@error('nome'){{$message}}@enderror</small>
                </div>
                
                <input type="text" class="input-edit" name="nome" id="nome" value='{{$usuario->nome}}'>
            </div>
            <div class="input-group">
                <label for="email">Mudar E-mail</label>
                <div class="cont-error">
                    <small class="errorMessage"> @error('email'){{$message}}@enderror{{session('errorEmail')}}</small>
                </div>
                
                <input type="email" name="email" id="email" value='{{$usuario->email}}'>
            </div>
            <div class="input-group">
                <label for="senha">Mudar Senha</label>
                <div class="cont-error">
                    <small class="errorMessage"> @error('senha'){{$message}}@enderror</small>
                </div>
                <input type="password" name="senha" id="senha" value='{{$usuario->senha}}'>                
            </div>
            @foreach($usuario->telefone_users as $telefone)
                <div class="input-group">
                    <label for="telefone">Mudar Telefone</label>
                    <div class="cont-error">
                        <small class="errorMessage"> @error('telefone'){{$message}}@enderror{{session('errorTel')}}</small>
                    </div>
                    
                    <input type="tel" name="telefone" id="telefone" value='{{$telefone->numTelefone}}'>
                </div>
                @endforeach
            <input type="submit" value="Mudar">
        </form>
        
    </div>
    
    

@endsection

