// Show Modal Inscription
function showModalProfile(){
	$('#modalProfile').modal('show');
}

// Show Modal Event
function showModalEvent(request){
        //alert(request);
	switch(request) {
		case "run": 
		case "art": 
		case "party": 
		case "eat": 
		    var mode = "img";
		    break; 

		default:
		    var mode = "logo";
	}

//	// If var $query (from PHP) is set, display "modal event" with the correct image (run, art, ...)   //
//	// Else if var $query (from PHP) is not set, display "modal event" with gozpeak logos.             //
	if (mode == "img") {
		$('#modalEventWithQuery').modal('show');
	} else if (mode == "logo") {
		$('#modalEvent').modal('show');
	}
}


function selectQuery(logo){
	//alert(logo);
	//switch(logo) {
	if (logo =~ 'run') {
		alert('change form with runzpeak image');
	}else if (logo =~ 'art') {
		alert('change form with artzpeak image');
	}else if(logo =~ 'party') {
		alert('change form with partyzpeak image');
	}else if (logo =~ 'eat'){
		alert('change form with eatzpeak image');
	}
}

/*function checkForm() {
	var pseudo = document.getElementById("").value;
	var email = document.getElementById("").value;
	var check_email = document.getElementById("").value;
	var password = document.getElementById("").value;
	var check_password = document.getElementById("").value;

	if (name == '' || password == '' || email == '' || website == '') {
		alert("Vous devez remplir tous les champs pour vous inscrire");
	} else {
		
	}
}*/

