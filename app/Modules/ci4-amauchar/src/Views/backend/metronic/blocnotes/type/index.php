<?= $this->extend(config('Amauchar')->views['layout']) ?>
<?= $this->section('main') ?>

<?php $active = 'type'; ?>

<?= view('Amauchar\Core\backend\metronic\blocnotes\partials\_card_top', ['active' => $active]) ?>

<div class="card ">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6 pb-6">
        <!--begin::Card title-->
            <?= $this->include('\Themes\backend\metronic\_partials\extras\search') ?> 
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">

            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-<?= singular($name); ?>-table-toolbar="base">
            
                <?php if ($filterDatabase == true) { ?>
                    <?= $this->include('\Themes\backend\metronic\_partials\extras\filter_database') ?> 
                <?php } ?>


                <?php if ($allow_export == true) { ?>
                    <?= $this->include('\Themes\backend\metronic\_partials\extras\export_data') ?>
                <?php } ?>
            </div>
            <!--end::Toolbar-->

            <?= $this->include('\Themes\backend\metronic\_partials\extras\delete_toolbar') ?>

        </div>
        <!--end::Card toolbar-->
    </div>
                    

    <!--end::Card header-->
    <div class="card-body p-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5 table-bordered table-hover table-checkable dataTable no-footer dtr-inline datatableIdentifier" id="kt_table_<?= $name; ?>">
            <!--begin::Table head-->
            <thead class="thead-light">
                <!--begin::Table row-->
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input allCheck" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_<?= $name; ?> .form-check-input" value="1" />
                        </div>
                    </th>
                    <th class="min-w-125px" title="titre"><?= lang('Core.name'); ?></th>
                    <th class="min-w-125px" title="created_at"><?= lang('Core.created_at'); ?></th>
                    <th class="text-end min-w-70px" title="Action"><?= lang('Core.actions'); ?></th>

                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->

        </table>
    <!--end::Table-->
    </div>
    <!--end: Datatable -->
</div>

<?= $this->endSection() ?>


<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Core\Views\backend\metronic\blocnotes\type\partials\_table_index_js') ?>
<?= $this->endSection() ?>
