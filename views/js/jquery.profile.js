
$('#modalProfileEdition').on('hidden.bs.modal', function() {
    $('#profileForm').formValidation('resetForm', true);
    $('#profile-errors').html('');
});

// $('#modalProfileEdition').on('shown.bs.modal', function () {
//   $('#lastname').focus();
// })

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
        //container: '#messages',
	framework: 'bootstrap',
  message: "Cette valeur n'est pas valide",
	verbose: 'false',
	excluded: 'disabled',
	trigger: 'blur',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            profile_pseudo: {
                validators: {
                    notEmpty: {
                        message: "Votre pseudo ne peut pas être vide"
                    }
                }
            },
            profile_lastname: {
              threshold: 1,
                validators: {
                    stringLength: {
                      min: 3,
                      max: 25,
                      message: "Votre nom doit comporter 3 caractères au minimum, et 25 caractères au maximum"
                    },
                }
            },
            profile_firstname: {
              threshold: 1,
                validators: {
                    stringLength: {
                      min: 2,
                      max: 25,
                      message: "Votre prénom doit comporter 2 caractères au minimum, et 25 caractères au maximum"
                    }
                }
            },
            profile_mail: {
                validators: {
                  notEmpty: {
                      message: "Votre email ne peut pas être vide"
                  }
                }
            },
            profile_nationality: {
              threshold: 1,
                validators: {
                  stringLength: {
                    min: 4,
                    max: 15,
                    message: "Votre nationalité n'est pas valide"
                  },
                  regexp: {
                    regexp: /^[a-zA-Z0-9_ç\.]+$/,
                    message: "La nationalité ne peut pas comporter de caractères spéciaux"
                  }
                }
            },
            profile_birthdate: {
              threshold: 1,
                validators: {
                  stringLength: {
                    min: 8,
                    max: 16,
                    message: "La date de naissance n'est' pas valide"
                  }
                }
            }
            // profile_languages: {
            //     threshold: 1,
            //     validators: {
            //       stringLength: {
            //         min: 5,
            //         max: 30,
            //         message: "Les langues parlées ne sont pas valides"
            //       }
            //     }
            // },
            // profile_languages: {
            //   threshold: 4,
            //   validators: {
            //     callback: {
            //       message: "Les langues parlées ne sont pas valides",
            //       callback: function(value, validator, $field) {
            //         // Get the selected options
            //         var options = validator.getFieldElements('profile_languages').val();
            //         return (options != null
            //         && options.length >= 1);
            //       }
            //     }
            //   }
            // }
        }
    })

    .on('success.form.fv', function(e) {
            // Reset the message element when the form is valid
            $('#profile-errors').html('');
            // $('#profileForm').find('[name="profile_languages"]')
            //         .multiselect({
            //             enableFiltering: true,
            //             includeSelectAllOption: true,
            //
            //             onChange: function(element, checked) {
            //                 $('#profileForm').formValidation('revalidateField', 'profile_languages');
            //                 adjustByScrollHeight();
            //             },
            //             onDropdownShown: function(e) {
            //                 adjustByScrollHeight();
            //             },
            //             onDropdownHidden: function(e) {
            //                 adjustByHeight();
            //             }
            //         })
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
                                $('#modalProfileEdition').modal('hide');

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
            $('#modalProfileEdition').modal('show');
        })
    .on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();

            // Some instances you can use are
            var $form = $(e.target),        // The form instance
                fv    = $(e.target).data('formValidation'); // FormValidation instance

	    // By default, this action will redirect to PHP Action of the form //
            fv.defaultSubmit()
	    //$('#modalConnection').on('#forgotpasslink', function(e) {
	      //$('#modalConnection').modal('close');
	      //$('#ModalForgottenPass').modal('show');
	    //});
        });
    // Enable the password/password_check validators if the password is not empty

    // Enable the email/email_check validators if the email is not empty
});




/*function GetProfileInfos(profile) {
  $.ajax({
    url: 'http://192.168.122.104:8001/controllers/getprofile.php?profil=demozpeak',     // process.php file resides in the same folder where this file resides
    type: 'POST',
    data: {
        id : id,    // id of selected record
    },
    success: function(response){
        // response from process.php which is an json object that contain data on diff index

        var data = JSON.parse(response);

        $('#selector1').val(data.val1);
        $('#selector2').val(data.val2);
        // and so on
    }
});*/


function GetProfileInfos(baseUrl, profile) {
  ajaxUrl = baseUrl;

  $.ajax({
    url: ajaxUrl+'/controllers/getprofile.php?profil=' + profile,
    type: 'GET',
    dataType: "html",
    success: function(response)
    {
      var data = JSON.parse(response);
      $("#profileForm").find("#profile_pseudo").val(data.pseudo);
      $("#profileForm").find("#profile_lastname").val(data.lastname);
      $("#profileForm").find("#profile_firstname").val(data.name);
      $("#profileForm").find("#profile_mail").val(data.email);
      $("#profileForm").find("#profile_nationality").val(data.nationality);
      $("#profileForm").find("#profile_birthdate").val(data.birthday);
    }
  });
}
