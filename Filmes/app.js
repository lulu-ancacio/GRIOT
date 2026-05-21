const arrows = document.querySelectorAll(".arrow");
const movieLists = document.querySelectorAll(".movie-list");

arrows.forEach((arrow, i) => {
  let currentPosition = 0;
  const itemWidth = 270;
  const gap = 25;
  
  arrow.addEventListener("click", () => {
    const movieList = movieLists[i];
    const items = movieList.querySelectorAll(".movie-list-item");
    const totalWidth = items.length * (itemWidth + gap);
    const visibleWidth = movieList.clientWidth;
    const maxScroll = totalWidth - visibleWidth;
    
    currentPosition -= 300;
    
    if (Math.abs(currentPosition) > maxScroll) {
      currentPosition = 0; // Reset ao início
    }
    
    movieList.style.transform = `translateX(${currentPosition}px)`;
    movieList.style.transition = "transform 0.3s ease";
  });
});

