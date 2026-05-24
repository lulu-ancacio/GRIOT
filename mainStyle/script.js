const trigger = document.querySelector(".menu-trigger");
const menu = document.querySelector(".menu-dropdown");

trigger.addEventListener("click", () => {
    menu.classList.toggle("active");
});