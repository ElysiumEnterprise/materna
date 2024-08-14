//Váriaveis do formulário de cadastro de cliente (Mãe)

const formAnunciante = document.querySelector(".form-anunciante");
const nomeAnunciante = document.querySelector("#nomeAnunciante");
const emailAnunciante = document.querySelector("#emailAnunciante");
const senhaAnunciante = document.querySelector("#senhaAnunciante");
const dtAnunciante = document.querySelector("#dtAnunciante");
const telAnunciante = document.querySelector("#telAnunciante");
const cnpjAnunciante = document.querySelector("#cnpjAnunciante");

//Váriaveis para controle de senha
let passCaracter8ValidAnunciante= false;
let passNumbValidAnuciante=false;
let passCaracterSpecialValidAnunciante=false;
let passUpperValidAnunciante=false;

//Const para mostrar os erros no HTML atráves do span:

const errorSpanAnunciante= document.querySelectorAll('.errorCliente');

//Função de Validar Cadastro de Usuário Cliente

formAnunciante.addEventListener('submit', (event)=>{
    event.preventDefault();
    alert('estou aqui')
    //Verificação de nome:
    if (nomeAnunciante.value==='') {
        errorSpanAnunciante[0].innerHTML="(Preencha esse campo)"
        nomeAnunciante.focus();
        return;
    }else{
        errorSpanAnunciante[0].innerHTML=""
    }

    if (nomeAnunciante.value.length<10||nomeAnunciante.value.length>250) {
        errorSpanAnunciante[0].innerHTML="(Nome inválido!)";
        nomeAnunciante.focus()
        return;
    }else{
        errorSpanAnunciante[0].innerHTML="";
    }

    //Verficação de data 
    if(dtAnunciante.value===''){
        errorSpanAnunciante[1].innerHTML='(Preencha esse campo")'
        dtAnunciante.focus();
        return
    }else {
        errorSpanAnunciante[1].innerHTML='';
    }

    if (validarData(dtAnunciante.valueAsDate)) {
        errorSpanAnunciante[1].innerHTML="";
    } else {
        errorSpanAnunciante[1].innerHTML="(Data inválida)";
        dtAnunciante.focus();
        return;
    }
    //Validação de email
    if (emailAnunciante.value==='') {
        errorSpanAnunciante[2].innerHTML="(Preencha o campo de email!)";
        emailAnunciante.focus();
        return;
    }else{  
        errorSpanAnunciante[2].innerHTML="";
    }
    if (validarEmail(emailAnunciante.value)) {
        errorSpanAnunciante[2].innerHTML="(Email inválido)";
        emailAnunciante.focus();
        return;
    }else{
        errorSpanAnunciante[2].innerHTML="";
    }

    //Verficação de telefone
    if (telAnunciante.value==='') {
        errorSpanAnunciante[3].innerHTML='(Preencha esse campo!)';
        telAnunciante.focus();
        return;
    } else {
        errorSpanAnunciante[3].innerHTML='';
    }

    if (validarTel(telAnunciante.value)) {
        errorSpanAnunciante[3].innerHTML="(Tipo de número inválido!)"
        telAnunciante.focus();
        return;
    } else {
        
    }
    //Verificação de Senha:
    if (!passCaracter8ValidAnunciante && !passCaracterSpecialValidAnunciante && !passNumbValidAnuciante &&!passUpperValidAnunciante) {
        errorSpanAnunciante[4].innerHTML="(A senha não contem os requisitos mínimos!)";
        senhaAnunciante.focus()
        return;
    } else {
        errorSpanAnunciante.innerHTML='';
    }
    
    formAnunciante.submit()
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

//Função de verificar o tel

function validarTel(tel) {
    const telRegex = new RegExp(
        //Verificar pelo padrão (DDD) XXXXX-YYYY
        /^\(\d{2}\)\d{4,5}-\d{4}$/
    )
    if (telRegex.test(tel)) {
        return false;
    } else {
        return true;
    }
}

//Abrir div de verificar senha

senhaAnunciante.addEventListener('focus', function(){
    const regrasDiv = document.querySelector('.regras-senha');
    regrasDiv.classList.add('active')
})
senhaAnunciante.addEventListener('blur', function(){
    const regrasDiv = document.querySelector('.regras-senha');
    regrasDiv.classList.remove('active')
})


senhaAnunciante.addEventListener('keyup', function(){
    

    const regra_uppercase = document.querySelector('.txt-regra-upper');
    const regra_caracter = document.querySelector('.txt-regra-caracter');
    const regra_carcter_special = document.querySelector('.txt-regra-caracter-special');
    const regra_numero = document.querySelector('.txt-regra-numb');
    //Verificar Se tem carctere maiúscula
    if (/[A-Z]/.test(senhaAnunciante.value)) {
        regra_uppercase.classList.add('active')
        passUpperValidAnunciante=true;
    }else{
        regra_uppercase.classList.remove('active')
        passUpperValidAnunciante=false;
    }
    //Verfiricar se a senha tem no mínimo 8 caracteres
    if(senhaAnunciante.value.length>=8){
        regra_caracter.classList.add('active')
        Anunciante=true;
    }else{
        regra_caracter.classList.remove('active');
        Anunciante=false
    }
    //Verficar se a senha tem números
    if (/[0-9]/.test(senhaAnunciante.value)) {
        regra_numero.classList.add('active');
        passNumbValidAnuciante=true;
    }else{
        regra_numero.classList.remove('active');
        passNumbValidAnuciante=false;
    }
    //Verificar se a senha tem a caracteres especiais
    if(/[^A-Za-z0-9]/.test(senhaCliente.value)){
        regra_carcter_special.classList.add('active');
        passCaracterSpecialValidAnunciante=true
    }else{
        regra_carcter_special.classList.remove('active');
        passCaracterSpecialValidAnunciante=false;
    }

})

function validarData(dataNasc) {

    //Váriaveis para pegar a data atual da máquina para verificação do input de data
    const date = new Date()

    const diaAtual = date.getUTCDay()
    const mesAtual = date.getUTCMonth() +1;
    const anoAtual = date.getUTCFullYear();

    //Variáveis para pegar separadamente o dia, mês e ano de aniversário
    const diaNasc = dataNasc.getUTCDay();
    const mesNasc = dataNasc.getUTCMonth() +1;
    const anoNasc = dataNasc.getUTCFullYear();

    //Verficação se a data de nascimento é superior que a data atual

    if (diaNasc>=diaAtual && mesNasc>=mesAtual && anoNasc>=anoAtual) {
        return false
    }else {
        return true
    }
}