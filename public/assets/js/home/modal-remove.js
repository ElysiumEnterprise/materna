const modalRemove = document.querySelector('.modal-remove');
const boxModalRemove = document.querySelector('.box-modal-remover-seguidor');

function abrirModalRemoverSeguidor(){
    modalRemove.show();

    boxModalRemove.classList.add('active');
}

function fecharModalRemove(){
    modalRemove.close();

    boxModalRemove.classList.remove('active');
}