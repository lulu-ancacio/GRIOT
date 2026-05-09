const trigger = document.querySelector(".menu-trigger");
const nav = document.querySelector(".nav");

trigger.addEventListener("click", () => {
  nav.classList.toggle("active");
});