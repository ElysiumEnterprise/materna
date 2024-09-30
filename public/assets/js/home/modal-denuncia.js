const btnModalDenuncia = document.querySelector('.modal-denuncia');

function abrirModalDenuncia(){
    btnModalDenuncia.show();
    div_modalPost.classList.add('active')
  }

  function fecharModalDenuncia(){
    btnModalDenuncia.close();
    div_modalPost.classList.remove('active')
  }