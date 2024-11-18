const formComentar = document.querySelector('.form-comentar');
function abrirModalComentarios(idPostagem, urlTemplate, urlImg) {
    const boxModalComentarios = document.querySelector('.box-modal-comentarios');
    const modalComentarios = document.querySelector('.modal-comentarios-post');
    

    const imgPost = document.querySelector('.img-post-comentario');

    imgPost.src = `/assets/img/file-posts/${urlImg}`;

    fetch(`/mostrar-comentarios-post/${idPostagem}`).then(response => response.json()).then(data=>{
        renderComentarios(data)
    }).catch(error=>{
        console.error('Erro ao tentar comentar na postagem: ',error);
    });

    const url = urlTemplate.replace(':idPostagem', idPostagem);

    formComentar.action =url;

    console.log(formComentar)

    boxModalComentarios.classList.add('active');
    modalComentarios.show();

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

function fecharModalComentarios() {
    const boxModalComentarios = document.querySelector('.box-modal-comentarios');
    const modalComentarios = document.querySelector('.modal-comentarios-post');

    boxModalComentarios.classList.remove('active');
    modalComentarios.close();
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