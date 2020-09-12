let navToggle = document.querySelector('.navigation__btn');
let nav = document.querySelector('.navigation__nav');

if (navToggle) {
	navToggle.addEventListener('click', () => {
		nav.classList.toggle('show');
	});
}