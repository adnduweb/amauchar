<?php $replace = isset($instanceComp) ? $k : '__i__' ; ?>

<div class="texte item-widget actual-comp" id="comp-<?= md5('texte-01'); ?>">
    <div class="accordion" id="kt_accordion_texte">
        <div class="accordion-item">
            <h2 class="accordion-header" style="position: relative;" id="kt_accordion_<?= $replace; ?>_header_1">
                <button type="button" style="position: absolute;z-index: 2;left: -25px;top: 15px;" data-kt_composer_key="<?= $replace; ?>" data-kt_composer_page_id="<?= isset($composer) ? $composer->page_id : ''; ?>" data-etat="delete" data-delete="" class="btn btn-sm btn-icon btn-light-danger">
                    <?= service('theme')->getSVG('icons/duotone/arrows/arr088.svg', "svg-icon svg-icon-2"); ?>
                </button>
                <button class="accordion-button d-flex fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_<?= $replace; ?>_body_1" aria-expanded="true" aria-controls="kt_accordion_<?= $replace; ?>_body_1">
                    <span class="card-label fw-bolder text-dark"> Texte </span>
                    <span class="text-muted mt-1 fw-bold fs-7" style="position: absolute;bottom: 3px;"><?= isset($k) ? $k : '' ; ?></span>
                </button>
            </h2>
            <div id="kt_accordion_<?= $replace; ?>_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_<?= $replace; ?>_header_1" data-bs-parent="#kt_accordion_titre">
                <div class="accordion-body">
                    <!--begin::Input group-->
                    <div class="fv-row mb-5">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.titre')); ?>*</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                         <div class="tinymce">
                            <textarea class="tox-target tinymceInstance" id="tinymce_<?= $replace; ?>" name="builder[<?= $replace; ?>][texte][<?= service('request')->getLocale(); ?>][name]" class="tox-target"> <?= isset(($instanceComp['texte'][service('request')->getLocale()]['name'])) ? $instanceComp['texte'][service('request')->getLocale()]['name'] : '' ; ?> </textarea>
                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-5">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.class')); ?>*</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" id="class" value="<?= isset(($instanceComp['texte'][service('request')->getLocale()]['class'])) ? $instanceComp['texte'][service('request')->getLocale()]['class'] : '' ; ?>" name="builder[<?= $replace; ?>][texte][<?= service('request')->getLocale(); ?>][class]" kl_vkbd_parsed="true">
                    </div>
                    <!--end::Input group-->


                    
                </div>
            </div>
        </div>
    </div>
</div>

