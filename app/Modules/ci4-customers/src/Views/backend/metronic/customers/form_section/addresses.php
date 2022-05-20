<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2><?= ucfirst(lang("Customer.addressesList")); ?></h2>
        </div>
        <div class="card-toolbar">
            <!--begin::Filter-->
            <button type="button" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_address">
                <?= theme()->getSVG('icons/duotune/general/gen035.svg', "svg-icon svg-icon-3"); ?>
                <?= ucfirst(lang("Customer.addAddress")); ?>
            </button>
            <!--end::Filter-->
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">


     <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_customers_addresses">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input allCheck" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_customers_addresses .form-check-input" value="1" />
                        </div>
                    </th>
                    <th class="min-w-100px"><?= ucfirst(lang('Customer.company')); ?></th>
                    <th class="min-w-125px" ><?= ucfirst(lang('Customer.address1')); ?></th>
                    <th class="min-w-125px" ><?= ucfirst(lang('Customer.postCode')); ?></th>
                    <th class="min-w-100px"><?= ucfirst(lang('Core.phone')); ?></th>
                    <th class="min-w-125px" ><?= ucfirst(lang('Core.active')); ?></th>
                    <th class="text-end min-w-100px pe-4"><?= ucfirst(lang('Core.actions')); ?></th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->

        </table>
    <!--end::Table-->




     
    </div>
    <!--end::Card header-->
</div>