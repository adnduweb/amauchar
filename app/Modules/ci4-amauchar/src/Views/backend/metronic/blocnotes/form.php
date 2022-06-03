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
                    <?= $this->include('Amauchar\Core\backend\metronic\blocnotes\partials\form\general') ?>
                </div>
            </div>
            <!--end::About-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::About card-->

</div>

<?= $this->include('Amauchar\Core\backend\metronic\blocnotes\_modals\type_modal') ?>

<?= $this->endSection() ?>


<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Core\Views\backend\metronic\blocnotes\partials\_save_index_js') ?>
<?= $this->endSection() ?>