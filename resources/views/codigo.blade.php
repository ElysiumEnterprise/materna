<!DOCTYPE html>
<html lang="p-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci a senha</title>
    <link rel="stylesheet" href="{{url('assets/css/codigo.css')}}">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="{{url('assets/img/logo/Logo-Materna-Branco.png')}}" alt="Imagem logo materna" class="img-logo">
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
                    <p class="cod">
                        Insira o código enviado ao seu email:
                    </p>
                </div>

                <div class="card-form">
                    <form action="" method="post" class="form-codigo">
                        <div class="input-group">
                            <div class="cont-error">
                                <span class="errorCodigo"></span>
                            </div>
                            
                            <input type="text" id="codigo" name="codigo" class="animated-input" placeholder="XXX-XXX-XX" >
                        </div>
                        <div class="link-cod">
                            <a href="#" class="reenvio-cod">Reenviar código</a>
                        </div>
                        <div class="btn">
                            <button type="submit" class="btn-confirm">Confirmar</button>
                            <button class="btn-cancel">Cancelar</button>
                        </div>
                    </form>
                </div>

                
            </div>

        </div>
    </main>
    <script src="{{url('assets/js/senha/validar-codigo.js')}}"></script>
</body>
</html>