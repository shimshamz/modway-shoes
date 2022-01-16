const navToggle = document.querySelector(".navigation__btn");
const nav = document.querySelector(".navigation__nav");

if (navToggle) {
  navToggle.addEventListener("click", () => {
    nav.classList.toggle('show');
  });
}
