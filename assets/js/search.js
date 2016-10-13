/**
 * 
 */

document.addEventListener("DOMContentLoaded", function() {
	 document.getElementById('btn-search').addEventListener('click', captureForm, false);
  }, false);


function checkInput(content) {
	if(content == ''){
		return false;
	}
	return true;
}


function captureForm(e) {
	var input = document.getElementById('input-search').value;
	
	var boolResultInput = checkInput(input);
	
	if (!boolResultInput){		
		e.preventDefault();
		return false;
	}else {
		console.log('osyshtestvi searcha');
		
		Ajax.request('POST', 'Controller/search.php', true, function (response) {
			console.log('response   --->' + response);
			
			//data = JSON.stringify(response);
			data= JSON.parse(response);
			
			console.log(data);	
			
			document.getElementById('result-search').innerHTML = data;
			
		}, {input: input});
	}
}
