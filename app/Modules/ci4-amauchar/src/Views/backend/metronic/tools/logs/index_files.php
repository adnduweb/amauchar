<?= $this->extend(config('Amauchar')->views['layout']) ?>
<?= $this->section('main') ?>
<div class="card ">
<form action="<?= route_to('logs.delete.file'); ?>" method="post">
<?= csrf_field() ?>
 <!--begin::Card header-->
 <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title"></div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">

            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-<?= singular($name); ?>-table-toolbar="base">
            
                <input type="submit" name="delete" id="delete-me" class="btn btn-sm btn-danger" value="<?= lang('Logs.delete_selected'); ?>" onclick="return confirm('<?= lang('Logs.delete_selected_confirm'); ?>')" />
                <input type="submit" value='<?= lang('Logs.delete_all'); ?>' name="delete_all" class="btn btn-sm btn-danger" onclick="return confirm('<?= lang('Logs.delete_all_confirm'); ?>')" />

            </div>
            <!--end::Toolbar-->

        </div>
        <!--end::Card toolbar-->
    </div>

    <!--end::Card header-->
    <div class="card-body p-0">

            <?php if (count($logs)) { ?> 

               

                <div class="table-responsive">
                <table id="kt_log_manager_list" class="table align-middle table-row-dashed fs-6 gy-5 logs" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_log_manager_list .form-check-input" value="1" />
                                </div>
                            </th>
                            <th class="min-w-125px date "><?= lang('Core.date'); ?></th>
                            <th class="min-w-125px file"><?= lang('Core.file'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($logs as $log) :
                            // Skip the index.html file.
                            if ($log === 'index.html') {
                                continue;
                            }
                            ?>
                        <tr>
                            <td class="column-check">
                                 <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" name="checked[]" type="checkbox" value="<?= esc($log); ?>" />
                                </div>
                            </td>
                            <td class='date'>
                                <a href='<?= route_to('logs.views.files', $log); ?>'>
                                    <?= date('F j, Y', strtotime(str_replace('.log', '', str_replace('log-', '', $log)))); ?>
                                </a>
                            </td>
                            <td><?= esc($log); ?></td>
                        </tr>
                            <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                </div>

                <div class="mt-5 mb-5">
                    <?= $pager->links('file', 'metronic_simple') ?>
                </div>
      
        <?php } else { ?>
        <div class="text-center">
            <i class="fas fa-clipboard-list fa-3x my-3"></i><br/> <?= lang('Logs.empty'); ?>
        </div>
    <?php } ?>
    </div>
    </form>
    </div>
<?php $this->endSection() ?>
