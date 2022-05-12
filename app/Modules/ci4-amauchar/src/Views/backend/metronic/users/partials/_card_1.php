<!--begin::Card-->
<div class="card mb-5 mb-xl-8 card_1">

    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Summary-->
        <!--begin::User Info-->
        <div class="d-flex flex-center flex-column py-5">
            <!--begin::Avatar-->
            <div class="symbol symbol-100px symbol-circle mb-7">
                    <?= isset($form) ? $form->renderAvatar(140) : (new \Amauchar\Core\form())->renderAvatar(140) ?>
            </div>
            <!--end::Avatar-->
            <!--begin::Name-->
            <span href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3 fullname"><?= $form->last_name; ?> <?= $form->first_name; ?></span>
            <!--end::Name-->
            <!--begin::Position-->
            <div class="mb-9">
                <!--begin::Badge-->
                <div class="badge badge-lg badge-light-primary d-inline"><?= ucwords($form->getAuthGroupsUsers()[0]->group); ?></div>
                <!--begin::Badge-->
            </div>
            <!--end::Position-->
        </div>
        <!--end::User Info-->
        <!--end::Summary-->
        <!--begin::Details toggle-->
        <div class="d-flex flex-stack fs-4 py-3">
            <div class="fw-bolder rotate collapsible collapsed"><?= lang('Core.details'); ?> </div>
            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="<?= lang('Core.edit_customer_details'); ?>">
                <a href="<?= current_url(); ?>" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details"><?= lang('Core.edit'); ?></a>
            </span>
        </div>
        <!--end::Details toggle-->
        <div class="separator"></div>
        <!--begin::Details content-->
        <div id="kt_user_view_details" class="">
            <?= view('Amauchar\Core\backend\metronic\users\partials\_kt_user_view_details', ['form' => $form, 'adresseDefault' => $adresseDefault, 'allCountry' => $allCountry]) ?>
        </div>
        <!--end::Details content-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->


<?= $this->include('Amauchar\Core\backend\metronic\users\modals\_update_details') ?>