<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>


<div id="kt_content_container" class="container-xxl">
    <div class="card">
        <!--begin::Body-->
        <div class="card-body p-lg-17">
            <!--begin::About-->
            <div class="mb-18">
                <!--begin::Description-->
                <div class="fs-5 fw-bold text-gray-600">
                    <?= $this->include('Amauchar\Core\backend\metronic\blocnotes\type\partials\form\general') ?>
                </div>
            </div>
            <!--end::About-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::About card-->

</div>

<?= $this->endSection() ?>
