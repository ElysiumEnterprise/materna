function abrirModalAceitarDenuncia(idDenuncia, urlTemplate) {
    const boxModalAceitarDenuncia = document.querySelector('.box-modal-aceitar-denuncia');

    const modalAceitarDenuncia = document.querySelector('.modal-aceitar-denuncia');

    const formAceitar = document.querySelector('.form-aceitar');

    const url = urlTemplate.replace(':idDenuncia', idDenuncia);

    formAceitar.action = url;

    boxModalAceitarDenuncia.classList.add('active');
    modalAceitarDenuncia.show();
}

function fecharModalAceitarDenuncia() {
    const boxModalAceitarDenuncia = document.querySelector('.box-modal-aceitar-denuncia');

    const modalAceitarDenuncia = document.querySelector('.modal-aceitar-denuncia');

    boxModalAceitarDenuncia.classList.remove('active');
    modalAceitarDenuncia.close();
}

function abrirModalRecusarDenuncia(idDenuncia, urlTemplate) {
    const boxModalRecusarDenuncia = document.querySelector('.box-modal-recusar-denuncia');

    const modalRecusarDenuncia = document.querySelector('.modal-recusar-denuncia');

    const formRecusar = document.querySelector('.form-recusar');

    const url = urlTemplate.replace(':idDenuncia', idDenuncia);

    formRecusar.action = url;

    boxModalRecusarDenuncia.classList.add('active');
    modalRecusarDenuncia.show();
}

function fecharModalRecusarDenuncia() {

    const boxModalRecusarDenuncia = document.querySelector('.box-modal-recusar-denuncia');

    const modalRecusarDenuncia = document.querySelector('.modal-recusar-denuncia');

    boxModalRecusarDenuncia.classList.remove('active');

    modalRecusarDenuncia.close();

}