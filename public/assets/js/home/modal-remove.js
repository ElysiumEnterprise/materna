const modalRemove = document.querySelector('.modal-remove');
const boxModalRemove = document.querySelector('.box-modal-remover-seguidor');
const formRemover = document.querySelector('.form-remove');

function abrirModalRemoverSeguidor(idPerfil, idPerfilAuth, urltemplate){
    modalRemove.show();

    idPerfil = parseInt(idPerfil);
    idPerfilAuth = parseInt(idPerfilAuth);

    const url = urltemplate.replace(':idUserAuth', idPerfilAuth).replace(':perfilSeguidor', idPerfil);

    formRemover.action=url;
    boxModalRemove.classList.add('active');
}

function fecharModalRemove(){
    modalRemove.close();

    formRemover.action="";

    boxModalRemove.classList.remove('active');
}
