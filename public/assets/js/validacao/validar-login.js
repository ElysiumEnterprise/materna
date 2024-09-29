const form = document.querySelector('form');
const email = document.querySelector('#email');
const senha = document.querySelector('#senha');
const button = document.querySelector('button');
const errorEmail = document.querySelector('#erroEmail');
const errorSenha = document.querySelector('#erroSenha');

let passCaracter8Valid= false;
let passNumbValid=false;
let passCaracterSpecialValid=false;
let passUpperValid=false;

form.addEventListener("submit", (event)=>{
    event.preventDefault();

    //Validação de email
    if (email.value==='') {
        errorEmail.innerHTML="(Preencha o campo de email!)";
        email.focus();
        return;
    }else{  
        errorEmail.innerHTML="";
    }
    if (validarEmail(email.value)) {
        errorEmail.innerHTML="(Email inválido)";
        email.focus();
        return;
    }else{
        errorEmail.innerHTML="";
    }

    if (!passCaracter8Valid && !passCaracterSpecialValid && !passNumbValid &&!passUpperValid) {
        errorSenha.innerHTML="(A senha não contem os requisitos mínimos!)";
        senha.focus()
        return;
    } else {
        errorSenha.innerHTML='';
    }
    
    form.submit()
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

//Abrir div de verificar senha

senha.addEventListener('focus', function(){
    const regrasDiv = document.querySelector('.regras-senha');
    regrasDiv.classList.add('active')
})
senha.addEventListener('blur', function(){
    const regrasDiv = document.querySelector('.regras-senha');
    regrasDiv.classList.remove('active')
})

//Verificação de senha
senha.addEventListener('keyup', function(){
    
    //Verificar Se tem carctere maiúscula
    if (/[A-Z]/.test(senha.value)) {
        
        passUpperValid=true;
    }else{
       
        passUpperValid=false;
    }
    //Verfiricar se a senha tem no mínimo 8 caracteres
    if(senha.value.length>=8){
        
        passCaracter8Valid=true;
    }else{
        
        passCaracter8Valid=false
    }
    //Verficar se a senha tem números
    if (/[0-9]/.test(senha.value)) {
        
        passNumbValid=true;
    }else{
       
        passNumbValid=false;
    }
    //Verificar se a senha tem a caracteres especiais
    if(/[^A-Za-z0-9]/.test(senha.value)){
        
        passCaracterSpecialValid=true
    }else{
        
        passCaracterSpecialValid=false;
    }

})