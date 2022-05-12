
<script type="text/javascript">

"use strict";

// Class Definition
var KTPasswordResetGeneral = function() {
    // Elements
    var form;
    var submitButton;
	var validator;

    var handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {					
					'email': {
                        validators: {
                            notEmpty: {
                                message: _LANG_.EmailAddressIsRequired
                            },
                            emailAddress: {
                                message: _LANG_.ValueIsNotAValidEmail
                            }
						}
					} 
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
						eleInvalidClass: '',
                        eleValidClass: ''
                    })
				}
			}
		);		

        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click 
                    submitButton.disabled = true;

                    axios.post("<?= route_to('magic.link.post') ?>", $('#kt_password_reset_form').serialize())
                    .then( response => {
                        submitButton.disabled = false;
                        toastr.success(response.data.messages.sucess); // Notif
                        //window.location.href = response.data.redirect;
                    })
                    .catch(error => { submitButton.disabled = false;});  						
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: _LANG_.SorryErrorsDetected,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: _LANG_.Fermer,
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });  
		});
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            form = document.querySelector('#kt_password_reset_form');
            submitButton = document.querySelector('#kt_password_reset_submit');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTPasswordResetGeneral.init();
});

</script>