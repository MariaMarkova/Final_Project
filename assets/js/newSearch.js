/**
 * 
 */

document.addEventListener("DOMContentLoaded", function() {
	 document.getElementById('f').addEventListener('click', captureForm, false);
  }, false);


function checkInput(content) {
	if(content == ''){
		return false;
	}
	return true;
}


function captureForm(e) {
	var brand = document.getElementById('brand').value;
	var model = document.getElementById('model').value;
	var color = document.getElementById('color').value;
	var km = document.getElementById('km').value;
	var kmTo = document.getElementById('kmTo').value;
	var hp = document.getElementById('hp').value;
	var hpTo = document.getElementById('hpTo').value;
	var year = document.getElementById('year').value;
	var yearTo = document.getElementById('yearTo').value;
	var price = document.getElementById('price').value;
	var priceTo = document.getElementById('priceTo').value;
	
	var boolResultBrand = checkInput(brand);
	var boolResultModel = checkInput(model);
	var boolResultColor = checkInput(color);
	var boolResultKm = checkInput(km);
	var boolResultkmTo = checkInput(kmTo);
	var boolResultHp = checkInput(hp);
	var boolResultHpTo = checkInput(hpTo);
	var boolResultYear = checkInput(year);
	var boolResultYearTo = checkInput(yearTo);
	var boolResultPrice = checkInput(price);
	var boolResultPriceTo = checkInput(priceTo);
	
	if (!boolResultBrand || !boolResultColor || !boolResultModel 
			|| !boolResultKm || !boolResultKmTo 
			|| !boolResultHp || !boolResultHpTo
			|| !boolResultYear || !boolResultYearTo
			|| !boolResultPrice || !boolResultPriceTo){		
		e.preventDefault();
		return false;
	}else {
		console.log('osyshtestvi searcha');
		
		Ajax.request('POST', 'Controller/newSearch.php', true, function (response) {
			console.log('response   --->' + response);
			
			//data = JSON.stringify(response);
			data= JSON.parse(response);
			
			console.log(data);	
			
			document.getElementById('result-search').innerHTML = data;
			
		}, {brand: brand,
				model: model, 
				color: color,
				km: km,
				kmTo: kmTo,
				hp: hp,
				hpTo: hpTo,
				year: year,
				yearTo: yearTo,
				price: price, 
				priceTo: priceTo});
	}
}