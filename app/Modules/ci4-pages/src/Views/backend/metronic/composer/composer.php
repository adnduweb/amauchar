<!--begin::General options-->
<div class="pagebuilder card card-flush py-4">
    <div class="card-body pt-0">
        
            <div class="row gy-5 g-xl-10">
                

                <div class="col-xl-4 mb-xl-10">
                    <div class="comp-holder">
                    <div data-table="comp-<?= md5('image-01'); ?>" class="comp js-draggable draggable"  draggable='true' ondragstart='onDragStart(event);' ondragend="onDragEnd(event);">
                            [Image component]
                        </div>
                        <div data-table="comp-<?= md5('titre-01'); ?>" class="comp js-draggable draggable"  draggable='true' ondragstart='onDragStart(event);' ondragend="onDragEnd(event);">
                            [Titre component]
                        </div>
                        <div data-table="comp-<?= md5('texte-01'); ?>" class="comp js-draggable draggable"  draggable='true' ondragstart='onDragStart(event);' ondragend="onDragEnd(event);">
                            [Texte component]
                        </div>
                        <?php if(!empty($widgets)){ ?>
                            <?php foreach($widgets as $widget){ ?>
                                <?= $widget->compHolder; ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-8 mb-5 mb-xl-10">
                    <h3>Construction de la page</h3>
                    <div id="dropzone" class="editor-view p-5" ondragover='onDragOver(event);' ondrop='onDrop(event);'>
                    <?php if(!empty($composer)){ ?>

                        <?php foreach($composer->getItems() as $key => $items){ ?>
                            <?php foreach($items as $itemsKey => $item){  ?>
                                <?php if(in_array($itemsKey, ['titre', 'image', 'texte'])){ ?>
                                    <?= view('\Amauchar\Pages\Views\backend\metronic\composer\_components\\' . $itemsKey, ['composer' => $composer, 'k' => $key, 'instanceComp' => $items]); ?>
                                <?php }else{ ?>

                                    <?php if(!empty($widgets)){ ?>
                                        <?php foreach($widgets as $widget){ ?>
                                            <?php if(!empty($composer->getItemByInstance($itemsKey))){ ?>
                                            <?= $widget->viewStore; ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>

                                <?php } ?>

                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </div>

            </div>
            
        </div>

        <!--begin::Modal footer-->
        <div class="modal-footer flex-center">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>

        <?php if (! empty($form->id)) { ?> <?= form_hidden('id', $form->id); ?> <?php } ?>
        <?php if (! empty($form->id_page_lang)) { ?> <?= form_hidden('id_page_lang', $form->id_page_lang); ?> <?php } ?>
    <!-- end:: Content -->

    </div>
</div>

<?= $this->section('AdminModal') ?>
    <?= view('Amauchar\Medias\Views\backend\metronic\_modals\ImageManger') ?>
<?= $this->endSection() ?>

<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Pages\Views\backend\metronic\composer\partials\_save_compoments_js') ?>
<?= $this->endSection() ?>