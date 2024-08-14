<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci a senha</title>
    <link rel="stylesheet" href="{{url('assets/css/novasenha.css')}}">
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
                    <p class="nova-senha">
                        Crie uma nova senha para a sua conta:
                    </p>
                </div>

                <div class="card-form">
                    <form action="" method="post" class="form-confirm-senha">
                        <div class="input-group">
                            <div class="cont-erro">
                                <span class="erorrSenha error"></span>
                            </div>
                            <input type="password" id="novasenha" name="novasenha" class="animated-input" placeholder="Crie uma nova senha">
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
                        </div>

                        <div class="input-group">
                            <div class="cont-erro">
                                <span class="errorSenha error"></span>
                            </div>
                            <input type="password" id="confirm-senha" name="confirm-senha" class="animated-input" placeholder="Confirme a senha">
                        </div>
                        <div class="link">
                            <a href="#" class="link-senha">Não consegue redefinir sua senha?</a>
                        </div>
                        <div class="btn">
                            <button type="submit" class="btn-confirm">Confirmar</button>
                            <button type="button" class="btn-cancel">Cancelar</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
        
    </main>
</body>
</html>