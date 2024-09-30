<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/css/style-pdf-relatorios.css')}}">
    <title>{{$titulo}}</title>
</head>
<body>
    <div class="cont-header">
        
        <div class="cont-titulo">
            <h1>{{$titulo}}</h1>
        </div>
        <div class="cont-desc">
            <p>Esse relatório foi gerado na data : {{$data}}</p>
        </div>
    </div>

    <div class="cont-conteudo">
        <h3>Cadastros</h3>
        <h4>Cadastros Realizados ao Todo: <span>{{$countCadastros}}</span></h4>
        <h4>Cadastros Realizados no Mês: <span>{{$countCadastradosMonth}}</span></h4>

        <h3>Postagens</h3>
        <h4>Postagens Realizadas ao Todo: <span>{{$countPostagens}}</span></h4>
        <h4>Postagens Realizadas no Mês: <span>{{$countPostagensMes}}</span></h4>

        <h3>Anúncios</h3>
        <h4>Anúncios Gerados ao Todo: <span>{{$countPostADD}}</span></h4>
        <h4>Anúncios Gerados no Mês: <span>{{$countPostADDMes}}</span></h4>

        <h3>Denúncias</h3>
        <h4>Denúncias Feitas ao Todo: <span>{{$countDenuncias}}</span></h4>
        <h4>Denúncias Feitas no Mês: <span>{{$countDenunciasMes}}</span></h4>
        <h4>Denúncias Verificadas no Total: {{$countDenunciasChecadasTotal}}</h4>
        <h4>Denúncias Verificadas no Mês: {{$countDenunciasChecadasMes}}</h4>
    </div>
</body>
</html>