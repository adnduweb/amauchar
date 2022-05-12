<!--begin::Modal - Update role-->
<div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <x-modal-action-header>Update User Role</x-modal-action-header>
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <?= form_open('', ['id' => 'kt_modal_update_role_form', 'class' => 'kt-form form', 'novalidate' => false]); ?>
                    <input type="hidden" name="action" value="edit_user_group" />
                    <input type="hidden" name="uuid" value="<?= $form->uuid; ?>" />
                    <!--begin::Notice-->
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                        <!--begin::Icon-->
                        <?= service('theme')->getSVG('duotone/Code/Warning-1-circle.svg', "svg-icon svg-icon-1"); ?>
                        <!--end::Icon-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1">
                            <!--begin::Content-->
                            <div class="fw-bold">
                                <div class="fs-6 text-gray-700">Please note that reducing a user role rank, that user will lose all priviledges that was assigned to the previous role.</div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                    <!--end::Notice-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold form-label mb-5">
                            <span class="required">Select a user role</span>
                        </label>
                        <!--end::Label-->
                        <?php $i = 0; foreach($groups as $k => $group){ ?>
                            <!--begin::Input row-->
                            <div class="d-flex">
                                <!--begin::Radio-->
                                <div class="form-check form-check-custom form-check-solid">

                                    <!--begin::Input-->
                                    <input <?= ($form->isSuperHero() == false && $form->isSuperCaptain() == false) ? 'disabled' : ''; ?> class="form-check-input me-3" <?= $form->inGroup($k) ? "checked='checked'" : ''; ?> name="groups[]" type="radio" value="<?= $k; ?>" id="kt_modal_update_role_option_<?= $k; ?>"  />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_role_option_<?= $k; ?>">
                                        <div class="fw-bolder text-gray-800"><?= ucfirst($group['title']); ?></div>
                                        <div class="text-gray-600"><?= $group['description']; ?></div>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Radio-->
                            </div>
                            <div class='separator separator-dashed my-5'></div>

                        <?php $i++; } ?>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <x-modal-action-footer type="<?= $name; ?>" submitaction="groups"></x-modal-action-footer>
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
<!--end::Modal - Update role-->

<?= $this->section('pageAdminScripts') ?>

<script type="text/javascript">

"use strict";

// Class definition
var KTUsersUpdateRole = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_update_role');
    const form = element.querySelector('#kt_modal_update_role_form');
    var spinner = document.querySelector('.card_profile [data-kt-search-element="spinner"]');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initUpdateRole = () => {

        // Submit button handler
        const submitButtonRole = element.querySelector('[data-kt-submit-action="users-groups"]');
        submitButtonRole.addEventListener('click', function (e) {
            // Prevent default button action
            e.preventDefault();

            submitButtonRole.setAttribute('data-kt-indicator', 'on'); // Show loading indication                       
            blockUI.block(); // Spinner
            submitButtonRole.disabled = true;// Disable button to avoid multiple click 

            axios.post("<?= route_to('users.update') ?>", $('#kt_modal_update_role_form').serialize())
            .then( response => {
                submitButtonRole.removeAttribute('data-kt-indicator'); // remove the indicator
                toastr.success(response.data.messages.success, _LANG_.updated + "!"); // Notif
                $('#kt_table_users_profile').html(response.data.display_kt_table_users_profile); // display the user
                blockUI.release(); // hide the spinner
                submitButtonRole.disabled = false; // hide the submit
                modal.hide(); // hide the modal
            })
            .catch(error => {blockUI.release(); submitButtonRole.disabled = false;}); 
        });
    }

    return {
        // Public functions
        init: function () {
            initUpdateRole();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdateRole.init();
});

</script>

<?= $this->endSection() ?>