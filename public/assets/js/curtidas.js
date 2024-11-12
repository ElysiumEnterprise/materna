function curtirPost(button, postId) {
    const icon = button.querySelector('i');
    
    if (icon.classList.contains('fa-regular')) {
        icon.classList.remove('fa-regular');
        icon.classList.add('fa-solid');
        
        fetch('/salvar-curtida', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ postId: postId })
        }).then(response => {
            if (response.ok) {
                console.log('Curtida salva!');
            }
        }).catch(error => {
            console.error('Erro ao salvar a curtida:', error);
        });
    } else {
        icon.classList.remove('fa-solid');
        icon.classList.add('fa-regular');
        
        fetch('/remover-curtida', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ postId: postId })
        }).then(response => {
            if (response.ok) {
                console.log('Curtida removida!');
            }
        }).catch(error => {
            console.error('Erro ao remover a curtida:', error);
        });
    }
}
