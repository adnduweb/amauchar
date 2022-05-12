<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>
<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.serverInformation')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9">
        <div class="col-12 col-sm-12">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>PHP Version</td>
                        <td><?= PHP_VERSION ?></td>
                    </tr>
                    <tr>
                        <td>CodeIgniter Version</td>
                        <td><?= $ciVersion ?></td>
                    </tr>
                    <tr>
                        <td>SQL Engine</td>
                        <td><?= $dbDriver . ' ' . $dbVersion ?></td>
                    </tr>
                    <tr>
                        <td>Server OS</td>
                        <td><?= php_uname('s') ?> <?= php_uname('r') ?> (<?= php_uname('m') ?>)</td>
                    </tr>
                    <tr>
                        <td>Server Load</td>
                        <td><?= number_format($serverLoad, 1) ?></td>
                    </tr>
                    <tr>
                        <td>Max Upload</td>
                        <td><?= (int) (ini_get('upload_max_filesize')) ?>M</td>
                    </tr>
                    <tr>
                        <td>Max POST</td>
                        <td><?= (int) (ini_get('post_max_size')) ?>M</td>
                    </tr>
                    <tr>
                        <td>Memory Limit</td>
                        <td><?= (int) (ini_get('memory_limit')) ?>M</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.Filesystem')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9">

    
            <a href="<?= route_to('informations.php-info'); ?>" class="btn btn-primary btn-sm mb-5" target="_blank">View PHP Info</a>
  

     
        <div class="col-12 col-sm-12">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td colspan="3"><i class="far fa-file"></i> .env</td>
                        <td>
                            <?php if (is_file(ROOTPATH . '.env')) : ?>
                                <span class="text-success">present</span>
                            <?php else : ?>
                                <span class="text-danger">missing</span>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><i class="far fa-folder"></i> /writeable</td>
                        <td>
                            <?php if (is_really_writable(WRITEPATH)) : ?>
                                <span class="text-success">writeable</span>
                            <?php else : ?>
                                <span class="text-danger">not writeable</span>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php foreach (get_dir_file_info(WRITEPATH, true) as $folder => $info) : ?>
                    <tr>
                        <?php if (is_dir(WRITEPATH . $folder)) : ?>
                            <td colspan="3">
                                <i class="fas fa-minus"></i>
                                <i class="far fa-folder"></i>
                                <?= trim($folder, ' /') ?>
                            </td>
                        <?php else : ?>
                            <td>
                                <i class="fas fa-minus"></i>
                                <i class="far fa-file"></i>
                                <?= trim($folder, ' /') ?></td>
                            <td>
                                <?= lang('Bonfire.lastModified') ?>: <?= strftime('%c', $info['date']) ?></td>
                            <td>
                                <?= lang('Bonfire.fileSize') ?>: <?= number_to_size($info['size']) ?>
                            </td>
                        <?php endif ?>
                        <td>
                            <?php if (is_really_writable(WRITEPATH . $folder)) : ?>
                                <span class="text-success">writeable</span>
                            <?php else : ?>
                                <span class="text-danger">not writeable</span>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>