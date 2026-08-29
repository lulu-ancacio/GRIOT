document.querySelectorAll(".movie-list-wrapper").forEach((wrapper) => {
    const movieList = wrapper.querySelector(".movie-list");
    const leftArrow = wrapper.querySelector(".left-arrow");
    const rightArrow = wrapper.querySelector(".right-arrow");
    const itemWidth = 295;
    let isDragging = false;
    let startX = 0;
    let scrollLeft = 0;
    rightArrow?.addEventListener("click", () => {
        movieList.scrollBy({ left: itemWidth, behavior: "smooth" });
    });

    leftArrow?.addEventListener("click", () => {
        movieList.scrollBy({ left: -itemWidth, behavior: "smooth" });
    });

    const startDrag = (pageX) => {
        isDragging = true;
        startX = pageX;
        scrollLeft = movieList.scrollLeft;
        movieList.style.scrollBehavior = "auto"; 
    };


    const moveDrag = (pageX) => {
        if (!isDragging) return;
        const deltaX = pageX - startX;
        movieList.scrollLeft = scrollLeft - deltaX; 
    };

  
    const endDrag = () => {
        if (!isDragging) return;
        isDragging = false;
        movieList.style.scrollBehavior = "smooth";
    };

   
    movieList.addEventListener("touchstart", (e) => startDrag(e.touches[0].pageX), { passive: true });
    window.addEventListener("touchmove", (e) => moveDrag(e.touches[0].pageX), { passive: true });
    window.addEventListener("touchend", endDrag);
    movieList.addEventListener("mousedown", (e) => {
        e.preventDefault();
        startDrag(e.pageX);
    });
    window.addEventListener("mousemove", (e) => moveDrag(e.pageX));
    window.addEventListener("mouseup", endDrag);
});