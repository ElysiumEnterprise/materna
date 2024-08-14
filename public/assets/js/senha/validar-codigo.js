const codigo = document.getElementById('codigo');

const form_codigo = document.querySelector('.form-codigo')

const erroCodigo = document.querySelector('.errorCodigo');

const btnCancelCodigo = document.querySelector('.btn-cancel');

form_codigo.addEventListener('submit', (event)=>{
    event.preventDefault();

    /*if (codigo.value==='') {
        erroCodigo.innerHTML="(Preencha esse campo!)"
        codigo.focus();
        return;
    }else{
        erroCodigo.innerHTML=''
    }

    if (validarCodigo(codigo.value)) {
        erroCodigo.innerHTML='(Código inválido!)';
        codigo.focus();
        return;
    }else{
        erroCodigo.innerHTML='';
    }
        */
    form_codigo.submit();
    location.href='/nova-senha';
})

btnCancelCodigo.addEventListener('click', function(){
    location.href='/senha';
})

//Função para validar código
/*
function validarCodigo(codigo) {
    //Criar uma regex para validar o código
    const codigoRegex = new RegExp(
        //Verficar cada elemento do código XXX-YYY-ZZ
        /^[0-9]{3}+-[0-9]{3}+-[0-9]{2}$/
    )
    if (codigoRegex.test(codigo)) {
        return false;
    }else{
        return true;
    }
}
    */