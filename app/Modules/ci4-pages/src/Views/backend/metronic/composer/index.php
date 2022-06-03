<?= $this->extend(config('Amauchar')->views['layout']) ?>
<?= $this->section('main') ?>

<?= view('Amauchar\Pages\Views\backend\metronic\pages\_form_section\cartd_top', [ 'formItem' => $formItem ?? null, 'active' => $active, 'name' => $name, 'itemCount' => $itemCount, 'supportedLocales' => $supportedLocales]) ?>


<div class="content  d-flex flex-column flex-column-fluid" id="kt_content_container">
<?= form_open_multipart(route_to('page.composer.update', $formItem->id), ['id' => 'kt_'.$display.'_'.$name.'_form', 'class' => 'kt-form form d-flex flex-column', 'novalidate' => false]); ?>
    <input type="hidden" name="action" value="<?= $display; ?>" />
    <input type="hidden" name="id" value="<?= $formItem->id ?? null; ?>" />
    <?php if ($display == 'edit'){ ?>
        <input type="hidden" name="saveauto" value="true" />
    <?php } ?>

 
    <!--begin::Layout-->
    <div class="card">
        <div class="card-body">
            <?= $this->include('Amauchar\Pages\Views\backend\metronic\composer\composer') ?>
        </div>
    </div>
    <!--end::Layout-->


<?= form_close(); ?>

<div class="hidden">
    <?= view('\Amauchar\Pages\Views\backend\metronic\composer\_components\titre', ['composer' => $composer, 'k' => '', 'instanceComp' => $composer->getItemByInstance('titre')]); ?>
    <?= view('\Amauchar\Pages\Views\backend\metronic\composer\_components\texte', ['composer' => $composer, 'k' => '', 'instanceComp' => $composer->getItemByInstance('texte')]); ?>
</div>

</div>

<?= $this->endSection() ?>


<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Pages\Views\backend\metronic\pages\partials\_save_index_js') ?>
<?= $this->endSection() ?>