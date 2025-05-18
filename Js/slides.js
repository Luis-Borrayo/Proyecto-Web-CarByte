let index = 0;
const slides = document.querySelector('.slides');
const totalSlides = slides.querySelectorAll('img').length;

function MostrarSlide(i) {
    index = (i + totalSlides) % totalSlides;
    slides.style.transform = `translateX(-${index * 100}%)`;
}

function MoverSlide(n) {
    MostrarSlide(index + n);
}

setInterval(() => MoverSlide(1), 4000);

// Inicializa el carrusel al cargar
MostrarSlide(index);
