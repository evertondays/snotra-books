let values = document.querySelectorAll('.value');
let total = 0;

values.forEach(value => {
	innerValue = value.innerHTML;
	let moneyValue = innerValue.split(' ');
	let money = parseFloat(moneyValue[1].replace(',','.')); 
	total += money;
})

if((total) % 1 == 0){
	total = total + '.00';
}

total = total.toString();
total = total.replace('.',',');

let resultValueField = document.querySelector('.result-value');
resultValueField.innerHTML = "Total: R$ " + total + resultValueField.innerHTML;