
document.querySelectorAll(".movie-list-wrapper").forEach((wrapper) => {

    const lista = wrapper.querySelector(".movie-list");
    const esquerda = wrapper.querySelector(".left-arrow");
    const direita = wrapper.querySelector(".right-arrow");

    // Quantos pixels a lista vai andar a cada clique
    const distancia = 300;

    direita.addEventListener("click", () => {
        lista.scrollBy({
            left: distancia,
            behavior: "smooth"
        });
    });

    esquerda.addEventListener("click", () => {
        lista.scrollBy({
            left: -distancia,
            behavior: "smooth"
        });
    });

});

