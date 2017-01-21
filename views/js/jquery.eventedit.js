
function GetEventInfos(baseUrl, zpeaktype, eventname, eventlogo, eventcolor, eventimg) {
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

	    $(".modal-title #EventWithQueryTitle").attr("src", eventlogo);
      $(".modal-title").attr("style", eventcolor);
      $(".modal-body #EventWithQueryTitle").attr("src", eventimg);
			$(".modal-body #EventWithQueryImg").attr("src", eventimg);
			$(".modal-body #hiddenInput").attr("value", zpeaktype);
	    /*$("#ajaxupdate-ideaname").val(tmp);*/

			var data = JSON.parse(response);
			if (zpeaktype == "idea") {
				$(".posteventForm").find("#event_name").val(data.ideaname);
				$(".posteventForm").find("#event_place").val(data.ideaplace);
				$(".posteventForm").find("#event_desc").val(data.ideadesc);
				$(".posteventForm").find("#phone_number").val(data.ideaphone);
				$(".posteventForm").find("#datetime-btn-event").val(data.ideadatetime);
				$(".posteventForm").find("#selectlang").val(data.language);
				$(".posteventForm").find("#selectlanglevel").val(data.level_language);
			} else if (zpeaktype == "event") {
				$(".posteventForm").find("#event_name").val(data.eventname);
				$(".posteventForm").find("#event_place").val(data.eventplace);
				$(".posteventForm").find("#event_desc").val(data.eventdesc);
				$(".posteventForm").find("#datetime-btn").val(data.eventdatetime);
			}

	    /*if ($("h4").hasClass('modal-title displaymembers')) {
		$("<span class=eventtitle-displaymembers> " + eventname + " </span>").appendTo("h4");
	    };*/
	    //$("#ajaxupdate").dialog("open");
	  }
	});
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
