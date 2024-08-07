<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materna - Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/style-cadastro.css')}}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    
        <div class="container-fluid">
            <div class="container-conteudo">
                
                <div class="cont-form">
                    <div class="box-form">
                        <div class="cont-back">
                            <a href="/index">
                                <img src="{{url('assets/img/icons/icon-back.png')}}" alt="Botão voltar a tela de login">
                            </a>
                        </div>
                        <div class="cont-head">
                            
                            <div class="cont-titulo">
                                <h2>Crie sua conta</h2>
                            </div>
                            
                        </div>
                    
                        <div class="cont-btn">
                            <button type="button" class="btn-change-form">Mãe</button>
                            <button type="button" class="btn-change-form">Anunciante</button>
                        </div>
                        <div class="slider-form">
                        <section class="cadastro-cliente">
                            <form action="" method="post">
                                <div class="input-group">
                                    <label for="nomeCliente">Digite seu nome</label>
                                    <input type="text" name="nomeCliente" id="nomeCliente" required>
                                </div>
                                <div class="input-group">
                                    <label for="dtCliente">Digite sua data de Nascimento</label>
                                    <input type="date" name="dtCliente" id="dtCliente" required>
                                </div>
                                <div class="input-group">
                                    <label for="emailCliente">Digite seu email</label>
                                    <input type="email" name="emailCliente" id="emailCliente" required>
                                </div>
                                <div class="input-group">
                                    <label for="telCliente">Digite seu telefone</label>
                                    <input type="tel" name="telCliente" id="telCliente" required>
                                </div>
                                <div class="input-group">
                                    <label for="senhaCliente">Crie uma senha</label>
                                    <input type="password" name="senhaCliente" id="senhaCliente" required>
                                </div>
                                <button type="submit">Criar</button>
                            </form>
                        </section>
                        <!--<section class="form-anunciante">
                            <form action="" method="post">
                                <div class="input-group">
                                    <label for="nomeAnunciante">Digite seu nome</label>
                                    <input type="text" name="nomeAnunciante" id="nomeAnunciante" required>
                                </div>
                                <div class="input-group">
                                    <label for="dtAnunciante">Digite sua data de Nascimento</label>
                                    <input type="date" name="dtAnunciante" id="dtAnunciante" required>
                                </div>
                                <div class="input-group">
                                    <label for="cnpjAnunciante">Digite seu CNPJ</label>
                                    <input type="text" name="cnpjAnunciante" id="cnpjAnunciante" required>
                                </div>
                                <div class="input-group">
                                    <label for="emailAnunciante">Digite seu email</label>
                                    <input type="email" name="emailAnunciante" id="emailAnunciante" required>
                                </div>
                                <div class="input-group">
                                    <label for="telAnunciante">Digite seu telefone</label>
                                    <input type="tel" name="telAnunciante" id="telAnunciante" required>
                                </div>
                                <div class="input-group">
                                    <label for="senhaAnunciante">Crie uma senha</label>
                                    <input type="password" name="senhaAnunciante" id="senhaAnunciante" required>
                                </div>
                                <button type="submit">Criar</button>
                            </form>
                        </section>-->
                        </div>
                    </div>
                </div>
                <div class="box-img">
                    <div class="cont-img">
                        <img src="{{url('assets/img/logo/img-container.png')}}" class="img-fluid img-logo" alt="Logo da Materna">
                    </div>
                </div>
            </div>
        </div>
  
</body>
</html>