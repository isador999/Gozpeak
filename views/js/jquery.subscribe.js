//// BEGIN TEST OF FEEDBACK AND VALIDATION - Not working now ////

//$('#modalInscription').click(function () {
    //$('#registerModal').modal('show');
    //$('#btn-t-c').click(function () {
        //$('#t_and_c_m').modal('show');
//        $('.hide-t-c').click(function () {
//            $('#t_and_c_m').modal('hide');
//        });
//    });
//    registerValidate();
//});



//function registerValidate() {
//    var form = document.getElementById('inscriptionForm');
//    validatePseudo();
//    validateEmail();
//    //validateConfirmEmail();
//    validatePassword();
//    validateConfirmPassword();
//    form.addEventListener("submit", function (event) {
//        event.preventDefault(); // keep modal window open
//        // if form is valid
//        if (form.checkValidity()) {
//            var pseudo = $("input#inputpseudo").val();
//            var email = $("input#inputmail").val();
//            var password = $("input#inputpassword").val();
//
//            if (registerAuser(pseudo, email, password)) {
//                // register succeed:
//                $('#inscription-succeed').modal('show');
//                document.getElementById("congratulations-user").innerHTML =
//                    firstname;
//                setTimeout(
//                    function () {
//                        //$('#modalInscription').modal('hide');
//                        $('#inscription-succeed').modal('hide');
//                    }, 4000);
//            } else {
//                // register not succeed
//            }
//        }
//    }, false);
//}
//
//
//
//function validatePseudo() {
//    var pseudo = document.getElementById('pseudo');
//    pseudo.addEventListener("keyup", function (event) {
//        if (pseudo.validity.valid) {
//            document.getElementById('form-group-pseudo').className =
//                "form-group has-success has-feedback";
//            //document.getElementById('form-span-first-name').className =
//            //    "glyphicon glyphicon-ok form-control-feedback";
//        } else {
//            document.getElementById('form-group-pseudo').className =
//                "form-group has-error has-feedback";
//            //document.getElementById('form-span-first-name').className =
//            //    "glyphicon glyphicon-remove form-control-feedback";
//        }
//    }, false);
//}
//
//
//function validateEmail() {
//    var email = document.getElementById('inputmail');
//    email.addEventListener("keyup", function (event) {
//        document.getElementById('inputmail').title = "Email address";
//        document.getElementById('inputmail').setCustomValidity('');
//        if (email.validity.valid) {
//            var inputemail = $("input#inputmail").val();
//            if (unregisteredEmail(inputemail)) {
//                document.getElementById('form-group-mail').className =
//                    "form-group has-success has-feedback";
//                //document.getElementById('form-span-email').className =
//                //    "glyphicon glyphicon-ok form-control-feedback";
//            } else {
//                document.getElementById('form-group-mail').className =
//                    "form-group has-warning has-feedback";
//                //document.getElementById('form-span-email').className =
//                //    "glyphicon glyphicon-warning-sign form-control-feedback";
//                document.getElementById('inputmail').title =
//                    inputemail + " is already registered!";
//                document.getElementById('inputmail').setCustomValidity(inputemail +
//                " is already registered !");
//            }
//        } else {
//            document.getElementById('form-group-mail').className =
//                "form-group has-error has-feedback";
//            //document.getElementById('form-span-email').className =
//            //    "glyphicon glyphicon-remove form-control-feedback";
//        }
//    }, false);
//}
//
//
//
//function validatePassword() {
//    var password = document.getElementById('password');
//    password.addEventListener("keyup", function (event) {
//        var password = $("input#inputpassword").val();
//        var passwordcf = $("input#inputpassword_check").val();
//        document.getElementById('inputpassword_check').setCustomValidity('');
//        if (password.validity.valid) {
//            document.getElementById('form-group-password').className =
//                "form-group has-success has-feedback";
//            //document.getElementById('form-span-password').className =
//            //    "glyphicon glyphicon-ok form-control-feedback";
//        } else {
//            document.getElementById('form-group-password').className =
//                "form-group has-error has-feedback";
//            //document.getElementById('form-span-password').className =
//            //    "glyphicon glyphicon-remove form-control-feedback";
//        }
//        // check confirm password in case password is modified after confirm
//        // password
//        validateConfirmPasswordIn();
//    }, false);
//}
//
//
//function validateConfirmPassword() {
//    var passwordconfirm = document.getElementById('inputpassword_check');
//    passwordconfirm.addEventListener("keyup", function (event) {
//        validateConfirmPasswordIn();
//    }, false);
//}
//
//
//function validateConfirmPasswordIn() {
//    var password = $("input#inputpassword").val();
//    var passwordcf = $("input#inputpassword_check").val();
//    document.getElementById('inputpassword_check').setCustomValidity('');
//    if (passwordcf == password) {
//        document.getElementById('form-group-password_check').className =
//            "form-group has-success has-feedback";
//        //document.getElementById('form-span-password-confirm').className =
//        //    "glyphicon glyphicon-ok form-control-feedback";
//    } else {
//        document.getElementById('form-group-password_check').className =
//            "form-group has-error has-feedback";
//        //document.getElementById('form-span-password-confirm').className =
//        //    "glyphicon glyphicon-remove form-control-feedback";
//        document.getElementById('inputpassword_check').setCustomValidity("The password you typed in are not same!");
//    }
//}
//
//
//function registerAuser(pseudo, email, password) {
//    // register succeed:
//    return true;
//}

// END OF TEST FOR FEEDBACKS AND VALIDATION - Not Working for now //


$('#modalInscription').on('hidden.bs.modal', function() {
    $('#inscriptionForm').formValidation('resetForm', true);
});


$(document).ready(function() {
    $('#inscriptionForm').on('init.field.fv', function(e, data) {
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
	//err: {
        //	container: '#errors',
	//},
        icon: {
	    required: 'glyphicon glyphicon-asterisk',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            pseudo: {
		//validMessage: "Votre Zpeakname est valide ! ",
		//row: '.col-xs-4',
                validators: {
                    notEmpty: {
                        message: "Un pseudonyme est nécessaire pour vous inscrire"
                    },
		    stringLength: {
			min: 6,
                        max: 20,
                        message: "Votre pseudonyme doit comporter 6 caractères au minimum, et 20 caractères au maximum"
                    },
		    regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: "Le pseudo ne peut pas comporter des caractères spéciaux comme l'@, le point ou l'underscore (_)"
                    }
		    //blank: {}
                }
            },
            mail: {
		//validMessage: "L'adresse email semble valide",
                validators: {
                    notEmpty: {
                        message: "Votre adresse email est nécessaire pour vous inscrire"
                    },
		    stringLength: {
			min: 10,
                        max: 70,
                        message: "Une adresse mail doit comporter au moins 10 caractères"
                    },
                    emailAddress: {
                        message: "La valeur n'est pas une adresse email valide"
                    }
		//// MAILGUN EMAIL VALIDATION - NOT WORKING, RETURNS ALWAYS FALSE ... - COULD BE DONE LATER ////
		    //remote: {
                    //        type: 'GET',
                    //        url: 'https://api.mailgun.net/v2/address/validate?callback=?',
                    //        crossDomain: true,
                    //        name: 'address',
                    //        data: {
                                // Registry a Mailgun account and get a free API key
                                // at https://mailgun.com/signup
                    //            api_key: 'pubkey-1b350ebd8c22d76b249b1aec0e8d7ef7'
                    //        },
			//    dataType: 'jsonp',
                        //    validKey: 'is_valid',
                        //    message: 'Cette adresse email est invalide'
                        // }
		    //blank: {}
                }
            },
	    mail_check: {
		//validMessage: "Les adresses emails correspondent",
                validators: {
                    notEmpty: {
                        message: "Les adresses email doivent être identiques"
                    },
                    emailAddress: {
                        message: "La valeur n'est pas une adresse email valide"
                    },
		    identical: {
                        field: "mail",
                        message: "Les adresses email entrées ne correspondent pas"
                    }
		    //blank: {}
                }
            },
            password: {
		//validMessage: 'Le mot de passe respecte les consignes de sécurité',
                validators: {
                    notEmpty: {
                        message: "Veuillez choisir un mot de passe pour votre compte"
                    },
                    stringLength: {
                        min: 8,
                        max: 25,
                        message: "Le mot de passe doit comporter 8 caractères au minimum, et 25 caractères au maximum"
                    },
		    regexp: {
                            //regexp: /^[a-zA-Z0-9_\.]+$/,
                            regexp: /(?=.*[A-Z].*)(?=.*[0-9].*[0-9])(?=.*[!@#$&*].*)/,
                            message: "Le mot de passe doit comporter au minimum une majuscule, deux chiffres et un caractère spécial"
                    },
		    different: {
                        field: 'pseudo',
                        message: 'Le mot de passe doit être différent du pseudo'
                    }
		    //blank: {}
                }
            },
	    password_check: {
		//validMessage: 'Les mots de passe correspondent :) ',
                validators: {
                    notEmpty: {
                        message: "Veuillez confirmer votre mot de passe"
                    },
                    //stringLength: {
                    //    min: 8,
                    //    max: 25,
                    //    message: "Le mot de passe doit comporter 8 caractères au minimum, et 25 caractères au maximum"
                    //},
		    identical: {
                        field: "password",
                        message: "Les mots de passe entrés ne correspondent pas"
                    }
		    //blank: {}
                }
            }
        }
    })
    //// REMOTE MAIL VALIDATOR - ACCORDING TO FUTURE MAILGUN CHECK, FOR EXAMPLE ////
//    .on('success.validator.fv', function(e, data) {
//            if (data.field === 'mail' && data.validator === 'remote') {
//                var response = data.result;  // response is the result returned by MailGun API
//                if (response.did_you_mean) {
//                    // Update the message
//                    data.element                    // The field element
//                        .data('fv.messages')        // The message container
//                        .find('[data-fv-validator="remote"][data-fv-for="mail"]')
//                        .html('Did you mean ' + response.did_you_mean + '?')
//                        .show();
//                }
//            }
//    })
//    .on('err.validator.fv', function(e, data) {
//            if (data.field === 'mail' && data.validator === 'remote') {
//                var response = data.result;
//                // We need to reset the error message
//                data.element                // The field element
//                    .data('fv.messages')    // The message container
//                    .find('[data-fv-validator="remote"][data-fv-for="mail"]')
//                    .html(response.did_you_mean
//                                ? 'Did you mean ' + response.did_you_mean + '?'
//                                : 'The email is not valid')
//                    .show();
//            }
//        })
.on('success.form.fv', function(e) {
            // Reset the message element when the form is valid
            $('#errors').html('');
        })
        .on('err.field.fv', function(e, data) {
            // data.fv      --> The FormValidation instance
            // data.field   --> The field name
            // data.element --> The field element

            // Get the messages of field
            var messages = data.fv.getMessages(data.element);

            // Remove the field messages if they're already available
            $('#errors').find('li[data-field="' + data.field + '"]').remove();

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
                                $('#modalInscription').modal('hide');

                                // Focus on the invalid field
                                data.element.focus();
                            })
                    )
                    .appendTo('#inscription-errors');
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
            $('#errors').find('li[data-field="' + data.field + '"]').remove();
        })
        .on('err.form.fv', function(e) {
            // Show the message modal
            $('#modalInscription').modal('show');
        })

///// CONSERVE ALL OF THESE FOLLOWING SETTINGS //////////
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
		
		//$('#modalInscription').modal('hide');
		//$('#inscription-succeed').modal('show');
		fv.defaultSubmit()//.on('click', function(e) {
                         // Hide the modal first
			 //alert('TEST');
                         //$('#modalInscriptionSucceed').modal('show');;

		//('#modalInscription').click(function

		//$('#mymodal').on('hidden.bs.modal', function() {
		//  return false;
	})
    .on('success.form.fv', function(e) {
	//$('#modalInscription').modal('hide');
	setTimeout(showModalSuccess, 6000);
	//$("#modalInscriptionSucceed").modal('show', { backdrop: 'static',keyboard: false});
	});
});


//////// jQuery Ajax Method ////////
//jQuery(document).ready(function(){
//	$('#inscriptionForm').submit(function(){
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
//				document.getElementById('modalInscription').innerHTML = data;
//				$('#message').slideDown('slow');
//				$('#inscriptionForm img.loader').fadeOut('slow',function(){$(this).remove()});
//				$('#submit').removeAttr('disabled');
//				if(data.match('success') != null) $('#inscriptionForm').slideUp('slow');
//			//
//			//}
//		});
//
//		return false;
//
//	});

//});
              

//$(function() {
//  $('inscriptionForm').submit(function(e) {
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
//        $('#inscriptionForm').submit(function(){
//                var action = $(this).attr('action');
//
//                $("#modalInscription").slideUp(750,function() {
//                $('#modalInscription').hide();
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
//                                document.getElementById('modalInscription').innerHTML = data;
//                                $('#modalInscription').slideDown('slow');
//                                $('#inscriptionForm img.loader').fadeOut('slow',function(){$(this).remove()});
//                                $('#submit').removeAttr('disabled');
//                                if(data.match('success') != null) $('#inscriptionForm').slideUp('slow');
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
