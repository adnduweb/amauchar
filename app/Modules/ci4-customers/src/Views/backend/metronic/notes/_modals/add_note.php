<!--begin::Modal - Add Payment-->
<div class="modal fade" id="kt_modal_add_note" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder"><?= ucfirst(lang("Customer.addNote")); ?></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div id="kt_modal_add_note_close" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <?= theme()->getSVG('icons/duotune/arrows/arr061.svg', "svg-icon svg-icon-1"); ?>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-10 px-lg-17">
                <div class="scroll-y me-n7 pe-7" id="kt_modal_add_note_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_note_header" data-kt-scroll-wrappers="#kt_modal_add_note_scroll" data-kt-scroll-offset="300px">
                <!--begin::Form-->
                    <?= form_open(route_to('customer.note.' . ($display == 'new') ? 'create':'update', $noteItem->id ?? null), ['id' => 'kt_modal_note_form', 'class' => 'kt-form form fv-plugins-bootstrap5 fv-plugins-framework', 'novalidate' => false]); ?>
                        <input type="hidden" name="action" value="<?= $display; ?>" />
                        <input type="hidden" name="note[uuid]" value="<?= $noteItem->uuid ?? null; ?>" />
                        <input type="hidden" name="note[customer_id]" value="<?= $formItem->uuid ?? null; ?>" />
            
                          <!--begin::Input group-->
                            <div class="fv-row mb-15">
                                <!--begin::Label-->
                                <label for="titre" class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.titre')); ?>*</label>
                                <input type="text" name="note[titre]" class="form-control form-control-solid" autocomplete="titre" value="<?= old('titre', $formItem->titre ?? '') ?>">
                            </div>

                            <!--begin::Input group-->
                            <div class="fv-row mb-15">
                                    <!--begin::Label-->
                                <label for="titre" class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.type')); ?>*</label>
                                <select class="form-select mb-2" required id="blocnote_type_id" name="note[blocnote_type_id]" data-control="select2" data-placeholder="<?= ucfirst(lang('Core.selectOption')); ?>" data-allow-clear="true"  data-hide-search="false" data-placeholder="<?= ucfirst(lang('Core.selectOption')); ?>">
                                    <option></option> 
                                    <?php if(!empty($blocsType)){?>
                                        <?php foreach($blocsType as $blocType){ ?>
                                            <option value="<?= $blocType->id_type_blocnote; ?>"><?= $blocType->titre ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <!--end::Select2-->
                            </div>

                            <!--begin::Input group-->
                            <div class="fv-row mb-15">
                                <!--begin::Label-->
                                <label for="contenu" class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.contenu')); ?>*</label>
                                <!--end::Label-->
                                <textarea name="note[contenu]" rows="3" data-provide="markdown"  class="form-control form-control-solid"><?= old('contenu', $formItem->contenu ?? '') ?></textarea> 
                            </div>
                        <!--begin::Actions-->
                        <div class="text-center">
                            <x-modal-action-footer type="note"></x-modal-action-footer>
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