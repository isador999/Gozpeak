/*$('#modalResetPass').on('hide.bs.modal', function() {
    $('#resetpassForm').formValidation('resetForm', true);
    $('#resetpass-errors').html('');
});*/


$(document).ready(function() {
    $('#resetpassForm')
        .on('init.field.fv', function(e, data) {
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
            message: "Cette valeur n'est pas valide",
            verbose: 'false',
            trigger: 'blur',
            icon: {
		required: 'glyphicon glyphicon-asterisk',
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
            	resettedpass: {
                //validMessage: 'Le mot de passe respecte les consignes de sécurité',
                	validators: {
                    		notEmpty: {
                        		message: "Veuillez remplir tous les champs"
                    		},
                    		stringLength: {
                       		 	min: 8,
                       		 	max: 25,
                       	 		message: "Le mot de passe doit comporter 8 caractères au minimum, et 25 caractères au maximum"
                    		},
                    		regexp: {
                        		regexp: /(?=.*[A-Z].*)(?=.*[0-9].*[0-9])(?=.*[!@#$&*].*)/,
                            		message: "Le mot de passe doit comporter au minimum une majuscule, deux chiffres et un caractère spécial"
                    		}
                	}
            	},
                resettedpass_check: {
                //validMessage: 'Les mots de passe correspondent :) ',
                	validators: {
                    		notEmpty: {
                       	 		message: "Veuillez confirmer votre mot de passe"
                    		},
                    		identical: {
                        		field: "resettedpass",
                       			message: "Les mots de passe entrés ne correspondent pas"
                    		}
                }
            }
            }
        })
    .on('success.form.fv', function(e) {
            // Reset the message element when the form is valid
            $('#resetpass-errors').html('');
        })
    .on('err.field.fv', function(e, data) {
            // data.fv      --> The FormValidation instance
            // data.field   --> The field name
            // data.element --> The field element

            // Get the messages of field
            var messages = data.fv.getMessages(data.element);

            // Remove the field messages if they're already available
            $('#resetpass-errors').find('li[data-field="' + data.field + '"]').remove();

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
                                $('#modalResetPassword').modal('hide');

                                // Focus on the invalid field
                                data.element.focus();
                            })
                    )
                    .appendTo('#resetpass-errors');
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
            $('#resetpass-errors').find('li[data-field="' + data.field + '"]').remove();
        })
     .on('err.form.fv', function(e) {
            // Show the message modal
            $('#modalResetPassword').modal('show');
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
        });
});
