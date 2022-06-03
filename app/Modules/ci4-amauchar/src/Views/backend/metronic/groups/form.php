<?= $this->extend(config('Amauchar')->views['layout']) ?>
<?= $this->section('main') ?>


<div id="kt_content_container" class="container-xxl">
    <div class="card">
        <!--begin::Body-->
        <div class="card-body p-lg-17">
            <!--begin::About-->
            <div class="mb-18">
                <!--begin::Description-->
                <div class="fs-5 fw-bold text-gray-600">
                    <?= $this->include('Amauchar\Core\backend\metronic\groups\partials\form\general') ?>
                </div>
                <!--end::Description-->
                <div id="kt_user_view_overview_permissions_tab">
                    <?= $this->include('Amauchar\Core\backend\metronic\groups\partials\form\permissions') ?>
                </div>
            </div>
            <!--end::About-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::About card-->

</div>

<?= $this->endSection() ?>

<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Core\Views\backend\metronic\groups\partials\_save_js') ?>
<?= $this->endSection() ?>