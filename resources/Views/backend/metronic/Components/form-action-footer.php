<button type="reset" id="kt_<?= $type ?? '' ?>_cancel" class="btn btn-light me-3 kt_<?= $type ?? '' ?>_cancel"> <?= ucfirst(lang('Core.discard')); ?></button>
<button type="submit" id="kt_<?= $type ?? '' ?>_submit" class="btn btn-primary kt_<?= $type ?? '' ?>_submit">
    <span class="indicator-label"> <?= ucfirst(lang('Core.saveForm')); ?></span>
    <span class="indicator-progress"><?= ucfirst(lang('Core.pleaseWait')); ?> 
        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
    </span>
</button>