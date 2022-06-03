<?= $this->extend(config('Amauchar')->views['layout']) ?>
<?= $this->section('main') ?>


<div id="kt_content_container" class="container-xxl">
	<!--begin::Layout-->
	<div class="d-flex flex-column flex-xl-row">
		<!--begin::Sidebar-->
		<div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

			<div id="kt_card_1" class="">
				<?= $this->include('Amauchar\Core\backend\metronic\users\partials\_card_1') ?>
			</div>

		</div>
		<!--end::Sidebar-->
		<!--begin::Content-->
		<div class="flex-lg-row-fluid ms-lg-15">

			<?= $this->include('Amauchar\Core\backend\metronic\users\partials\_tabs') ?>
			
			<!--begin:::Tab content-->
			<div class="tab-content" id="myTabContent">
				

			<?=  $this->include('Amauchar\Core\backend\metronic\users\partials\form\security') ?>

			<?=  $this->include('Amauchar\Core\backend\metronic\users\partials\form\events') ?>

			<?=  $this->include('Amauchar\Core\backend\metronic\users\partials\form\permissions') ?>

			</div>
			<!--end:::Tab content-->
		</div>
		<!--end::Content-->
	</div>
	<!--end::Layout-->

</div>

<?= $this->endSection() ?>