function height(bloc){
	var hauteur;

	if( typeof( window.innerWidth ) == 'number' )
		hauteur = window.innerHeight;
	else if( document.documentElement && document.documentElement.clientHeight )
		hauteur = document.documentElement.clientHeight;

	document.getElementById(bloc).style.height = hauteur+"px";
}


// To close slowly alert-success Bootstrap messages //
jQuery(document).ready(function($){
	//Set alert-success to be auto-hidden
	window.setTimeout(function() { $(".alert-success").fadeTo(2000, 500).slideUp(500) }, 3000);
	//Set list default year to current year
	var current_year = new Date().getFullYear();
	$("#current_picked_year").html("&nbsp;"+current_year);
});

function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
				 //.replace(/ /g, "+");
				 //.replace(/ /g, "");
 }


function showCities () {
	var list = document.getElementById("ZpeakCities");
	if (list.style.display == "none"){
	  list.style.display = "block";
	}else{
	  list.style.display = "none";
	}
}


/*$(document).ready(function() {*/
function listLanguages() {
    var availableTags = [
      "Anglais",
			"Espagnol",
			"Italien",
			"Français",
			"Autres langues",
    ];
    function split( val ) {
      //return val.split( /,\s*/ );
			return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }

    $('#selectedLanguages')
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      }).autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( "," );
          return false;
        }
      });
}


function retrieve_pagination (baseUrl, query, zpeaktype, pickedyear, selectedLanguages, username, pagenumber) {
	$.ajax({
		type: "GET",
		url: ajaxUrl+'/controllers/updateListing.php?',
		data: "query=" + query + "&" + zpeaktype + "year=" + pickedyear + "&languages" + selectedLanguages + "&pagination_" + zpeaktype + "=true&membername=" + username + "&" + zpeaktype + "page=" + pagenumber ,
		dataType: 'html',
		contentType: "application/x-www-form-urlencoded;charset=UTF-8",
		cache: false,
		success: function(response)
		{
			var Pagination = JSON.parse(response);
			$('ul.pagination_' + zpeaktype).html("");
			for (var i = 1; i < Pagination.total_pages+1; i++) {
				if (i == Pagination.current_page) {
					$('ul.pagination_' + zpeaktype).append('<li class="active"><a href="#">'+ i + '</a></li>');
				} else {
					//OnclickParams="'"+ajaxUrl+zpeaktype;
					$('ul.pagination_' + zpeaktype).append('<li><a href="#" onclick=\'sortEvents("'+ajaxUrl+'", "'+zpeaktype+'", "'+query+'", "'+pickedyear+'", "'+i+'")\' >'+ i + '</a></li>');
				}
			}
		}
	});
}


function getIdeasByUser(baseUrl, username, pagenumber) {
	ajaxUrl = baseUrl;

	$.ajax({
		type: "GET",
		url: ajaxUrl+'/controllers/updateListing.php?',
		data: "membername=" + username,
		dataType: 'html',
		contentType: "application/x-www-form-urlencoded;charset=UTF-8",
		cache: false,
		success: function(response)
		{
			var ideas = JSON.parse(response);
			//For ideas
			if(ideas.length === 0) {
				$('#empty-ideas-message-profile').show();
			} else {
				$('#empty-ideas-message-profile').hide();
				for (var i = 0; i < ideas.length; i++) {

					//escapeHtml
					escapeHtml(ideas[i].language);
					escapeHtml(ideas[i].ideatype);
					escapeHtml(ideas[i].ideaname);
					escapeHtml(ideas[i].ideadayname);
					escapeHtml(ideas[i].ideadaynumber);
					escapeHtml(ideas[i].ideamonthname);
					escapeHtml(ideas[i].ideatime);

					$('#table-ideas-profile > tbody').append('<tr class="row"> </tr>');
					$('#table-ideas-profile > tbody').find('tr:last').append('<td class="col-lg-1 col-md-1"> <img src="views/images/p_'+ideas[i].language+'.png" title="'+ideas[i].language+'" /> </td>');
					$('#table-ideas-profile > tbody').find('tr:last').append('<td class="col-lg-1 col-md-1"> <img style="width:150%;" src="views/images/'+ideas[i].ideatype+'.png" title="'+ideas[i].ideatype+'" /> </td>');
					//$("#table-ideas > tbody").find('tr:last').append("<td class='col-lg-2'> <a href='"+ajaxUrl+"/index.php?page=profil&profil="+ideas[i].organizer+"' >"+ideas[i].organizer+"</a></td>");
					$('#table-ideas-profile > tbody').find('tr:last').append('<td class="col-lg-5 col-md-5"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="'+ajaxUrl+'/index.php?page=idea&query='+ideas[i].ideatype+'&idea='+ideas[i].ideaname+'" >'+ideas[i].ideaname+'</a></td>');
					$('#table-ideas-profile > tbody').find('tr:last').append('<td class="col-lg-3 col-md-5">'+ideas[i].ideadayname+' '+ideas[i].ideadaynumber+' '+ideas[i].ideamonthname+'</td>');
					$('#table-ideas-profile > tbody').find('tr:last').append('<td class="col-lg-1 col-md-1">'+ideas[i].ideatime+'</td>');
				}
			}
		}
	});
	retrieve_pagination(baseUrl, '', 'idea', '', '', username, pagenumber);
}



function filterByLanguages(baseUrl, query, eventyear, ideayear, selectedLanguages) {
	//Requests to get events and ideas by selected languages (and keeping selected years respectively)
	ajaxUrl = baseUrl;

	$.ajax({
		type: "GET",
		url: ajaxUrl+'/controllers/updateListing.php?',
		data: "query=" + query + "&eventyear=" + eventyear + "&languages=" + selectedLanguages,
		dataType: 'html',
		contentType: "application/x-www-form-urlencoded;charset=UTF-8",
		cache: false,
		success: function(response)
		{
			var events = JSON.parse(response);
			$('#table-events > tbody').html("");
			$('#current_picked_eventyear').html(eventyear);

			//For events
			if(events.length === 0) {
				$('#empty-events-message').show();
			} else {
				$('#empty-events-message').hide();
				for (var i = 0; i < events.length; i++) {

					//escapeHtml
					escapeHtml(events[i].language);
					escapeHtml(events[i].eventtype);
					escapeHtml(events[i].eventname);
					escapeHtml(events[i].eventdayname);
					escapeHtml(events[i].eventdaynumber);
					escapeHtml(events[i].eventmonthname);
					escapeHtml(events[i].eventtime);

					$('#table-events > tbody').append('<tr class="row"> </tr>');
					$('#table-events > tbody').find('tr:last').append('<td class="col-lg-1 col-md-1"> <img src="views/images/p_'+events[i].language+'.png" title="'+events[i].language+'" /> </td>');
					$('#table-events > tbody').find('tr:last').append('<td class="col-lg-6 col-md-6"> <a href="'+ajaxUrl+'/index.php?page=event&query='+events[i].eventtype+'&event='+events[i].eventname+'" >'+events[i].eventname+'</a></td>');
					$('#table-events > tbody').find('tr:last').append('<td class="col-lg-4 col-md-4">'+events[i].eventdayname+' '+events[i].eventdaynumber+' '+events[i].eventmonthname+'</td>');
					$('#table-events > tbody').find('tr:last').append('<td class="col-lg-1 col-md-1">'+events[i].eventtime+'</td>');
				}
			}
		} // End of success
	}); //End of Ajax request
	retrieve_pagination(baseUrl, query, 'event', eventyear, selectedLanguages, '');


	$.ajax({
		type: "GET",
		url: ajaxUrl+'/controllers/updateListing.php?',
		data: "query=" + query + "&ideayear=" + ideayear + "&languages=" + selectedLanguages,
		dataType: 'html',
		contentType: "application/x-www-form-urlencoded;charset=UTF-8",
		cache: false,
		success: function(response)
		{
			var ideas = JSON.parse(response);
			$('#table-ideas > tbody').html("");
			$('#current_picked_ideayear').html(ideayear);

			//For ideas
			if(ideas.length === 0) {
				$('#empty-ideas-message').show();
			} else {
				$('#empty-ideas-message').hide();
				for (var i = 0; i < ideas.length; i++) {

					//escapeHtml
					escapeHtml(ideas[i].language);
					escapeHtml(ideas[i].ideatype);
					escapeHtml(ideas[i].ideaname);
					escapeHtml(ideas[i].ideadayname);
					escapeHtml(ideas[i].ideadaynumber);
					escapeHtml(ideas[i].ideamonthname);
					escapeHtml(ideas[i].ideatime);

					$('#table-ideas > tbody').append('<tr class="row"> </tr>');
					$('#table-ideas > tbody').find('tr:last').append('<td class="col-lg-1 col-md-1"> <img src="views/images/p_'+ideas[i].language+'.png" title="'+ideas[i].language+'" /> </td>');
					$('#table-ideas > tbody').find('tr:last').append('<td class="col-lg-2 col-md-2"> <a href="'+ajaxUrl+'/index.php?page=profil&profil='+ideas[i].organizer+'" >'+ideas[i].organizer+'</a></td>');
					$('#table-ideas > tbody').find('tr:last').append('<td class="col-lg-4 col-md-4"> <a href="'+ajaxUrl+'/index.php?page=idea&query='+ideas[i].ideatype+'&idea='+ideas[i].ideaname+'" >'+ideas[i].ideaname+'</a></td>');
					$('#table-ideas > tbody').find('tr:last').append('<td class="col-lg-4 col-md-4">'+ideas[i].ideadayname+' '+ideas[i].ideadaynumber+' '+ideas[i].ideamonthname+'</td>');
					$('#table-ideas > tbody').find('tr:last').append('<td class="col-lg-1 col-md-1">'+ideas[i].ideatime+'</td>');
				}
			}
		} //End of success
	}); //End of Ajax request
	retrieve_pagination(baseUrl, query, 'idea', ideayear, selectedLanguages, '');
} //End of function




function sortEvents(baseUrl, zpeaktype, query, pickedyear, pickedmonth, pagenumber) {
	ajaxUrl = baseUrl;

	$.ajax({
	  type: "GET",
  	url: ajaxUrl+'/controllers/updateListing.php?',
		data: "query=" + query + "&" + zpeaktype + "year=" + pickedyear + "&" + zpeaktype + "month="+ pickedmonth + "&" + zpeaktype + "page=" + pagenumber,
	  dataType: 'html',
		contentType: "application/x-www-form-urlencoded;charset=UTF-8",
    cache: false,
	  success: function(response)
	  {
			var donnees = JSON.parse(response);
			if (zpeaktype == 'event') {
				//Set dropdowns to current choice.
				$('#current_picked_eventyear').html(pickedyear);
				$('#current_picked_eventmonth').html(pickedmonth);

				//Reset disabled state of all dropdowns.
				$('ul#event-years > li').attr("class", "");
				$('ul#event-months > li').attr("class", "");

				//Disable selected dropdown choices.
				$('ul#event-years > li#events-'+pickedyear).attr("class", "disabled");
				$('ul#event-months > li#events-'+pickedmonth).attr("class", "disabled");


				$('#table-events > tbody').html("");

				if(donnees.length === 0) {
					$('#empty-events-message').show();
				} else {
					$('#empty-events-message').hide();
					for (var i = 0; i < donnees.length; i++) {

						//escapeHtml
						escapeHtml(donnees[i].language);
						escapeHtml(donnees[i].eventtype);
						escapeHtml(donnees[i].eventname);
						escapeHtml(donnees[i].eventdayname);
						escapeHtml(donnees[i].eventdaynumber);
						escapeHtml(donnees[i].eventmonthname);
						escapeHtml(donnees[i].eventtime);


						$('#table-events > tbody').append('<tr class="row"> </tr>');
						$('#table-events > tbody').find('tr:last').append('<td class="col-lg-1 col-md-1"> <img src="views/images/p_'+donnees[i].language+'.png" title="'+donnees[i].language+'" /> </td>');
						$('#table-events > tbody').find('tr:last').append('<td class="col-lg-6 col-md-6"> <a href="'+baseUrl+'/index.php?page=event&query='+donnees[i].eventtype+'&event='+donnees[i].eventname+' ">'+donnees[i].eventname+'</a></td>');
						$('#table-events > tbody').find('tr:last').append('<td class="col-lg-4 col-md-4">'+donnees[i].eventdayname+' '+donnees[i].eventdaynumber+' '+donnees[i].eventmonthname+'</td>');
						$('#table-events > tbody').find('tr:last').append('<td class="col-lg-1 col-md-1">'+donnees[i].eventtime+'</td>');
					}
				}
			} else if (zpeaktype == 'idea') {
				//Set dropdowns to current choice.
				$('#current_picked_ideayear').html(pickedyear);
				$('#current_picked_ideamonth').html(pickedmonth);

				//Reset disabled state of all dropdowns.
				$('ul#idea-years > li').attr("class", "");
				$('ul#idea-months > li').attr("class", "");

				//Disable selected dropdown choices.
				$('ul#idea-years > li#ideas-'+pickedyear).attr("class", "disabled");
				$('ul#idea-months > li#ideas-'+pickedmonth).attr("class", "disabled");

				$('#table-ideas > tbody').html("");

				if(donnees.length === 0) {
					$('#empty-ideas-message').show();
				} else {
					$('#empty-ideas-message').hide();
					for (var i = 0; i < donnees.length; i++) {

						//escapeHtml
						escapeHtml(donnees[i].language);
						escapeHtml(donnees[i].ideatype);
						escapeHtml(donnees[i].ideaname);
						escapeHtml(donnees[i].ideadayname);
						escapeHtml(donnees[i].ideadaynumber);
						escapeHtml(donnees[i].ideamonthname);
						escapeHtml(donnees[i].ideatime);

						$('#table-ideas > tbody').append('<tr class="row"> </tr>');
						$('#table-ideas > tbody').find('tr:last').append('<td class="col-lg-1 col-md-1"> <img src="views/images/p_'+donnees[i].language+'.png" title="'+donnees[i].language+'" /> </td>');
						$('#table-ideas > tbody').find('tr:last').append('<td class="col-lg-2 col-md-2"> <a href="'+ajaxUrl+'/index.php?page=profil&profil='+donnees[i].organizer+'" >'+donnees[i].organizer+'</a></td>');
						$('#table-ideas > tbody').find('tr:last').append('<td class="col-lg-4 col-md-4"> <a href="'+ajaxUrl+'/index.php?page=idea&query='+donnees[i].ideatype+'&idea='+donnees[i].ideaname+'" >'+donnees[i].ideaname+'</a></td>');
						$('#table-ideas > tbody').find('tr:last').append('<td class="col-lg-4 col-md-4">'+donnees[i].ideadayname+' '+donnees[i].ideadaynumber+' '+donnees[i].ideamonthname+'</td>');
						$('#table-ideas > tbody').find('tr:last').append('<td class="col-lg-1 col-md-1">'+donnees[i].ideatime+'</td>');
					}
				}
			} //End of condition zpeaktype
			retrieve_pagination(baseUrl, query, zpeaktype, pickedyear, '', '', pagenumber);
		}  //End of success block
	});
}


function showDatetimePicker() {
	var currDate = new Date();
	var initDate = currDate.getFullYear() + "-" + currDate.getMonth() + "-" + currDate.getDate() + " " + currDate.getDay;
	//var maxDate = initDate.getYear()+1 + '-' initDate.getMonth() + '-' initDate.getDate();
	var maxDate = (currDate.getFullYear()+1) + "-" + (currDate.getMonth()+2) + "-" + currDate.getDate();

	$(".datetime-btn").datetimepicker({
	language: "fr",
  autoclose: true,
	maxView: "year",
	minuteStep: 15,
	rtl: true,
	fontAwesome: true,
  todayBtn: true,
	todayHighlight: "true",
	pickerPosition: "bottom-left",
	format: "yyyy-mm-dd hh:ii",
	//startDate: "2016-09-01 21:00",
	startDate: initDate,
	//endDate: "2018-09-01 21:00"
	endDate: maxDate
    });
};


function genericShowModalEvent(logo, color, img, query, modalIdSelector) {
	$('#modalSelectQuery').modal('hide');

	$('#'+modalIdSelector+' .EventLogoTitle').attr("src", logo);
	$('#'+modalIdSelector+' .modal-title').attr("style", color);
	$('#'+modalIdSelector+' .EventQueryImg').attr("src", img);
	$('#'+modalIdSelector+' .EventQueryImg').attr("alt", query);
	$('#'+modalIdSelector+' .hiddenInputQuery').attr("value", query);
}
