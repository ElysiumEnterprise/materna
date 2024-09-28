<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferências de Conteúdo</title>
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
    <h2>Escolha 1 opção do que deseja ver no seu feed =D</h2>
    <form action="{{ route('salvar.preferencias') }}" method="POST">
        @csrf
        <div class="container">
            <div>
                <label>
                    <input type="checkbox" name="preferencias[]" value="maes_solo">
                    <span>Mães Solo</span>
                </label>
            </div>

            <div>
                <label>
                    <input type="checkbox" name="preferencias[]" value="adolescencia">
                    <span>Adolescência</span>
                </label>
            </div>

            <div>
                <label>
                    <input type="checkbox" name="preferencias[]" value="entretenimento">
                    <span>Entretenimento</span>
                </label>
            </div>

            <div>
                <label>
                    <input type="checkbox" name="preferencias[]" value="receitas">
                    <span>Receitas</span>
                </label>
            </div>

            <div>
                <label>
                    <input type="checkbox" name="preferencias[]" value="depressao">
                    <span>Depressão</span>
                </label>
            </div>

            <div>
                <label>
                    <input type="checkbox" name="preferencias[]" value="alimentacao">
                    <span>Alimentação</span>
                </label>
            </div>

            <div>
                <label>
                    <input type="checkbox" name="preferencias[]" value="passeios">
                    <span>Passeios</span>
                </label>
            </div>

            <div>
                <label>
                    <input type="checkbox" name="preferencias[]" value="bebe">
                    <span>Bebê</span>
                </label>
            </div>

            <div>
                <label>
                    <input type="checkbox" name="preferencias[]" value="pos_parto">
                    <span>Pós Parto</span>
                </label>
            </div>

            <div>
                <label>
                    <input type="checkbox" name="preferencias[]" value="saude_mental">
                    <span>Saúde Mental</span>
                </label>
            </div>
        </div>

        <div class="cont-btn">
            <button type="submit">Continuar</button>
        </div>
    </form>
</div>
</body>
</html>
