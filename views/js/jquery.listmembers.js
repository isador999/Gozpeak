

/*function showDatetimePicker() {
        var currDate = new Date();
        var initDate = currDate.getFullYear() + "-" + currDate.getMonth() + "-" + currDate.getDate() + " " + currDate.getDay;
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
        startDate: initDate,
        endDate: maxDate
    });*/
    //$('#datetime-btn').datetimepicker('update');
    /*$("#datetime-btn").datetimepicker().on('changeDate'), function (ev) {
        $("#input-test").change();
    };*/
//};

// Show Modal What
//function showDisplayMembers(){
//        $('#modal-displaymembers').modal('show');
//}



function showEventMembers(zpeaktype, eventname) {
	// Retrieve name of each member (Ajax ?)
	$.ajax({
	  type: "GET",
          url: 'http://demo.gozpeak.com:8002/controllers/members-list.php?',
	  data: "zpeaktype=" + zpeaktype + "&eventname=" + eventname,
	  //dataType: 'json',
          cache: false,
	  success: function(data)
	  {
	    //alert("Liste des membres actuellement inscrits : " + data + ", " + data + ".");
	    //var tmp = data.split(",");
	    $("#ajaxupdate").html(data);
	    /*if ($("h4").hasClass('modal-title displaymembers')) {
		$("<span class=eventtitle-displaymembers> " + eventname + " </span>").appendTo("h4");
	    };*/
	    $('#modal-displaymembers').modal('show');
	    //$("#ajaxupdate").dialog("open");
	  }
	});
};


/*$('#modal-displaymembers').on('hidden.bs.modal', function() {
    if ($("span").hasClass('displaymembers')) {
	$("span").();
    };
});*/

//function showModalEventWithQuery(logo, color, img, query){
//	$('#modalSelectQuery').modal('hide');
//	$(".modal-title #EventWithQueryTitle").attr("src", logo);
//	$(".modal-title").attr("style", color);
//	$(".modal-body #EventWithQueryImg").attr("src", img);
//	$(".modal-body #EventWithQueryImg").attr("alt", query);
//
//	$(".modal-body #hiddenInput").attr("value", query);
//
//	$('#modalEventWithQuery').modal('show');
//}

