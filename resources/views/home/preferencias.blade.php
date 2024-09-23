<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>preferencias de conteudo</title>
    <!-- Link do CSS 'style-preferencias.css' -->
    <link rel="stylesheet" href="{{ asset('assets/css/style-preferencias.css') }}">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>

    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="/"><img src="{{url('assets/img/logo/Logo-Materna-Branco.png')}}" alt="Imagem logo materna" class="img-logo"></a>
            </div>
        </nav>
    </header>

   

    <div class="pre">
    <h2> Escolha opções que deseja ver no seu feed =D </h2>
    <div class="container">
        <div>
            <label>
                <input type="checkbox" name="">
                <span>Mães Solo</span>
            </label>
        </div>

        <div>
            <label>
                <input type="checkbox" name="">
                <span>Adolescência</span>
            </label>
        </div>

        <div>
            <label>
                <input type="checkbox" name="">
                <span>Entretenimento</span>
            </label>
        </div>

        <div>
            <label>
                <input type="checkbox" name="">
                <span>Receitas</span>
            </label>
        </div>

        <div>
            <label>
                <input type="checkbox" name="">
                <span>Depressão</span>
            </label>
        </div>

        <div>
            <label>
                <input type="checkbox" name="">
                <span>Alimentação</span>
            </label>
        </div>

        <div>
            <label>
                <input type="checkbox" name="">
                <span>Passeios</span>
            </label>
        </div>

        <div>
            <label>
                <input type="checkbox" name="">
                <span>bebê</span>
            </label>
        </div>

        <div>
            <label>
                <input type="checkbox" name="">
                <span>Pós Parto</span>
            </label>
        </div>

        <div>
            <label>
                <input type="checkbox" name="">
                <span>Saúde Mental</span>
            </label>
        </div>

    </div>

    <div class="cont-btn">
        <button type="submit">
            Continuar
        </button>
    
    </div>

    
  
</body>
</html>
