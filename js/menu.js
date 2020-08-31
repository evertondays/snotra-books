let menuButton = document.querySelector('.categories-button');
let categories = document.querySelector('.categories');

let menuVisible = false;

menuButton.addEventListener('click', (event) => {
	if(menuVisible){
		menuButton.innerHTML = 'Ver categorias <i class="fas fa-chevron-down"></i>';
		categories.classList.add('invisible');
		menuVisible = false;
	} else {
		menuButton.innerHTML = 'Ocultar categorias <i class="fas fa-chevron-up"></i>';
		categories.classList.remove('invisible');
		menuVisible = true;
	}
})