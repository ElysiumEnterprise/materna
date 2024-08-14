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
    

    const regra_uppercase = document.querySelector('.txt-regra-upper');
    const regra_caracter = document.querySelector('.txt-regra-caracter');
    const regra_carcter_special = document.querySelector('.txt-regra-caracter-special');
    const regra_numero = document.querySelector('.txt-regra-numb');
    //Verificar Se tem carctere maiúscula
    if (/[A-Z]/.test(senha.value)) {
        regra_uppercase.classList.add('active')
        passUpperValid=true;
    }else{
        regra_uppercase.classList.remove('active')
        passUpperValid=false;
    }
    //Verfiricar se a senha tem no mínimo 8 caracteres
    if(senha.value.length>=8){
        regra_caracter.classList.add('active')
        passCaracter8Valid=true;
    }else{
        regra_caracter.classList.remove('active');
        passCaracter8Valid=false
    }
    //Verficar se a senha tem números
    if (/[0-9]/.test(senha.value)) {
        regra_numero.classList.add('active');
        passNumbValid=true;
    }else{
        regra_numero.classList.remove('active');
        passNumbValid=false;
    }
    //Verificar se a senha tem a caracteres especiais
    if(/[^A-Za-z0-9]/.test(senha.value)){
        regra_carcter_special.classList.add('active');
        passCaracterSpecialValid=true
    }else{
        regra_carcter_special.classList.remove('active');
        passCaracterSpecialValid=false;
    }

})