//Variáveis para validação dos inputs

const email = document.getElementById('email');
('confirm-senha');

const erroEmail = document.querySelector('.errorEmail');


//Formulário

const form_email = document.querySelector('.form-email');

//Variáveis buttons para execuções das ações

/*
const btn_email=document.querySelector('.envio-email');
const btn_cod=document.querySelector('.envio-cod');
const btn_confirm=document.querySelector('.confirm')
const btn_cancel=document.querySelectorAll('.btn-cancel');
*/
const btn_cancel_email=document.querySelector('.btn-cancel');
//Verificação da primeira section (envio do email)

form_email.addEventListener('submit', (event)=>{
    event.preventDefault();

    //Verificação de email
    if (email.value==='') {
        erroEmail.innerHTML='(Preencha esse campo!)'
        email.focus()
        return
    } else {
        erroEmail.innerHTML='';
    }

    if (validarEmail(email.value)) {
        erroEmail.innerHTML='(Email inválido)';
        email.focus();
        return
    }else{
        erroEmail.innerHTML='';
    }

    form_email.submit();
    
})



//Função de validação de email

function validarEmail(email) {
    //Criar uma regex para validar email
    const emailRegex = new RegExp(
        //Verificar cada elemento do email
        /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/
    )
    if (emailRegex.test(email)){
        return false;
    }else{
        return true;
    }
}



btn_cancel_email.addEventListener('clcik', function(){
    location.href="../../html"
})