<?= form_open(route_to('meuble.' . ($display == 'new') ? 'create':'update', $formNote->id), ['id' => 'kt_form_'.$name, 'class' => 'kt-form', 'novalidate' => false]); ?>
<input type="hidden" name="action" value="<?= $display; ?>" />
    
     <!--begin::Input group-->
     <div class="fv-row mb-15">
            <!--begin::Label-->
            <label for="titre" class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.titre')); ?>*</label>
            <input type="text" name="titre" class="form-control form-control-solid" autocomplete="titre" value="<?= old('titre', $formNote->titre ?? '') ?>">
        </div>

        <!--begin::Input group-->
        <div class="fv-row mb-15">
                <!--begin::Label-->
            <label for="titre" class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.type')); ?>*</label>
            <select class="form-select mb-2" required id="blocnote_type_id" name="blocnote_type_id" data-control="select2" data-placeholder="<?= ucfirst(lang('Core.selectOption')); ?>" data-allow-clear="true"  data-hide-search="false" data-placeholder="<?= ucfirst(lang('Core.selectOption')); ?>" id="kt_vassorts_designations_select">
                <option></option> 
                <?php if(!empty($blocsType)){ ?>
                    <?php foreach($blocsType as $blocType){ ?>
                        <option <?= old('blocnote_type_id') ==  $formNote->blocnote_type_id || $formNote->blocnote_type_id ==  $blocType->id_type_blocnote ?  'selected' : '' ?>  value="<?= $blocType->id_type_blocnote; ?>"><?= $blocType->titre ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
            <!--end::Select2-->
        </div>

        <!--begin::Input group-->
        <div class="fv-row mb-15">
            <!--begin::Label-->
            <label for="contenu" class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.contenu')); ?>*</label>
            <!--end::Label-->
            <textarea name="contenu" rows="3" data-provide="markdown"  class="form-control form-control-solid"><?= old('contenu', $formNote->contenu ?? '') ?></textarea>
        </div>

    <!--begin::Modal footer-->
    <div class="modal-footer flex-center">
        <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
    </div>
    <?php if (! empty($formNote->id)) { ?> <?= form_hidden('id', $formNote->id); ?> <?php } ?>
	<!-- end:: Content -->

<?= form_close(); ?>
