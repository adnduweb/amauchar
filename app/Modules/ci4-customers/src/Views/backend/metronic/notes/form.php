<?= $this->extend(config('Amauchar')->views['layout']) ?>
<?= $this->section('main') ?>

<?= view('Amauchar\Customers\Views\backend\metronic\cartd_top', [ 'formItem' => $formItem ?? null, 'active' => $active, 'name' => $name, 'formItemAddresseDefaut' => $formItemAddresseDefaut ?? null]) ?>
	<!--begin::About card-->
	<div class="card">
		<!--begin::Body-->
		<div class="card-body p-lg-17">
			<!--begin::About-->
			<div class="mb-18">
				<!--begin::Description-->
				<div class="fs-5 fw-bold text-gray-600">
					<?= $this->include('Amauchar\Customers\backend\metronic\notes\form_section\general') ?>
				</div>
				<!--end::Description-->
			</div>
			<!--end::About-->
		</div>
		<!--end::Body-->
	</div>
		
<?= $this->endSection() ?>