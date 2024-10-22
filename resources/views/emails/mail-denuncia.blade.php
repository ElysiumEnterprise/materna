<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/css/style-email-denuncia.css')}}">
    <title>Denúncia</title>
</head>
<body>
    <header>
        <img src="{{url('assets/img/Logo-Materna.png')}}" alt="logo da materna">
    </header>
    <div class="cont-denuncia">
        <div class="cont-titulo">
            <h1>Você Recebeu uma Denúncia!!!</h1>
        </div>
        <div class="cont-desc">
            <h2>Motivo: {{$denuncia}}</h2>
            <p>Você recebeu essa denúncia devido ao comportamento indevido em nosso sistema</p>
            <p>No total, você tem <span>{{$qtddDenuncia}}</span>! Lembre-se que, se você receber 3 denúncias, você terá sua conta suspensa em nossa plataforma!</p>
        </div>
        <div class="cont-detalhes">
            <p>Se você discorda que recebeu uma denúncia indevidamente, por favor, responde esse email!</p>
        </div>
    </div>
</body>
</html>