

//Graficos de pizza de visualizacoes

const ctx1 = document.getElementById('myChart1').getContext('2d');
const ctx2 = document.getElementById('myChart2').getContext('2d');
const ctx3 = document.getElementById('myChart3').getContext('2d')
//Função para atualizar o gráfico de pizza

function atualizarGraficoPizza(){
  fetch('/get-count-views').then(response=> response.json()).then(data =>{
    const dataPizza1 ={
      labels: data.labels,
      datasets:[{
          label: 'Quantidade',
          data:data.data,
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
    // Cria o gráfico
    const myChartPizza1 = new Chart(ctx1, configPizza1);

  }).catch(error=> console.error('Erro ao carregar dados do gráfico: ', error))
}

function atualizarGraficoBarras() {
  fetch('/get-data-geral-perfil-add').then(response=>response.json()).then(data=>{
    const cores = ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', '#FFF763', '#AA7B84'];

    const dataBar = {
      labels: data.labels,
      datasets: data.data.map((value, index)=>({
        label: data.labels[index],  // Define o valor na posição correta, e 0 nas outras posições
        data: data.labels.map((_, i)=> i=== index ? value:0),
        backgroundColor:cores[index]
      })),
     
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
  }).catch(error => console.log('Erro ao colocar os dados no gráfico: ', error))
}

atualizarGraficoPizza();
atualizarGraficoBarras();

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



const myChartLine = new Chart(ctx2, configLine)

//Grafico de Barras


