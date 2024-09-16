<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{url('assets/css/login-adm.css')}}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Materna - Login ADM</title>
</head>
<body>
    <div class="container-fluid">
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="/"><img src="{{url('assets/img/logo/Logo-Materna-ADM.png')}}" alt="Imagem logo materna" class="img-logo img-fluid"></a>
               
            </div>
        </nav>
    </header>
    <main>
        
            <div class="cont-conteudo">
           
                <div class="cont-form">
                    <form action="{{route('form.logar.adm')}}" method="post">
                        @csrf
                        <div class="cont-status">
                          
                          <h6>{{session('status')}}</h6>
                          <a href="{{session('link')}}">{{session('message')}}</a>
                            
                        </div>
                        <div class="input-group">
                        
                        <label for="email"><span id="erroEmail" class="erro">@error('email'){{$message}}@enderror</span></label>
                        <div class="cont-input">
                            
                            <label for="email">
                                <img src="{{url('assets/img/icons/icon-email.png')}}" class="icon-input" alt="Icone de senha">
                            </label>
                            
                            <input type="email" id="email" name="email" class="animated-input" placeholder="Digite seu email" value="{{old('email')}}">
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
                        <div class="cont-btn">
                            <button type="submit">Entrar</button>
                        </div>
                    </div>
                        
                    </div>
                    </form>
                </div>
            </div>
        
    </main>
    </div>
    
    <script src="{{url('assets/js/senha/show-hidden-password.js')}}"></script>
</body>
</html>