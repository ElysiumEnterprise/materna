// Obtém o contexto do canvas para o novo gráfico
const ctx2 = document.getElementById('myChart3').getContext('2d');

// Dados para o gráfico de rosca
const data2 = {
  labels: ['Produtos', 'Dicas', 'Campanhas', 'Outros'],
  datasets: [{
    label: 'Quantidade',
    data: [30, 15, 25, 10],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      '#fd5462',
      '#dce1eb'
    ],
    hoverOffset: 4
  }]
};

// Cria o gráfico de rosca
new Chart(ctx2, {
  type: 'doughnut', // Mudamos para 'doughnut' para criar um gráfico de rosca
  data: data2,

});