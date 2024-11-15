document.addEventListener('DOMContentLoaded', ()=>{
    
    const observer = new IntersectionObserver((entries)=>{
        entries.forEach((entry)=>{
            if (entry.isIntersecting) {
                const postId = entry.target.dataset.postId;

                //Verificar se a visualização já foi registrada

                if (!entry.target.dataset.visualizado) {
                    //Marca como visualizado para evitar requisições repetidas:

                    entry.target.dataset.visualizado = true;

                    //Requisição AJAX para cadastrar no banco a visualização
                    fetch(`/visualizar-post/${postId}`,{
                        method: 'POST',
                        headers:{
                            'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({}),
                    }).then((response)=>response.json()).then((data)=>{
                        console.log(data.message);
                    }).catch((error)=>{
                        console.error('Erro ao registrar a visualização:', error);
                    });
                }
            }
        });
    });

    //Observa todas as postagens:
    document.querySelectorAll('.card-post').forEach((post)=>{
        observer.observe(post);
    })
});

