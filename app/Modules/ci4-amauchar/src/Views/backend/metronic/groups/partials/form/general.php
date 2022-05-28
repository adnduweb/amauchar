<?= form_open(route_to('groups.save'), ['id' => 'kt_groups_form', 'class' => 'kt-form', 'novalidate' => false]); ?>
    <input type="hidden" name="action" value="edit_group" />
    <input type="hidden" name="alias" value="<?= $alias; ?>" />
    <legend class="mb-5"><?= $group['title'] ?></legend>

        <!--begin::Input group-->
        <div class="fv-row mb-15">
            <!--begin::Label-->
            <label for="title" class="fs-6 fw-bold mb-2 required"><?= ucfirst(lang('Core.titre')); ?></label>
            <input type="text" name="title" class="form-control form-control-solid" autocomplete="title" value="<?= old('title', $group['title'] ?? '') ?>">
            <?php if (has_error('title')) : ?>
                <p class="text-danger"><?= error('title') ?></p>
            <?php endif ?>
        </div>

        <!--begin::Input group-->
        <div class="fv-row mb-15">
            <!--begin::Label-->
            <label for="description" class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.description')); ?></label>
            <!--end::Label-->
            <textarea name="description" rows="3" class="form-control form-control-solid"><?= old('description', $group['description'] ?? '') ?></textarea>
            <?php if (has_error('description')) : ?>
                <p class="text-danger"><?= error('description') ?></p>
            <?php endif ?>
        </div>
        <!--begin::Modal footer-->
        <div class="modal-footer flex-center">
            <x-form-action-footer type="<?= $name; ?>"></x-form-action-footer>
        </div>
      
<?= form_close(); ?>