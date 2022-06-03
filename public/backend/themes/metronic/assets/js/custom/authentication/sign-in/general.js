"use strict";

// Class definition
var KTSigninGeneral = function() {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Handle form
    var handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form, {
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
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: _LANG_.PasswordIsRequired
                            },
                            callback: {
                                message: _LANG_.PleaseEnterValidPassword
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

        // Handle form submit
        submitButton.addEventListener('click', function(e) {
            // Prevent button default action
            e.preventDefault();

            // Validate form
            validator.validate().then(function(status) {

                if (status === 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;


                    axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form))
                        .then(function(response) {
                            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: response.data.messages.sucess,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500,
                            }).then(function(result) {
                                form.querySelector('[name="email"]').value = "";
                                form.querySelector('[name="password"]').value = "";
                                //window.location.href = response.data.redirect;
                                //location.reload();
                            });

                        })
                        .catch(function(error) {
                            // always executed
                            // Hide loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;
                        })
                        .then(function() {
                            // always executed
                            // Hide loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;
                        });
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: _LANG_.sorryLooksLikeThereArSomeErrorsDetectedPleaseTryAgain,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: _LANG_.close,
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
        });
    }

    // Public functions
    return {
        // Initialization
        init: function() {
            form = document.querySelector('#kt_sign_in_form');
            submitButton = document.querySelector('#kt_sign_in_submit');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSigninGeneral.init();
});