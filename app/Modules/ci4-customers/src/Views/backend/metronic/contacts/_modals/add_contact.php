<!--begin::Modal - Add Payment-->
<div class="modal fade" id="kt_modal_add_contact" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder"><?= ucfirst(lang("Customer.addContact")); ?></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div id="kt_modal_add_contact_close" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <?= theme()->getSVG('icons/duotune/arrows/arr061.svg', "svg-icon svg-icon-1"); ?>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-10 px-lg-17">
                <div class="scroll-y me-n7 pe-7" id="kt_modal_add_contact_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_contact_header" data-kt-scroll-wrappers="#kt_modal_add_contact_scroll" data-kt-scroll-offset="300px">
                <!--begin::Form-->
                    <?= form_open(route_to('customer.contact.' . ($display == 'new') ? 'create':'update', $contactItem->id ?? null), ['id' => 'kt_modal_contact_form', 'class' => 'kt-form form fv-plugins-bootstrap5 fv-plugins-framework', 'novalidate' => false]); ?>
                        <input type="hidden" name="action" value="<?= $display; ?>" />
                        <input type="hidden" name="contact[id]" value="<?= $contactItem->id ?? null; ?>" />
                        <input type="hidden" name="contact[customer_id]" value="<?= $formItem->uuid ?? null; ?>" />
            
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required"><?= ucfirst(lang("Customer.raisonSocial")); ?></span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="<?= ucfirst(lang("Customer.raisonSocialMustBeUnique")); ?>"></i>
                            </label>
                            <input type="text" required name="contact[company]" class="form-control form-control-solid mb-2" value="<?= old('company') ? old('company') : $contactItem->company ?? null; ?>">
                        </div>
            
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">
                                <span class="required"><?= ucfirst(lang('Core.country')); ?></span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <!--begin::Input-->
                            <select name="contact[country]" id="country" data-control="select2" data-placeholder="<?= ucfirst(lang('Core.selectOption')); ?>" class="form-select form-select-solid">
                                <option></option>
                                <?php foreach (Amauchar\Core\Libraries\Data::getCountriesList() as $k => $country) { ?>
                                    <option value="<?= $k; ?>" <?= ($k == strtoupper($contactItem->country ?? null)) ? 'selected' : ''; ?> ><?= $country['name']; ?></option>
                                <?php } ?>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required"><?= ucfirst(lang("Core.firstname")); ?></span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" required name="contact[firstname]" class="form-control form-control-solid mb-2" value="<?= old('firstname') ? old('firstname') : $contactItem->firstname ?? null; ?>">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required"><?= ucfirst(lang("Core.lastname")); ?></span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" required name="contact[lastname]" class="form-control form-control-solid mb-2" value="<?= old('lastname') ? old('lastname') : $contactItem->lastname ?? null; ?>">
                            <!--end::Input-->
                        </div>
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required"><?= ucfirst(lang("Core.email")); ?></span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" required name="contact[email]" class="form-control form-control-solid mb-2" value="<?= old('email') ? old('email') : $contactItem->email ?? null; ?>">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--end::Input group-->
                          <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required"><?= ucfirst(lang("Core.phone")); ?></span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" required name="contact[phone]" class="form-control form-control-solid mb-2" value="<?= old('phone') ? old('phone') : $contactItem->phone ?? null; ?>">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--end::Input group-->
                          <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required"><?= ucfirst(lang("Core.phone_mobile")); ?></span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" required name="contact[phone_mobile]" class="form-control form-control-solid mb-2" value="<?= old('phone_mobile') ? old('phone_mobile') : $contactItem->phone_mobile ?? null; ?>">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <x-modal-action-footer type="contact"></x-modal-action-footer>
                        </div>
                        <!--end::Actions-->
                    <?= form_close(); ?>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Card-->