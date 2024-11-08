

//Graficos de pizza de visualizacoes

const ctx1 = document.getElementById('myChart1').getContext('2d');

const dataPizza1 ={
    labels: ['Seguidores', 'Não seguindo'],
    datasets:[{
        label: 'Quantidade',
        data:[10, 20],
        backgroundColor:[
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
        ],
        hoverOffset: 4
    }]
}

const configPizza1 ={
    type: 'pie',
    data: dataPizza1,
    option:{
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

const myChartPizza1 = new Chart(ctx1, configPizza1);

//Grafico de Linha para Renda Geral (Simulação)

const labelsLine = ['Jan', 'Fev', 'Mar','Abril', 'Maio', 'Jul', 'Jun'];
const dataLine = {
  labels: labelsLine,
  datasets: [{
    label: 'Renda Geral Gerado nos Anúncios',
    data: [65, 59, 80, 81, 56, 55, 40],
    fill: false,
    borderColor: 'rgb(255, 99, 132)',
    tension: 0.1
  }]
};

const configLine = {
    type: 'line',
    data: dataLine,
    option:{
        responsive : true,
    }
  };

const ctx2 = document.getElementById('myChart2').getContext('2d');

const myChartLine = new Chart(ctx2, configLine)

//Grafico de Barras

const ctx3 = document.getElementById('myChart3').getContext('2d')

const labelsBar = ['Curtidas', 'Visualizacões', 'Comentários', 'Seguidores'];

const dataBar = {
  labels: labelsBar,
  datasets: [{
    label: 'Quantidades',
    
    data: [65, 59, 80, 81],
    backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
    ],
    
    borderWidth: 1
  }]
};

const configBar = {
    type: 'bar',
    data: dataBar,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
};

const myChartBar = new Chart(ctx3, configBar)