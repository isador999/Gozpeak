function height(bloc){
	var hauteur;
	
	if( typeof( window.innerWidth ) == 'number' )
		hauteur = window.innerHeight;
	else if( document.documentElement && document.documentElement.clientHeight )
		hauteur = document.documentElement.clientHeight;
	
	document.getElementById(bloc).style.height = hauteur+"px";
}

function contact() {
	if ($("#cform").is(":hidden")) {
       		 $("#ribbon").css({"background":"url(../images/ribbon.png) bottom left no-repeat"});
       		 $("#home").slideUp("fast");
 	         $("#cform").slideDown("slow");
        } else { $("#ribbon").css({"background":"url(../images/ribbon.png) top left no-repeat"});
                 $("#cform").slideUp("slow");
                 $("#home").slideDown("slow");
	}
}


// Show Modal What
function showModalWhat(){
	$('#modalWhat').modal('show');
}

// Show Modal Inscription
function showModalInscription(){
	$('#modalInscription').modal('show');
}

// Show Modal Success
function showModalSuccess(){
	$('#modalInscriptionSucceed').modal('show');
}

//function showModalInscription(){
//	$('#modalInscription').modal('show');
	//$('#modalInscription').click(function () {
    	//$('#registerModal').modal('show');
    	//$('#btn-t-c').click(function () {
        	//$('#t_and_c_m').modal('show');
        	//$('.hide-t-c').click(function () {
            	//$('#t_and_c_m').modal('hide');
        	//});
    	//});
//   	registerValidate();
//};



// Show Modal Connection
function showModalConnection(){
	$('#modalConnection').modal('show');
	$('#forgotpasslink').click(function(){
		$('#modalConnection').modal('hide');
		setTimeout(function() { $('#modalForgottenPass').modal('show'); }, 500);
	});
}


/*function showModalForgottenPass(){
              $('#modalConnection').modal('hide');
              setTimeout(function() { $('#modalForgottenPass').modal('show'); }, 500);
}*/


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


function showModalContact(){
        $('#modalContact').modal('show');
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

