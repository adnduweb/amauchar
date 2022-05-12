<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>


    <div id="kt_translate" class="d-flex flex-column-fluid">

        <div class="container-fluid">
            <div class="flex-row ">
                <div class="card card-custom gutter-b">
                    <div class="card-header border-0 pt-6">
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

                                <?php if ($allow_import == true) { ?>
                                    <?= $this->include('\Themes\backend\metronic\_partials\extras\import_data') ?>
                                <?php } ?>

                                <?php if ($allow_export == true) { ?>
                                    <?= $this->include('\Themes\backend\metronic\_partials\extras\export_data') ?>
                                <?php } ?>
                            </div>
                            <!--end::Toolbar-->

                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none" data-kt-<?= singular($name); ?>-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                <span class="me-2" data-kt-<?= singular($name); ?>-table-select="selected_count"></span>Selected</div>
                                <button type="button" class="btn btn-danger" data-kt-<?= singular($name); ?>-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->

                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <div class="card-body">

                        <?= util()->notice(lang('Core.This is a very important notice! <br/> You must choose the language in the select chmaps before exporting or importing a file.'), 'info'); ?>
                        <div class="py-2">
                            <div id="searchLangue">
                                <?= $this->include('Amauchar\Core\Views\backend\metronic\translates\partials\searchLangue') ?>
                            </div>
                        </div>
                    </div>
                    <!--end: Datatable -->
                    <div id="response" class=" px-5"></div>
                </div>
                
            </div>
       
        </div>
    <?= $this->endSection() ?>


<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Core\Views\backend\metronic\translates\partials\_index_js') ?>
<?= $this->endSection() ?>
