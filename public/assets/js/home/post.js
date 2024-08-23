
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