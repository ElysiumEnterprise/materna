import Echo from 'laravel-echo';

import Pusher from 'pusher-js';

window.Pusher = Pusher;

var idUsuario = document.getElementById('chatContainer').getAttribute('data-idUsuario');

var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

var idPerfilReceptor = parseInt(document.querySelector('#contIdPerfil').getAttribute('data-idPerfil'));

var idPerfilAuth = parseInt(document.querySelector('#contIdPerfilAuth').getAttribute('data-idPerfilAuth'));

var ultimoIdMensagem = parseInt(document.querySelector('#contUltimoIdMensagem').getAttribute('data-ultimoIdMensagem'));

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '040588d1490451bb55cd',
    cluster: 'sa1',
    forceTLS: true,
    namespace: false,
    auth: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }
    
});



window.Echo.connector.pusher.connection.bind('connected', () => {
    console.log('Conectado ao Pusher!');
    window.Echo.private('chat.' + parseInt(idUsuario)).listen('mensagem-enviada', (data) => {
        console.log('Estou aqui')
    });
    document.querySelector('.chat__form').addEventListener('submit', function(e){
        e.preventDefault();
    
    
        $.ajax({
            url: '/home/mensagens/enviar',
            method: 'POST',
            headers:{
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Socket-Id': Echo.socketId
            },
            data:{
                _token : csrfToken,
                txtMessage: document.getElementById('txtMessage').value,
                idPerfilReceptor: document.getElementById('idPerfilReceptor').value,
            }
        }).done(function(data){
            document.querySelector('#txtMessage').value = '';
            console.log('Mensagem enviada com sucesso:', data);
        }).fail(function(error) {
            console.error('Erro ao enviar a mensagem:', error);
        });
    });
    
    
});
setInterval(()=>{
    buscarMensagens(idPerfilReceptor)
}, 1000)

function buscarMensagens(idPerfilReceptor) {
    $.ajax({
        url: `/home/mensagens/buscar-novas/${idPerfilReceptor}?ultimoIdMensagem=${ultimoIdMensagem}`,
        method: 'GET',
        success: function(data){
            // Para evitar duplicação, armazene os IDs das mensagens já mostradas
           
                data.mensagens.forEach(mensagem =>{
                    console.log(idPerfilAuth)
                    console.log(mensagem.emissores[0].idPerfil)
                    const classePosicao = mensagem.emissores[0].idPerfil === idPerfilAuth ? 'message__self' : 'message__other';
                    const fotoPerfilPath = `/assets/img/foto-perfil/${mensagem.emissores[0].fotoPerfil}`;
                        const novaMensagem = `<div class="card-mensagem ${classePosicao}">
                                        <div class="cont-header">
                                            <p>${mensagem.emissores[0].nickname}</p>
                                        </div>
                                        <div class="cont-desc">
                                            <strong>${mensagem.conteudoMensagem}</strong>
                                            <img src="${fotoPerfilPath}" class="img-fluid3" >
                                        </div>
                                            
                                    </div>
    `;
                        
                        document.querySelector('.chat__messages_card').innerHTML +=novaMensagem; 
                        // Atualiza o último ID exibido
                         ultimoIdMensagem = Math.max(ultimoIdMensagem, mensagem.idMensagem)
                })
                
            
            
            
        },
        error: function(error) {
            console.error("Erro ao buscar novas mensagens:", error);
        }
    })
}


