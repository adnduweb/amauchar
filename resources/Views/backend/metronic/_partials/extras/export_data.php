<!--begin::Export-->
<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_datatable">
    <?= theme()->getSVG('icons/duotune/arrows/arr078.svg', "svg-icon svg-icon-2"); ?>
    <?= ucfirst(lang('Core.export')); ?>
</button>
<!--end::Export-->

<!--begin::Modal - Adjust Balance-->
<div class="modal fade" id="kt_modal_export_datatable" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder text-gray-800 mb-1"><?= lang('Core.Exporter: %s', [ucfirst(singular($name))]); ?></h2> 
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <?= service('theme')->getSVG('icons/duotone/Navigation/Close.svg', "svg-icon svg-icon-1 position-absolute ms-6"); ?>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <?= form_open('', ['id' => 'kt_modal_export_datatable_form', 'class' => 'kt-form form', 'novalidate' => false]); ?>
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-bold form-label mb-2"><?= ucfirst(lang('Core.selectExportFormat')); ?> : </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="format"required data-control="select2" data-placeholder="<?= ucfirst(lang('Core.chooseOneOfTheFollowing')); ?>" data-hide-search="true" class="form-select form-select-solid fw-bolder">
                            <option></option>
                            <?php foreach($type_export as $export){ ?>
                                <option value="<?= $export; ?>"><?= ucfirst($export); ?></option>
                            <?php } ?>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_export_datatable_cancel" class="btn btn-light me-3" data-bs-dismiss="modal"><?= ucfirst(lang('Core.discard')); ?></button>
                        <button type="submit" id="kt_modal_export_datatable_submit" class="btn btn-primary">
                        <span class="indicator-label"> <?= ucfirst(lang('Core.saveForm')); ?></span>
                        <span class="indicator-progress"><?= ucfirst(lang('Core.please_wait...')); ?> 
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                <?= form_close(); ?>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Card-->

<?= $this->section('pageAdminScripts') ?>

<script type="text/javascript">

"use strict";

var exportData = (function() {

    const packets = {
        format:  $('select[name=format]').val(),
        display:  "<?= $display; ?>",
        fileTranslate: $('#fileTranslate').val(),
    };

    axios.post("<?= route_to(singular($name) . '.export.ajax') ?>", packets)
    .then( response => {   
        var blob = response;
        var downloadLink = window.document.createElement('a');
        var contentTypeHeader = response.headers['content-type'];
        downloadLink.href = response.data.file;
        downloadLink.download = response.headers['content-disposition'];
        var disposition = response.headers['content-disposition'];
        if (disposition && disposition.indexOf('attachment') !== -1) {
            var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
            var matches = filenameRegex.exec(disposition);
            if (matches != null && matches[1]) { 
                downloadLink.download = matches[1].replace(/['"]/g, '');
            }
        }
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
       
    })
    .catch(error => {
        //console.log("ERROR:: ",error.response.data);
    }); 

});

var KTModalExportData = function() {

    // Elements
    var form;
    var selectorModal;
    var modal;
    var submitButton;
    var cancelButton;
    var validator;

    return {
        init: function() {
            selectorModal = document.querySelector("#kt_modal_export_datatable");
            modal         = new bootstrap.Modal(selectorModal);
            form          = document.querySelector("#kt_modal_export_datatable_form");
            submitButton  = document.getElementById("kt_modal_export_datatable_submit");
            cancelButton  = document.getElementById("kt_modal_export_datatable_cancel");
            validator     = FormValidation.formValidation(form, {
                fields: {
                    format: {
                        validators: {
                            notEmpty: {
                                message: _LANG_.formatIsRequired
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            });
            
            submitButton.addEventListener("click", function(e) {

                e.preventDefault();  // Validate form

                  validator.validate().then(function (status) {

                    console.log("validated!"); // Validate form

                    if (status === 'Valid') {

                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        
                        submitButton.disabled = true; // Disable button to avoid multiple click
                        exportData();
                        submitButton.removeAttribute("data-kt-indicator");
                        submitButton.disabled = false;
                        submitButton.isConfirmed && modal.hide();
                        
                    }else{
                     // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                     Swal.fire({
                        text: _LANG_.sorryLooksLikeThereArSomeErrorsDetectedPleaseTryAgain,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: _LANG_.close,
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    }
                });

            })
        }
    }
}();

KTUtil.onDOMContentLoaded(function() {
    KTModalExportData.init()
});


</script>

<?= $this->endSection() ?>