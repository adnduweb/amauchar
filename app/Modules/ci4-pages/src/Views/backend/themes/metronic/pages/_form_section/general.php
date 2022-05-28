<div id="kt_<?= $controller; ?>_view_general" class=" tab-pane fade show active">
    <!--begin::General options-->
    <div class="card card-flush py-4">
        <div class="card-body pt-0">
  
        <?php if (isset($notice) ){ ?>
            <?= $this->include('\Themes\backend\metronic\partials\extras\_notice'); ?>
        <?php } ?>
            
       
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.name')); ?>*</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" required placeholder="" id="name" name="lang[<?= service('request')->getLocale(); ?>][name]" type="text" value="<?=  old('lang.'.service('request')->getLocale() .'.name') ? old('lang.'.service('request')->getLocale() .'.name') : $form->getName(); ?>" kl_vkbd_parsed="true">
                <!--end::Input-->
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
                <span class="form-text text-muted"><?= lang('Core.define_default_name_permission_delimiter'); ?></span>
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.description')); ?>*</label>
                <!--end::Label-->
                <!--begin::Input-->
                <div class="tinymce">
                    <textarea class="tox-target tinymceInstance" id="tinymceInstance[<?= service('request')->getLocale(); ?>][1]" name="lang[<?= service('request')->getLocale(); ?>][description]" class="tox-target"> <?= old('lang.'.service('request')->getLocale() .'.description') ? old('lang.'.service('request')->getLocale() .'.description') : $form->description; ?> </textarea>
                </div>

                <!--end::Input-->
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-15">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.login_destination')); ?>*</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" required placeholder="" id="slug" value="<?= old('lang.'.service('request')->getLocale() .'.slug') ? old('lang.'.service('request')->getLocale() .'.slug') : $form->slug; ?>" name="lang[<?= service('request')->getLocale(); ?>][slug]" kl_vkbd_parsed="true">
                <!--end::Input-->
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
            <!--end::Input group-->

            <div class="accordion" id="kt_accordion_seo">
                <div class="accordion-item">
                    <h2 class="accordion-header" style="position: relative;" id="kt_accordion_seo">
                        <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_seo_body" aria-expanded="true" aria-controls="kt_accordion_seo_body">
                            <span class="card-label fw-bolder text-dark"> Seo Général </span>
                        </button>
                    </h2>
                    <div id="kt_accordion_seo_body" class="accordion-collapse collapse" aria-labelledby="kt_accordion_seo" data-bs-parent="#kt_accordion_seo">
                        <div class="accordion-body">
                        <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.metaTitle')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="meta_title" value="<?= old('lang.'.service('request')->getLocale() .'.meta_title') ? old('lang.'.service('request')->getLocale() .'.meta_title') : $form->getMetaTitle(); ?>" name="lang[<?= service('request')->getLocale(); ?>][meta_title]" kl_vkbd_parsed="true">
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.metaDescription')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="meta_description" value="<?= old('lang.'.service('request')->getLocale() .'.meta_description') ? old('lang.'.service('request')->getLocale() .'.meta_description') : $form->getMetaDescription(); ?>" name="lang[<?= service('request')->getLocale(); ?>][meta_description]" kl_vkbd_parsed="true">
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.robots')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="robots" value="<?= old('lang.'.service('request')->getLocale() .'.robots') ? old('lang.'.service('request')->getLocale() .'.robots') : $form->getRobots(); ?>" name="lang[<?= service('request')->getLocale(); ?>][robots]" kl_vkbd_parsed="true">
                            </div>
                            <!--end::Input group-->                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion mt-5" id="kt_accordion_openGraph">
                <div class="accordion-item">
                    <h2 class="accordion-header" style="position: relative;" id="kt_accordion_openGraph">
                        <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_openGraph_body" aria-expanded="true" aria-controls="kt_accordion_openGraph_body">
                            <span class="card-label fw-bolder text-dark"> Seo Open Graph </span>
                        </button>
                    </h2>
                    <div id="kt_accordion_openGraph_body" class="accordion-collapse collapse" aria-labelledby="kt_accordion_openGraph" data-bs-parent="#kt_accordion_openGraph">
                        <div class="accordion-body">
                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.ogType')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="og_type" value="<?= old('lang.'.service('request')->getLocale() .'.og_type') ? old('lang.'.service('request')->getLocale() .'.og_type') : $form->getMetaOgType(); ?>" name="lang[<?= service('request')->getLocale(); ?>][og_type]" kl_vkbd_parsed="true">
                            </div>
                            <!--end::Input group-->

                              <!--begin::Input group-->
                              <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.ogTitle')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="og_title" value="<?= old('lang.'.service('request')->getLocale() .'.og_title') ? old('lang.'.service('request')->getLocale() .'.og_title') : $form->getMetaOgTitle(); ?>" name="lang[<?= service('request')->getLocale(); ?>][og_title]" kl_vkbd_parsed="true">
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.ogDescription')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="og_description" value="<?= old('lang.'.service('request')->getLocale() .'.og_description') ? old('lang.'.service('request')->getLocale() .'.og_description') : $form->getMetaOgDescription(); ?>" name="lang[<?= service('request')->getLocale(); ?>][og_description]" kl_vkbd_parsed="true">
                            </div>
                            <!--end::Input group-->                           
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion mt-5" id="kt_accordion_twitter">
                <div class="accordion-item">
                    <h2 class="accordion-header" style="position: relative;" id="kt_accordion_twitter">
                        <button class="accordion-button fs-4 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_twitter_body" aria-expanded="true" aria-controls="kt_accordion_twitter_body">
                            <span class="card-label fw-bolder text-dark"> Seo Twitter méta </span>
                        </button>
                    </h2>
                    <div id="kt_accordion_twitter_body" class="accordion-collapse collapse" aria-labelledby="kt_accordion_twitter" data-bs-parent="#kt_accordion_twitter">
                        <div class="accordion-body">
                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.twitterType')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="twitter_type" value="<?= old('lang.'.service('request')->getLocale() .'.twitter_type') ? old('lang.'.service('request')->getLocale() .'.twitter_type') : $form->getMetaTwitterType(); ?>" name="lang[<?= service('request')->getLocale(); ?>][twitter_type]" kl_vkbd_parsed="true">
                            </div>
                            <!--end::Input group-->

                              <!--begin::Input group-->
                              <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.twitterTitle')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="twitter_title" value="<?= old('lang.'.service('request')->getLocale() .'.twitter_title') ? old('lang.'.service('request')->getLocale() .'.twitter_title') : $form->getMetaTwitterTitle(); ?>" name="lang[<?= service('request')->getLocale(); ?>][twitter_title]" kl_vkbd_parsed="true">
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.twitterDescription')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="twitter_description" value="<?= old('lang.'.service('request')->getLocale() .'.twitter_description') ? old('lang.'.service('request')->getLocale() .'.twitter_description') : $form->getMetaTwitterDescription(); ?>" name="lang[<?= service('request')->getLocale(); ?>][twitter_description]" kl_vkbd_parsed="true">
                            </div>
                            <!--end::Input group-->                           
                        </div>
                    </div>
                </div>
            </div>
           



            <!--begin::Modal footer-->
            <div class="modal-footer flex-center">
               
                <!--begin::Button-->
                <button type="reset" id="kt_modal_update_customer_cancel" class="btn btn-light me-3"> <?= ucfirst(lang('Core.discard')); ?></button>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="submit" id="kt_modal_update_customer_submit" class="btn btn-primary">
                    <span class="indicator-label"> <?= ucfirst(lang('Core.save_form')); ?></span>
                    <span class="indicator-progress"><?= ucfirst(lang('Core.please_wait...')); ?> 
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!--end::Button-->
            </div>
            <?php if (! empty($form->id)) { ?> <?= form_hidden('id', $form->getID()); ?> <?php } ?>
            <?php if (! empty($form->id_page_lang)) { ?> <?= form_hidden('id_page_lang', $form->id_page_lang); ?> <?php } ?>
        <!-- end:: Content -->

        </div>
    </div>
</div>


<?= $this->section('AdminAfterExtraJs') ?>

<script type="text/javascript">

"use strict";
// Class definition

var KTPages = function () {    

    var initPage = function () {
        $('#kt_apps_form input#name').on('keyup', slug);
        
        <?php if(!empty($form->getID())){ ?>
            
            const user = JSON.parse(localStorage.getItem('user'));
            
            const interval = setInterval(function() {

                var myForm = document.getElementById('kt_apps_form');
                var myContent = window.tinymce.get('tinymceInstance[<?= service('request')->getLocale(); ?>][1]').getContent();
                const formData = new FormData(myForm);
                formData.append('lang[fr][description]', myContent);
        
                fetch(base_url + 'api/v1/pages/saveauto', {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="X-CSRF-TOKEN"]').attr('content'),// <--- aquí el token
                        'Authorization': 'Bearer ' + user.accessToken
                    },
                    method: "POST",
                    body: formData
                })
                .then(function (response) { return response.json(); });
            }, 1000); //1000 means 1 sec, 5000 means 5 seconds
        
        <?php } ?>

    }


    var remove_accents = function (strAccents) {
        var strAccents = strAccents.split('');
        var strAccentsOut = new Array();
        var strAccentsLen = strAccents.length;
        var accents =    "ÀÁÂÃÄÅàáâãäåÒÓÔÕÕÖØòóôõöøÈÉÊËèéêëðÇçÐÌÍÎÏìíîïÙÚÛÜùúûüÑñŠšŸÿýŽž";
        var accentsOut = "AAAAAAaaaaaaOOOOOOOooooooEEEEeeeeeCcDIIIIiiiiUUUUuuuuNnSsYyyZz";
        for (var y = 0; y < strAccentsLen; y++) {
            if (accents.indexOf(strAccents[y]) != -1) {
                strAccentsOut[y] = accentsOut.substr(accents.indexOf(strAccents[y]), 1);
            } else
                strAccentsOut[y] = strAccents[y];
        }
        strAccentsOut = strAccentsOut.join('');
        strAccentsOut = strAccentsOut.toLowerCase();

        return strAccentsOut;
    }


    var slug = function () {

        var string = $('#kt_apps_form input#name').val();
        string = remove_accents(string);
        string = string.replace(/[^a-z0-9\s]/gi, '').replace(/[-\s]/g, '-');

        $('#kt_apps_form input#slug').val(string);
    }


    return {
        // public functions
        init: function() {
            initPage(); 
        }
    };
}();

// Initialization
jQuery(document).ready(function() {
    KTAppsAdnduWeb.init();   
    KTPages.init();
  
});

</script>

<?= $this->endSection() ?>