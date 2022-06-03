<?= $this->extend('Themes\backend\metronic\admin') ?>
<?= $this->section('main') ?>


<?= $this->include('Themes\backend\metronic\partials\extras\_cartd_top', ['lists' => $lists, 'active' => $active]) ?>

    <div class="card card-flush">


            <!--begin::Card-->
            <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header pt-8">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Préferences</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Form-->
                <?= form_open('', ['id' => 'kt_file_manager_settings', 'class' => 'kt-form', 'novalidate' => false]); ?>

                    <!--begin::Input group-->
                    <div class="fv-row row mb-15">
                        <div class="d-flex justify-content-between">
                            <div class="col-md-4 d-flex align-items-center">
                                <label class="fs-6 fw-bold">Formulaire de consentement requis pour les visiteurs ? </label>
                            </div>
                        
                            <div class="col-md-8">
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input w-30px h-20px" type="checkbox" <?=  service('settings')->get('Pages.consent', 'requireConsent') == 1 ? "checked" : ""; ?>   name="consent[requireConsent]" value="1">
                                    <label class="form-check-label" for="flexCheckDefault"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!--end::Input group-->

                     <!--begin::Input group-->
                    <div class="fv-row row mb-15">
                        <div class="d-flex justify-content-between">
                            <div class="col-md-4 d-flex align-items-center">
                                <label class="fs-6 fw-bold">Le nombre de jour ou le consentement est valide </label>
                            </div>
                        
                            <div class="col-md-8">
                                <input class="form-control form-control-solid" required="" type="number" value="<?= old('consent.consentLength') ? old('consent.consentLength') : service('settings')->get('Pages.consent', 'consentLength'); ?>" name="consent[consentLength]" id="consent-consentLength">
                                <div class="text-muted fs-7">After days are up, will ask the user for consent again. Par default : 184 jours </div>
                            </div>
                        </div>
                    </div>
                     <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row row mb-15">
                        <!--begin::Col-->
                        <div class="col-md-4 d-flex align-items-center">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold">Url de consentement</label>
                            <!--end::Label-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-8">
                            <input class="form-control form-control-solid" required="" type="text" value="<?= old('consent.urlConsentent_' .service('request')->getLocale()) ? old('consent.urlConsentent_' .service('request')->getLocale()) : service('settings')->get('Pages.consent', 'urlConsent_' .service('request')->getLocale()); ?>" name="consent[urlConsent_<?= service('request')->getLocale(); ?>]" id="consent-urlConsent_<?= service('request')->getLocale(); ?>">
                            <div class="text-muted fs-7">May be either a full or relative URL.</div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row row mb-15">
                        <!--begin::Col-->
                        <div class="col-md-4 d-flex align-items-center">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold">Message de consentement</label>
                            <!--end::Label-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-8">
                            <textarea class="form-control form-control-solid" required="" name="consent[messageInitial_<?= service('request')->getLocale(); ?>]" id="consent-messageInitial_<?= service('request')->getLocale(); ?>"><?= old('consent.messageInitial_' .service('request')->getLocale()) ? old('consent.messageInitial_' .service('request')->getLocale()) : service('settings')->get('Pages.consent', 'messageInitial_' . service('request')->getLocale()); ?></textarea>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-white btn-active-light-primary me-2"> <?= ucfirst(lang('Core.cancel')); ?></button>
                        <button type="submit"  id="btnGroupDrop1" type="submit" name="submithandler" value="save_continue" class="btn btn-light-primary font-weight-bolder btn-sm kt_form_submit kt_form_submit_<?= strtolower($controller); ?>"> <?= ucfirst(lang('Core.saves_changes')); ?></button>
                    </div>
                <?= form_close(); ?>
                <!--end::Form-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->

      


    </div>


<?= $this->endSection() ?>

<?= $this->section('AdminAfterExtraJs') ?>


<?= $this->endSection() ?>