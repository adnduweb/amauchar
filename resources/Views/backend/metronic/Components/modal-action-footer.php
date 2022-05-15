 <!--begin::Button-->
<?php $dismiss = $dismiss ?? ''; ?> 
<?php if($dismiss == false){ ?>
 <!--begin::Button-->
<button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal"> <?= ucfirst(lang('Core.discard')); ?></button>
<!--end::Button-->
<?php } ?>
<!--begin::Button-->
 <button type="button" class="btn btn-primary" id="kt_<?= $type ?? '' ?>_<?= $submitaction ?? '' ?>_submit" data-kt-submit-action="<?= $type ?? '' ?>-<?= $submitaction ?? '' ?>">
    <span class="indicator-label"><?=lang('Core.saveData'); ?></span>
    <span class="indicator-progress"><?=lang('Core.loading'); ?>
    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
</button>
<!--end::Button-->