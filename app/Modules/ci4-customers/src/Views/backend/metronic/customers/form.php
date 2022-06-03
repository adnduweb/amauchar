<?= $this->extend(config('Amauchar')->views['layout']) ?>
<?= $this->section('main') ?>

<?= view('Amauchar\Customers\Views\backend\metronic\cartd_top', [ 'formItem' => $formItem ?? null, 'active' => $active, 'name' => $name, 'formItemAddresseDefaut' => $formItemAddresseDefaut ?? null]) ?>

<div class="content  d-flex flex-column flex-column-fluid" id="kt_content_container">
<?= form_open_multipart(route_to('customer.' . ($display == 'new') ? 'create':'update', $formItem->id), ['id' => 'kt_'.$display.'_'.$name.'_form', 'class' => 'kt-form form d-flex flex-column flex-lg-row', 'novalidate' => false]); ?>
    <input type="hidden" name="action" value="<?= $display; ?>" />
    <input type="hidden" name="uuid" value="<?= $formItem->uuid ?? null; ?>" />

    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <?= $this->include('Amauchar\Customers\backend\metronic\customers\form_section\_cards\cards_1') ?>
        <?= $this->include('Amauchar\Customers\backend\metronic\customers\form_section\_cards\cards_2') ?>

    </div>

    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

        <?= $this->include('Amauchar\Customers\backend\metronic\customers\form_section\general') ?>
        
         <!--begin::Modal footer-->
         <div class="modal-footer flex-center">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>


    </div>
    
    <?= form_close(); ?>

</div>
<?= $this->endSection() ?>

<?= $this->section('AdminModal') ?>
    <?= view('Amauchar\Medias\Views\backend\metronic\_modals\ImageManger') ?>
<?= $this->endSection() ?>


<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Customers\Views\backend\metronic\customers\partials\_save_index_js') ?>
<?= $this->endSection() ?>