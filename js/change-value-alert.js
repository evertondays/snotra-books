function changeAlert(initialValue, inputId){
	let input = document.getElementById(inputId);
	
	if(initialValue != input.value){
		input.classList.add('alert-change');
	} else {
		input.classList.remove('alert-change');
	}
}