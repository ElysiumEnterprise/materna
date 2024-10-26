// Obtém o elemento canvas
const canvas = document.getElementById('myChart');
const ctx = canvas.getContext('2d');

// Dados do gráfico (label, valor)
const data = [
    { label: 'Categoria A', value: 30 },
    { label: 'Categoria B', value: 50 },
    { label: 'Categoria C', value: 20 }
];

// Dimensões do gráfico
const barWidth = 40;
const barSpacing = 10;
const padding = 50;

// Função para desenhar uma barra
function drawBar(x, y, width, height, color, label, value) {
    ctx.fillStyle = color;
    ctx.fillRect(x, y, width, height);

    // Desenha o texto (label e porcentagem)
    ctx.fillStyle = 'black';
    ctx.font = '12px Arial';
    ctx.textAlign = 'center';
    ctx.fillText(`${label} (${value}%)`, x + width / 2, y - 10);
}

// Desenhando o gráfico
const maxBarHeight = canvas.height - padding * 2;
const maxValue = Math.max(...data.map(item => item.value));
const barHeightScale = maxBarHeight / maxValue;

let x = padding;
for (let i = 0; i < data.length; i++) {
    const barHeight = data[i].value * barHeightScale;
    const y = canvas.height - padding - barHeight;
    drawBar(x, y, barWidth, barHeight, 'blue', data[i].label, data[i].value);
    x += barWidth + barSpacing;
}