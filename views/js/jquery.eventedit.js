
function GetEventInfos(baseUrl, zpeaktype, eventname, eventlogo, eventcolor, eventimg, query) {
	// Retrieve name of each member (Ajax ?)
	ajaxUrl = baseUrl;

	$.ajax({
	  type: "GET",
    //url: 'http://demo.gozpeak.com:8002/controllers/members-list.php?',
    url: ajaxUrl+'/controllers/retrieveEventData.php?',
	  data: "zpeaktype=" + zpeaktype + "&eventname=" + eventname,
	  dataType: 'html',
		contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
    cache: false,
	  success: function(response) {
	    //alert("Liste des membres actuellement inscrits : " + data + ", " + data + ".");
	    //var tmp = response.split("|");

	    // $(".modal-title #EventWithQueryTitle").attr("src", eventlogo);
      // $(".modal-title").attr("style", eventcolor);
      // $(".modal-body #EventWithQueryTitle").attr("src", eventimg);
			// $(".modal-body #EventWithQueryImg").attr("src", eventimg);
			// $(".modal-body #hiddenInput").attr("value", zpeaktype

			var data = JSON.parse(response);
			if (zpeaktype == "idea") {
				alert(zpeaktype+" has been called");
				$(".eventeditForm").find("#event_name").val(data.ideaname);
				$(".eventeditForm").find("#event_place").val(data.ideaplace);
				$(".eventeditForm").find("#event_desc").val(data.ideadesc);
				$(".eventeditForm").find("#phone_number").val(data.ideaphone);
				$(".eventeditForm").find("#datetime-btn-event").val(data.ideadatetime);
				$(".eventeditForm").find("#selectlang").val(data.language);
				$(".eventeditForm").find("#selectlanglevel").val(data.level_language);
			} else if (zpeaktype == "event") {
				$(".eventeditForm").find("#event_name").val(data.eventname);
				$(".eventeditForm").find("#event_place").val(data.eventplace);
				$(".eventeditForm").find("#event_desc").val(data.eventdesc);
				$(".eventeditForm").find("#datetime-btn").val(data.eventdatetime);
			}
			genericShowModalEvent(eventlogo, eventcolor, eventimg, query, 'modalEventEdit');
	  }
	});
	//$('#modalEventEdit').modal('show');
};


/*function GetProfileInfos(profile) {
    $.ajax({
        url: 'http://192.168.229.56:8001/controllers/getprofile.php?profil=demozpeak',
        type: 'GET',
        dataType: "html",
        success: function(response) {
          var data = JSON.parse(response);
          $("#profileForm").find("#pseudo").val(data.pseudo);
          $("#profileForm").find("#lastname").val(data.lastname);
          $("#profileForm").find("#firstname").val(data.name);
          $("#profileForm").find("#profile_mail").val(data.email);
          $("#profileForm").find("#nationality").val(data.nationality);
          $("#profileForm").find("#birthdate").val(data.birthday);
        }
     });
 }*/

/*$('#modal-displaymembers').on('hidden.bs.modal', function() {
    if ($("span").hasClass('displaymembers')) {
	$("span").();
    };
});*/
