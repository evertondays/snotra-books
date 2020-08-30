let menuButton = document.querySelector('.categories-button');
let categories = document.querySelector('.categories');

let menuViseble = false;

menuButton.addEventListener('click', (event) => {
	if(menuViseble){
		menuButton.innerHTML = 'Ver categorias';
		categories.classList.add('invisible');
		menuViseble = false;
	} else {
		menuButton.innerHTML = 'Ocultar categorias';
		categories.classList.remove('invisible');
		menuViseble = true;
	}
})