<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci a senha</title>
    <link rel="stylesheet" href="{{url('assets/css/senha.css')}}">

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

            <div class="card-content"
            >
                <div class="title">
                    <h3 class="title-senha">Alterar senha</h3>
                </div>

                <div class="txt">
                    <p class="email">
                        Insira seu email para alterar sua senha:
                    </p>
                </div>

                
                <div class="card-form">
                    <form action="{{route('password.reset')}}" method="post"class="form-email">

                    @csrf
                        <section class="section-email">
                            <div class="input-group">
                                <div class="cont-error">
                                    <span class="errorEmail error"></span>
                                </div>
                                
                                <input type="email" id="email" name="email" class="animated-input" placeholder="Digite seu email">

                                <div class="btn">
                                    <button type="submit" class="btn-cod envio-email">Enviar código</button>
                                    <a class="link-btn" href="/"><button type="button" class="btn-cancel">Cancelar</button></a>
                                </div>

                            </div>
                        </section>
                    </form>
                    
                </div>
            
            </div>

        </div>
    </main>
    <script src="{{url('assets/js/senha/validar-email.js')}}"></script>
</body>
</html>