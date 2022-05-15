<!--begin::Modal - Update role-->
<div class="modal fade" id="kt_modal_create_api_key" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder"><?= ucfirst(lang('Core.generateNewToken')); ?></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                    <?= theme()->getSVG('icons/duotune/arrows/arr061.svg', "svg-icon svg-icon-1"); ?>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 my-7">
                <!--begin::Form-->
                <?= form_open(route_to('create.user.token'), ['id' => 'kt_modal_form_api_key', 'class' => 'kt-form', 'novalidate' => false]); ?>
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bolder form-label mb-2">
                                <span class="required"><?= ucfirst(lang('Core.name')); ?></span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="<?= ucfirst(lang('Core.enterName')); ?>" name="name" value="" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Permissions-->
                        <div class="fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bolder form-label mb-2">Role Permissions</label>
                            <!--end::Label-->


                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5 ckeck-list-checkbox" id="ckeck-list-checkbox">
                                            <!--begin::Table body-->
                                            <tbody class="text-gray-600 fw-bold">
                                                
                                            <tr>
                                            <td class="text-gray-800">Administrator Access 
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
                                                <td>
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" type="checkbox" value="" id="kt_select_all" />
                                                        <span class="form-check-label" for="kt_select_all">Select all</span>
                                                    </label>
                                                    <!--end::Checkbox-->
                                                </td>
                                            </tr>


                                            <?php foreach ($permissions as $permission => $description) : ?>
                                                <tr>
                                                   
                                                    <td class="text-gray-800"><?= $permission ?>
                                                        <br/>
                                                        <p class="text-muted"><?= $description ?></p>
                                                    </td>
                                                    <td>
                                                        <label class="form-check  form-check-sm form-check-custom form-check-solid ">
                                                            <input class="permission_group form-check-input" type="checkbox" name="permissions[]" value="<?= $permission ?>">
                                                        </label>
                                                        <span></span>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>

                                        </tbody>
                                    </table>
                                </div>




                        </div>
                        <!--end::Permissions-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
          
                    <div class="modal-footer flex-center">
                        <x-modal-action-footer type="api_key" submitaction="create"></x-modal-action-footer>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Update role-->
<!--end::Modal-->