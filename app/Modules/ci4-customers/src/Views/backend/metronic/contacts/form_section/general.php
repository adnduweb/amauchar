<?= form_open(route_to('marque.' . ($display == 'new') ? 'create':'update', $formItem->id), ['id' => 'kt_form_'.$name, 'class' => 'kt-form', 'novalidate' => false]); ?>

<input type="hidden" name="action" value="<?= $display; ?>" />
    
    <!--begin::Input group-->
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.name')); ?>*</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" required placeholder="" name="name" type="text" value="<?= old('name') ? old('name') : $formItem->name; ?>" kl_vkbd_parsed="true">
        <!--end::Input-->
        <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
    </div>
    <!--end::Input group-->

    <!--begin::Modal footer-->
    <div class="modal-footer flex-center">
        <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
    </div>
    <?php if (! empty($formItem->id)) { ?> <?= form_hidden('id', $formItem->id); ?> <?php } ?>
	<!-- end:: Content -->
    
<?= form_close(); ?>
