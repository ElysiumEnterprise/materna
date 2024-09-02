//const form_nova_senha = document.querySelector('.form-confirm-nova_senha');

const nova_senha = document.getElementById('password');
const confirm_senha = document.getElementById('confirm-senha');

const erroNovaSenha = document.querySelector('.errorSenha');

nova_senha.addEventListener('focus', function(){
    const regrasDiv = document.querySelector('.regras-senha');
    regrasDiv.classList.add('active')
})
nova_senha.addEventListener('blur', function(){
    const regrasDiv = document.querySelector('.regras-senha');
    regrasDiv.classList.remove('active')
})

//Verificação de nova_senha
nova_senha.addEventListener('keyup', function(){
    

    const regra_uppercase = document.querySelector('.txt-regra-upper');
    const regra_caracter = document.querySelector('.txt-regra-caracter');
    const regra_carcter_special = document.querySelector('.txt-regra-caracter-special');
    const regra_numero = document.querySelector('.txt-regra-numb');
    //Verificar Se tem carctere maiúscula
    if (/[A-Z]/.test(nova_senha.value)) {
        regra_uppercase.classList.add('active')
        passUpperValid=true;
    }else{
        regra_uppercase.classList.remove('active')
        passUpperValid=false;
    }
    //Verfiricar se a nova_senha tem no mínimo 8 caracteres
    if(nova_senha.value.length>=8){
        regra_caracter.classList.add('active')
        passCaracter8Valid=true;
    }else{
        regra_caracter.classList.remove('active');
        passCaracter8Valid=false
    }
    //Verficar se a nova_senha tem números
    if (/[0-9]/.test(nova_senha.value)) {
        regra_numero.classList.add('active');
        passNumbValid=true;
    }else{
        regra_numero.classList.remove('active');
        passNumbValid=false;
    }
    //Verificar se a nova_senha tem a caracteres especiais
    if(/[^A-Za-z0-9]/.test(nova_senha.value)){
        regra_carcter_special.classList.add('active');
        passCaracterSpecialValid=true
    }else{
        regra_carcter_special.classList.remove('active');
        passCaracterSpecialValid=false;
    }

})
