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
                            <a href="/" >
                                <img src="{{url('assets/img/icons/icon-back.png')}}" alt="Botão voltar a tela de login">
                            </a>
                        </div>
                        <div class="cont-head">
                            
                            <div class="cont-titulo">
                                <h2>Crie sua conta</h2>
                            </div>
                            
                        </div>
                    
                        <div class="cont-btn">
                            <a href="/cadastro-cliente" class="active">Mãe</a>
                            <a href="/cadastro-anunciante" >Anunciante</a>
                        </div>
                        <div class="slider-form">
                        <section class="cadastro-cliente">
                            <form action="{{route('form-cadastro.cliente')}}" method="post" class="form-cliente">
                                @csrf
                                <div class="input-group">
                                    
                                    <label for=""><span class="errorCliente">@error('nomeCliente'){{$message}}@enderror</span></label>
                                    <div class="cont-input">
                                    
                                        <label for="nomeCliente">
                                            <img src="{{url('assets/img/icons/icon-user.png')}}" alt="" class="img-fluid icon-input">
                                        </label>
                                            
                                        
                                        
                                        <input type="text" name="nomeCliente" id="nomeCliente" placeholder="Digite seu nome" value='{{old("nomeCliente")}}'>
                                    </div>
                                
                                </div>
                                <div class="input-group">

                                    <label for="dtCliente"><span class="errorCliente">@error('dtCliente'){{$message}}@enderror</span></label>
                                    
                                    <div class="cont-input">

                                        <label class="label-icon" for="dtCliente">
                                            <img src="{{url('assets/img/icons/icon-calendar.png')}}" alt="" class="img-fluid icon-input">
                                        </label>
                                        
                                        <input type="date" name="dtCliente" id="dtCliente" min="1924-01-01" placeholder="Digite sua data de nascimento" value='{{old("dtCliente")}}'>

                                    </div>
                                </div>

                                <div class="input-group">
                                    <label for=""><span class="errorCliente">@error('emailCliente'){{$message}}@enderror{{session('error')}}</span></label>
                                    <div class="cont-input">
                                        <label class="label-icon" for="emailCliente">
                                            <img src="{{url('assets/img/icons/icon-email.png')}}" alt="" class="img-fluid icon-input">
                                        </label>
                                        
                                        <input type="email" name="emailCliente" id="emailCliente" placeholder="Digite seu email" value='{{old("emailCliente")}}'>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="errorCliente">@error('telCliente'){{$message}}@enderror</span>
                                    <div class="cont-input">
                                        <label class="label-icon" for="telCliente">
                                            <img src="{{url('assets/img/icons/icon-tel.png')}}" alt="" class="img-fluid icon-input">
                                        </label>
                                        
                                        <input type="tel" name="telCliente" id="telCliente" placeholder="Digite seu telefone" value='{{old("telCliente")}}'>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="errorCliente">@error('senhaCliente'){{$message}}@enderror</span>
                                    <div class="cont-input">
                                        <label class="label-icon" for="senhaCliente">
                                            <img src="{{url('assets/img/icons/icon-password.png')}}" alt="" class="img-fluid icon-input">
                                        </label>
                                        
                                        <input type="password"  name="senhaCliente" id="senhaCliente" placeholder="Crie uma senha" value='{{old("senhaCliente")}}'>
                                        
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
                                <button type="submit">Criar</button>
                            </form>
                        </section>

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
  <script src="{{url('assets/js/validacao/validar-cad-cliente.js')}}"></script>
</body>
</html>