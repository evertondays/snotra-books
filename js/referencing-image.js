function referencingImageShowcase(imagesRoute){
	let books = document.querySelectorAll('.book');

	books.forEach(book => {
		let bookImage = book.querySelector('.img-book').src;
		let split = bookImage.split('.');

		console.log(split)

		if(split[1] != 'google'){
			split =  bookImage.split('/');
			book.querySelector('.img-book').src = imagesRoute + split[3];
			book.querySelector('.background').style.backgroundImage = `url(${imagesRoute + split[3]})`;
		}
	});
}