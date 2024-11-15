//Função para abrir o modal da postagem

function abrirModalPost(idPostagem, urlImg){
    
    const boxModalPostInfo = document.querySelector('.box-modal-post-perfil');
    const modalPostPerfil = document.querySelector('.modal-post-perfil');
    const imgPost = document.querySelector('#img-modal-post');

    //Mudar a imagem no modal pela imagem da postagem selecionada
    imgPost.src = `/assets/img/file-posts/${urlImg}`;

    fetch(`/mostrar-postagem/${idPostagem}`).then(response=>response.json()).then(data=>{
        renderInfoPost(data);
    }).catch(error=>{
        console.error('Erro ao pegar as informações da postagem: ', error);
    });

    boxModalPostInfo.classList.add('active');
    modalPostPerfil.show();

}

function renderInfoPost(data) {

    const numCurtidas = document.querySelector('.num-curtidas');
    const numComentarios = document.querySelector('.num-comentarios');
    const numViews = document.querySelector('.num-views');
    const txtDesc = document.querySelector('.txtDesc');

    //const formComentar = document.querySelector('.form-comentar');

    numCurtidas.innerHTML = data.totalCurtidas;
    numComentarios.innerHTML = data.totalComentarios;
    numViews.innerHTML = data.totalViews;
    txtDesc.innerHTML = data.descPostagem;
}

function fecharModalInfoPost() {
    const boxModalPostInfo = document.querySelector('.box-modal-post-perfil');
    const modalPostPerfil = document.querySelector('.modal-post-perfil');

    boxModalPostInfo.classList.remove('active');
    modalPostPerfil.close();
}