import Echo from 'laravel-echo';

import Pusher from 'pusher-js';

window.Pusher = Pusher;

var idUsuario = document.getElementById('chatContainer').getAttribute('data-idUsuario');

var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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
        console.log('Esses são os valores' + data);
        const mensagemDiv = document.querySelector('.mensagem');
        
            mensagemDiv.innerHTML += `<div class="mensagem"><div class="message__self"><span class="message__sender">{{ $perfil->nickname }}</span><strong>teste</strong></div></div>`;
        
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
