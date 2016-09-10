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


function showDatetimePicker() {
        var currDate = new Date();
        var initDate = currDate.getFullYear() + "-" + currDate.getMonth() + "-" + currDate.getDate() + " " + currDate.getDay;
        //var maxDate = initDate.getYear()+1 + '-' initDate.getMonth() + '-' initDate.getDate();
        var maxDate = (currDate.getFullYear()+1) + "-" + (currDate.getMonth()+2) + "-" + currDate.getDate();

        $("#datetime-lang").datetimepicker({
        language: "fr",
        autoclose: true,
        maxView: "year",
        minuteStep: 15,
        rtl: true,
        fontAwesome: true,
        todayBtn: true,
        todayHighlight: "true",
        pickerPosition: "bottom-right",
        format: "yyyy-mm-dd hh:ii",
        //startDate: "2016-09-01 21:00",
        startDate: initDate,
        //endDate: "2018-09-01 21:00"
        endDate: maxDate
    });
    //$('#datetime-btn').datetimepicker('update');
    /*$("#datetime-btn").datetimepicker().on('changeDate'), function (ev) {
        $("#input-test").change();
    };*/
};


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


function showModalProfileDeletion(){
        $('#modalProfileDeletion').modal('show');
}


// Function initially coded to know if user comes with query predefined or not.
// But for the moment, all the time user will must choose a query on Modal. 
/*function DetectModalEvent(query){
	switch(query) {
		case "run": 
		case "art": 
		case "party": 
		case "eat": 
		    var mode = "img";
		    break; 

		default:
		    var mode = "logo";
	}

	if (mode == "img") { 
		$('#modalEventWithQuery').modal('show');
	} else if (mode == "logo") {
		$('#modalSelectQuery').modal('show');
	}
}*/


function showModalSelectQuery() {
	$('#modalSelectQuery').modal('show');
}


function showModalEventWithQuery(logo, color, img, query){
	$('#modalSelectQuery').modal('hide');
	$(".modal-title #EventWithQueryTitle").attr("src", logo);
	$(".modal-title").attr("style", color);
	$(".modal-body #EventWithQueryImg").attr("src", img);
	$(".modal-body #EventWithQueryImg").attr("alt", query);

	$(".modal-body #hiddenInput").attr("value", query);

	$('#modalEventWithQuery').modal('show');
}


function showModalContact(){
        $('#modalContact').modal('show');
}


