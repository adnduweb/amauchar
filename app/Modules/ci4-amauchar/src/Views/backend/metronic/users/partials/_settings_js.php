<script type="text/javascript">
"use strict";

// Class definition
var KTSettingsUsersDetails = function () {
    // Private variables
    var form;
    var submitButton;
    var validation;

    // Private functions
    var initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation: https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {},
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
    }

    var handleForm = function () {
        submitButton.forEach((item, index) => {
            item.addEventListener('click', function (e) {
                e.preventDefault();

                // Validate form
                validation.validate().then(function (status) {
                    if (status === 'Valid') {
                        // Show loading indication
                        item.setAttribute('data-kt-indicator', 'on');

                        // Disable button to avoid multiple click
                        item.disabled = true;

                        // Send ajax request
                        axios.post(item.closest('form').getAttribute('action'), new FormData(form))
                            .then(function (response) {
                                // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                // Swal.fire({
                                //     text: response.data.messages.sucess,
                                //     icon: "success",
                                //     buttonsStyling: false,
                                //     confirmButtonText: "Ok, got it!",
                                //     customClass: {
                                //         confirmButton: "btn btn-primary"
                                //     }
                                // }).then(function (result) {
                                //     if (result.isConfirmed) {
                                //     }
                                // });
                                //toastr.success((response.data.messages.sucess != undefined ? response.data.messages.sucess :response.data.messages.sucess), responseTitle);
                                toastr.success(response.data.messages.sucess);
                            })
                            .catch(function (error) {})
                            .then(function () {
                                // always executed
                                // Hide loading indication
                                item.removeAttribute('data-kt-indicator');

                                // Enable button
                                item.disabled = false;
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
        });
    }

    // Public methods
    return {
        init: function () {
            form = document.getElementById('kt_users_form');
            submitButton = form.querySelectorAll('.kt_users_submit');

            initValidation();
            handleForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTSettingsUsersDetails.init();
});


</script>