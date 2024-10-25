const modalDelete = document.querySelector('.modal-deletar-user');
const divModalDeletar = document.querySelector('.box-modal-deletar');

const modalSuspender = document.querySelector('.modal-suspender');
const divModalSuspender = document.querySelector('.box-modal-suspender');

const modalAtivar = document.querySelector('.modal-ativar');
const divModalAtivar = document.querySelector('.box-modal-ativar');

const linkAtivar = document.querySelector('.action-ativar');

const formDelete = document.querySelector('.form-delete');

const formSuspender = document.querySelector('.form-suspender')

function abrirModalAtivar(idUsuario, urlTemplate){

    modalAtivar.show();
    divModalAtivar.classList.add('active');

    idUsuario = parseInt(idUsuario)

    const url = urlTemplate.replace(':idUsuario', idUsuario);

    linkAtivar.href= url

}

function fecharModalAtivar(){
    modalAtivar.close();
    divModalAtivar.classList.remove('active');
    linkAtivar=""
}

function abrirModalDeletar(idUsuario, urlTemplate){

    modalDelete.show();

    divModalDeletar.classList.add('active');

    idUsuario = parseInt(idUsuario)

    const url = urlTemplate.replace(':idUsuario', idUsuario)

    formDelete.action = url
}

function fecharModalDeletar(){
    modalDelete.close();
    divModalAtivar.classList.remove('active')
    formDelete.action = ""
}

function abrirModalSuspender(idUsuario, urlTemplate){

    modalSuspender.show();

    divModalSuspender.classList.add('active');

    idUsuario = parseInt(idUsuario);

    const url = urlTemplate.replace(':idUsuario', idUsuario)

    formSuspender.action = url

}

function fecharModalSuspender(){

    modalSuspender.show();

    divModalSuspender.classList.remove('active');

    formSuspender.action = '';
}