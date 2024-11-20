//Pegando as informações na view dasboard-home

const countCadMaes = parseInt(document.querySelector("#countCadMaes").getAttribute('data-countCadMaes'));

const countCadAnunciantes = parseInt(document.querySelector("#countCadAnunciantes").getAttribute('data-countCadAnunciantes'));

const ctx = document.getElementById('myChart').getContext('2d');

        const data = {
            labels:  ['Mães', 'Anunciantes'],
            datasets: [{
                label: 'Quantidade',
                data: [countCadMaes, countCadAnunciantes],
                backgroundColor: [
                    
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    
                ],
                hoverOffset: 4
            }]
        };

        const config = {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },

                },
                animation: {
                    animateRotate: true,
                    animateScale: true
                }
            }
        };

        const myChart = new Chart(ctx, config);

