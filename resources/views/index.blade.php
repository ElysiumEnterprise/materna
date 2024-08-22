<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materna - Login</title>
    
    <link rel="stylesheet" href="{{url('assets/css/style-index.css')}}">

    
    
</head>
<body>

    <div class="container">
        <div class="primeiro-container">
            <div class="logo">
                <img src="{{url('assets/img/logo/img-container.png')}}" alt="Materna Logo">
                
                <p>Entre na sua conta ou crie uma para acessar a rede social</p>
            </div>
        </div>
        
        <div class="segundo-container">
            <div class="login">
                <h2>Login</h2>
                <form id="formulario" action="{{route('form-logar')}}" method="post">
                    @csrf
                    <div class="input-group">
                        <label for="email"><span id="erroEmail" class="erro">@error('email'){{$message}}{{session('error')}}@enderror</span></label>
                        <div class="cont-input">
                            
                            <label for="email">
                                <img src="{{url('assets/img/icons/icon-email.png')}}" class="icon-input" alt="Icone de senha">
                            </label>
                            
                            <input type="text" id="email" name="email" class="animated-input" placeholder="Digite seu email">
                        </div>
                        
                        
                    </div>

                    <div class="input-group">
                        <label for="senha"><span id="erroSenha" class="erro">@error('senha'){{$message}}@enderror</span></label>
                        <div class="cont-input">
                            <label for="senha">
                                <img src="{{url('assets/img/icons/icon-password.png')}}" class="icon-input" alt="Icone de senha">
                            </label>
                            <input type="password" id="senha" name="senha" class="animated-input" placeholder="Digite sua senha">
                        </div>
                        
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
                    <div class="cont-btn">
                        <button type="submit">
                            Entrar
                        </button>
    
                    </div>
                    
                    <a href="/senha" class="forgot-password">Esqueceu sua senha?</a>
                   
                    <p class="create-account">Não tem uma conta? <a href="/cadastro-user"><span>Clique aqui</span></a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="{{url('assets/js/validacao/validar-login.js')}}"></script>
</body>
</html>