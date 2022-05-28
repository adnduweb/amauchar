<script type="text/javascript">
"use strict";

// Class definition
var KTCreateUser = function() {
    // Elements
    var form;
    var submitButton;
    var validator;
    var passwordMeter;

    // Handle form
    var handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form, {
                fields: {
                    'first_name': {
                        validators: {
                            notEmpty: {
                                message: _LANG_.firstname_is_required
                            }
                        }
                    },
                    'last_name': {
                        validators: {
                            notEmpty: {
                                message: _LANG_.lastname_is_required
                            }
                        }
                    },
                    'email': {
                        validators: {
                            notEmpty: {
                                message: _LANG_.email_is_required
                            },
                            emailAddress: {
                                message: _LANG_.the_value_is_not_address_valid
                            }
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: _LANG_.PasswordIsRequired
                            },
                            callback: {
                                message: _LANG_.PleaseEnterValidPassword,
                                callback: function(input) {
                                    if (input.value.length > 0) {
                                        return validatePassword();
                                    }
                                }
                            }
                        }
                    },
                    'pass_confirm': {
                        validators: {
                            notEmpty: {
                                message: _LANG_.PleaseConfirmationIsRequired
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: _LANG_.PasswordAndItsConfirmAreNotTheSame
                            }
                        }
                    },
                    'group': {
                        validators: {
                            notEmpty: {
                                message: _LANG_.GroupIsRequired
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: false
                        }
                    }),
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

                    // Simulate ajax request
                    axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form))
                        .then(function(response) {
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
                        })
                        .catch(function(error) {
                            let dataMessage = error.response.data.message;
                            let dataErrors = error.response.data.errors;

                            for (const errorsKey in dataErrors) {
                                if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                                dataMessage += "\r\n" + dataErrors[errorsKey];
                            }

                            if (error.response) {
                                Swal.fire({
                                    text: dataMessage,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: _LANG_.Ok,
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
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
                        confirmButtonText: _LANG_.Ok,
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
        });

        // Handle password input
        form.querySelector('input[name="password"]').addEventListener('input', function() {
            if (this.value.length > 0) {
                validator.updateFieldStatus('password', 'NotValidated');
            }
        });
    }

    // Password input validation
    var validatePassword = function() {
        return (passwordMeter.getScore() > 50);
    }

    // Public functions
    return {
        // Initialization
        init: function() {
            form = document.querySelector('#kt_apps_form_new_user');
            submitButton = document.querySelector('#kt_users_submit');
            passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCreateUser.init();
});

</script>