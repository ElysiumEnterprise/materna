//Função para abrir o modal com as informações da postagem

function abrirModalPostAnalise(idPostagem, urlImg) {

    console.log(idPostagem);
    const boxModalPostAnalise = document.querySelector('.box-modal-post-analise');
    const modalAnalise = document.querySelector('.modal-analise-post');
    const imgPost = document.querySelector('#img-modal-post');

    //Mudar a imagem no modal pela imagem da postagem selecionada
    imgPost.src = `/assets/img/file-posts/${urlImg}`;

    //Realização da requisição para poder gerar o gráfico de barra
    fetch(`/gerar-grafico-barras-post/${idPostagem}`).then(response=> response.json()).then(data =>{
        console.log(data);
        renderGraficoBarrasPost(data);
    }).catch(error=> console.error('Erro ao requisitar a ação: ',error));

    //Realização da requisição para poder gerar o gráfico de pizza

    fetch(`/gerar-grafico-pizza-post/${idPostagem}`).then(response=>response.json()).then(data=>{
        console.log(data);
        renderGraficoPizzaPost(data);
    }).catch(error=>console.error('Erro:',error));

    //Abrir o modal
    boxModalPostAnalise.classList.add('active');
    modalAnalise.show();
}


//Fechar o modal

function fecharModalPostAnalise() {
    const boxModalPostAnalise = document.querySelector('.box-modal-post-analise');

    boxModalPostAnalise.classList.remove('active')
    const modalAnalise = document.querySelector('.modal-analise-post');
    modalAnalise.close();
}
//Renderizar o gráfico de barras

function renderGraficoBarrasPost(data) {
    
    const graficoBarrasPost = document.querySelector('#chartPost2');

    const coresBarPost = ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', '#FFF763', '#AA7B84'];

    const dataBarPost ={
        labels:data.labels,
        datasets: data.data.map((value, index)=>({
            label: data.labels[index],
            data: data.labels.map((_,i)=>i===index ? value: 0),
            backgroundColor: coresBarPost[index],
        })),
    }

    const configBarPost = {
        type: 'bar',
        data: dataBarPost,
        options:{
            scales:{
                y:{
                    beginAtZero: true,
                }
            },
        },
    };

    const myChartBarPost = new Chart(graficoBarrasPost, configBarPost)
}

//Renderizar o gráfico de pizza

function renderGraficoPizzaPost(data) {
    console.log(data)
    const ctxPizzaPost = document.querySelector('#chartPost1');

    const dataPizzaPost = {
        labels: data.labels,
        datasets:[{
            label: 'Quantidade',
            data: data.data,
            backgroundColor:[
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
            ],
            hoverOffset: 4,
        }],
    };

    const confiPizzaPost ={
        type: 'pie',
        data: dataPizzaPost,
        options:{
            responsive : true,
            plugins:{
                legend:{
                    position:'top'
                },
            },
            animation: {
                animateRotate: true,
                animateScale: true
            }
        }
    }

    const myChartPizzaPost = new Chart(ctxPizzaPost, confiPizzaPost);
}

function abrirModalDeletar(idPostagem, urlTemplate){

    const divModalDeletar = document.querySelector('.box-modal-deletar');
    const modalDelete = document.querySelector('.modal-deletar-post')
    const formDelete = document.querySelector('.form-delete');

    modalDelete.show();

    divModalDeletar.classList.add('active');

    idPostagem = parseInt(idPostagem)

    const url = urlTemplate.replace(':idPostagem', idPostagem)

    formDelete.action = url
}

function fecharModalDeletar(){

    const divModalDeletar = document.querySelector('.box-modal-deletar');
    const modalDelete = document.querySelector('.modal-deletar-post')
    const formDelete = document.querySelector('.form-delete');

    modalDelete.close();
    divModalDeletar.classList.remove('active')
    formDelete.action = ""
}