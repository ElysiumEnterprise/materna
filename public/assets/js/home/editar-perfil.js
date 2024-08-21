const div_nome_arquivo = document.querySelector('.nomeArquivo');
const file = document.querySelector('#imgPerfil');

file.addEventListener('change', function(event) {
    
    var file = event.target.files[0];

    if (file) {
        div_nome_arquivo.textContent="Nome do arquivo: "+ file.name
    } else {
        div_nome_arquivo.textContent="Nenhum arquivo selecionado"
    }

})