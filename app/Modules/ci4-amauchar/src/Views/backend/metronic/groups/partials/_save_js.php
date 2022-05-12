
<script type="text/javascript">
"use strict";

// Class definition
var KTGroupsDetails = function () {
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
                fields: {
                    'title': {
                        validators: {
                            notEmpty: {
                                message: 'title is required'
                            }
                        }
                    },
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

    }

    var handleForm = function () {
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            // Validate form
            validation.validate().then(function (status) {
                if (status === 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Send ajax request
                    axios.post("<?= route_to('groups.save') ?>", new FormData(form))
                        .then(function (response) {
                            toastr.success(response.data.messages.sucess);
                        })
                        .catch(function (error) {})
                        .then(function () {
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

    // Public methods
    return {
        init: function () {
            form = document.getElementById('kt_<?= $name; ?>_form');
            submitButton = form.querySelector('#kt_<?= $name; ?>_submit');

            initValidation();
            handleForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTGroupsDetails.init();
});

var KTUPermissionsUsersUpdate = function () {

const element = document.getElementById('kt_user_view_overview_permissions_tab');
const check = element.querySelector('#ckeck-list-checkbox');
const form = element.querySelector('#kt_users_permissions_form');
const inputCheck = element.querySelectorAll('.form-check input.permission_group');

// Init add schedule modal
var initPermissionsUserUpdateOnly = () => {

    inputCheck.forEach(d => {

        d.addEventListener('click', function (e) {

            if ($(this).is(':checked')) {
                var $action = 'add';
            } else {
                var $action = 'delete';
            }
            var $val = $(this).val();

            const formData = new FormData(form);
            formData.append('crud', $action); 

            axios.post("<?= route_to('group.save.permissions') ?>", formData)
            .then( response => {
                toastr.success(response.data.messages.sucess);
            })
            .catch(error => { }); 
        });

    });
}

return {
    // Public functions
    init: function () {
        initPermissionsUserUpdateOnly();
    }
};

}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
KTUPermissionsUsersUpdate.init();
});


</script>