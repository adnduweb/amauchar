<?php use \Adnduweb\Ci4Admin\Libraries\backend\Theme; ?>
<?= $this->extend('\Themes\backend\metronic\admin') ?>
<?= $this->section('main') ?>

<?= form_open('', ['id' => 'kt_apps_form', 'class' => 'kt-form', 'novalidate' => false]); ?>
<input type="hidden" name="action" value="<?= $action; ?>" />
<?php if ($action == 'edit'){ ?>
    <input type="hidden" name="saveauto" value="true" />
<?php } ?>

 
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-xl-row">
        <!--begin::Sidebar-->
        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">

            <?= $this->include('Adnduweb\Pages\backend\themes\metronic\pages\_form_section\_cards\card_1') ?>
            <?= $this->include('Adnduweb\Pages\backend\themes\metronic\pages\_form_section\_cards\card_2') ?>
            
        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-15">
            <?= $this->include('Adnduweb\Pages\backend\themes\metronic\pages\_form_section\tabs') ?>
            
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <?=  $this->include('Adnduweb\Pages\backend\themes\metronic\pages\_form_section\general') ?>
                <?=  $this->include('Adnduweb\Pages\backend\themes\metronic\pages\_form_section\composer') ?>
            </div>
            <!--end:::Tab content-->
            
        </div>
        <!--end::Content-->
    </div>
    <!--end::Layout-->


<?= form_close(); ?>

<?= $this->endSection() ?>