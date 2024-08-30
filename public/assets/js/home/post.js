//Variável para pegar a imagem do usuário;

const dropArea = document.querySelector('#drag-area');
const fileImg = document.querySelector('#imgArquivo');
const imgView = document.querySelector('.img-view');

const modalPost = document.querySelector('.modal-post');
const div_modalPost = document.querySelector('.box-modal-post');

//const label_check = document.querySelectorAll('.label-checkbox');
const categorias_selecionadas = document.querySelectorAll('input[type="checkbox"]');

categorias_selecionadas.forEach(checkbox=>{

    const label = document.querySelector(`label[for="{$checkbox.id}"]`);

    checkbox.addEventListener('change', function(){
        //Se a checkbox estiver marcado, sua respectiva label irá mudar
        if (checkbox.checked) {
            label.classList.add('label-active')
        }else{
            label.classList.remove('label-active')
        }
    })
})


function abrirModalPost(){
    modalPost.show();
    div_modalPost.classList.add('active')
}

function fecharModalPost(){
    modalPost.close();
    div_modalPost.classList.remove('active')
}

//Função para mostrar as imagens selecionadas pelo usuário na tela de cadastro de postagem

fileImg.addEventListener('change', uploadImage);

function uploadImage() {

    let imgLink = URL.createObjectURL(fileImg.files[0]);
    imgView.style.backgroundImage = `url(${imgLink})`;
    imgView.textContent='';
    dropArea.style.border = 0;
}

//Função para arastar arquivos e solta-los na area drag-area

dropArea.addEventListener('dragover', function(e){
    e.preventDefault();
})

dropArea.addEventListener('drop', function(e){
    e.preventDefault();

    fileImg.files = e.dataTransfer.files;

    uploadImage();
})