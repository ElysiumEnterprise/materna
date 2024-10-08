<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materna - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{url('assets/css/style-index.css')}}">
</head>
<body>

    <div class="container">
        <div class="primeiro-container">
            
        <img src="{{url('assets/img/logo/img-container.png')}}" alt="" class="img-container1">
        
        </div>
        
        <div class="segundo-container">
            <div class="cont-img-mobile">
                <img src="{{url('assets/img/logo/Logo-Materna.png')}}" class="img-fluid img-logo-mobile" alt="Logo da Materna">
            </div>
            <div class="login">
                <h2>Login</h2>
                <div class="cont-status">
                    <h4>{{session('status')}}</h4>
                    <a href="{{session('link')}}">{{session('message')}}</a>
                </div>
                <form id="formulario" action="{{route('form-logar')}}" method="post">
                    @csrf
                    <div class="cont-error-geral">
                        <small>{{session('error')}}</small>
                    </div>
                    <div class="input-group">
                        
                        <label for="email"><span id="erroEmail" class="erro">@error('email'){{$message}}{{session('error')}}@enderror</span></label>
                        <div class="cont-input">
                            
                            <label for="email">
                                <img src="{{url('assets/img/icons/icon-email.png')}}" class="icon-input" alt="Icone de senha">
                            </label>
                            
                            <input type="text" id="email" name="email" class="animated-input" placeholder="Digite seu email" .value="{{old('email')}}">
                        </div>
                        
                        
                    </div>

                    <div class="input-group">
                        <label for="senha"><span id="erroSenha" class="erro">@error('senha'){{$message}}@enderror</span></label>
                        <div class="cont-input">
                            <label for="senha">
                                <img src="{{url('assets/img/icons/icon-password.png')}}" class="icon-input" alt="Icone de senha">
                            </label>
                            <input type="password" id="senha" name="senha" class="animated-input" placeholder="Digite sua senha" value="{{old('senha')}}" >
                            <i class="bi bi-eye-slash btn-show-pass" onclick="mostrarSenha()"></i>
                        </div>
                        
                    </div>
                    
                    <div class="cont-btn">
                        <button type="submit">
                            Entrar
                        </button>
    
                    </div>
                    
                    <a href="/senha" class="forgot-password">Esqueceu sua senha?</a>
                   
                    <p class="create-account">Não tem uma conta? <a href="/cadastro-user"><span>Clique aqui</span></a></p>

                    <p class="login-adm">Logar como <a href="#"><span>ADM</span></a></p>
                </form>
            </div>
        </div>
    </div>

    

    <script src="{{url('assets/js/validacao/validar-login.js')}}"></script>
    <script src="{{url('assets/js/carousel.js')}}"></script>
    <script src="{{url('assets/js/senha/show-hidden-password.js')}}"></script>
    
</body>
</html>