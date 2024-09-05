const carouselSlide = document.querySelector('.carousel-slide');
const images = document.querySelectorAll('.carousel-slide img');

let counter = 0;
const size = images[0].clientWidth;

function autoSlide() {
    counter++;
    if (counter >= images.length) {
        counter = 0;
    }
    carouselSlide.style.transform = `translateX(${-size * counter}px)`;
}

setInterval(autoSlide, 4600); // Muda o slide a cada 3 segundos

// Ajusta o tamanho da imagem ao redimensionar a janela
window.addEventListener('resize', () => {
    carouselSlide.style.transition = 'none'; // Remove a transição durante o redimensionamento
    carouselSlide.style.transform = `translateX(${-size * counter}px)`;
    setTimeout(() => {
        carouselSlide.style.transition = 'transform 0.4s ease-in-out'; // Restaura a transição
    }, 0);
});

