// Pegando botões
let previousBtn = document.querySelector('#previous-btn');
let nextBtn = document.querySelector('#next-btn');
let currentBtn = document.querySelector('#current-btn');

let url = window.location.href;

let urlSplit = url.split('page=');
let urlMain = urlSplit[0];

if(url.indexOf('page=') == -1){
	previousBtn.classList.add('invisible-important');
	currentBtn.innerHTML = "1";

	if(url.indexOf('&') == -1)
	{
		nextBtn.addEventListener('click', () =>{
			window.location.href = url + "?page=1";
		})
	} else {
		urlSplit = url.split('&');
		nextBtn.addEventListener('click', () =>{
			window.location.href = urlSplit[0] + "?page=" + 1 + "&" + urlSplit[1];
		})
	}
} else {
	urlSplit = urlSplit[1];
	let currentPage = parseInt(urlSplit[0]);

	urlSplit = url.split('&');
	let urlBody = "";

	if(urlSplit.length >= 2){
		urlBody = "&" + urlSplit[1];
	}


	if(currentPage == 0){
		previousBtn.classList.add('invisible-important');
	}

	previousBtn.addEventListener('click', () =>{
		window.location.href = urlMain + "page=" + (currentPage - 1) + urlBody;
	})
	nextBtn.addEventListener('click', () =>{
		window.location.href = urlMain + "page=" + (currentPage + 1) + urlBody;
	})

	currentBtn.innerHTML = (currentPage + 1);
}