<div class="modal fade" id="kt_vassorts_marques_modal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Ajout d'une marque</h2>
                <!--end::Modal title-->
                 <!--begin::Close-->
                 <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <?= service('theme')->getSVG('duotone/Navigation/Close.svg', "svg-icon svg-icon-1"); ?>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <?= view('Amauchar\Customers\backend\metronic\marques\form_section\general', ['display' => 'ajax', 'name' => 'marques', 'formItem' => new Amauchar\Customers\Entities\Marque()]); ?>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>