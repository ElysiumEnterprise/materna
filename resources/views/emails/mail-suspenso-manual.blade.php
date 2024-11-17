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
        img{
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
            text-align: justify;
            font-size:18px;
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
    <table>
        <tr class="header">
            <td style="text-align: center;">
                <img src="cid:Logo-Materna.png" alt="logo da Materna">
            </td>
        </tr>
        <tr class="cont-titulo">
            <td><h1>Você está suspenso da Materna!!!</h1></td>
    </tr>
        <tr class="cont-desc">
            <td><p>{{$nomeUsuario}}, você está suspenso da nossa plataforma pelo seguinte motivo: {{$motivo}}</p></td>
            
    </tr>
        <tr class="cont-detalhes">
            <td><p>Se você não concorda com a suspensão de sua conta ou achar que foi indevidamente realizada, por favor, contate ao nosso email!</p></td>
    </tr>
    </table>
    
        
</body>
</html>