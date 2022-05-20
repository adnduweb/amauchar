<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2><?= ucfirst(lang("Core.general")); ?></h2>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Input group-->
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="required form-label"><?= ucfirst(lang("Customer.raisonSocial")); ?></label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" required name="company" class="form-control mb-2" value="<?= old('company') ? old('company') : $formItem->company; ?>">
            <!--end::Input-->
            <!--begin::Description-->
            <div class="text-muted fs-7"><?= ucfirst(lang("Customer.raisonSocialUniqueText")); ?></div>
            <!--end::Description-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-wrap gap-5">
            <!--begin::Input group-->
            <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required form-label"><?= ucfirst(lang("Core.firstname")); ?></label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" required name="firstname" class="form-control mb-2" value="<?= old('firstname') ? old('firstname') : $formItem->firstname; ?>">
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row w-100 flex-md-root">
                <!--begin::Label-->
                <label class="required form-label"><?= ucfirst(lang("Core.lastname")); ?></label>
                    <!--end::Label-->
                <!--begin::Input-->
                <input type="text" required name="lastname" class="form-control mb-2" value="<?= old('lastname') ? old('lastname') : $formItem->lastname; ?>">
                <!--end::Input-->
            </div>
        <!--end::Input group-->
        </div>
        <!--end::Input group-->
         <!--begin::Input group-->
         <div class="mb-10 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="required form-label"><?= ucfirst(lang("Core.email")); ?></label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" required name="email" class="form-control mb-2" value="<?= old('email') ? old('email') : $formItem->email; ?>">
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.description')); ?>*</label>
            <!--end::Label-->
            <!--begin::Input-->
            <div class="tinymce">
                <textarea id="tinymce" name="description" class="tox-target tinymceInstance"> <?= old('description') ? old('description') : $formItem->getDescription(); ?> </textarea>
            </div>

            <!--end::Input-->
            <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
        </div>
        <!--end::Input group-->

    </div>
    <!--end::Card header-->
</div>