//Função para buscar novas mensagens
const idPerfil = parseInt(document.querySelector('#contIdPerfil').getAttribute('data-idPerfil'))

function buscarNovasMensagens(){
    $.ajax({
        url: '/home/mensagens/buscar-novas',
        method: 'GET',
        success: function (data) {
            atualizarMensagens(data)
        },
        error: function(error){
            console.error('Erro ao buscar novas mensagens: ', error)
        }
    })
}
//Função para atualizar mensagens na view
function atualizarMensagens(data) {
    const mensagemCard = document.querySelector('.chat__messages');
    if (mensagemCard) {
        data.forEach(mensagem => {
            mensagemCard.innerHTML += `<div class="mensagem-card"><div class="message__self"><span class="message__sender">{{ $perfil->nickname }}</span><strong>${mensagem.conteudoMensagem}</strong></div></div>`
        })
    }
}

//Tempo de reload
setInterval(buscarNovasMensagens, 4000);