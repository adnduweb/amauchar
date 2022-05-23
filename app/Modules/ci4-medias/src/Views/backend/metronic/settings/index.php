<?= $this->extend(config('Core')->views['layout']) ?>
<?= $this->section('main') ?>

    <?= view('Amauchar\Medias\Views\backend\metronic\partials\cartd_top', ['medias' => $medias, 'active' => $active]) ?>

    <div class="card card-flush">
        <!--begin::Card-->
        <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header pt-8">
            <!--begin::Card title-->
            <div class="card-title">
                <h2><?= ucfirst(lang('Medias.preferences')); ?></h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Form-->
            <?= form_open(route_to('medias.settings.post'), ['id' => 'kt_file_manager_settings', 'class' => 'kt-form', 'novalidate' => false]); ?>

             <!--begin::Input group-->
             <div class="fv-row row mb-15">
                    <!--begin::Col-->
                    <div class="col-md-3 d-flex align-items-center">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold"><?= ucfirst(lang('Medias.acceptedFiles')); ?></label>
                        <!--end::Label-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-9">
                        <input class="form-control form-control-solid" type="text" value="<?= old('acceptedFiles') ? old('acceptedFiles') : setting('Medias.acceptedFiles'); ?>" name="acceptedFiles" id="acceptedFiles-format">
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                
                <!--begin::Input group-->
                <div class="fv-row row mb-15">
                    <!--begin::Col-->
                    <div class="col-md-3 d-flex align-items-center">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold"><?= ucfirst(lang('Medias.formatThumbnail')); ?></label>
                        <!--end::Label-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-9">
                        <input class="form-control form-control-solid" required="" type="text" value="<?= esc(old('formatThumbnail', setting('Medias.formatThumbnail')), 'attr') ?>" name="formatThumbnail" id="formatThumbnail-format">
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row row mb-15">
                    <!--begin::Col-->
                    <div class="col-md-3 d-flex align-items-center">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold"><?= ucfirst(lang('Medias.formatSmall')); ?></label>
                        <!--end::Label-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-9">
                        <input class="form-control form-control-solid" required="" type="text" value="<?= old('formatSmall') ? old('formatSmall') : setting('Medias.formatSmall'); ?>" name="formatSmall" id="formatSmall-format">
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                    <div class="fv-row row mb-15">
                    <!--begin::Col-->
                    <div class="col-md-3 d-flex align-items-center">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold"><?= ucfirst(lang('Medias.formatMedium')); ?></label>
                        <!--end::Label-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-9">
                        <input class="form-control form-control-solid" required="" type="text" value="<?= old('formatMedium') ? old('formatMedium') : setting('Medias.formatMedium'); ?>" name="formatMedium" id="formatMedium-format">
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row row mb-15">
                    <!--begin::Col-->
                    <div class="col-md-3 d-flex align-items-center">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold"><?= ucfirst(lang('Medias.formatLarge')); ?></label>
                        <!--end::Label-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-9">
                        <input class="form-control form-control-solid" required="" type="text" value="<?= old('formatLarge') ? old('formatLarge') : setting('Medias.formatLarge'); ?>" name="formatLarge" id="formatLarge-format">
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <div class="fv-row row mb-15">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-3 d-flex align-items-center">
                            <label class="fs-6 fw-bold"><?= ucfirst(lang('Medias.displayTheWatermark')); ?></label>
                        </div>
                    
                        <div class="col-md-9">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input w-30px h-20px" type="checkbox"  name="formatWatermark" <?= (setting('Medias.formatWatermark') == 1) ? 'checked' : '' ?> value="1">
                                <label class="form-check-label" for="flexCheckDefault"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--begin::Input group-->
                <div class="fv-row row mb-15">
                    <!--begin::Col-->
                    <div class="col-md-3 d-flex align-items-center">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold"><?= ucfirst(lang('Medias.textWatermark')); ?></label>
                        <!--end::Label-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-9">
                        <input class="form-control form-control-solid" type="text" value="<?= old('formatTextWatermark') ? old('formatTextWatermark') : setting('Medias.formatTextWatermark'); ?>" name="formatTextWatermark" id="formatTextWatermark-format">
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="fv-row row mb-15">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-3 d-flex align-items-center">
                            <label class="fs-6 fw-bold"><?= ucfirst(lang('Medias.deleteTheFiles')); ?></label>
                        </div>
                    
                        <div class="col-md-9">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input w-30px h-20px" type="checkbox"  name="delete_files" value="1">
                                <label class="form-check-label" for="flexCheckDefault"></label>
                            </div>
                        </div>
                    </div>
                </div>
                    <!--end::Input group-->

                    <?php if (!is_writable(ROOTPATH . 'writable/medias/')){ ?>
                    <div class="d-flex align-items-sm-center mb-7">
                        <!--begin::Title-->
                        <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6"> <?= ucfirst(lang('Medias.mediasNotWritable')); ?> : </a>
                            </div>
                            <span class="badge badge-light-success fs-8 fw-bolder my-2"><?= ROOTPATH . 'writable/medias/'; ?></span>
                        </div>
                        <!--end::Title-->
                    </div>
                <?php  } ?>

                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
                </div>
            <?= form_close(); ?>
            <!--end::Form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    </div>


<?= $this->endSection() ?>

<?= $this->section('pageAdminScripts') ?>
<?= $this->endSection() ?>