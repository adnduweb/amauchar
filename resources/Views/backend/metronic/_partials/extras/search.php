<div class="card-title">
    <!--begin::Search-->
    <div class="d-flex align-items-center position-relative my-1">
        <?= theme()->getSVG('icons/duotune/general/gen021.svg', "svg-icon svg-icon-1 position-absolute ms-6"); ?>
        <input type="text" data-kt-<?= singular($name); ?>-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="<?= lang('Core.search'); ?>" />
    </div>
    <!--end::Search-->
</div>