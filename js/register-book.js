const registerWrapper = document.querySelector('.register-wrapper');

document.querySelector('.exit-button').addEventListener('click', () => {
	registerWrapper.style.display = 'none';
})

function showRegisterDivByAPI(callerId){
	let bookDiv = document.getElementById(callerId);

	// API Values
	let image = document.querySelector(`#${callerId} .img-livro`).src;
	let title = document.querySelector(`#${callerId} .infos h1`).innerHTML;
	let authors = document.querySelector(`#${callerId} .infos h2`).innerHTML;
	let description = document.querySelector(`#${callerId} .infos .description`).innerHTML;
	let date = document.querySelector(`#${callerId} .infos .date`).innerHTML;

	document.querySelector('#input-title').value = title;
	document.querySelector('#input-authors').value = authors;
	document.querySelector('#input-description').value = description;
	document.querySelector('#input-date').value = date;

	registerWrapper.style.display = 'grid';
}