const div_nome_arquivo = document.querySelector('.nomeArquivo');
const file = document.querySelector('#imgPerfil');
const modal = document.querySelector('.modal-excluir');
const div_modal = document.querySelector('.cont-box-modal');

const imgPerfil = document.querySelector('.pefil-logo');

file.addEventListener('change', function(event) {
    
    var file = event.target.files[0];
    let linkImg = URL.createObjectURL(file);

    if (file) {
        div_nome_arquivo.textContent="Nome do arquivo: "+ file.name

        imgPerfil.src= linkImg;

    } else {
        div_nome_arquivo.textContent="Nenhum arquivo selecionado";

        imgPerfil.src = '{{asset("assets/img/foto-perfil/".$perfil->fotoPerfil)}}';
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