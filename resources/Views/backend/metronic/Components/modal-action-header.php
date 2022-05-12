<!--begin::Modal title-->
<h2 class="fw-bolder"><?= $slot ?? '' ?></h2>
<!--end::Modal title-->
<!--begin::Close-->
<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
        <?= service('theme')->getSVG('icons/duotone/Navigation/Close.svg', "svg-icon svg-icon-1"); ?>
</div>
<!--end::Close-->