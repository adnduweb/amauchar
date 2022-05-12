<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>

<?= $this->include('Amauchar\Core\Views\backend\metronic\settings\form_section\user\general') ?>

<?= $this->endSection() ?>

<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Core\Views\backend\metronic\settings\partials\_update_js') ?>
<?= $this->endSection() ?> 