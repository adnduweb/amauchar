<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>
<div class="card ">
<?php if ($canDelete) : ?>
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
            <div class="card-title"></div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">

            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-<?= singular($name); ?>-table-toolbar="base">
            <form action="<?= route_to('log-delete-file'); ?>" class='form-horizontal' method="post">
                <input type="hidden" name="checked[]" value="<?= $logFile; ?>"/>
                <input type="submit" name="delete" class="btn btn-danger btn-sm" value="<?= lang('Logs.delete_file'); ?>" onclick="return confirm('<?= lang('Logs.delete_confirm') ?>')"/>
            </form>
            </div>
            <!--end::Toolbar-->

        </div>
        <!--end::Card toolbar-->
    </div>
    <?php endif ?>
    <!--end::Card header-->
    <div class="card-body p-0">


        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-5 nowrap" id="log">
                <tr>
                    <th class="min-w-125px"><?= lang('Logs.level'); ?></th>
                    <th class="min-w-125px"><?= lang('Logs.date'); ?></th>
                    <th class="min-w-125px"><?= lang('Logs.content'); ?></th>

                </tr>
                <tbody>
                <?php
                foreach ($logContent as $key => $log): ?>
                    <tr <?php if (array_key_exists('extra', $log)) : ?> style="cursor:pointer"
                        data-bs-toggle="collapse" data-bs-target="#stack<?= $key ?>" aria-controls="stack<?= $key ?>" aria-expanded="false"
                        <?php endif ?>
                    >
                        <td class="text-<?= $log['class']; ?>">
                            <span class="<?= $log['icon']; ?>" aria-hidden="true"></span>
                            &nbsp;<?= $log['level'] ?>
                        </td>
                        <td class="date"><?= app_date($log['date'], true) ?></td>
                        <td class="text">
                            <?= esc($log['content']) ?>
                            <?= (array_key_exists('extra', $log)) ? '...' : ''; ?>
                        </td>
                    </tr>

                    <?php
                    if (array_key_exists('extra', $log)): ?>

                        <tr class="collapse bg-light" id="stack<?= $key ?>">
                            <td colspan="3">
                                <pre class="text-wrap">
                                    <?= nl2br(trim(esc($log['extra']), " \n")) ?>
                                </pre>
                            </td>
                        </tr>
                    <?php
                    endif; ?>
                <?php
                endforeach; ?>
                </tbody>
            </table>

            <div class="mt-5 mb-5">
                <?= $makeLinks;?>
            </div>
            
        </div>

    </div>
</div>
<?php $this->endSection() ?>
