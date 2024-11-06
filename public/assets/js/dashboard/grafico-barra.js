(function(){


const countPostADD =parseInt(document.querySelector('#contPostADD').getAttribute('data-countPostADD'))

const countPostMaes = parseInt(document.querySelector('#contPostMaes').getAttribute('data-countPostMaes'))

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
          data: [countPostMaes],
          backgroundColor: 'rgb(255, 99, 132)'
        },
        {
          label: 'Anunciantes',
          data: [countPostADD],
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
