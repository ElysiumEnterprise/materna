const modalExcluir = document.querySelector('.modal-excluir');
const div_modal = document.querySelector('.cont-box-modal');

function abrirModal() {
    modalExcluir.show();
    div_modal.classList.add('active');
}

function fecharModal() {
    modalExcluir.close();
    div_modal.classList.remove('active')
}