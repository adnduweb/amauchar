<!--begin::Modal - Add Payment-->
<div class="modal fade" id="kt_modal_add_address" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder"><?= ucfirst(lang("Customer.addAddress")); ?></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div id="kt_modal_add_address_close" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <?= theme()->getSVG('icons/duotune/arrows/arr061.svg', "svg-icon svg-icon-1"); ?>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-10 px-lg-17">
                <div class="scroll-y me-n7 pe-7" id="kt_modal_add_address_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_address_header" data-kt-scroll-wrappers="#kt_modal_add_address_scroll" data-kt-scroll-offset="300px">
                <!--begin::Form-->
                    <?= form_open(route_to('customer.address.' . ($display == 'new') ? 'create':'update', $addressItem->id ?? null), ['id' => 'kt_modal_address_form', 'class' => 'kt-form form fv-plugins-bootstrap5 fv-plugins-framework', 'novalidate' => false]); ?>
                        <input type="hidden" name="action" value="<?= $display; ?>" />
                        <input type="hidden" name="address[id]" value="<?= $addressItem->id ?? null; ?>" />
                        <input type="hidden" name="address[customer_id]" value="<?= $formItem->uuid ?? null; ?>" />
            
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required"><?= ucfirst(lang("Customer.raisonSocial")); ?></span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="<?= ucfirst(lang("Customer.raisonSocialMustBeUnique")); ?>"></i>
                            </label>
                            <input type="text" required name="address[company]" class="form-control form-control-solid mb-2" value="<?= old('company') ? old('company') : $addressItem->company ?? null; ?>">
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
                            <select name="address[country]" id="country" aria-label="<?= ucfirst(lang('Core.selectOption')); ?>" data-control="select2" data-placeholder="<?= ucfirst(lang('Core.selectOption')); ?>" class="form-select form-select-solid">
                                <option></option>
                                <?php foreach (Amauchar\Core\Libraries\Data::getCountriesList() as $k => $country) { ?>
                                    <option value="<?= $k; ?>" <?= ($k == strtoupper($addressItem->country ?? null)) ? 'selected' : ''; ?> ><?= $country['name']; ?></option>
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
                            <input type="text" required name="address[firstname]" class="form-control form-control-solid mb-2" value="<?= old('firstname') ? old('firstname') : $addressItem->firstname ?? null; ?>">
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
                            <input type="text" required name="address[lastname]" class="form-control form-control-solid mb-2" value="<?= old('lastname') ? old('lastname') : $addressItem->lastname ?? null; ?>">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                          <!--begin::Input group-->
                          <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required"><?= ucfirst(lang("Core.phone")); ?></span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" required name="address[phone]" class="form-control form-control-solid mb-2" value="<?= old('phone') ? old('phone') : $addressItem->phone ?? null; ?>">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div id="kt_modal_add_customer_billing_info" class="collapse show">
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2"><?= ucfirst(lang("Core.addressLine1")); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" required name="address[address1]" class="form-control form-control-solid mb-2" value="<?= old('address1') ? old('address1') : $addressItem->address1 ?? null; ?>">
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang("Core.addressLine2")); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" required name="address[address2]" class="form-control form-control-solid mb-2" value="<?= old('address2') ? old('address2') : $addressItem->address2 ?? null; ?>">
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2"><?= ucfirst(lang("Core.city")); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" required name="address[city]" class="form-control form-control-solid mb-2" value="<?= old('city') ? old('city') : $addressItem->city ?? null; ?>">
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Col-->
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2"><?= ucfirst(lang("Core.postCode")); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" required name="address[postcode]" class="form-control form-control-solid mb-2" value="<?= old('postcode') ? old('postcode') : $addressItem->postcode ?? null; ?>">
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>

                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <x-modal-action-footer type="address"></x-modal-action-footer>
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