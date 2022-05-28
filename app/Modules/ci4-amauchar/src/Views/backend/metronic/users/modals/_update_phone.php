<!--begin::Modal - Update email-->
<div class="modal fade" id="kt_modal_update_phone" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <x-modal-action-header><?= ucfirst(lang('Core.updatePhone')); ?></x-modal-action-header>
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <?= form_open('', ['id' => 'kt_modal_update_phone_form', 'class' => 'kt-form form', 'novalidate' => false]); ?>
                    <input type="hidden" name="action" value="edit_user_phone" />
                    <input type="hidden" name="uuid" value="<?= $form->uuid; ?>" />
                    <input type="hidden" name="id" value="<?= $form->id; ?>" />
                    <input type="hidden" class="address_id" name="address[id]" value="<?= (!empty($adresseDefault)) ? $adresseDefault->id : ''; ?>" />

                    <!--begin::Notice-->
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                        <!--begin::Icon-->
                        <?= service('theme')->getSVG('duotone/Code/Warning-1-circle.svg', "svg-icon svg-icon-2tx svg-icon-primary me-4"); ?>
                        <!--end::Icon-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1">
                            <!--begin::Content-->
                            <div class="fw-bold">
                                <div class="fs-6 text-gray-700"><?= ucfirst(lang('Core.PleaseNoteThatAValidPhoneIsRequiredToCompleteThePhoneVerification')); ?></div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label for="phone" class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.phone')); ?>*</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid phone" placeholder="" name="address[phone]" value="<?= (!empty($adresseDefault->phone)) ? $adresseDefault->phone : ''; ?>" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label for="phone_mobile" class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.phone_mobile')); ?>*</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid phone" placeholder="" name="address[phone_mobile]" value="<?= (!empty($adresseDefault->phone_mobile)) ? $adresseDefault->phone_mobile : ''; ?>" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <x-modal-action-footer type="<?= $name; ?>" submitaction="phone"></x-modal-action-footer>
                    </div>
                    <!--end::Actions-->
                <?= form_close(); ?>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Update email-->


<?= $this->section('pageAdminScripts') ?>

<script type="text/javascript">

"use strict";

// Class definition
var KTUsersUpdatePhone = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_update_phone');
    const form = element.querySelector('#kt_modal_update_phone_form');
    var spinner = document.querySelector('.card_profile [data-kt-search-element="spinner"]');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initUpdatePhone = () => {

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'phone': {
                        validators: {
                            callback: {
                                message: 'The phone number is not valid',
                            }
                        }
                    },
                    'phone_mobile': {
                        validators: {
                            callback: {
                                message: 'The phone number is not valid',
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


        // Submit button handler
        const submitButtonPhone = element.querySelector('[data-kt-submit-action="users-phone"]');
        submitButtonPhone.addEventListener('click', function (e) {
            // Prevent default button action
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated Email!');

                    if (status == 'Valid') {
                        // Prevent default button action
                        e.preventDefault();

                        submitButtonPhone.setAttribute('data-kt-indicator', 'on'); // Show loading indication         
                        blockUI.block();              
                        submitButtonPhone.disabled = true;// Disable button to avoid multiple click 

                        axios.post("<?= route_to('users.update') ?>", $('#kt_modal_update_phone_form').serialize())
                        .then( response => {
                            submitButtonPhone.removeAttribute('data-kt-indicator'); // remove the indicator
                            toastr.success(response.data.messages.success, _LANG_.updated + "!"); // Notif
                            $('input.address_id').val(response.data.address_id); // Add the address to the
                            $('#kt_table_users_profile').html(response.data.display_kt_table_users_profile); // display the user
                            blockUI.release(); // hide the spinner
                            submitButtonPhone.disabled = false; // hide the submit
                            modal.hide(); // hide the modal
                        })
                        .catch(error => {blockUI.release(); submitButtonPhone.disabled = false;}); 
                    }
                });
            }
        });
    }

    return {
        // Public functions
        init: function () {
            initUpdatePhone();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdatePhone.init();
});

</script>

<?= $this->endSection() ?>