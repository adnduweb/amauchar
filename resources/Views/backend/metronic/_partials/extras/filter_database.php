<!--begin::Filter-->
<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
    <?= service('theme')->getSVG('duotone/Text/Filter.svg', "svg-icon svg-icon-2"); ?>
    <?= lang('Core.filter'); ?>
</button>
<!--begin::Menu 1-->
<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
    <!--begin::Header-->
    <div class="px-7 py-5">
        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
    </div>
    <!--end::Header-->
    <!--begin::Separator-->
    <div class="separator border-gray-200"></div>
    <!--end::Separator-->
    <!--begin::Content-->
    <div class="px-7 py-5" data-kt-<?= singular($name); ?>-table-filter="form">
        <!--begin::Input group-->
        <div class="mb-10">
            <label class="form-label fs-6 fw-bold">Role:</label>
            <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-<?= singular($name); ?>-table-filter="role" data-hide-search="true">
                <option></option>
                <option value="Administrator">Administrator</option>
                <option value="Analyst">Analyst</option>
                <option value="Developer">Developer</option>
                <option value="Support">Support</option>
                <option value="Trial">Trial</option>
            </select>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="mb-10">
            <label class="form-label fs-6 fw-bold">Two Step Verification:</label>
            <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-<?= singular($name); ?>-table-filter="two-step" data-hide-search="true">
                <option></option>
                <option value="Enabled">Enabled</option>
            </select>
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-<?= singular($name); ?>-table-filter="reset">Reset</button>
            <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-<?= singular($name); ?>-table-filter="filter">Apply</button>
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Content-->
</div>
<!--end::Menu 1-->
<!--end::Filter-->
