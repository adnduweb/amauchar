<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>

<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        <?php if (session('error')) : ?>
                <div class="alert alert-danger"><?= session('error') ?></div>
            <?php endif ?>

            <form class="form w-100 mb-10" action="<?= site_url(route_to('users.verif.mdp')) ?>" method="post">
                <?= csrf_field() ?>

                <div class="text-center mb-10">
                    <img alt="Logo" class="mh-125px" src="<?= theme()->getMediaUrl('svg/misc/smartphone.svg'); ?>">
                </div>

                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">Vérification mot de passe</h1>
                    <!--end::Title-->
                    <!--begin::Sub-title-->
                    <div class="text-muted fw-bold fs-5 mb-5">Enter the password verification </div>
                    <!--end::Sub-title-->

                </div>

                <div class="d-grid col-8 mx-auto m-3">
                    <input type="hidden" name="verif" id="route-redirect" value="<?= site_url(route_to('blocsnotes.edit', service('request')->getGet('verif_blocnote'))) ; ?>" required />
                    <button type="submit" data-verif="submit" class="btn btn-primary btn-block"><?= lang('Auth.verificationMdp') ?></button>
                </div>

            </form>
        </div>

<?= $this->endSection() ?>

<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Core\Views\backend\metronic\auth\partials\_verification_js') ?>
<?= $this->endSection() ?>