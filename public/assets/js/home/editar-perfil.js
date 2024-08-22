const div_nome_arquivo = document.querySelector('.nomeArquivo');
const file = document.querySelector('#imgPerfil');
const modal = document.querySelector('.modal-excluir');
const div_modal = document.querySelector('.cont-box-modal');

file.addEventListener('change', function(event) {
    
    var file = event.target.files[0];

    if (file) {
        div_nome_arquivo.textContent="Nome do arquivo: "+ file.name
    } else {
        div_nome_arquivo.textContent="Nenhum arquivo selecionado"
    }

})

function abrirModal(){
    modal.show();
    div_modal.classList.add('active')
}

function fecharModal(){
    modal.close();
    div_modal.classList.remove('active')
}