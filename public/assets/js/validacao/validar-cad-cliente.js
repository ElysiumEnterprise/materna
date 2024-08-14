//Váriaveis do formulário de cadastro de cliente (Mãe)

const formCliente = document.querySelector(".form-cliente");
const nomeCliente = document.querySelector("#nomeCliente");
const emailCliente = document.querySelector("#emailCliente");
const senhaCliente = document.querySelector("#senhaCliente");
const dtCliente = document.querySelector("#dtCliente");
const telCliente = document.querySelector("#telCliente");

//Váriaveis para controle de senha
let passCaracter8Valid= false;
let passNumbValid=false;
let passCaracterSpecialValid=false;
let passUpperValid=false;

//Const para mostrar os erros no HTML atráves do span:

const errorSpanCliente= document.querySelectorAll('.errorCliente');

//Função de Validar Cadastro de Usuário Cliente

formCliente.addEventListener('submit', (event)=>{
    event.preventDefault();
    
    //Verificação de nome:
    if (nomeCliente.value==='') {
        errorSpanCliente[0].innerHTML="(Preencha esse campo)"
        nomeCliente.focus();
        return;
    }else{
        errorSpanCliente[0].innerHTML=""
    }

    if (nomeCliente.value.length<10||nomeCliente.value.length>250) {
        errorSpanCliente[0].innerHTML="(Nome inválido!)";
        nomeCliente.focus()
        return;
    }else{
        errorSpanCliente[0].innerHTML="";
    }

    //Verficação de data 
    if(dtCliente.value===''){
        errorSpanCliente[1].innerHTML='(Preencha esse campo")'
        dtCliente.focus();
        return
    }else {
        errorSpanCliente[1].innerHTML='';
    }

    if (validarData(dtCliente.valueAsDate)) {
        errorSpanCliente[1].innerHTML="";
    } else {
        errorSpanCliente[1].innerHTML="(Data inválida)";
        dtCliente.focus();
        return;
    }
    //Validação de email
    if (emailCliente.value==='') {
        errorSpanCliente[2].innerHTML="(Preencha o campo de email!)";
        emailCliente.focus();
        return;
    }else{  
        errorSpanCliente[2].innerHTML="";
    }
    if (validarEmail(emailCliente.value)) {
        errorSpanCliente[2].innerHTML="(Email inválido)";
        emailCliente.focus();
        return;
    }else{
        errorSpanCliente[2].innerHTML="";
    }

    //Verficação de telefone
    if (telCliente.value==='') {
        errorSpanCliente[3].innerHTML='(Preencha esse campo!)';
        telCliente.focus();
        return;
    } else {
        errorSpanCliente[3].innerHTML='';
    }

    if (validarTel(telCliente.value)) {
        errorSpanCliente[3].innerHTML="(Tipo de número inválido!)"
        telCliente.focus();
        return;
    } else {
        
    }
    //Verificação de Senha:
    if (!passCaracter8Valid && !passCaracterSpecialValid && !passNumbValid &&!passUpperValid) {
        errorSpanCliente[4].innerHTML="(A senha não contem os requisitos mínimos!)";
        senhaCliente.focus()
        return;
    } else {
        errorSpanCliente.innerHTML='';
    }
    
    formCliente.submit()
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

senhaCliente.addEventListener('focus', function(){
    const regrasDiv = document.querySelector('.regras-senha');
    regrasDiv.classList.add('active')
})
senhaCliente.addEventListener('blur', function(){
    const regrasDiv = document.querySelector('.regras-senha');
    regrasDiv.classList.remove('active')
})


senhaCliente.addEventListener('keyup', function(){
    

    const regra_uppercase = document.querySelector('.txt-regra-upper');
    const regra_caracter = document.querySelector('.txt-regra-caracter');
    const regra_carcter_special = document.querySelector('.txt-regra-caracter-special');
    const regra_numero = document.querySelector('.txt-regra-numb');
    //Verificar Se tem carctere maiúscula
    if (/[A-Z]/.test(senhaCliente.value)) {
        regra_uppercase.classList.add('active')
        passUpperValid=true;
    }else{
        regra_uppercase.classList.remove('active')
        passUpperValid=false;
    }
    //Verfiricar se a senha tem no mínimo 8 caracteres
    if(senhaCliente.value.length>=8){
        regra_caracter.classList.add('active')
        passCaracter8Valid=true;
    }else{
        regra_caracter.classList.remove('active');
        passCaracter8Valid=false
    }
    //Verficar se a senha tem números
    if (/[0-9]/.test(senhaCliente.value)) {
        regra_numero.classList.add('active');
        passNumbValid=true;
    }else{
        regra_numero.classList.remove('active');
        passNumbValid=false;
    }
    //Verificar se a senha tem a caracteres especiais
    if(/[^A-Za-z0-9]/.test(senhaCliente.value)){
        regra_carcter_special.classList.add('active');
        passCaracterSpecialValid=true
    }else{
        regra_carcter_special.classList.remove('active');
        passCaracterSpecialValid=false;
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