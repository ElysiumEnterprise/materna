<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{url('assets/css/style-cadastro.css')}}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Materna - Categorias do Perfil</title>
</head>
<body>
    <div class="cont-home">
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
                                <h2>Categorias</h2>
                            </div>
                            <div class="description">
                                <p>Selecione pelo menos uma categoria que deseja acompanhar na Materna</p>
                            </div>
                        </div>
                    
                        <div class="slider-form">
                        
                            <form action="{{route('form-cadastro.cliente')}}" method="post" class="form-cliente">
                                @csrf
                                
                                    
                                @foreach($categorias as $categoria)
                                    <div class="input-group">
                                        <label for="{{$categoria->idCategoria}}" class='label-checkbox'>{{$categoria->nomeCategoria}}</label>
                                        <input type="checkbox" name="categoriaPost" id="{{$categoria->idCategoria}}" value="{{$categoria->idCategoria}}">
                                    </div>
                                @endforeach
                                
                                
                                <button type="submit">Confirmar</button>
                            </form>
                        

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
    </div>
</body>
</html>