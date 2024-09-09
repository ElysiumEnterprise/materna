const div_nome_arquivo = document.querySelector('.nomeArquivo');
const file = document.querySelector('#imgPerfil');
const modal = document.querySelector('.modal-excluir');
const div_modal = document.querySelector('.cont-box-modal');

const dropAreaBanner = document.querySelector('#drag-area-banner');
const fileBanner = document.querySelector('#imgCapa');
const viewBanner = document.querySelector('.img-view-banner');

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

//Função para mostrar as imagens selecionadas pelo usuário na tela de editar perfil no banner

fileBanner.addEventListener('change', uploadImage);

function uploadImage() {

    let imgLink = URL.createObjectURL(fileBanner.files[0]);
    viewBanner.style.backgroundImage = `url(${imgLink})`;
    viewBanner.textContent='';
    dropAreaBanner.style.border = 0;
}

//Função para arastar arquivos e solta-los na area drag-area

dropAreaBanner.addEventListener('dragover', function(e){
    e.preventDefault();
})

dropAreaBanner.addEventListener('drop', function(e){
    e.preventDefault();

    fileBanner.files = e.dataTransfer.files;

    uploadImage();
})