        function scrollCarousel(direction) {
            const carousel = document.getElementById('carousel');
            const scrollAmount = 280;
            carousel.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }

        setInterval(() => scrollCarousel(1), 5000);
   