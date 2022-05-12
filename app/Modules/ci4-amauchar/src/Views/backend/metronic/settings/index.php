<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>
<?php $active = 'settings'; ?>

<?= view('Amauchar\Core\backend\metronic\settings\partials\_card_top', ['active' => $active]) ?>

<?= $this->include('Amauchar\Core\Views\backend\metronic\settings\form_section\general') ?>

<?= $this->endSection() ?>

<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Core\Views\backend\metronic\settings\partials\_update_js') ?>
<?= $this->endSection() ?> 