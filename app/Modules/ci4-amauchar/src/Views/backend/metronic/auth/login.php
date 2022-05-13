<?= $this->extend(config('Core')->views['layout-auth']) ?>

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
		<div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
			<!--begin::Form-->
			<?= form_open(route_to('action.login'), ['id' => 'kt_sign_in_form', 'class' => 'form w-100 fv-plugins-bootstrap5 fv-plugins-framework', 'novalidate' => 'novalidate']); ?>
			<?= csrf_field() ?>
				<!--begin::Heading-->
				<div class="text-center mb-10">
					<!--begin::Title-->
					<h1 class="text-dark mb-3"><?= ucfirst(lang("Core.signIn")); ?></h1>
					<!--end::Title-->
					<?php if (setting('Auth.allowRegistration')) : ?>
					<!--begin::Link-->
					<div class="text-gray-400 fw-bold fs-4"><?= ucfirst(lang('Auth.newHere')) ?>
					<a href="<?= route_to('action.register'); ?>" class="link-primary fw-bolder"><?= ucfirst(lang('Auth.createAnAccount')) ?></a></div>
					<!--end::Link-->
					<?php endif; ?>
				</div>
				<!--begin::Heading-->
				
				<!--begin::Input group-->
				<div class="fv-row mb-10">
					<!--begin::Label-->
					<label class="form-label fs-6 fw-bolder text-dark"><?= ucfirst(lang("Core.yourEmail")); ?></label>
					<!--end::Label-->
					<!--begin::Input-->
					<input class="form-control form-control-lg form-control-solid" required type="text"  placeholder="<?= ucfirst(lang('Auth.emailOrUsername')) ?>" name="email" inputmode="email" autocomplete="email" autocomplete="off" value="" />
					<!--end::Input-->
				</div>
				<!--end::Input group-->
				<!--begin::Input group-->
				<div class="fv-row mb-10">
					<!--begin::Wrapper-->
					<div class="d-flex flex-stack mb-2">
						<!--begin::Label-->
						<label class="form-label fw-bolder text-dark fs-6 mb-0"><?= ucfirst(lang("Core.yourPassword")); ?></label>
						<!--end::Label-->
                        <?php if (setting('Auth.allowMagicLinkLogin')) : ?>
						<!--begin::Link-->
						<a href="<?= route_to('magic-link') ?>" class="link-primary fs-6 fw-bolder"><?= ucfirst(lang('Auth.forgotYourPassword')) ?></a>
						<!--end::Link-->
                        <?php endif; ?>
					</div>
					<!--end::Wrapper-->
					<!--begin::Input-->
					<input class="form-control form-control-lg form-control-solid" required type="password"  placeholder="<?= lang('Auth.password') ?>" name="password" value="">
					<!--end::Input-->
				</div>
				
				<!--end::Form group-->
				<?php if ($allowRemember): ?>
				<div class="fv-row mb-10">
					<label class="form-check form-check-custom form-check-solid">
						<input class="form-check-input" type="checkbox" name="remember" <?php if(old('remember')) : ?> checked <?php endif ?>>
						<span class="form-check-label fw-bold text-gray-700 fs-6"><?=lang('Auth.rememberMe')?>
					</span>
					</label>
				</div>
				<?php endif; ?>      

				<!--end::Input group-->
				<!--begin::Actions-->
				<div class="text-center">
					<!--begin::Submit button-->
					<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
						<span class="indicator-label"><?=ucfirst(lang('Core.continue'));?></span>
						<span class="indicator-progress"><?=ucfirst(lang('Core.pleaseWait'));?>
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
					</button>
					<!--end::Submit button-->
					<?php if (setting('Auth.allowRegistration')) : ?>
						<!--begin::Separator-->
						<div class="text-center text-muted text-uppercase fw-bolder mb-5"><?= lang('Core.or') ?></div>
						<!--end::Separator-->
						<?php if (setting('App.activeGoogle') == true){ ?>
						<!--begin::Google link-->
						<a href="<?= $boutGoogleClient; ?>" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
						<img src="<?= theme()->getMediaUrl('svg/brand-logos/google-icon.svg'); ?>" class="h-20px me-3" /><?=lang('Auth.continueWithGoogle')?></a>
						<!--end::Google link-->
						<?php } ?>
						<?php if (setting('App.activeFacebook') == true){ ?>
						<!--begin::Google link-->
						<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
						<img src="<?= theme()->getMediaUrl('svg/brand-logos/facebook-4.svg'); ?>" class="h-20px me-3" /><?=lang('Auth.Continue with Facebook')?></a>
						<!--end::Google link-->
						<?php } ?>
						<?php if (setting('App.activeApple') == true){ ?>
						<!--begin::Google link-->
						<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
						<img src="<?= theme()->getMediaUrl('svg/brand-logos/apple-black.svg'); ?>" class="h-20px me-3" /><?=lang('Auth.Continue with Apple')?></a>
						<!--end::Google link-->
						<?php } ?>
                    <?php endif ?>
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
<!--end::Authentication - Sign-in-->

<?= $this->endSection() ?>
