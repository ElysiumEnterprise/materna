<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @font-face{
        font-family: "Fredoka";
        src: url("public_path('assets/fonts/Fredoka-VariableFont_wdth\,wght.ttf')");
    }

    @font-face{
        font-family: "Inter";
        src: url("public_path('assets/fonts/Inter-VariableFont_opszwght.ttf')");
    }
    body{
        display: flex;
        flex-direction: column;
        padding: 10px;
        width: 100%;
        height: 100%;
        
    }
    header{
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        height: 90px;
    }

     img{
        width: 200px;
        object-fit: contain;
    }

    .cont-desc{
        display: flex;
        width: 100%;
        height: 100%;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .cont-denuncia{
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
        padding: 10px;
    }

    .cont-titulo{
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
    }

    h1{
        font-family: 'Fredoka';
        font-weight: bold;
        color: rgb(148, 26, 26);
        text-align: center;
    }
    h2{
        font-family: 'Fredoka';
        font-weight: bold;
        text-align: center;
        color: rgb(148, 26, 26);
    }
    p{
        font-family: 'Inter';
        color: #003366;
        text-align: justify;
        font-size:18px;
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
    <title>Denúncia</title>
</head>
<body>
<table class="container">
        <tr class="header">
            <td style="text-align: center;">
                <img src="cid:Logo-Materna.png" alt="logo da Materna">
            </td>
        </tr>
        <tr>
            <td>
                <h1>Você Recebeu uma Denúncia!!!</h1>
            </td>
        </tr>
        <tr>
            <td>
                <h2>Motivo: {{$denuncia}}</h2>
            </td>
        </tr>
        <tr>
            <td>
                <p>Você recebeu essa denúncia devido ao comportamento indevido em nosso sistema.</p>
                <p>No total, você têm <span>{{$qtddDenuncia}} denúncias</span>! Lembre-se que, se você receber 3 denúncias, você terá sua conta suspensa em nossa plataforma!</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Se você discorda que recebeu uma denúncia indevidamente, por favor, responda esse e-mail!</p>
            </td>
        </tr>
    </table>
</body>
</html>