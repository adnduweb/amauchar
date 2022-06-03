<?php 
$replace = isset($instanceComp) ? $k : '__i__' ; 
$paramsMedia = [
    'button' => 'icone', 
    'type' => 'image', 
    'multiple' => 'false',
    'selector' => 'builder[' . $replace . '][image][' . service('request')->getLocale() . ']',
    'media' => (isset($instanceComp) && !is_null($composer->getMedia($k))) ? $composer->getMedia($k) : new \Amauchar\Medias\Entities\Media()
    ];
// print_r($composer->getMedia($k));exit;
?>

<div class="image item-widget actual-comp" id="comp-<?= md5('image-01'); ?>">
    <div class="accordion" id="kt_accordion_titre">
        <div class="accordion-item">
            <h2 class="accordion-header" style="position: relative;" id="kt_accordion_<?= $replace; ?>_header_1">
                <button type="button" style="position: absolute;z-index: 2;left: -25px;top: 15px;" data-kt_composer_key="<?= $replace; ?>" data-kt_composer_page_id="<?= isset($composer) ? $composer->page_id : ''; ?>" data-etat="delete" data-delete="" class="btn btn-sm btn-icon btn-light-danger">
                    <?= service('theme')->getSVG('icons/duotone/arrows/arr088.svg', "svg-icon svg-icon-2"); ?>
                </button>
                <button class="accordion-button d-flex fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_<?= $replace; ?>_body_1" aria-expanded="true" aria-controls="kt_accordion_<?= $replace; ?>_body_1">
                    <span> <img class="img-responsive w-50" src="<?= $paramsMedia['media']->getUrlMedia('thumbnails'); ?>" /></span>
                    <span class="card-label fw-bolder text-dark mx-2"> 
                        Image <?= isset(($instanceComp[service('request')->getLocale()]['name'])) ? ' : ' . $instanceComp[service('request')->getLocale()]['name'] : '' ; ?>
                        <span class="text-muted mt-1 fw-bold fs-7 d-flex"><?= isset($k) ? $k : '' ; ?></span>
                    </span>
                    
                </button>
            </h2>
            <div id="kt_accordion_<?= $replace; ?>_body_1" class="accordion-collapse collapse" aria-labelledby="kt_accordion_<?= $replace; ?>_header_1" data-bs-parent="#kt_accordion_titre">
                <div class="accordion-body">

                    <div class="card-body text-center pt-0">
                        <!--begin::Image input-->
                        <div class="image-input <?= (!empty($form->media_id)) ? '' : 'image-input-empty';?> image-input-outline mb-3" data-kt-image-input="true" style="">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-150px h-150px" style="background-image: url(<?= $paramsMedia['media']->getUrlMedia('medium'); ?>"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <?= view('Amauchar\Medias\Views\themes\metronic\_templates\add_button', $paramsMedia) ?>
                            <!--end::Label-->

                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-imagemanager-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Définissez l'image miniature de la création. Seuls les fichiers images *.png, *.jpg et *.jpeg sont acceptés</div>
                        <!--end::Description-->
                    </div>
                    


                    <!--begin::Input group-->
                    <div class="fv-row mb-15">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.class')); ?>*</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" id="class" value="<?= isset(($instanceComp[service('request')->getLocale()]['class'])) ? $instanceComp[service('request')->getLocale()]['class'] : '' ; ?>" name="builder[<?= $replace; ?>][image][<?= service('request')->getLocale(); ?>][class]" kl_vkbd_parsed="true">
                    </div>
                    <!--end::Input group-->


                    
                </div>
            </div>
        </div>
    </div>
</div>

