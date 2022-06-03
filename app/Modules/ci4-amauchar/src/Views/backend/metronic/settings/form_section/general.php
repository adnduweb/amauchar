<?= form_open('', ['id' => 'kt_' . strtolower($name) . '_form', 'class' => 'kt-form', 'novalidate' => false]); ?>
<input type="hidden" name="action" value="edit" />

<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.general')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9">

        <div class="row mb-6">
            <label for="nameApp" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.nameApp')); ?>* : </label>
            <div class="col-lg-8">
                <input class="form-control form-control-solid" required type="text" value="<?= old('nameApp') ? old('nameApp') : service('settings')->get('App.nameApp'); ?>" name="nameApp" id="nameApp">
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>

        <div class="row mb-6">
            <label for="nameShortApp" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.nameShortApp')); ?>* : </label>
            <div class="col-lg-8">
                <input class="form-control form-control-solid" required type="text" value="<?= old('nameShortApp') ? old('nameShortApp') : service('settings')->get('App.nameShortApp'); ?>" name="nameShortApp" id="nameShortApp">
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>

        <div class="row mb-6">
            <label for="descApp" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.descApp')); ?>* : </label>
            <div class="col-lg-8">
                <input class="form-control form-control-solid" required type="text" value="<?= old('descApp') ? old('descApp') : service('settings')->get('App.descApp'); ?>" name="descApp" id="descApp">
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>

        <div class="row mb-6">
            <label for="id_group" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.themesAdmin')); ?>* : </label>
            <div class="col-lg-8">
                <!-- <select required name="user[themeAdmin]" class="form-select form-select-solid form-select-lg fw-bold" aria-label="Select a Country" data-kt-select2="true" data-control="select2" data-placeholder="<?= ucfirst(lang('Core.choose_one_of_the_following')); ?>" id="themeAdmin"> -->
                <select required name="themebo" class="form-select form-select-solid" data-kt-select2="true" data-placeholder="<?= ucfirst(lang('Core.selectOption')); ?>" data-hide-search="true">
                    <option value=""><?= ucfirst(lang('Core.selectOption')); ?></option>
                    <?php foreach ($getThemesAdmin as $theme) { ?>
                        <option <?= $theme ==  service('settings')->get('App.themebo') ? 'selected' : ''; ?> value="<?= $theme; ?>"><?= ucfirst($theme); ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="row mb-6">
            <label for="id_group" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.themesFront')); ?>* : </label>
            <div class="col-lg-8">
                <!-- <select required name="user[themeAdmin]" class="form-select form-select-solid form-select-lg fw-bold" aria-label="Select a Country" data-kt-select2="true" data-control="select2" data-placeholder="<?= ucfirst(lang('Core.choose_one_of_the_following')); ?>" id="themeAdmin"> -->
                <select required name="themefo" class="form-select form-select-solid" data-kt-select2="true" data-placeholder="<?= ucfirst(lang('Core.selectOption')); ?>" data-hide-search="true">
                    <option value=""><?= ucfirst(lang('Core.selectOption')); ?></option>
                    <?php foreach ($getThemesFront as $theme) { ?>
                        <option <?= $theme ==  service('settings')->get('App.themefo') ? 'selected' : ''; ?> value="<?= $theme; ?>"><?= ucfirst($theme); ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group form-group-sm row  mb-10">
            <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.displayManifest')); ?></label>
            <div class="col-lg-8">
                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" <?= service('settings')->get('App.active_manifest') == true ? 'checked="checked"' : ''; ?> name="active_manifest" value="1">
                    <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
            </div>
        </div>

        <div class="form-group form-group-sm row mb-6 ">
            <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.displayServicesWworkers')); ?></label>
            <div class="col-lg-8">
                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" <?= ( service('settings')->get('App.core', 'servicesWworkers') == true) ? 'checked="checked"' : ''; ?> name="servicesWworkers" value="1"> 
                    <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
            </div>
        </div>

        <div class="form-group form-group-sm row mb-6 ">
            <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.ModeMaintenance')); ?></label>
            <div class="col-lg-8">
                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" <?= ( service('settings')->get('App.modeMaintenance') == true) ? 'checked="checked"' : ''; ?> name="modeMaintenance" value="1"> 
                    <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
            </div>
        </div>

        <!-- <div class="form-group form-group-sm row mb-6 ">
            <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.modeEvironnement')); ?></label>
            <div class="col-lg-8">
                <select required name="modeEvironnement" class="form-select form-select-solid" data-kt-select2="true" data-placeholder="<?= ucfirst(lang('Core.choose_one_of_the_following')); ?>" data-hide-search="true">
                    <option value="development"  <?= setting('App.modeEvironnement') == 'development' ? 'selected' : ''; ?>><?= ucfirst(lang('Core.development')); ?></option>
                    <option value="production"  <?= setting('App.modeEvironnement') == 'production' ? 'selected' : ''; ?>><?= ucfirst(lang('Core.production')); ?></option>
                </select>
            </div>
        </div> -->

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
    </div>

</div>

<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.DateAndTimeSettings')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9">
                                
        <div class="row mb-6">
            <label for="timezone" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.timezone')); ?>* : </label>
            <div class="col-lg-8">
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                        <select name="timezoneArea" class="form-control" hx-get="<?= route_to('settings.timezones') ?>" hx-target="#timezone" hx-include="[name='timezoneArea']" >
                            <option>Select timezone...</option>
                            <?php foreach ($timezones as $timezone) : ?>
                                <option value="<?= $timezone ?>" <?php if ($currentTZArea === $timezone) : ?> selected <?php endif ?>>
                                    <?= $timezone ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                        <select name="timezone" data-kt-select2="true" id="timezone" class="form-control">
                            <?php if (isset($timezoneOptions) && ! empty($timezoneOptions)) : ?>
                                <?= $timezoneOptions ?>
                            <?php else : ?>
                                <option value="0">No timezones</option>
                            <?php endif ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-6">
            <label for="nameApp" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.date&TimeFormat')); ?>* : </label>
            <div class="col-lg-8">

                <div class="fv-row mb-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dateFormat" value="m/d/Y"
                            <?php if (old('dateFormat', $dateFormat) === 'm/d/Y') : ?> checked <?php endif ?>>
                        <label class="form-check-label" for="dateFormat">
                            mm/dd/yyyy
                        </label>
                    </div>
                </div>

                <div class="fv-row mb-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dateFormat" value="d/m/Y"
                            <?php if (old('dateFormat', $dateFormat) === 'd/m/Y') : ?> checked <?php endif ?>>
                        <label class="form-check-label" for="dateFormat">
                            dd/mm/yyyy
                        </label>
                    </div>
                </div>

                <div class="fv-row mb-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dateFormat" value="d-m-Y"
                            <?php if (old('dateFormat', $dateFormat) === 'd-m-Y') : ?> checked <?php endif ?>>
                        <label class="form-check-label" for="dateFormat">
                            dd-mm-yyyy
                        </label>
                    </div>
                </div>

                <div class="fv-row mb-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dateFormat" value="Y-m-d"
                            <?php if (old('dateFormat', $dateFormat) === 'Y-m-d') : ?> checked <?php endif ?>>
                        <label class="form-check-label" for="dateFormat">
                            yyyy-mm-dd
                        </label>
                    </div>
                </div>

                <div class="fv-row mb-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dateFormat" value="M j, Y"
                            <?php if (old('dateFormat', $dateFormat) === 'M j, Y') : ?> checked <?php endif ?>>
                        <label class="form-check-label" for="dateFormat">
                            mmm dd, yyyy
                        </label>
                    </div>
                </div>
                <div class="separator separator-dashed my-6"></div>
                <!-- Time Format -->
                <div class="row mt-4">
                    <div class="col-12 col-sm-4">

                        <div class="fv-row mb-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="timeFormat" value="g:i A"
                                    <?php if (old('timeFormat', $timeFormat) === 'g:i A') : ?> checked <?php endif ?>>
                                <label class="form-check-label" for="timeFormat">
                                <?= ucfirst(lang('Core.12 hour with AM/PM')); ?>
                                </label>
                            </div>
                        </div>

                        <div class="fv-row mb-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="timeFormat" value="H:i"
                                    <?php if (old('timeFormat', $timeFormat) === 'H:i') : ?> checked <?php endif ?>>
                                <label class="form-check-label" for="timeFormat">
                                <?= ucfirst(lang('Core.24 hour')); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
    </div>

</div>
<?= form_close(); ?>