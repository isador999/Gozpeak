
function GetEventInfos(baseUrl, zpeaktype, eventname, eventlogo, eventcolor, eventimg, query) {
	ajaxUrl = baseUrl;

	$.ajax({
	  type: "GET",
    url: ajaxUrl+'/controllers/retrieveEventData.php?',
	  data: "zpeaktype=" + zpeaktype + "&eventname=" + eventname,
	  dataType: 'html',
		contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
    cache: false,
	  success: function(response) {

			var data = JSON.parse(response);
			if (zpeaktype == "idea") {
				//alert(zpeaktype+" has been called");
				$(".eventeditForm").find("#event_name").val(data.ideaname);
				$(".eventeditForm").find("#event_place").val(data.ideaplace);
				$(".eventeditForm").find("#event_desc").val(data.ideadesc);
				$(".eventeditForm").find("#phonenumber").val(data.ideaphone);
				$(".eventeditForm").find("#datetime-btn-event").val(data.ideadatetime);
				$(".eventeditForm").find("#select_lang").val(data.language);
				$(".eventeditForm").find("#select_langlevel").val(data.level_language);
				$(".eventeditForm").find(".hiddenInputOldEventName").val(data.ideaname);
			} else if (zpeaktype == "event") {
				$(".eventeditForm").find("#event_name").val(data.eventname);
				$(".eventeditForm").find("#event_place").val(data.eventplace);
				$(".eventeditForm").find("#event_desc").val(data.eventdesc);
				$(".eventeditForm").find("#datetime-btn").val(data.eventdatetime);
				$(".eventeditForm").find(".hiddenInputOldEventName").val(data.eventname);
			}
			genericShowModalEvent(eventlogo, eventcolor, eventimg, query, 'modalEventEdit');
	  }
	});
	//$('#modalEventEdit').modal('show');
};
