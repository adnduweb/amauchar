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

        <div class="form-group form-group-sm row mb-6 ">
            <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.forceUnlockMdp')); ?></label>
            <div class="col-lg-8">
                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" <?= ( service('settings')->get('App.forceUnlockMdp', 'user:' . Auth()->user()->id) == true) ? 'checked="checked"' : ''; ?> name="forceUnlockMdp" value="1"> 
                    <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
            </div>
        </div>

        <div  x-data="{ show: <?= (service('settings')->get('App.lockLoginIp', 'user:' . Auth()->user()->id) == true) ? 'true' : 'false'; ?> }" >
            <div class="form-group form-group-sm row mb-6 ">
                <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.lockLoginIp')); ?></label>
                <div class="col-lg-8">
                    <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                        <input @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }" class="form-check-input" type="checkbox" <?= ( service('settings')->get('App.lockLoginIp', 'user:' . Auth()->user()->id) == true) ? 'checked="checked"' : ''; ?> name="lockLoginIp" value="1"> 
                        <label class="form-check-label" for="flexCheckDefault"></label>
                    </div>
                </div>
            </div>

        

            <div  x-show="show" style="display:none" class="row mb-6">
                <label for="nameApp" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.adresseIp')); ?>* : </label>
                <div class="col-lg-8">
                    <input class="form-control form-control-solid" required type="text" value="<?= old('adresseIpUnlock') ? old('adresseIpUnlock') : implode(';', service('settings')->get('App.adresseIpUnlock', 'user:' . Auth()->user()->id)); ?>" name="adresseIpUnlock" id="adresseIpUnlock">
                    <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
                    <p class="text-muted"> vous devez les </p>
                </div>
            </div>
        </div>

        <div class="row mb-6">
            <label for="nameShortApp" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.nameShortApp')); ?>* : </label>
            <div class="col-lg-8">
                <input class="form-control form-control-solid" required type="text" value="<?= old('nameShortApp') ? old('nameShortApp') : service('settings')->get('App.nameShortApp'); ?>" name="nameShortApp" id="nameShortApp">
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>
      

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
    </div>

</div>

<?= form_close(); ?>