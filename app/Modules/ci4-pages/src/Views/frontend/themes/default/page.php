<?= $this->extend('Themes\frontend\default\page') ?>
<?= $this->section('main') ?>

<section class="section">

    <?php if($page->getDisplayTitle()){ ?>
    <div class="container">
        <div class="page-title">
            <h1 class="section-title"><?= $page->getName(); ?></h1>
        </div>
    </div>
    <?php } ?>

    <div class="container">
        <?= $page->getDescription(); ?>
    </div>

</section>
<?= $this->endSection() ?>