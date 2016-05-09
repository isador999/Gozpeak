
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

// Show Modal Inscription
function showModalConnection(){
	$('#modalConnection').modal('show');
}




function showModalContact(){
        $('#modalContact').modal('show');
}



