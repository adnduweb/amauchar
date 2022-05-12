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
                                message: 'Email address is required'
                            },
                            emailAddress: {
                                message: 'The value is not a valid email address'
                            }
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            },
                            callback: {
                                message: 'Please enter valid password',
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
                                console.log(result);
                                form.querySelector('[name="email"]').value = "";
                                form.querySelector('[name="password"]').value = "";
                                window.location.href = response.data.redirect;
                            });
                            console.log(response);
                        })
                        .catch(
                            //     function(error) {
                            //     let dataMessage = error.response.data.message;
                            //     let dataErrors = error.response.data.errors;

                            //     for (const errorsKey in dataErrors) {
                            //         if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                            //         dataMessage += "\r\n" + dataErrors[errorsKey] + "\r\n";
                            //     }

                            //     if (error.response) {
                            //         Swal.fire({
                            //             html: dataMessage,
                            //             icon: "error",
                            //             buttonsStyling: false,
                            //             confirmButtonText: "Ok, got it!",
                            //             customClass: {
                            //                 confirmButton: "btn btn-primary"
                            //             }
                            //         });
                            //     }
                            // }
                        )
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
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
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