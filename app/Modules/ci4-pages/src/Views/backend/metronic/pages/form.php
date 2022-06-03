<?= $this->extend(config('Amauchar')->views['layout']) ?>
<?= $this->section('main') ?>

<?= view('Amauchar\Pages\Views\backend\metronic\pages\_form_section\cartd_top', [ 'formItem' => $formItem ?? null, 'active' => $active, 'name' => $name, 'itemCount' => $itemCount, 'supportedLocales' => $supportedLocales]) ?>


<div class="content  d-flex flex-column flex-column-fluid" id="kt_content_container">
<?= form_open_multipart(route_to('page.' . ($display == 'new') ? 'create':'update', $formItem->id), ['id' => 'kt_'.$display.'_'.$name.'_form', 'class' => 'kt-form form d-flex flex-column', 'novalidate' => false]); ?>
    <input type="hidden" name="action" value="<?= $display; ?>" />
    <input type="hidden" name="uuid" value="<?= $formItem->id ?? null; ?>" />
    <?php if ($display == 'edit'){ ?>
        <input type="hidden" name="saveauto" value="true" />
    <?php } ?>

 
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-xl-row">
        <!--begin::Sidebar-->
        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">

            <?= $this->include('Amauchar\Pages\Views\backend\metronic\pages\_form_section\_cards\card_1') ?>
            <?= $this->include('Amauchar\Pages\Views\backend\metronic\pages\_form_section\_cards\card_2') ?>
            
        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            
                <?=  $this->include('Amauchar\Pages\Views\backend\metronic\pages\_form_section\general') ?>
            <!--end:::Tab content-->
            
        </div>
        <!--end::Content-->
    </div>
    <!--end::Layout-->

 
<?= form_close(); ?>
</div>

<?= $this->endSection() ?>

<?= $this->section('AdminModal') ?>
    <?= view('Amauchar\Medias\Views\backend\metronic\_modals\ImageManger') ?>
<?= $this->endSection() ?>



<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Pages\Views\backend\metronic\pages\partials\_save_index_js') ?>
<?= $this->endSection() ?>