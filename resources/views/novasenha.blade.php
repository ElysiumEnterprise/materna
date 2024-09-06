<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci a senha</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{url('assets/css/novasenha.css')}}">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="/"><img src="{{url('assets/img/logo/Logo-Materna-Branco.png')}}" alt="Imagem logo materna" class="img-logo"></a>
            </div>
        </nav>
    </header>

    <main>
        
        <div class="card">

            <div class="card-content">

                <div class="title">
                    <h3 class="title-senha">Alterar senha</h3>
                </div>

                <div class="txt">
                    <p class="nova-senha">
                        Crie uma nova senha para a sua conta:
                    </p>
                </div>

                <div class="card-form">
                    <form action="{{route('password.update')}}" method="post" class="form-confirm-senha">
    
                        @csrf

                        <input type="hidden" id="token" name="token" value="{{ $token }}">
                        
                        <div class="input-group">
                            <div class="cont-erro">
                                <span class="errorEmail error">@error('email'){{$message}}@enderror</span>
                            </div>
                            
                            <input type="email" name="email" id="email" class="animated-input" placeholder="Digite seu email" value="{{old('email')}}">
                        </div>
                        <div class="input-group">
                            <div class="cont-erro">
                                <span class="erorrSenha error">@error('password') {{$message}}@enderror</span>
                            </div>
                            <input type="password" id="password" name="password" class="animated-input" placeholder="Crie uma nova senha" value="{{old('password')}}">
                            <i class="bi bi-eye-slash btn-show-pass" onclick="mostrarSenha()"></i>
                        </div>
                        <div class="regras-senha">
                                <div class="senha-numeros">
                                    <span class="txt-regra-numb">Precisa conter números</span>
                                </div>
                                <div class="senha-uppercase">
                                    <span class="txt-regra-upper">Precisa conter caracteres maiúsculos</span>
                                </div>
                                <div class="senha-caracteres">
                                    <span class="txt-regra-caracter">No mínimo, 8 carecteres</span>
                                </div>
                                <div class="senha-carcter-especiais">
                                    <span class="txt-regra-caracter-special">Precisa conter caracteres speciais</span>
                                </div>
                        </div>
                        
                        <div class="input-group">
                            <div class="cont-erro">
                                <span class="errorSenha error">@error('password') {{$message}}@enderror</span>
                            </div>
                            
                            <input type="password" id="password_confirmation" name="password_confirmation" class="animated-input" placeholder="Confirme a senha" value="{{old('password_confirmation')}}">
                            <i class="bi bi-eye-slash btn-show-pass-confirm" onclick="mostrarConfirmarSenha()"></i>
                        </div>
                        <div class="link">
                            <a href="#" class="link-senha">Não consegue redefinir sua senha?</a>
                        </div>
                        <div class="btn">
                            <button type="submit" class="btn-confirm">Confirmar</button>
                            <a href="/"><button type="button" class="btn-cancel">Cancelar</button></a>
                        </div>
                    </form>
                </div>

            </div>

        </div>
        
    </main>
    <script src="{{url('assets/js/senha/validar-senha.js')}}"></script>
</body>
</html>