<?= form_open(route_to(($display == 'new') ? 'blocsnotestype.create':'blocsnotestype.update'), ['id' => 'kt_blocstype_form', 'class' => 'kt-form', 'novalidate' => false]); ?>
    <input type="hidden" name="action" value="<?= $display; ?>" />
    <input type="hidden" name="id_type_blocnote" value="<?=  $form->id_type_blocnote ?? '' ?>" />
  
  

        <!--begin::Input group-->
        <div class="fv-row mb-15">
            <!--begin::Label-->
            <label for="titre" class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.titre')); ?>*</label>
            <input type="text" name="titre" class="form-control form-control-solid" autocomplete="titre" value="<?= old('titre', $form->titre ?? '') ?>">
            <?php if (has_error('titre')) : ?>
                <p class="text-danger"><?= error('titre') ?></p>
            <?php endif ?>
        </div>
        
        <!--begin::Modal footer-->
        <div class="modal-footer flex-center">
            <x-form-action-footer type="<?= $name; ?>"></x-form-action-footer>
        </div>
      
<?= form_close(); ?>