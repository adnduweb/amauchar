<script type="text/javascript">
"use strict";

// Class definition
var KTSettingsDetails = function () {
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

    var createTokenForm = function () {

        const modalLinkToken = document.getElementById('kt_modal_create_api_key');
        const modalToken = new bootstrap.Modal(modalLinkToken);
        const submitFormToken = document.getElementById('kt_api_key_create_submit');
        const formToken = document.getElementById('kt_modal_form_api_key');
        const modalLinkReadToken = document.getElementById('read-token');
        const modalReadToken = new bootstrap.Modal(modalLinkReadToken);

        submitFormToken.addEventListener('click', function (e) {
            e.preventDefault();


            // Show loading indication
            submitFormToken.setAttribute('data-kt-indicator', 'on');

            // Disable button to avoid multiple click
            submitFormToken.disabled = true;

            // Send ajax request
            axios.post(submitFormToken.closest('form').getAttribute('action'), new FormData(formToken))
                .then(function (response) {
                    toastr.success(response.data.messages.sucess);
                    modalToken.hide();                  
                    modalReadToken.show();
                    $('#responseContenu').html(response.data.display_kt_user_createToken);
                    $('#listtokens').html(response.data.listtokens);
                   // $.fn.modalReadToken.Constructor.prototype._enforceFocus = function() {};
                    console.log(document.querySelectorAll('[data-action="copy"]'));

                   // Select elements
                    const target = document.getElementById('kt_clipboard_4');
                    const button = target.nextElementSibling;

                    // Init clipboard -- for more info, please read the offical documentation: https://clipboardjs.com/
                    var clipboard = new ClipboardJS(button, {
                        target: target,
                        text: function () {
                            return target.innerHTML;
                        }
                    });


                    // Success action handler
                    clipboard.on('success', function (e) {
                        copytext(target.innerHTML);
                        
                        var checkIcon = button.querySelector('.bi.bi-check');
                        var svgIcon = button.querySelector('.svg-icon');

                        // Exit check icon when already showing
                        if (checkIcon) {
                            return;
                        }

                        // Create check icon
                        checkIcon = document.createElement('i');
                        checkIcon.classList.add('bi');
                        checkIcon.classList.add('bi-check');
                        checkIcon.classList.add('fs-2x');

                        // Append check icon
                        button.appendChild(checkIcon);

                        // Highlight target
                        const classes = ['text-success'];
                        target.classList.add(...classes);

                        // // Highlight button
                        // button.classList.add('btn-success');

                        // Hide copy icon
                        svgIcon.classList.add('d-none');

                        // Revert button label after 3 seconds
                        setTimeout(function () {
                            // Remove check icon
                            svgIcon.classList.remove('d-none');

                            // Revert icon
                            button.removeChild(checkIcon);

                            // Remove target highlight
                            target.classList.remove(...classes);

                            // // Remove button highlight
                            // button.classList.remove('btn-success');
                        }, 3000)
                    });
                                     
                })
                .catch(function (error) {})
                .then(function () {
                    // always executed
                    // Hide loading indication
                    submitFormToken.removeAttribute('data-kt-indicator');
                    // Enable button
                    submitFormToken.disabled = false;
               
                });
        
        });
    }


    var revokeAllToken = function () {
        revokeAllToken = document.querySelector('.revokeAllToken');
        revokeAllToken.addEventListener('click', function (e) {
            e.preventDefault();


            // Show loading indication
            revokeAllToken.setAttribute('data-kt-indicator', 'on');

            // Disable button to avoid multiple click
            revokeAllToken.disabled = true;

            // Send ajax request
            axios.delete('<?= route_to('deleteall.key.token'); ?>')
                .then(function (response) {
                    toastr.success(response.data.messages.sucess);
                    $('#listtokens').html(response.data.listtokens)
                })
                .catch(function (error) {})
                .then(function () {
                    // always executed
                    // Hide loading indication
                    revokeAllToken.removeAttribute('data-kt-indicator');

                    // Enable button
                    revokeAllToken.disabled = false;
                
            });
        });
    }

    var deleteToken = function () {

        deleteToken = document.querySelectorAll('[data-action="delete-key"]');
        if(deleteToken){

            deleteToken.forEach((item, index) => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Votre jeton',
                        input: 'text',
                        inputAttributes: {
                            autocapitalize: 'off'
                        },
                        // showCancelButton: true,
                        confirmButtonText: 'vérification',
                        showLoaderOnConfirm: true,
                        preConfirm: (jeton) => {
                            return axios.post("<?= route_to('users.delete.token') ?>", {jeton: jeton})
                            .then(response => {
                                console.log(response);
                                if (!response.data.ok) {
                                    throw new Error(response.data.errors)
                                }
                                $('#listtokens').html(response.data.listtokens)
                                return response.data.messages.sucess
                            })
                            .catch(error => {
                                Swal.showValidationMessage(
                                `Request failed: ${error}`
                                )
                            })
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                        }).then((response) => {
                        // silent
                    });
                });
            });
        }

    }


   
    

    var copytext = function (text) {
  
        var textField = document.createElement('textarea');
        textField.innerText = text;
        document.body.appendChild(textField);
        textField.select();
        textField.focus(); //SET FOCUS on the TEXTFIELD
        document.execCommand('copy');
        textField.remove();
        console.log('should have copied ' + text); 
    }

    // Public methods
    return {
        init: function () {
            form = document.getElementById('kt_settings_form');
            submitButton = form.querySelectorAll('.kt_settings_submit');
            createTokenForm();
            revokeAllToken();
            deleteToken();
            initValidation();
            handleForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTSettingsDetails.init();
});


</script>