<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>

<div class="card">
    <!--begin::Body-->
    <div class="card-body p-5 px-lg-19 py-lg-16">
        <div class="guide toc">
            <h2 class="mb-4">Table of Contents</h2>

            <?= $collection->tableOfContents() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
