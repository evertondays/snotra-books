const key = returnApikey();
const url = 'https://www.googleapis.com/books/v1/volumes?q=';

const inputSearch = document.querySelector('#search-book-api');
const books = document.querySelector('.books');

inputSearch.addEventListener('change', (event) => {
	let busca = encodeURIComponent(event.target.value);
	const query = url + busca + key;
	console.log(query)
	books.innerHTML = "";

	axios.get(query)
		.then(function (response) {
			const items = response.data.items;
			
			let index = 0;
			

			items.map((item) =>{
				generateDiv(item, index);
				index++;
			})
		})
		.catch(function (error) {
			console.log(error);
		})
})

function generateDiv(item, index){
	let book = document.createElement('div');
	book.classList.add('book');
	let infos = document.createElement('div');
	infos.classList.add('infos');

	let divImage = document.createElement('div');
	divImage.classList.add('image-div');
	let img = document.createElement('img');
	img.classList.add('img-livro');
	img.src = item.volumeInfo?.imageLinks?.thumbnail;
	divImage.appendChild(img);
	book.appendChild(divImage);

	let h1 = document.createElement('h1');
	h1.innerHTML = item.volumeInfo.title;
	infos.appendChild(h1);

	// Autores
	const authors = item.volumeInfo.authors;
	let h2 = document.createElement('h2');
	
	for (let i = 0; i < authors.length; i++){
		if (i >= 1 && i != (authors.length - 1)){
			h2.innerHTML += ", ";
		}

		if (i == (authors.length - 1) && i != 0){
			h2.innerHTML += " e ";
		}

		h2.innerHTML += item.volumeInfo.authors[i];
	}
	infos.appendChild(h2);
	// Fim autores

	let description = document.createElement('div');
	description.classList.add('description')
	description.innerHTML = item.volumeInfo.description;
	infos.appendChild(description);

	// Data
	let dateDiv = document.createElement('div');
	dateDiv.classList.add('date');

	if (typeof item.volumeInfo.publishedDate !== "undefined") {

		let publishedDate = item.volumeInfo.publishedDate;
		let dateText = publishedDate.split('-');
		dateDiv.innerHTML = dateText[0];	
	} else {
		dateDiv.innerHTML = "sem data";
	}
	infos.appendChild(dateDiv);
	// Fim data

	let divButton = document.createElement('div');
	divButton.classList.add('button-div');
	let button = document.createElement('button');
	button.classList.add('pre-register');
	button.setAttribute('onclick', `return showRegisterDivByAPI('book-${index}')`);
	button.innerHTML = "Cadastrar";
	divButton.appendChild(button);
	infos.appendChild(divButton);

	book.setAttribute('id', `book-${index}`);

	book.appendChild(infos);
	books.appendChild(book);
}