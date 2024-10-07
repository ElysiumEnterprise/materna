<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{url('assets/css/style-criacao-perfil.css')}}">
    <title>Materna - Criação de Perfil</title>
</head>
<body>
   
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="/"><img src="{{url('assets/img/logo/Logo-Materna-Branco.png')}}" alt="Imagem logo materna" class="img-logo"></a>
            </div>
        </nav>
    </header>
    
    <div class="container-fluid">
        <div class="cont-titulo">
            <h1>Crie seu Perfil</h1>
            <p>Crie um perfil mostrando como você é!</p>
        </div>
       <div class="cont-form">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="cont-img-perfil">
                <label for="imgPerfil">
                    <img src="{{url('assets/img/foto-perfil/user-icon-default.png')}}" class="img-fluid img-perfil" alt="Foto de perfil">
                </label>
                <label for="imgPerfil" class="btn-mudar-img">Inserir Foto de Perfil</label>
                
                <input type="file" name="imgPerfil" id="imgPerfil" hidden accept="image/*">
            </div>
            <div class="input-group">
                <label for="nickname">Nome de Usuário</label>
                <input type="text" name="nickname" id="nickname" placeholder="Digite seu nome de usuário">
            </div>
            <div class="input-group">
                <label for="imgCapa">Adicionar Capa de Perfil</label>
                <label for="imgCapa" id='drag-area-banner'>
                    <input type="file" name="imgCapa" id="imgCapa" hidden accept="image/*">
                    <div class="img-view-banner">
                        <div class="icon">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </div>
                        <h5>Arraste e solte aqui sua imagem ou clique aqui</h5>
                    </div>
                </label>
            </div>
            <div class="input-group">
                <label for="biography">Biografia</label>
               <textarea name="biography" id="biography" placeholder="Conte sobre você para outars pessoas!"></textarea>
            </div>
            <div class="cont-btn">
                <input type="submit" value="Criar Perfil">
            </div>
        </form>
       </div>
    </div>
    <script src="{{url('assets/js/cadastro/cadastro-perfil.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>