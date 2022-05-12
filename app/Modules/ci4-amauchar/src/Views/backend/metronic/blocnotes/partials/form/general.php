<?= form_open(route_to(($display == 'new') ? 'blocsnotes.create':'blocsnotes.update'), ['id' => 'kt_groups_form', 'class' => 'kt-form', 'novalidate' => false]); ?>
    <input type="hidden" name="action" value="<?= $display; ?>" />
    <input type="hidden" name="uuid" value="<?=  $form->uuid ?? '' ?>" />
  
  

        <!--begin::Input group-->
        <div class="fv-row mb-15">
            <!--begin::Label-->
            <label for="titre" class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.titre')); ?>*</label>
            <input type="text" name="titre" class="form-control form-control-solid" autocomplete="titre" value="<?= old('titre', $form->titre ?? '') ?>">
            <?php if (has_error('titre')) : ?>
                <p class="text-danger"><?= error('titre') ?></p>
            <?php endif ?>
        </div>

        <!--begin::Input group-->
        <div class="fv-row mb-15">
                <!--begin::Label-->
            <label for="titre" class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.type')); ?>*</label>
            <select class="form-select mb-2" required id="blocnote_type_id" name="blocnote_type_id" data-control="select2" data-placeholder="Select an option" data-allow-clear="true"  data-hide-search="false" data-placeholder="Select an option" id="kt_vassorts_designations_select">
                <option></option>
                <?php if(!empty($blocsType)){ ?>
                    <?php foreach($blocsType as $blocType){ ?>
                        <option <?= old('blocnote_type_id') ==  $form->blocnote_type_id || $form->blocnote_type_id ==  $blocType->id_type_blocnote ?  'selected' : '' ?>  value="<?= $blocType->id_type_blocnote; ?>"><?= $blocType->titre ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
            <!--end::Select2-->

            <!--begin::Button-->
            <a href="<?=current_url(); ?>#kt_add_blocs_type" class="btn btn-light-primary btn-sm mb-10"  data-bs-toggle="modal" data-bs-target="#kt_add_blocs_type">
                <?= service('theme')->getSVG("icons/duotune/arrows/arr087.svg", "svg-icon svg-icon-5 m-0"); ?>
                <span><?= lang('Core.addBlocType'); ?></span>
            </a>
            <!--end::Button-->
        </div>

        <!--begin::Input group-->
        <div class="fv-row mb-15">
            <!--begin::Label-->
            <label for="contenu" class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.contenu')); ?>*</label>
            <!--end::Label-->
            <textarea name="contenu" rows="3" data-provide="markdown"  class="form-control form-control-solid"><?= old('contenu', $form->contenu ?? '') ?></textarea>
            <?php if (has_error('contenu')) : ?>
                <p class="text-danger"><?= error('contenu') ?></p>
            <?php endif ?>
        </div>
        
        <!--begin::Modal footer-->
        <div class="modal-footer flex-center">
            <x-form-action-footer type="<?= $name; ?>"></x-form-action-footer>
        </div>
      
<?= form_close(); ?>