
function mostrarSenha() {
    var inputPass = document.querySelector('#senha')
    var btnShowPass = document.querySelector('.btn-show-pass')

    if(inputPass.type === 'password'){
        inputPass.setAttribute('type', 'text');
        btnShowPass.classList.replace('bi-eye-slash', 'bi-eye');
    }else{
        inputPass.setAttribute('type', 'password')
        btnShowPass.classList.replace('bi-eye', 'bi-eye-slash')
    }
}