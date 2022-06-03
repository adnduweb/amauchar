<?= $this->extend(config('Amauchar')->views['layout-auth']) ?>

<?= $this->section('title') ?><?= lang('Auth.login') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(<?= theme()->getMediaUrl('illustrations/sketchy-1/14.png'); ?>">
    <!--begin::Content-->
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Logo-->
        <a href="<?= current_url(); ?>" class="mb-12">
			<img alt="Logo" src="<?= theme()->getMediaUrl('logos/logo-ADN.svg'); ?>" class="h-65px" />
		</a>
        <!--end::Logo-->
        <!--begin::Wrapper-->
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
            <?= form_open(route_to('magic-link'), ['id' => 'kt_password_reset_form', 'class' => 'form w-100 fv-plugins-bootstrap5 fv-plugins-framework', 'novalidate' => 'novalidate']); ?>
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3"><?=lang('Auth.forgotPassword');?> </h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-400 fw-bold fs-4"><?= ucfirst(lang('Auth.enterYourPassword'));?></div>
                    <!--end::Link-->
                </div>
                <!--begin::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-10 fv-plugins-icon-container">
                    <label class="form-label fw-bolder text-gray-900 fs-6"><?= lang('Auth.email') ?></label>
                    <input class="form-control form-control-solid" type="email" placeholder="" name="email" value="<?= old('email', auth()->user()->email ?? null) ?>" autocomplete="off">
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button type="button" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
                        <span class="indicator-label"><?= ucfirst(lang('Auth.useMagicLink')) ?></span>
						<span class="indicator-progress"><?= ucfirst(lang('Core.pleaseWait'));?>.
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <a href="<?= route_to('action.login'); ?>" class="btn btn-lg btn-light-primary fw-bolder"><?=lang('Core.backToList');?></a>
                </div>
                <!--end::Actions-->
            <?= form_close(); ?>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
    <!--begin::Footer-->
    <div class="d-flex flex-center flex-column-auto p-10">
        <!--begin::Links-->
        <div class="d-flex align-items-center fw-bold fs-6">
			<a href="<?= current_url(); ?>" class="text-muted text-hover-primary px-2">A propos de </a>
			<a href="mailto:contact@adnduweb.com" class="text-muted text-hover-primary px-2">Contact</a>
			<a href="<?= current_url(); ?>" class="text-muted text-hover-primary px-2">Nous contacter</a>
		</div>
        <!--end::Links-->
    </div>
    <!--end::Footer-->
</div>

<?= $this->endSection() ?>


<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Core\Views\backend\metronic\auth\partials\_useMagicLink_js') ?>
<?= $this->endSection() ?>