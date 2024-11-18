//Função para abrir o modal da postagem
const formComentar = document.querySelector('.form-comentar');
const formDeletePost = document.querySelector('.form-delete-post');

let idPostagemConst;

function abrirInfoPost(idPostagem, urlImg, urlTemplateComentar){
    
    idPostagemConst = idPostagem
    const boxModalPostInfo = document.querySelector('.box-modal-post-perfil');
    const modalPostPerfil = document.querySelector('.modal-post-perfil');
    const imgPost = document.querySelector('.img-modal-post');

    //Mudar a imagem no modal pela imagem da postagem selecionada
    imgPost.src = `/assets/img/file-posts/${urlImg}`;

    const url = urlTemplateComentar.replace(':idPostagem', idPostagem);

    formComentar.action =url;

    
    
    fetch(`/mostrar-postagem/${idPostagem}`).then(response=>response.json()).then(data=>{
        renderInfoPost(data);
    }).catch(error=>{
        console.error('Erro ao pegar as informações da postagem: ', error);
    });
    //mostrar os comentários
    fetch(`/mostrar-comentarios-post/${idPostagem}`).then(response => response.json()).then(data=>{
        renderComentarios(data)
    }).catch(error=>{
        console.error('Erro ao tentar comentar na postagem: ',error);
    });
    
    boxModalPostInfo.classList.add('active');
    modalPostPerfil.show();

}
function renderComentarios(data) {
    console.log(data);

    const comentariosContainer = document.querySelector('.cont-card-comentarios');

    //Limpa os comentários antigos antes de renderizar os novos
    const existingComments = document.querySelectorAll('.comentario-item');
    existingComments.forEach(comment=>comment.remove());

    data.comentarios.forEach(comentario =>{
        //Cria a estrutura do comentário
        const comentarioElement = document.createElement('section');
        comentarioElement.classList.add('card-comentario', 'comentario-item');

        comentarioElement.innerHTML=`<div class="cont-foto-perfil">
                <img src="/assets/img/foto-perfil/${comentario.perfils.fotoPerfil}" class="img-fluid img-foto-perfil" alt="Foto do perfil">
            </div>
            <div class="cont-info-chat">
                <h6>${comentario.perfils.nickname}</h6>
                <p>${comentario.conteudo}</p>
            </div>`

        //Adiciona o comentário no container
        comentariosContainer.prepend(comentarioElement);
    });
}
formComentar.addEventListener('submit', function (e) {
    //Evitar o caregamento da página
    e.preventDefault();

    const formData = new FormData(this);

    const actionUrl = this.action; //Pegar a URL do formuçário presente
    //Enviar os dados via ajax
    fetch(actionUrl,{
        method: 'POST',
        body: formData,
        headers:{
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            
        },
    }).then(response=>response.json()).then(data=>{
        console.log(data)
        if (data.status === 'Comentário enviado') {
            //Adiciona o comentário ao modal

            renderNovosComentarios(data.comentarios);

            //Limpa o campo do formulário
            formComentar.reset();
        }else{
            console.error('Error ao envio do texto: ', data);
        }
    }).catch(error=>{
        console.error('Erro ao enviar o comentário: ', error);
    });
})
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

function fecharModalPostPerfil() {
    const boxModalPostInfo = document.querySelector('.box-modal-post-perfil');
    const modalPostPerfil = document.querySelector('.modal-post-perfil');

    boxModalPostInfo.classList.remove('active');
    modalPostPerfil.close();
}

function renderNovosComentarios(comentario) {

    const comentariosContainer = document.querySelector('.cont-card-comentarios');

    // Cria o elemento do novo comentário
    const comentarioElement = document.createElement('section');
    comentarioElement.classList.add('card-comentario', 'comentario-item');

    comentarioElement.innerHTML=`<div class="cont-foto-perfil">
                <img src="/assets/img/foto-perfil/${comentario.perfils.fotoPerfil}" class="img-fluid img-foto-perfil" alt="Foto do perfil">
            </div>
            <div class="cont-info-chat">
                <h6>${comentario.perfils.nickname}</h6>
                <p>${comentario.conteudo}</p>
            </div>`

     //Adiciona o comentário no container
    comentariosContainer.prepend(comentarioElement);
}

//Função para abrir o modal de deletagem de postagem

function abrirModalDeletePost() {
    const boxModalDeletePost = document.querySelector('.cont-box-modal-delete-post');

    const modalDeletePost = document.querySelector('.modal-excluir-post');

    boxModalDeletePost.classList.add('active')

    setActionForDeletePostForm(idPostagemConst);
    modalDeletePost.show();
}

//Função para fechar o modal de deletagem

function fecharModalDeletePost() {
    const boxModalDeletePost = document.querySelector('.cont-box-modal-delete-post');

    const modalDeletePost = document.querySelector('.modal-excluir-post');

    boxModalDeletePost.classList.remove('active')

    modalDeletePost.close();

    
}

//Function para mudar o formulário

function setActionForDeletePostForm(idPostagem) {
    const form = document.querySelector('.form-delete-post');
    if (form) {
        form.action = `/deletar-postagem/${idPostagem}`;
    } else {
        console.error('Formulário não encontrado!');
    }
}