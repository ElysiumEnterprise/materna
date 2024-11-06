<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suspenso - Materna</title>
    <style>
        @font-face{
            font-family: "Fredoka";
            src: url("assets/fonts/Fredoka-VariableFont_wdth\,wght.ttf");
        }

        @font-face{
            font-family: "Inter";
            src: url("assets/fonts/Inter-VariableFont_opszwght.ttf");
        }
        body{
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
            padding: 10px;
        }
        header{
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
        }
        .cont-titulo{
            display: flex;
            width: 100%;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .cont-titulo h1{
            font-family: 'Fredoka';
            font-weight: bold;
            color: rgb(148, 26, 26);
            text-align: center;
        }
        header img{
            width: 200px;
            object-fit: contain;
        }

        .cont-desc{
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;

        }
        p{
            font-family: 'Fredoka';
            font-size:18px;
            text-align: justify;
            color: #003366;
        }
        span{
        color: rgb(148, 26, 26);
        }
        .cont-detalhes{
            display: flex;
            width: 100%;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .cont-detalhes p{
            font-size: 16px;
        }
    </style>
</head>
<body>
    <header>
        <img src="cid:Logo-Materna.png" alt="Logo da Materna">
    </header>
    <main>
        <div class="cont-titulo">
            <h1>Você está suspenso da Materna!!!</h1>
        </div>
        <div class="cont-desc">
            <p>{{$nomeUsuario}}, você está suspenso da nossa plataforma devido ao acúmulo de <span>{{$qtddDenuncias}}</span> denúncias registradas em seu perfil!</p>
            <p>Assim, suspendemos sua conta para garantir por comportamento indevido em nossa plataforma!</p>
        </div>
        <div class="cont-detalhes">
            <p>Se você não concorda com a suspensão de sua conta ou achar que foi indevidamente realizada, por favor, contate ao nosso email!</p>
        </div>
    </main>
</body>
</html>