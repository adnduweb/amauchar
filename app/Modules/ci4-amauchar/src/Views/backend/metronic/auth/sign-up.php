<?= $this->extend(config('Amauchar')->views['layout-register']) ?>

<?= $this->section('title') ?><?= lang('Auth.login') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

<!--begin::Authentication - Sign-in -->
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(<?= theme()->getMediaUrl('illustrations/sketchy-1/14.png'); ?>)">
	<!--begin::Content-->
	<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
		<!--begin::Logo-->
		<a href="<?= current_url(); ?>" class="mb-12">
			<img alt="Logo" src="<?= theme()->getMediaUrl('logos/logo-ADN.svg'); ?>" class="h-65px" />
		</a>
		<!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <?= form_open(route_to('action.register'), ['id' => 'kt_sign_up_form', 'class' => 'form w-100 fv-plugins-bootstrap5 fv-plugins-framework', 'novalidate' => 'novalidate']); ?>
			    <?= csrf_field() ?>
                    <!--begin::Heading-->
                    <div class="mb-10 text-center">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Create an Account</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">Already have an account? 
                        <a href="<?= route_to('action.login'); ?>" class="link-primary fw-bolder">Sign in here</a></div>
                        <!--end::Link-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Action-->
                    <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
                    <img alt="Logo" src="<?= theme()->getMediaUrl('svg/brand-logos/google-icon.svg'); ?>" class="h-20px me-3">Sign in with Google</button>
                    <!--end::Action-->
                    <!--begin::Separator-->
                    <div class="d-flex align-items-center mb-10">
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        <span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                    </div>
                    <!--end::Separator-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <label class="form-label fw-bolder text-dark fs-6"><?= lang('Auth.username') ?></label>
                        <input class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <label class="form-label fw-bolder text-dark fs-6"><?= lang('Auth.email') ?></label>
                        <input class="form-control form-control-lg form-control-solid" type="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" name="email" required autocomplete="off">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6">Password</label>
                            <!--end::Label-->
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off">
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                            </div>
                            <!--end::Input wrapper-->
                            <!--begin::Meter-->
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                            <!--end::Meter-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Hint-->
                        <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                        <!--end::Hint-->
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <!--end::Input group=-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-5 fv-plugins-icon-container">
                        <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirm" autocomplete="off">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10 fv-plugins-icon-container">
                        <label class="form-check form-check-custom form-check-solid form-check-inline">
                            <input class="form-check-input" type="checkbox" name="toc" value="1">
                            <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree 
                            <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
                        </label>
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                            <span class="indicator-label"><?= lang('Auth.register') ?></span>
                            <span class="indicator-progress">Please wait... 
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                <div></div></form>
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
