<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>
<?php $active = 'user'; ?>

<?= view('Amauchar\Core\backend\metronic\settings\partials\_card_top', ['active' => $active]) ?>

<?= $this->include('Amauchar\Core\Views\backend\metronic\users\partials\form\settings') ?>

<?= $this->endSection() ?>

<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Core\Views\backend\metronic\users\partials\_settings_js') ?>
<?= $this->endSection() ?>