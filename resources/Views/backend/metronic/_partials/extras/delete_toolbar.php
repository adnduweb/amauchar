<!--begin::Group actions-->
<div class="d-flex justify-content-end align-items-center d-none" data-kt-<?= singular($name); ?>-table-toolbar="selected">
    <div class="fw-bolder me-5">
    <span class="me-2" data-kt-<?= singular($name); ?>-table-select="selected_count"></span><?= lang('Core.selectedItem'); ?></div>
    <button type="button" class="btn btn-danger" data-kt-<?= singular($name); ?>-table-select="delete_selected"><?= lang('Core.deleteSelected'); ?></button>
</div>
<!--end::Group actions-->