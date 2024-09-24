const buttonFilterAll = document.getElementById('btn-todos');
const buttonFilterCliente = document.getElementById('btn-cliente');
const buttonFilterAnunciante = document.getElementById('btn-anunciante');

//Ação para filtrar de acordo com o botão selecionado

buttonFilterAll.addEventListener('click', ()=>{
    location.href = '/dashboard/usuarios'
});

buttonFilterCliente.addEventListener('click', ()=>{
    location.href = '/dashboard/clientes'
});

buttonFilterAnunciante.addEventListener('click', ()=>{
    location.href = '/dashboard/anunciantes'
});