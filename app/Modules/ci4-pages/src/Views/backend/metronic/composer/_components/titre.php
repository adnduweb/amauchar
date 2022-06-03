<?php $replace = isset($instanceComp) ? $k : '__i__' ; ?>

<div class="titre item-widget actual-comp" id="comp-<?= md5('titre-01'); ?>">
    <div class="accordion" id="kt_accordion_titre">
        <div class="accordion-item">
            <h2 class="accordion-header" style="position: relative;" id="kt_accordion_<?= $replace; ?>_header_1">
                <button type="button" style="position: absolute;z-index: 2;left: -25px;top: 15px;" data-kt_composer_key="<?= $replace; ?>" data-kt_composer_page_id="<?= isset($composer) ? $composer->page_id : ''; ?>" data-etat="delete" data-delete="" class="btn btn-sm btn-icon btn-light-danger">
                    <?= service('theme')->getSVG('icons/duotone/arrows/arr088.svg', "svg-icon svg-icon-2"); ?>
                </button>
                <button class="accordion-button d-flex fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_<?= $replace; ?>_body_1" aria-expanded="true" aria-controls="kt_accordion_<?= $replace; ?>_body_1">
                    <span class="card-label fw-bolder text-dark"> Titre <?= isset(($instanceComp['titre']->lang->{service('request')->getLocale()}->name)) ? ' : ' . $instanceComp['titre']->lang->{service('request')->getLocale()}->name : '' ; ?></span>
                    <span class="text-muted mt-1 fw-bold fs-7" style="position: absolute;bottom: 3px;"><?= isset($k) ? $k : '' ; ?></span>
                </button>
            </h2>
            <div id="kt_accordion_<?= $replace; ?>_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_<?= $replace; ?>_header_1" data-bs-parent="#kt_accordion_titre">
                <div class="accordion-body">
                    <!--begin::Input group-->
                    <div class="fv-row mb-5">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.titre')); ?>*</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <?= form_input_lang([$replace, 'titre' ,'name'], ($instanceComp['titre']->lang ?? null), 'id="name" class="form-control form-control-solid form-input-control-lang"', 'text', false, 'builder'); ?>
                    </div>
                    <!--end::Input group-->


                    <!--begin::Input group-->
                    <div class="fv-row mb-5">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.sousTitre')); ?>*</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <?= form_input_lang([$replace, 'titre' ,'sous_name'], ($instanceComp['titre']->lang ?? null), 'id="sous_name" class="form-control form-control-solid form-input-control-lang"', 'text', false, 'builder'); ?>
                    </div>
                    <!--end::Input group-->

                     <!--begin::Input group-->
                     <div class="fv-row mb-5">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Page.typeHn')); ?>*</label>
                        <!--end::Label-->
                        <select class="form-select mb-2" data-hide-search="true" name="builder[<?= $replace; ?>][titre][default][type]" data-control="select2" data-placeholder="Select a <?= ucfirst(lang('Core.groupes')); ?>..." class="form-select form-control form-select-solid">
                            <option <?= isset(($instanceComp['titre']->default->type)) && $instanceComp['titre']->default->type == 'h1' ? 'selected="selected"' : '' ; ?> value="h1" >H1</option>
                            <option <?= isset(($instanceComp['titre']->default->type)) && $instanceComp['titre']->default->type == 'h2' ? 'selected="selected"' : '' ; ?> value="h2" >H2</option>
                            <option <?= isset(($instanceComp['titre']->default->type)) && $instanceComp['titre']->default->type == 'h3' ? 'selected="selected"' : '' ; ?> value="h3" >H3</option>
                            <option <?= isset(($instanceComp['titre']->default->type)) && $instanceComp['titre']->default->type == 'h4' ? 'selected="selected"' : '' ; ?> value="h4" >H4</option>
                         </select>
                        <!--begin::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-5">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Page.class')); ?>*</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" id="class" value="<?= isset(($instanceComp['titre']->default->class)) ? $instanceComp['titre']->default->class : '' ; ?>" name="builder[<?= $replace; ?>][titre][default][class]" kl_vkbd_parsed="true">
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-5">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Page.class2')); ?>*</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" id="class" value="<?= isset(($instanceComp['titre']->default->class2)) ? $instanceComp['titre']->default->class2 : '' ; ?>" name="builder[<?= $replace; ?>][titre][default][class2]" kl_vkbd_parsed="true">
                    </div>
                    <!--end::Input group-->


                    
                </div>
            </div>
        </div>
    </div>
</div>

