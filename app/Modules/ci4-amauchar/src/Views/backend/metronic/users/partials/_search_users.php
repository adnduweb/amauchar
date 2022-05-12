<?php if(!empty($list_users)){ ?>
<!--begin::Users-->
<div class="mh-300px scroll-y me-n5 pe-5">

<?php foreach($list_users as $user){ ?>
    <?php if($user->id != user_id()){ ?>
        <!--begin::User-->
        <div class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 cursor-pointer mb-1" data-uuid="<?= $user->uuid; ?>" data-kt-search-element="customer">
            <!--begin::Avatar-->
            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <div class="symbol-label fs-3 bg-light-danger text-danger">
                    <?= $user->last_name[0]; ?> <?= $user->first_name[0]; ?>
                </div>                                        
            </div>
            <!--end::Avatar-->
            <!--begin::Info-->
            <div class="fw-bold">
                <span class="fs-6 text-gray-800 me-2"><?= $user->last_name; ?> <?= $user->first_name; ?> </span>
                <span class="badge badge-light"><?= $user->username; ?></span>
            </div>
            <!--end::Info-->
        </div>
        <!--end::User-->
    <?php } ?>
<?php } ?>

</div>
<!--end::Users-->
<?php } ?>