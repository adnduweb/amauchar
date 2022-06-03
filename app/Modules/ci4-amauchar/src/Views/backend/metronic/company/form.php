<?= $this->extend(config('Amauchar')->views['layout']) ?>
<?= $this->section('main') ?>
<?php $active = 'general'; ?>

<?= view('Amauchar\Core\backend\metronic\company\partials\_card_top', ['active' => $active, 'form' => $form ?? null]) ?>

<?= $this->include('Amauchar\Core\Views\backend\metronic\company\form_section\general') ?>

<?= $this->endSection() ?>

<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Core\Views\backend\metronic\company\partials\_update_js') ?>
<?= $this->endSection() ?> 