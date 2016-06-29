//jQuery(document).ready(function(){
//	$('#contactform').submit(function(){
//		var action = $(this).attr('action');
//
//		$("#message").slideDown(750,function() {
//
// 		$('#submit')
//			.after('<img src="images/ajax-loader.gif" class="loader" />')
//			.attr('disabled','disabled');
//
//		$.post(action, {
//			name: $('#name').val(),
//			email: $('#email').val(),
//			subject: $('#subject').val(),
//			comments: $('#comments').val(),
//			verify: $('#verify').val()
//		},
//			function(data){
//				document.getElementById('message').innerHTML = data;
//				$('#message').slideDown('slow');
//				//$('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
//				$('#submit').removeAttr('disabled');
//				//if(data.match('success') != null) $('#contactform').slideUp('slow');
//				if(data.match('success') != null) $('#contactform').slideDown('slow');
//			}
//		);
//
//		});
//
//		return false;
//
//	});
//
//});
//
