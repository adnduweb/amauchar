<div id="kt_<?= $name; ?>_view_general" class=" tab-pane fade show active">
    <!--begin::General options-->
    <div class="card card-flush py-4">
        <div class="card-body pt-0">
       
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Page.namePage')); ?>*</label>
                <!--end::Label-->
                <?= form_input_lang('name', $formItem->getPagelangAll(), 'id="name" class="form-control form-control-solid form-input-control-lang"', 'text', true); ?>               
                <!--end::Input-->
            </div>
            <!--end::Input group-->
             <!--begin::Input group-->
             <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.introduction')); ?>*</label>
                <!--end::Label-->
                <!--begin::Input-->
                <div class="tinymce">
                    <?= form_textarea_lang('description_short', $formItem->getPagelangAll(), 'id="description_short" class=" form-control form-control-solid form-control-lang"', 'textarea'); ?>
                </div>

                <!--end::Input-->
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.description')); ?>*</label>
                <!--end::Label-->
                <!--begin::Input-->
                <div class="tinymce">
                    <?= form_textarea_lang('description', $formItem->getPagelangAll(), 'id="description" class=" tinymceInstance form-control form-control-solid form-control-lang"', 'textarea'); ?>
                </div>

                <!--end::Input-->
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-15">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Core.slug')); ?>*</label>
                <!--end::Label-->
                <!--begin::Input-->
                <?= form_input_lang('slug', $formItem->getPagelangAll(), 'id="slug" class="form-control form-control-solid form-input-control-lang"', 'text', true); ?>
                <!--end::Input-->
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
                                <?= form_input_lang('meta_title', $formItem->getPagelangAll(), 'id="meta_title" class="form-control form-control-solid form-input-control-lang"', 'text'); ?>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.metaDescription')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <?= form_input_lang('meta_description', $formItem->getPagelangAll(), 'id="meta_description" class="form-control form-control-solid form-input-control-lang"', 'text'); ?>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.robots')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="robots" value="<?= old('lang.'.service('request')->getLocale() .'.robots') ? old('lang.'.service('request')->getLocale() .'.robots') : $formItem->lang->robots; ?>" name="lang[<?= service('request')->getLocale(); ?>][robots]" kl_vkbd_parsed="true">
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
                                <input type="text" class="form-control form-control-solid" placeholder="" id="og_type" value="<?= old('lang.'.service('request')->getLocale() .'.og_type') ? old('lang.'.service('request')->getLocale() .'.og_type') : $formItem->lang->og_type; ?>" name="lang[<?= service('request')->getLocale(); ?>][og_type]" kl_vkbd_parsed="true">
                            </div>
                            <!--end::Input group-->

                              <!--begin::Input group-->
                              <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.ogTitle')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <?= form_input_lang('og_title', $formItem->getPagelangAll(), 'id="og_title" class="form-control form-control-solid form-input-control-lang"', 'text'); ?>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.ogDescription')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <?= form_input_lang('og_description', $formItem->getPagelangAll(), 'id="og_description" class="form-control form-control-solid form-input-control-lang"', 'text'); ?>
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
                                <input type="text" class="form-control form-control-solid" placeholder="" id="twitter_type" value="<?= old('lang.'.service('request')->getLocale() .'.twitter_type') ? old('lang.'.service('request')->getLocale() .'.twitter_type') : $formItem->lang->twitter_type; ?>" name="lang[<?= service('request')->getLocale(); ?>][twitter_type]" kl_vkbd_parsed="true">
                            </div>
                            <!--end::Input group-->

                              <!--begin::Input group-->
                              <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.twitterTitle')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <?= form_input_lang('twitter_title', $formItem->getPagelangAll(), 'id="twitter_title" class="form-control form-control-solid form-input-control-lang"', 'text'); ?>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2"><?= ucfirst(lang('Pages.twitterDescription')); ?></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <?= form_input_lang('twitter_description', $formItem->getPagelangAll(), 'id="twitter_description" class="form-control form-control-solid form-input-control-lang"', 'text'); ?>
                            </div>
                            <!--end::Input group-->                           
                        </div>
                    </div>
                </div>
            </div>
           



            <!--begin::Modal footer-->
            <div class="modal-footer flex-center">
                <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
            </div>
            <?php if (! empty($formItem->id)) { ?> <?= form_hidden('id', $formItem->getID()); ?> <?php } ?>
            <?php if (! empty($formItem->lang->id_page_lang)) { ?> <?= form_hidden('id_page_lang', $formItem->lang->id_page_lang); ?> <?php } ?>
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
        
        <?php if(!empty($formItem->getID())){ ?>
            
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