<?= form_open(route_to('user.save'), ['id' => 'kt_apps_form_new_user', 'class' => 'kt-form', 'novalidate' => false]); ?>
<input type="hidden" name="action" value="add_user" />
   

    <div class="fv-row row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-bold fs-6"> 
            <span><?= ucfirst(lang('Core.username')); ?></span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="<?= lang('Core.usernameFormTooltipInfo'); ?>"></i>
        </label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" readonly required placeholder="" name="username" value="<?= old('username') ? old('username') : $form->username; ?>" />
            <!--end::Input-->
        </div>
    </div>

    <div class="fv-row row mb-6">
        <!--begin::Label-->
        <label for="first_name" class="col-lg-4 col-form-label required fw-bold fs-6"> 
            <span><?= ucfirst(lang('Core.firstname')); ?></span>
        </label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid first_name" id="first_name" required placeholder="" name="first_name" value="<?= old('first_name') ? old('first_name') : $form->first_name; ?>" />
            <!--end::Input-->
        </div>
    </div>

    <div class="fv-row row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-bold fs-6"> <span><?= ucfirst(lang('Core.lastname')); ?></span>
        </label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" required placeholder="" name="last_name" value="<?= old('last_name') ? old('last_name') : $form->last_name; ?>" />
            <!--end::Input-->
        </div>
    </div>

    <div class="fv-row row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-bold fs-6"> 
            <span><?= ucfirst(lang('Core.email')); ?></span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="<?= lang('Core.EmailAddressMustBeActive'); ?> "></i>
        </label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Input-->
            <input type="email" class="form-control form-control-solid" required placeholder="" name="email" value="<?= old('email') ? old('email') : $form->email; ?>" />
            <!--end::Input-->
        </div>
    </div>

    <div class="fv-row row mb-6" data-kt-password-meter="true">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-bold fs-6" > 
            <span><?= ucfirst(lang('Core.newPassword')); ?></span>
        </label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Input-->
            <div class="position-relative mb-3">
                <input required class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="bi bi-eye-slash fs-2"></i>
                    <i class="bi bi-eye fs-2 d-none"></i>
                </span>
            </div>
            <!--end::Input wrapper-->
            <!--begin::Meter-->
            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
            </div>
            <!--end::Meter-->
            <div class="text-muted"><?= ucfirst(lang('Core.useOrMoreCharactersWithAMixOfLetters %s', [setting('Auth.minimumPasswordLength')])); ?></div>
        </div>
    </div>

    <div class="fv-row row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-bold fs-6"> 
            <span><?= ucfirst(lang('Core.confirmNewPassword')); ?></span>
        </label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Input-->
            <input required class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="pass_confirm" autocomplete="off" />
            <!--end::Input-->
        </div>
    </div>

    <div class="fv-row row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-bold fs-6"> 
            <span><?= ucfirst(lang('Core.groupes')); ?></span>
        </label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Input-->
            <select name="groups[]" required multiple aria-label="Select a <?= ucfirst(lang('Core.groupes')); ?>" data-control="select2" data-placeholder="<?= ucfirst(lang('Core.selectOption')); ?>" class="form-select form-control form-select-solid">
                <option></option>
                <?php foreach ($groups as $k => $group) { ?>
                    <option value="<?= $k; ?>" <?= old('group') ? 'selected' : ''; ?> ><?= ucfirst($group['title']); ?></option>
                <?php } ?>

            </select>
            <!--end::Input-->
        </div>
    </div>


    <!--begin::Modal footer-->
    <div class="modal-footer flex-center">
        <x-form-action-footer type="<?= $name; ?>"></x-form-action-footer>
    </div>
	<!-- end:: Content -->
<?= form_close(); ?>


<?= $this->section('pageAdminScripts') ?>

<script type="text/javascript">

var createUsername = function () {
    var fname = $('#kt_apps_form_new_user input[name=first_name]').val().substring(0, 1).toLowerCase();
    var lname = $('#kt_apps_form_new_user input[name=last_name]').val().toLowerCase();
    var username = fname + lname + Math.floor(Math.random() * (10000 + 1) + 1000);
    $('#kt_apps_form_new_user input[name=username]').val(username);
}

    $('#kt_apps_form_new_user input[name=first_name]').on('keyup', createUsername);
    $('#kt_apps_form_new_user input[name=last_name]').on('keyup', createUsername);

</script>

<?= $this->endSection() ?>