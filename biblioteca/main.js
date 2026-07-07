function scrollCarousel(direction, carouselId) {
    const carousel = document.getElementById(carouselId);
    if (!carousel) return; // Segurança caso o ID mude
    
    const scrollAmount = 280;
    carousel.scrollBy({
        left: direction * scrollAmount,
        behavior: 'smooth'
    });
}

setInterval(() => {
    scrollCarousel(1, 'carousel-internos');
    scrollCarousel(1, 'carousel-externos');
}, 5000);