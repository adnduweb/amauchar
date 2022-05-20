<?php 
    $bgLabel = 'bg-danger';
    if(!empty($formItem->active)){
        switch ($formItem->active) {
            case 0:
                $bgLabel = "bg-danger";
                break;
            case 1:
                $bgLabel = "bg-warning";
                break;
            case 2:
                $bgLabel = "bg-success";
                break;
            default:
                $bgLabel = 'bg-danger';
                break;
        }
    } 
    
?>

<!--begin::Status-->
<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>Status</h2>
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <div class="rounded-circle <?= $bgLabel; ?> w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
        </div>
        <!--begin::Card toolbar-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Select2-->
        <select class="form-select mb-2" data-hide-search="true" name="customer_group_id" data-placeholder="<?= ucfirst(lang('Core.selectOption')); ?>" id="kt_ecommerce_add_product_status_select">
        <option></option>
            <?php if(!empty($groups)){ ?>
                <?php foreach($groups as $group){ ?>
                    <option <?= old('customer_group_id') ==  $group->id || $formItem->customer_group_id ==  $group->id ?  'selected' : '' ?>  value="<?= $group->id; ?>"><?= $group->name; ?></option>
                <?php } ?>
            <?php } ?>
        </select>
        <!--end::Select2-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Status-->

