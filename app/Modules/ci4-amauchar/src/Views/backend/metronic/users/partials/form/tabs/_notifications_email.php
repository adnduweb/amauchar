 <!--begin::Card-->
 <div class="card pt-4 mb-6 mb-xl-9" id="kt_notification_form">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title flex-column">
            <h2><?= ucfirst(lang('Core.settings')); ?></h2>
            <div class="fs-6 fw-bold text-muted">Choose what messages you’d like to receive for each of your accounts.</div>
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Form-->

        <?= form_open('', ['id' => 'kt_users_notification_form', 'class' => 'kt-form form', 'novalidate' => false]); ?>
        <input type="hidden" name="action" value="edit_user_notification" />
        <input type="hidden" name="uuid" value="<?= $form->uuid; ?>" />
   
        <div class="form-group form-group-sm row mb-6 ">
            <label class="col-lg-4 col-form-label fw-bold fs-6"><?= ucfirst(lang('Core.forceUnlockMdp')); ?></label>
            <div class="col-lg-8">
                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" <?= ( service('settings')->get('App.forceUnlockMdp', 'user:' . Auth()->user()->id) == true) ? 'checked="checked"' : ''; ?> name="forceUnlockMdp" value="1"> 
                    <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
            </div>
        </div>

        <div  x-data="{ show: <?= (service('settings')->get('App.lockLoginIp', 'user:' . Auth()->user()->id) == true) ? 'true' : 'false'; ?> }" >
            <div class="form-group form-group-sm row mb-6 ">
                <label class="col-lg-4 col-form-label fw-bold fs-6"><?= ucfirst(lang('Core.lockLoginIp')); ?></label>
                <div class="col-lg-8">
                    <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                        <input @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }" class="form-check-input" type="checkbox" <?= ( service('settings')->get('App.lockLoginIp', 'user:' . Auth()->user()->id) == true) ? 'checked="checked"' : ''; ?> name="lockLoginIp" value="1"> 
                        <label class="form-check-label" for="flexCheckDefault"></label>
                    </div>
                </div>
            </div>

        

            <div  x-show="show" style="display:none" class="row mb-6">
                <label for="nameApp" class="col-lg-4 col-form-label fw-bold fs-6"><?= ucfirst(lang('Core.adresseIp')); ?> : </label>
                <div class="col-lg-8">
                     <?php $adresseIpUnlock = (service('settings')->get('App.adresseIpUnlock', 'user:' . Auth()->user()->id)) ?   implode(';', service('settings')->get('App.adresseIpUnlock', 'user:' . Auth()->user()->id)) : ''; ?>
                    <input class="form-control form-control-solid" required type="text" value="<?= old('adresseIpUnlock') ? old('adresseIpUnlock') : $adresseIpUnlock ?>" name="adresseIpUnlock" id="adresseIpUnlock">
                    <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
                    <p class="text-muted"> <?= ucfirst(lang('Core.ipAutoriseText')); ?> </p>
                </div>
            </div>
        </div>
            <!--begin::Action buttons-->
            <div class="d-flex justify-content-end align-items-center mt-12">
                <x-modal-action-footer type="<?= $name; ?>" submitaction="settings" dismiss="false" ></x-modal-action-footer>
            </div>
            <!--begin::Action buttons-->
        <?= form_close(); ?>
        <!--end::Form-->
    </div>
    <!--end::Card body-->
</div> 
<!--end::Card-->

<?= $this->section('pageAdminScripts') ?>
<script type="text/javascript">

"use strict";

// Class definition
var KTUsersUpdateNotification = function () {
    // Shared variables
    const element = document.getElementById('kt_notification_form');
    const form = element.querySelector('#kt_users_notification_form');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initUpdateNotification = () => {

        // Submit button handler
        const submitButtonNotification = element.querySelector('[data-kt-submit-action="users-settings"]');
        submitButtonNotification.addEventListener('click', function (e) {
            // Prevent default button action
            e.preventDefault();

            submitButtonNotification.setAttribute('data-kt-indicator', 'on'); // Show loading indication                       
            submitButtonNotification.disabled = true;// Disable button to avoid multiple click 

            axios.post("<?= route_to('users.update') ?>", $('#kt_users_notification_form').serialize())
            .then( response => {
                submitButtonNotification.removeAttribute('data-kt-indicator'); // remove the indicator
                toastr.success(response.data.messages.success, _LANG_.updated + "!"); // Notifils'
                submitButtonNotification.disabled = false; // hide the submit
                modal.hide(); // hide the modal
            })
            .catch(error => { submitButtonNotification.disabled = false; // hide the submit
            }); 
        });
    }

    return {
        // Public functions
        init: function () {
            initUpdateNotification();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdateNotification.init();
});

</script>

<?= $this->endSection() ?>