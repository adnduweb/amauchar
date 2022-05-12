<?= $pager ? view('Amauchar\Medias\Views\themes\metronic\pages') : '' ?>

<form name="files-form" method="post" action="<?= site_url(ADMIN_AREA . '/medias/bulk') ?>">
    <?= $format === 'select' ? view('Amauchar\Medias\Views\themes\metronic\Menus\bulk', ['access' => $access, 'bulks' => $bulks]) : '' ?>
    <?= view('Amauchar\Medias\Views\themes\metronic\Formats\\' . $format, ['files' => $files, 'access' => $access, 'exports' => $exports]); ?>
</form>