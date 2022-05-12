<script type="text/javascript">
"use strict";

// Class definition
var KTCompanyDetails = function () {
    // Private variables
    var form;
    var submitButton;
    var validation;

    var handleForm = function () {

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            // Show loading indication
            form.setAttribute('data-kt-indicator', 'on');

            // Disable button to avoid multiple click
            form.disabled = true;

            // Send ajax request
            axios.post(form.closest('form').getAttribute('action'), new FormData(form))
            .then(function (response) {
                toastr.success(response.data.messages.sucess);
            })
            .catch(function (error) {})
            .then(function () {
                // always executed
                // Hide loading indication
                form.removeAttribute('data-kt-indicator');

                // Enable button
                form.disabled = false;
            });
        });
    }

    // Public methods
    return {
        init: function () {
            form = document.getElementById('kt_companies_form');
            submitButton = form.querySelectorAll('.kt_companies_submit');
            handleForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTCompanyDetails.init();
});

</script>