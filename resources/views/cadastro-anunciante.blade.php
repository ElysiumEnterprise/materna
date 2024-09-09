<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materna - Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                            <div class="cont-btn">
                                <a href="/cadastro-user">Mãe</a>
                                <a href="/cadastro-anunciante" class="active">Anunciante</a>
                            </div>
                        </div>
                        <div class="slider-form">
                        <section class="cadastro-anunciante">
                       

                            <form action="{{route('form-cadastro.anunciante')}}" method="post" class="form-anunciante">
                                @csrf
                                <div class="input-group">

                                    <label for="nomeAnunciante"><span class="errorAnunciante">@error('nomeAnunciante'){{$message}}@enderror</span></label>

                                    <div class="cont-input">

                                        <label for="nomeCliente">
                                            <img src="{{url('assets/img/icons/icon-user.png')}}" alt="" class="img-fluid icon-input">
                                        </label>
                                        
                                        <input type="text" name="nomeAnunciante" id="nomeAnunciante" placeholder="Digite o nome da empresa" value='{{old("nomeAnunciante")}}'>
                                    </div>
                                </div>

                                <div class="input-group">

                                    <label for="dtAnunciante"><span class="errorAnunciante">@error('dtAnunciante'){{$message}}@enderror</span></label>

                                    <div class="cont-input">

                                        <label class="label-icon" for="dtAnunciante">
                                            <img src="{{url('assets/img/icons/icon-calendar.png')}}" alt="" class="img-fluid icon-input">
                                        </label>
                                        
                                        <input type="date" name="dtAnunciante" id="dtAnunciante" min="1924-01-01" value="{{old('dtAnunciante')}}">

                                    </div>
                                </div>

                                <div class="input-group">
                                    <label for="cnpjAnunciante"><span class="errorAnunciante">@error('cnpjAnunciante'){{$message}}@enderror{{session('errorCNPJ')}}</span></label>
                                    <div class="cont-input">
                                        <label class="label-icon" for="cnpjAnunciante">
                                            <img src="{{url('assets/img/icons/icon-user.png')}}" alt="" class="img-fluid icon-input">
                                        </label>
                                        
                                        <input type="text" name="cnpjAnunciante" id="cnpjAnunciante" placeholder="Digite seu CNPJ" value="{{old('cnpjAnunciante')}}">
                                    </div>
                                </div>

                                <div class="input-group">
                                    <label for="emailAnunciante"><span class="errorAnunciante">@error('emailAnunciante'){{$message}}@enderror{{session('error')}}</span></label>
                                    <div class="cont-input">
                                        <label class="label-icon" for="emailAnunciante">
                                            <img src="{{url('assets/img/icons/icon-email.png')}}" alt="" class="img-fluid icon-input">
                                        </label>
                                        
                                        <input type="email" name="emailAnunciante" id="emailAnunciante" placeholder="Digite seu email">
                                    </div>
                                </div>

                                <div class="input-group">
                                    <label for="telAnunciante"><span class="errorAnunciante">@error('telAnunciante'){{$message}}@enderror{{session('errorTel')}}</span></label>
                                    <div class="cont-input">
                                        <label class="label-icon" for="telAnunciante">
                                            <img src="{{url('assets/img/icons/icon-tel.png')}}" alt="" class="img-fluid icon-input">
                                        </label>
                                        
                                        <input type="tel" name="telAnunciante" id="telAnunciante" placeholder="Digite seu telefone">
                                    </div>
                                </div>

                                <div class="input-group">
                                    <label for="senhaAnunciante"><span class="errorAnunciante">@error('senhaAnunciante'){{$message}}@enderror</span></label>
                                    <div class="cont-input">
                                        <label class="label-icon" for="senhaAnunciante">
                                            <img src="{{url('assets/img/icons/icon-password.png')}}" alt="" class="img-fluid icon-input">
                                        </label>
                                        
                                        <input type="password"  name="password" id="password" placeholder="Crie uma sennha">
                                        <i class="bi bi-eye-slash btn-show-pass" onclick="mostrarSenha()"></i>
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

                                <div class="input-group">
                                    <label for="senhaAnunciante"><span class="errorAnunciante">@error('senhaAnunciante'){{$message}}@enderror</span></label>
                                    <div class="cont-input">
                                        <label class="label-icon" for="password_confirmation">
                                            <img src="{{url('assets/img/icons/icon-password.png')}}" alt="" class="img-fluid icon-input">
                                        </label>
                                        
                                        <input type="password"  name="password_confirmation" id="password_confirmation" placeholder="Confirme a sennha">
                                        <i class="bi bi-eye-slash btn-show-pass-confirm" onclick="mostrarConfirmarSenha()"></i>
                                    </div>
                                </div>
                                <button type="submit">Criar</button>
                            </form>
                        </section>
                        </div>
                    </div>
                </div>

                <div class="cont-carousel">
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img class="img-carousel" src="{{url('assets/img/slide1.png')}}" alt="Imagem 1">
                                <img class="img-carousel" src="{{url('assets/img/slide2-final.png')}}" alt="Imagem 2">
                                <img class="img-carousel" src="{{url('assets/img/slide3.png')}}" alt="Imagem 3">
                            </div>
                        </div>
                </div>

            </div>
        </div>
  <script src="{{url('assets/js/validacao/validar-cad-anunciante.js')}}"></script>
  <script src="{{url('assets/js/carousel.js')}}"></script>

</body>
</html>