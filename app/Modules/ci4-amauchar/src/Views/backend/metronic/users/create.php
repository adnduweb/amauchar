<?= $this->extend(config('Amauchar')->views['layout']) ?>
<?= $this->section('main') ?>

<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

	<div id="kt_content_users" class="container-xxl">
		<!--begin::About card-->
		<div class="card">
			<!--begin::Body-->
			<div class="card-body p-lg-17">
				<!--begin::About-->
				<div class="mb-18">
					<!--begin::Description-->
					<div class="fs-5 fw-bold text-gray-600">
						<?= $this->include('Amauchar\Core\backend\metronic\users\partials\new') ?>
					</div>
					<!--end::Description-->
				</div>
				<!--end::About-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::About card-->
	</div>

</div>
<?= $this->endSection() ?>

<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Core\Views\backend\metronic\users\partials\_create_js') ?>
<?= $this->endSection() ?>