function showModalProfile(){
        $('#modalProfile').modal('show');
}

$('#modalProfile').on('hidden.bs.modal', function() {
    $('#profileForm').formValidation('resetForm', true);
    $('#profile-errors').html('');
});


$(document).ready(function() {
    $('#profileForm').on('init.field.fv', function(e, data) {
            var field  = data.field,        // Get the field name
                $field = data.element,      // Get the field element
                bv     = data.fv;           // FormValidation instance

            // Create a span element to show valid message
            // and place it right before the field
            var $span = $('<small/>')
                            .addClass('help-block validMessage')
                            .attr('data-field', field)
                            .insertAfter($field)
                            .hide();

            // Retrieve the valid message via getOptions()
            var message = bv.getOptions(field).validMessage;

            if (message) {
                $span.html(message);
            }
        })
	.formValidation({
        framework: 'bootstrap',
	//live: 'enabled',
	message: "Cette valeur n'est pas valide",
	verbose: 'false',
	excluded: 'disabled',
	//trigger: 'blur',
	err: {
        	container: '#profile-errors',
	},
        icon: {
	    required: 'glyphicon glyphicon-asterisk',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            lastname: {
                validators: {
                    //notEmpty: {
                    //    message: " est nécessaire pour vous inscrire"
                    //},
		    stringLength: {
			min: 3,
                        max: 20,
                        message: "Votre pseudonyme doit comporter 6 caractères au minimum, et 20 caractères au maximum"
                    },
		    regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: "Le nom ne peut pas comporter des caractères spéciaux comme l'@, le point ou l'underscore (_)"
                    }
                }
            },
            firstname: {
                validators: {
                    //notEmpty: {
                    //    message: "Votre adresse email est nécessaire pour vous inscrire"
                    //},
		    stringLength: {
			min: 2,
                        max: 20,
                        message: "Une adresse mail doit comporter au moins 10 caractères"
                    },
                    //emailAddress: {
                    //    message: "La valeur n'est pas une adresse email valide"
                    //}
		    regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: "Le prénom ne peut pas comporter des caractères spéciaux comme l'@, le point ou l'underscore (_)"
                    }
                }
            },
	    profile_mail: {
                validators: {
                    //notEmpty: {
                    //    message: "Les adresses email doivent être identiques"
                    //},
                    emailAddress: {
                        message: "La valeur n'est pas une adresse email valide"
                    },
		    stringLength: {
                        min: 10,
                        max: 70,
                        message: "Une adresse mail doit comporter au moins 10 caractères"
                    },
		    //identical: {
                    //    field: "mail",
                    //    message: "Les adresses email entrées ne correspondent pas"
                    //}
                }
            },
            profile_password: {
                validators: {
                    //notEmpty: {
                    //    message: "Veuillez choisir un mot de passe pour votre compte"
                    //},
                    stringLength: {
                        min: 8,
                        max: 25,
                        message: "Le mot de passe doit comporter 8 caractères au minimum, et 25 caractères au maximum"
                    },
		    regexp: {
                            regexp: /(?=.*[A-Z].*)(?=.*[0-9].*[0-9])(?=.*[!@#$&*].*)/,
                            message: "Le mot de passe doit comporter au minimum une majuscule, deux chiffres et un caractère spécial"
                    },
		    different: {
                        field: 'pseudo',
                        message: 'Le mot de passe doit être différent du pseudo'
                    }
                }
            },
	    nationality: {
                validators: {
		    /***** To be completed *****/ 
                }
            },
	    birthdate: {
                validators: {
		    /***** To be completed *****/ 
                }
            },
	    job: {
                validators: {
		    /***** To be completed *****/ 
                }
            },
        }
    })
.on('success.form.fv', function(e) {
            // Reset the message element when the form is valid
            $('#profile-errors').html('');
        })
        .on('err.field.fv', function(e, data) {
            // data.fv      --> The FormValidation instance
            // data.field   --> The field name
            // data.element --> The field element

            // Get the messages of field
            var messages = data.fv.getMessages(data.element);

            // Remove the field messages if they're already available
            $('#profile-errors').find('li[data-field="' + data.field + '"]').remove();

            // Loop over the messages
            for (var i in messages) {
                // Create new 'li' element to show the message
                $('<li/>')
                    .attr('data-field', data.field)
                    .wrapInner(
                        $('<a/>')
                            .attr('href', 'javascript: void(0);')
                            .html(messages[i])
                            .on('click', function(e) {
                                // Hide the modal first
                                $('#modalProfile').modal('hide');

                                // Focus on the invalid field
                                data.element.focus();
                            })
                    )
                    .appendTo('#profile-errors');
            }

            // Hide the default message
            // data.element.data('fv.messages') returns the field messages element
            data.element
                .data('fv.messages')
                .find('.help-block[data-fv-for="' + data.field + '"]')
                .hide();
        })
        .on('success.field.fv', function(e, data) {
            // Remove the field messages
            $('#profile-errors').find('li[data-field="' + data.field + '"]').remove();
        })
        .on('err.form.fv', function(e) {
            // Show the message modal
            $('#modalProfile').modal('show');
        })

    .on('success.field.fv', function(e, data) {
            var field  = data.field,        // Get the field name
                $field = data.element;      // Get the field element

            // Retrieve the valid message element
            $field
                .next('.validMessage[data-field="' + field + '"]')
                .show();  // Show it
        })
    .on('err.field.fv', function(e, data) {
            var field  = data.field,        // Get the field name
                $field = data.element;      // Get the field element

            // Hide the valid message element
            $field
                .next('.validMessage[data-field="' + field + '"]')
                .hide();
        })
    .on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();

            // Some instances you can use are
            var $form = $(e.target),        // The form instance
                fv    = $(e.target).data('formValidation'); // FormValidation instance
		
		//$('#modalProfile').modal('hide');
		//$('#inscription-succeed').modal('show');
		fv.defaultSubmit()//.on('click', function(e) {
                         // Hide the modal first
			 //alert('TEST');
                         //$('#modalProfileSucceed').modal('show');;

		//('#modalProfile').click(function

		//$('#mymodal').on('hidden.bs.modal', function() {
		//  return false;
	})
    .on('success.form.fv', function(e) {
	//$('#modalProfile').modal('hide');
	setTimeout(showModalSuccess, 6000);
	//$("#modalProfileSucceed").modal('show', { backdrop: 'static',keyboard: false});
	});
});


//////// jQuery Ajax Method ////////
//jQuery(document).ready(function(){
//	$('#profileForm').submit(function(){
//		var action = $(this).attr('action');
//
// 		$('#submit')
//			.after('<img src="images/ajax-loader.gif" class="loader" />')
//			.attr('disabled','disabled');
//
//		$.post(action, {
//			name: $('#pseudo').val(),
//			email: $('#mail').val(),
//			comments: $('#password').val(),
//		});
//			function(data){
//				document.getElementById('modalProfile').innerHTML = data;
//				$('#message').slideDown('slow');
//				$('#profileForm img.loader').fadeOut('slow',function(){$(this).remove()});
//				$('#submit').removeAttr('disabled');
//				if(data.match('success') != null) $('#profileForm').slideUp('slow');
//			//
//			//}
//		});
//
//		return false;
//
//	});

//});
              

//$(function() {
//  $('profileForm').submit(function(e) {
//    e.preventDefault();
//
//    $form = $(this);
//
//    $.post(document.location.url, $(this).serialize(), function(data) {
//      $feedback = $("<div>").html(data).find(".form-feedback")
//
//      $form.prepend($feedback);
//    });
//  });
//})


//// jQuery Submit working,  redirect to the PHP action page correctly. ////

//jQuery(document).ready(function(){
//
//        $('#profileForm').submit(function(){
//                var action = $(this).attr('action');
//
//                $("#modalProfile").slideUp(750,function() {
//                $('#modalProfile').hide();
//
//                $('#submit')
//                        .after('<img src="images/ajax-loader.gif" class="loader" />')
//                        .attr('disabled','disabled');
//
//                $.post(action, {
//                        name: $('#pseudo').val(),
//                        email: $('#mail').val(),
//                        verify: $('#password').val()
//                },
//                        function(data){
//                                document.getElementById('modalProfile').innerHTML = data;
//                                $('#modalProfile').slideDown('slow');
//                                $('#profileForm img.loader').fadeOut('slow',function(){$(this).remove()});
//                                $('#submit').removeAttr('disabled');
//                                if(data.match('success') != null) $('#profileForm').slideUp('slow');
//
//                        }
//                );
//
//                });
//
//                return false;
//
//        });
//
//});
