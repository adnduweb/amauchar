<!--begin::Modal-->
<div class="modal fade" id="read-token" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center w-100">
                    <!--begin::Modal title-->
                <h2 class="fw-bolder text-gray-800 mb-1"><?= lang('Core.yourToken'); ?></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <?= service('theme')->getSVG('icons/duotone/Navigation/Close.svg', "svg-icon svg-icon-1 position-absolute ms-6"); ?>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body pb-1 pt-4 pl-4 pr-4">
                <div id="responseContenu"></div>
                  
            </div>
            <div class="modal-footer border-top-0">
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"><?= ucfirst(lang('Core.discard')); ?></button>
            </div>
        </div>     
    </div>
</div>
<!--end::Modal-->