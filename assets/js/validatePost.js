/**
 * 
 */

document.addEventListener("DOMContentLoaded", function() {
	 document.getElementById('send-button').addEventListener('click', captureForm, false);
  }, false);

function checkInput(content) {
	if(content == ''){
		return false;
	}
	return true;
}

function allowNumberOnly(string){
	
	var toNum = parseFloat(string);
	
	
	if(!isNaN(string)) {
		return true;
	}else{
		return false;
	}
}


function captureForm(e) {
	
	var title = document.getElementById('title').value;
	var brand = document.getElementById('brand').value;
	var model = document.getElementById('model').value;
	var color = document.getElementById('color').value;
	var km = document.getElementById('km').value;
	var hp = document.getElementById('hp').value;
	var year = document.getElementById('year').value;
	var price = document.getElementById('price').value;
	






	
	var resultTitle = checkInput(title);
	var resultBrand = checkInput(brand);
	var resultModel = checkInput(model);
	var resultColor = checkInput(color);
	var resultKm = checkInput(km);
	var resultHp = checkInput(hp);
	var resultYear = checkInput(year);
	var resultPrice = checkInput(price);


	var isNumKm = allowNumberOnly(km);
	var isNumPrice  = allowNumberOnly(price);
	var isNumYear = allowNumberOnly(year);
	var isNumHp = allowNumberOnly(hp);
	
	var data = new Date();
	var currentYear = data.getFullYear();
	
	var isValidYear = true;

	if(year > currentYear || year < 1930)
		{
		e.preventDefault();
		document.getElementById('error_year_valid').style.display = "block";
		document.getElementById('year').style.borderColor = '#DC143C';
		
		isValidYear = false;
		}

	
	if (!resultTitle){
		e.preventDefault();

		document.getElementById('error_title').style.display = "block";
		document.getElementById('title').style.borderColor = '#DC143C';

	}
	
	if (!resultBrand){
		e.preventDefault();

		document.getElementById('error_brand').style.display = "block";
		document.getElementById('brand').style.borderColor = '#DC143C';

	}
	
	if (!resultModel){
		e.preventDefault();

		document.getElementById('error_model').style.display = "block";
		document.getElementById('model').style.borderColor = '#DC143C';

	}
	
	if (!resultColor){
		e.preventDefault();

		document.getElementById('error_color').style.display = "block";
		document.getElementById('color').style.borderColor = '#DC143C';
	}
	
	if (!resultKm){
		e.preventDefault();

		document.getElementById('error_km').style.display = "block";
		document.getElementById('km').style.borderColor = '#DC143C';
	}
	
	if (!resultHp){
		e.preventDefault();

		document.getElementById('error_hp').style.display = "block";
		document.getElementById('hp').style.borderColor = '#DC143C';
	}
	
	if (!resultYear){
		e.preventDefault();

		document.getElementById('error_year').style.display = "block";
		document.getElementById('year').style.borderColor = '#DC143C';
	}
	
	if (!resultPrice){
		e.preventDefault();

		document.getElementById('error_price').style.display = "block";
		document.getElementById('price').style.borderColor = '#DC143C';
	}
	
	if(!isNumKm) {
		e.preventDefault();
		document.getElementById('error_km_num').style.display = "block";
		document.getElementById('km').style.borderColor = '#DC143C';
	}
	
	if(!isNumHp) {
		e.preventDefault();
		document.getElementById('error_hp_num').style.display = "block";
		document.getElementById('hp').style.borderColor = '#DC143C';
	}
	
	if(!isNumYear) {
		e.preventDefault();
		document.getElementById('error_year_num').style.display = "block";
		document.getElementById('year').style.borderColor = '#DC143C';
	}
	
	if(!isNumPrice) {
		e.preventDefault();
		document.getElementById('error_price_num').style.display = "block";
		document.getElementById('price').style.borderColor = '#DC143C';
	}
	
	
	if(isNumPrice && isNumYear && isNumHp &&isNumKm && resultPrice &&  resultYear &&  resultHp &&  resultKm && 
			resultBrand && resultTitle && resultModel && resultColor && isValidYear) {
		//document.getElementById('suc').style.display = "block";
		
		Ajax.request('POST', 'Controller/handleValidatePost.php', true, function (response) {
			//console.log('response   --->' + response);
			
			data = JSON.parse(response);
			
			if (response  = 'failure' ) {
				//izkarai saobshtenie
			}else{
				window.location.href = 'index.php?controller=ShowAll&action=ShowAll';
			}
			//console.log(data);	
			
		}, {title: title, brand: brand, model: model, color: color, km: km, hp: hp, year: price});
		
	}
	
	/*else {
		
		
		Ajax.request('POST', 'Controller/logIn.php', true, function (response) {
			//console.log('response   --->' + response);
			
			data = JSON.parse(response);
			
			if ( !data.validUser) {
				alert('Wrong password or username');
			}else{
				window.location.href = 'index.php?controller=base&action=showBaseView';
			}
			//console.log(data);	
			
		}, {username: username, pass: pass});
	}*/
}