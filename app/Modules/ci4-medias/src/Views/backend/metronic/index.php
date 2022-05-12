<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>


    <?= view('Amauchar\Medias\Views\backend\metronic\partials\cartd_top', ['medias' => $medias, 'active' => $active]) ?>

    <div class="card card-flush">

        <?= view('Amauchar\Medias\Views\backend\metronic\partials\header_flush') ?>

        <?= view('Amauchar\Medias\Views\backend\metronic\partials\list_media' , ['medias' => $medias]) ?>

        <?= view('Amauchar\Medias\Views\backend\metronic\templates\rename') ?>
        <?= view('Amauchar\Medias\Views\backend\metronic\templates\action') ?>
        <?= view('Amauchar\Medias\Views\backend\metronic\templates\checkbox') ?>

        <?= view('Amauchar\Medias\Views\backend\metronic\_modals\upload') ?>
        <?= view('Amauchar\Medias\Views\backend\metronic\_modals\remove') ?>


    </div>


<?= $this->endSection() ?>

<?= $this->section('pageAdminScripts') ?>
<?= $this->include('Amauchar\Medias\Views\backend\metronic\partials\_index_js') ?>
<?= $this->endSection() ?>