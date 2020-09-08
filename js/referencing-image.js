function referencingImageShowcase(imagesRoute){
	let books = document.querySelectorAll('.book');
	const numPastes = (imagesRoute.split('/').length) - 1;

	books.forEach(book => {
		let bookImage = book.querySelector('.img-book').src;
		let split = bookImage.split('.');

		if(split[1] != 'google'){
			split =  bookImage.split('/');
			book.querySelector('.img-book').src = imagesRoute + split[3];
			book.querySelector('.background').style.backgroundImage = `url(${imagesRoute + split[3]})`;
		}
	});
}

function referencingImage(imagesRoute){
	const images = document.querySelectorAll('.book-img');
	const numPastes = (imagesRoute.split('.').length) - 1;

	images.forEach(image => {
		let imgSrc = image.src;
		let split = imgSrc.split('.');

		if(split[1] != 'google'){
			split =  imgSrc.split('/');
			console.log(split)
			image.src = imagesRoute + split[numPastes];
		}
	});
}