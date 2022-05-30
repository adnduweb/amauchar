<?= form_open('', ['id' => 'kt_apps_form', 'class' => 'kt-form', 'novalidate' => false]); ?>
    <input type="hidden" name="id" value="<?= $form->getID(); ?>" />
    <input type="hidden" name="id_media_lang" value="<?= $formlang->id_media_lang; ?>" />
    
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2 required"><?= ucfirst(lang('Core.name')); ?></label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" required placeholder="" name="lang[<?= service('request')->getLocale(); ?>][titre]" type="text" value="<?= old('titre') ? old('titre') : $formlang->titre; ?>" kl_vkbd_parsed="true">
            <!--end::Input-->
            <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            <span class="form-text text-muted"><?= lang('Core.define_default_name_permission_delimiter'); ?></span>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2 "><?= ucfirst(lang('Core.description')); ?></label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="" value="<?= old('description') ? old('description') : $formlang->description; ?>" name="lang[<?= service('request')->getLocale(); ?>][description]" kl_vkbd_parsed="true">
            <!--end::Input-->
            <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
        </div>
        <!--end::Input group-->
         <!--begin::Input group-->
         <div class="fv-row mb-15">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.legende')); ?></label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="" value="<?= old('legende') ? old('legende') : $formlang->legende; ?>" name="lang[<?= service('request')->getLocale(); ?>][legende]" kl_vkbd_parsed="true">
            <!--end::Input-->
            <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
        </div>
        <!--end::Input group-->
    <!--end::User form-->

        <!--begin::Modal footer-->
        <div class="modal-footer flex-center">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
        <?php if (! empty($form->id)) { ?> <?= form_hidden('id', $form->id); ?> <?php } ?>
	<!-- end:: Content -->
<?= form_close(); ?>
