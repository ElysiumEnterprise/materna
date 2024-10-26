// Obtém o elemento canvas
const canvas = document.getElementById('myChart');
const ctx = canvas.getContext('2d');


// Função para desenhar um setor do gráfico
function drawSlice(startAngle, endAngle, color) {
    ctx.beginPath();
    ctx.moveTo(canvas.width / 2, canvas.height / 2);
    ctx.arc(canvas.width / 2, canvas.height / 2, canvas.width / 2 - 10, startAngle, endAngle);
    ctx.fillStyle = color;
    ctx.fill();
}



// ... (código anterior)

// Função para desenhar um setor do gráfico e adicionar texto
function drawSlice(startAngle, endAngle, color, label, value) {
    ctx.beginPath();
    ctx.moveTo(canvas.width / 2, canvas.height / 2);
    ctx.arc(canvas.width / 2, canvas.height / 2, canvas.width / 2 - 10, startAngle, endAngle);
    ctx.fillStyle = color;
    ctx.fill();

    // Calcula o ângulo médio da fatia
    const midAngle = startAngle + (endAngle - startAngle) / 2;

    // Calcula as coordenadas x e y do centro da fatia
    const x = canvas.width / 2 + (canvas.width / 2 - 30) * Math.cos(midAngle);
    const y = canvas.height / 2 + (canvas.height / 2 - 30) * Math.sin(midAngle);

    // Desenha o texto (label e porcentagem)
    ctx.fillStyle = 'black';
    ctx.font = '12px Arial';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText(`${label} (${value}%)`, x, y);
}

// ... (resto do código)

// Dados do gráfico (label, valor e cor)
const data = [
    { label: 'Anunciantes', value: 25, color: '#FF6384' },
    { label: 'Mães', value: 47, color: '#fd5462' },
];

// Desenhando o gráfico
let startAngle = 0;
for (let i = 0; i < data.length; i++) {
    const sliceAngle = (data[i].value / 100) * Math.PI * 2;
    drawSlice(startAngle, startAngle + sliceAngle, data[i].color, data[i].label, data[i].value);
    startAngle += sliceAngle;
}


