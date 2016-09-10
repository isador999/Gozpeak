
function showDatetimePicker() {
	var currDate = new Date();
	var initDate = currDate.getFullYear() + "-" + currDate.getMonth() + "-" + currDate.getDate() + " " + currDate.getDay;	
	//var maxDate = initDate.getYear()+1 + '-' initDate.getMonth() + '-' initDate.getDate();
	var maxDate = (currDate.getFullYear()+1) + "-" + (currDate.getMonth()+2) + "-" + currDate.getDate();

	$("#datetime-btn").datetimepicker({
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
    //$('#datetime-btn').datetimepicker('update');
    /*$("#datetime-btn").datetimepicker().on('changeDate'), function (ev) {
	$("#input-test").change();
    };*/
};


$('#modalEventWithQuery').on('hidden.bs.modal', function() {
    $('#posteventForm').formValidation('resetForm', true);
    $('#postevent-errors').html('');
});

$(document).ready(function() {
    $('#posteventForm').on('init.field.fv', function(e, data) {
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
	live: 'enabled',
	message: "Cette valeur n'est pas valide",
	verbose: 'false',
	excluded: 'disabled',
	trigger: 'blur',
	err: {
        	container: '#postevent-errors',
	},
        icon: {
	    required: 'glyphicon glyphicon-asterisk',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            event_name: {
		//validMessage: "Votre Zpeakname est valide ! ",
		//row: '.col-xs-4',
                validators: {
                    notEmpty: {
                        message: "Le nom de l'événement est requis pour poster une sortie"
                    },
		    stringLength: {
			min: 6,
                        max: 20,
                        message: "Le nom de l'événement doit être composé de 6 caractères au minimum et 15 au maximum"
                    },
		    regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: "Le nom de l'événement ne peut pas comporter de caractères spéciaux"
                    }
		    //blank: {}
                }
            },
            event_place: {
		//validMessage: "L'adresse email semble valide",
                validators: {
                    notEmpty: {
                        message: "Le lieu de l'événement est requis pour poster une sortie"
                    },
		    stringLength: {
			min: 10,
                        max: 70,
                        message: "Le lieu de l'événement doit être composé de 6 caractères au minimum et 20"
                    },
		    regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: "Le lieu de l'événement ne peut pas comporter de caractères spéciaux"
                    }
                }
            },
	    /***** TO BE DONE WHEN DATETIME WILL WORKING *****/
	    event_datetime: {
		//validMessage: "Les adresses emails correspondent",
                validators: {
                    notEmpty: {
                        message: "La date de l'événement est obligatoire"
                    },
		    regexp: {
                        regexp: /^[0-9_\-\.]+$/,
                        message: "Le format de la date est incorrect"
                    }
                }
            },
            phone_number: {
		//validMessage: 'Le mot de passe respecte les consignes de sécurité',
                validators: {
                    stringLength: {
                        min: 0,
                        max: 10,
                        message: "Le numéro ne peut pas faire plus de 10 chiffres"
                    },
		    regexp: {
                            //regexp: /^(0)[679](\s?\d{2}){4}$/,
                            regexp: /^0[0-9]{9}$/,
                            message: "Numéro de téléphone invalide"
                    }
		    //blank: {}
                }
            },
	    lang: {
		//validMessage: 'Les mots de passe correspondent :) ',
                validators: {
                    notEmpty: {
                        message: "Veuillez selectionner une langue à pratiquer"
                    }
                }
            },
	    langlevel: {
		//validMessage: 'Les mots de passe correspondent :) ',
                validators: {
                    notEmpty: {
                        message: "Veuillez selectionner le niveau de langue conseillée pour la sortie"
                    }
                }
            },
	    query: {
		//validMessage: 'Les mots de passe correspondent :) ',
                validators: {
                    notEmpty: {
                        message: "Vous ne semblez pas avoir sélectionné de catégorie"
                    },
		    regexp: {
                            //regexp: /^(0)[679](\s?\d{2}){4}$/,
                            regexp: /^(run|party|art|eat)$/,
                            message: "Catégorie non valide"
                    }
                }
            }
        }
    })
    .on('success.form.fv', function(e) {
            // Reset the message element when the form is valid
            $('#postevent-errors').html('');
        })
        .on('err.field.fv', function(e, data) {
            // data.fv      --> The FormValidation instance
            // data.field   --> The field name
            // data.element --> The field element

            // Get the messages of field
            var messages = data.fv.getMessages(data.element);

            // Remove the field messages if they're already available
            $('#postevent-errors').find('li[data-field="' + data.field + '"]').remove();

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
                                $('#modalEventWithQuery').modal('hide');

                                // Focus on the invalid field
                                data.element.focus();
                            })
                    )
                    .appendTo('#postevent-errors');
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
            $('#postevent-errors').find('li[data-field="' + data.field + '"]').remove();
        })
        .on('err.form.fv', function(e) {
            // Show the message modal
            $('#modalEventWithQuery').modal('show');
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
		
		//$('#modalEventWithQuery').modal('hide');
		//$('#inscription-succeed').modal('show');
		fv.defaultSubmit()//.on('click', function(e) {
                         // Hide the modal first
			 //alert('TEST');
                         //$('#modalEventWithQuerySucceed').modal('show');;

		//('#modalEventWithQuery').click(function

		//$('#mymodal').on('hidden.bs.modal', function() {
		//  return false;
	})
    //.on('success.form.fv', function(e) {
	//setTimeout(showModalSuccess, 6000);
	//});
});

