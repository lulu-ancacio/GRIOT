
let activeCarouselState = null;

function scrollCarousel(direction, carouselId) {
    const carousel = document.getElementById(carouselId);
    if (!carousel) return;

    const itemWidth = 295;
    carousel.scrollBy({
           left: direction * itemWidth,
        behavior: 'smooth'
    });
}

function startCarouselDrag(e, carousel) {
    const pageX = e.touches ? e.touches[0].pageX : e.pageX;
    activeCarouselState = {
        element: carousel,
        startX: pageX,
        scrollLeft: carousel.scrollLeft
    };
    carousel.style.scrollBehavior = 'auto'; // Remove animação durante o arraste
}

function moveCarouselDrag(e) {
    if (!activeCarouselState) return;
    const pageX = e.touches ? e.touches[0].pageX : e.pageX;
    const deltaX = pageX - activeCarouselState.startX;
    activeCarouselState.element.scrollLeft = activeCarouselState.scrollLeft - deltaX;
}

function endCarouselDrag() {
    if (!activeCarouselState) return;
    activeCarouselState.element.style.scrollBehavior = 'smooth';
    activeCarouselState = null;
}

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.movie-list-wrapper, .carousel-containeNPagos').forEach(wrapper => {
        const carousel = wrapper.querySelector('.movie-list') || wrapper.querySelector('.carousel');
        if (!carousel) return;


        carousel.addEventListener("touchstart", (e) => startCarouselDrag(e, carousel), { passive: true });
        
        carousel.addEventListener("mousedown", (e) => {
            e.preventDefault();
            startCarouselDrag(e, carousel);
        });
    });
});

window.addEventListener("touchmove", moveCarouselDrag, { passive: true });
window.addEventListener("touchend", endCarouselDrag);
window.addEventListener("mousemove", moveCarouselDrag);
window.addEventListener("mouseup", endCarouselDrag);