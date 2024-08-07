<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materna - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/style-index.css')}}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    
</head>
<body>
    
    <div class="container-conteudo">
            <div class="primeiro-container">
                <div class="logo">
                    <img src="{{url('assets/img//logo/img-container.png')}}" class="img-fluid" alt="Materna Logo">
                    
                    <p>Entre na sua conta ou crie uma para acessar a rede social</p>
                </div>
            </div>
            
            <div class="segundo-container">
                <div class="login">
                    <h2>Login</h2>
                    <form>
                        <div class="input-group">
                            <label for="email">Digite seu email</label>
                            <input type="email" id="email" required>
                        </div>
                        <div class="input-group">
                            <label for="senha">Digite sua senha</label>
                            <input type="password" id="senha" required>
                        </div>
                        <button type="submit">Entrar</button>
                        <a href="#" class="forgot-password">Esqueceu sua senha?</a>
                    <!-- <a href="#" class="create-account">Não tem uma conta? <span>Clique aqui</span></a>-->
                        <p class="create-account">Não tem uma conta? <a href="/cadastro"><span>Clique aqui</span></a></p>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{url('assets/js/validacao/validar-login.js')}}"></script>
</body>
</html>