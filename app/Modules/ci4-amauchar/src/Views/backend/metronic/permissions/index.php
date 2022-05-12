<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>
<div class="card ">
                   

    <!--end::Card header-->
    <div class="card-body p-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_<?= $name; ?>">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th class="min-w-125px" title="Name"><?= lang('Core.name'); ?></th>
                    <th class="min-w-125px" title="Description"><?= lang('Core.description'); ?></th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <tbody>
                <?php foreach($permissions as $k => $permission){ ?>
                    <tr>
                        <td><?= $k; ?></td>
                        <td><?= $permission; ?></td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    <!--end::Table-->
    </div>
    <!--end: Datatable -->
</div>

<?= $this->endSection() ?>

