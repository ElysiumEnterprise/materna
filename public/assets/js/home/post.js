
const modalPost = document.querySelector('.modal-post');
const div_modalPost = document.querySelector('.box-modal-post');

function abrirModalPost(){
    modalPost.show();
    div_modalPost.classList.add('active')
}

function fecharModalPost(){
    modalPost.close();
    div_modalPost.classList.remove('active')
}