const carouselContainer = document.querySelector('.carousel-container');
const carouselSlides = document.querySelectorAll('.carousel-slide');

let counter = 0;
let size = carouselContainer.clientWidth; // Captura a largura do contêiner

function autoSlide() {
    counter++;
    if (counter >= carouselSlides.length) {
        counter = 0;
    }
    updateCarousel();
}

function updateCarousel() {
    carouselSlides.forEach((slide, index) => {
        slide.style.display = (index === counter) ? 'block' : 'none';
    });
    carouselContainer.style.transform = `translateX(${-size * counter}px)`;
}

setInterval(autoSlide, 3000); // Muda o slide a cada 3 segundos

// Ajusta o tamanho da imagem ao redimensionar a janela
window.addEventListener('resize', () => {
    size = carouselContainer.clientWidth; // Atualiza o tamanho ao redimensionar
    updateCarousel(); // Atualiza a exibição do carousel
});

// Inicializa o carousel na carga da página
document.addEventListener('DOMContentLoaded', () => {
    updateCarousel();
});
