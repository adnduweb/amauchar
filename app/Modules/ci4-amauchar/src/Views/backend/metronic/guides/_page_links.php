<div class="d-flex justify-content-between align-items-center flex-wrap">
    <div class="col text-left">
    <?php if (! empty($previousLink)) : ?>
        <a class="btn btn btn-icon btn-sm btn-light-primary mr-2 my-1 btn-sm btn-light-primary mr-2 my-1" href="<?= esc($previousLink, 'attr') ?>">&larr; <?= $previousTitle ?></a>
    <?php endif ?>
    </div>
    <div class="col d-flex justify-content-end">
    <?php if (! empty($nextLink)) : ?>
        <a class="btn btn btn-icon btn-sm btn-light-primary mr-2 my-1 btn-sm btn-light-primary mr-2 my-1" href="<?= esc($nextLink, 'attr') ?>"><?= $nextTitle ?> &rarr;</a>
    <?php endif ?>
    </div>
</div>
