(function(){



const ctx = document.getElementById('myChart2');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Quantidade de postagens'],
    datasets: [{
      borderWidth: 1,
   
    }],

    datasets: [
        {
          label: 'Mães',
          data: [27],
          backgroundColor: 'rgb(255, 99, 132)'
        },
        {
          label: 'Anunciantes',
          data: [16],
          backgroundColor: 'rgb(54, 162, 235)',
        },
        
      ]
    
  },

  

  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
})();
