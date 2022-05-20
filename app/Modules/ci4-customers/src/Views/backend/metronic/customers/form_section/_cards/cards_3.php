<!--begin::Status-->
<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>Désignations</h2>
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Select2-->
        

        <select class="form-select mb-2" required id="designation_id" name="designation_id" data-control="select2" data-placeholder="Select an option" data-allow-clear="true"  data-hide-search="false" data-placeholder="Select an option" id="kt_vassorts_designations_select">
            <option></option>
            <?php if(!empty($designations)){ ?>
                <?php foreach($designations as $designation){ ?>
                    <option <?= old('designation_id') ==  $designation->getID() || $formItem->designation_id ==  $designation->getID() ?  'selected' : '' ?>  value="<?= $designation->getID(); ?>"><?= $designation->getName(); ?></option>
                <?php } ?>
            <?php } ?>
        </select>
        <!--end::Select2-->

        <!--begin::Description-->
        <div class="text-muted fs-7 mb-7">Ajouter une désignation.</div>
        <!--end::Description-->

        <!--begin::Button-->
        <a href="<?=current_url(); ?>#kt_vassorts_marques_modal" class="btn btn-light-primary btn-sm mb-10"  data-bs-toggle="modal" data-bs-target="#kt_vassorts_designations_modal">
            <?= service('theme')->getSVG("duotune/arrows/arr087.svg", "svg-icon svg-icon-5 m-0"); ?>
            <span>Ajouter une designation</span>
        </a>
        <!--end::Button-->
                                         
    </div>
    <!--end::Card body-->
</div>
<!--end::Status-->

