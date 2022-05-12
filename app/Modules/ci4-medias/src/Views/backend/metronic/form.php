<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>

<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

	<div id="kt_content_permissions" class="container-xxl">
		<!--begin::About card-->
		<div class="card">
			<!--begin::Body-->
			<div class="card-body p-lg-17">

                <?= $this->include('Amauchar\Medias\backend\metronic\__form_section\tabs') ?>
                
                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="kt_media_view_general" role="tabpanel">
                        <?= $this->include('Amauchar\Medias\backend\metronic\__form_section\general') ?>
                    </div>

                    <div class="tab-pane fade" id="kt_media_view_list" role="tabpanel">
                        <?= $this->include('Amauchar\Medias\backend\metronic\__form_section\list') ?>
                    </div>

                </div>

			</div>
            <!--end::Body-->

            <div class="modal modal-stick-to-bottom fade show manager" id="getCroppedCanvasModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ImageManagerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ImageManagerModalLabel"><?= lang('Medias.CropFile'); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="la la-close"></i>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        </div>
                    </div>
                </div>
            </div>

            <div id="cropImage2"></div>
		</div>
        <!--end::About card-->
	</div>

</div>



<?= $this->endSection() ?>

<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Medias\Views\backend\metronic\partials\_save_js') ?>
<?= $this->endSection() ?>