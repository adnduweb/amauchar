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
        <?php if (session('error')) : ?>
                <div class="alert alert-danger"><?= session('error') ?></div>
            <?php endif ?>

            <form action="<?= site_url(route_to('auth.action.handle')) ?>" method="post">
                <?= csrf_field() ?>

                <!-- Email -->
                <div class="mb-2">
                    <input type="email" class="form-control" name="email"
                           inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>"
                           value="<?= old('email', auth()->user()->email ?? null) ?>" required />
                </div>

                <div class="d-grid col-8 mx-auto m-3">
                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.login') ?></button>
                </div>

            </form>
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