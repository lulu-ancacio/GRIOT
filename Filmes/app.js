const wrappers = document.querySelectorAll(".movie-list-wrapper");

wrappers.forEach((wrapper) => {

    const movieList = wrapper.querySelector(".movie-list");
    const leftArrow = wrapper.querySelector(".left-arrow");
    const rightArrow = wrapper.querySelector(".right-arrow");

    let currentPosition = 0;

    const itemWidth = 295;

    rightArrow.addEventListener("click", () => {

        const items = movieList.querySelectorAll(".movie-list-item");

        const totalWidth = items.length * itemWidth;
        const visibleWidth = wrapper.offsetWidth;

        const maxScroll = totalWidth - visibleWidth;

        currentPosition -= itemWidth;

        if (Math.abs(currentPosition) > maxScroll) {
            currentPosition = -maxScroll;
        }

        movieList.style.transform = `translateX(${currentPosition}px)`;
    });

    leftArrow.addEventListener("click", () => {

        currentPosition += itemWidth;

        if (currentPosition > 0) {
            currentPosition = 0;
        }

        movieList.style.transform = `translateX(${currentPosition}px)`;
    });

});