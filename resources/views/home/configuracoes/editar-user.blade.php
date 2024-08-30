@extends('templates.template-home')

<!-- Links CSS-->

@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-config-user.css')}}">
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
                    <form action="{{ route('user.destroy', $usuario->idUsuario) }}" method="POST">
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
    
        <h1>Editar Usuário: {{$usuario->nome}}</h1>
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
                @if($hasAnunciante)
                    <label for="dt">Alterar data de fundação</label>
                @else
                    <label>Alterar data de nascimento</label>
                @endif
                <div class="cont-error">
                <input type="date" name="dt" id="dt" min="1924-01-01" placeholder="Digite sua data de nascimento" value='{{$usuario->dtNasc}}'>
                </div>
            </div>
            @if($hasAnunciante)
            <div class="input-group">
                <label for="email">Mudar CNPJ</label>
                <div class="cont-error">
                    <small class="errorMessage">@error('cnpj'){{$message}}@enderror{{session('errorCNPJ')}}</small>
                </div>
                
                <input type="text" name="cnpj" id="cnpj" value='{{$usuario->anunciantes->cnpjAnunciante}}'>
            </div>
            @endif
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
        <div class="cont-destroy-perfil">
            <h2>Excluir Conta</h2>
        
        <button type="button" onclick="abrirModal()">Excluir Perfil</button>
        </div>
    </div>
    
    

@endsection
@section('scripts')
    <script src="{{url('assets/js/home/editar-perfil.js')}}"></script>
@endsection
