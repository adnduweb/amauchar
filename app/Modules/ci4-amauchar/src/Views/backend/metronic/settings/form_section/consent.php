<?= form_open('', ['id' => 'kt_' . strtolower($name) . '_form', 'class' => 'kt-form', 'novalidate' => false]); ?>
<input type="hidden" name="action" value="edit" />

<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.basicDetails')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9">
  

        <p><?= ucfirst(lang('Core.theConsentModuleAsksUsersToProvide')); ?></p>

        <div class="form-check form-switch mt-6  mb-3">
            <input class="form-check-input" type="checkbox" name="requireConsent" role="switch" id="requireConsent"
                <?php if (setting('Consent.requireConsent')) : ?> checked <?php endif ?>
            >
            <label class="form-check-label" for="requireConsent"><?= ucfirst(lang('Core.requireConsentFormVisitors')); ?></label>
        </div>

        <!-- Consent Length -->
        <div class="row mb-3">
            <div class="col-12 col-sm-6">
                <label class="form-label" for="consentLength"><?= ucfirst(lang('Core.DaysConsentsValid')); ?></label>
                <div class="row">
                    <div class="col-3">
                        <input type="number" min="0" step="1" class="form-control col-2" name="consentLength"
                                value="<?= old('consentLength', setting('Consent.consentLength')) ?>">
                    </div>
                </div>
                <?php if (has_error('consentLength')) : ?>
                    <p class="text-danger"><?= error('consentLength') ?></p>
                <?php endif ?>
            </div>
            <div class="col">
                <p class="text-muted small pt-3"><?= ucfirst(lang('Core.AfterDaysAreUp')); ?></p>
            </div>
        </div>

        <!-- Policy URL -->
        <div class="row mb-3">
            <div class="col-12 col-sm-6">
                <label class="form-label" for="policyUrl"><?= ucfirst(lang('Core.urlToTheCookiePolicy')); ?></label>
                <input type="text" class="form-control" name="policyUrl" value="<?= old('policyUrl', setting('Consent.policyUrl')) ?>">
                <?php if (has_error('policyUrl')) : ?>
                    <p class="text-danger"><?= error('policyUrl') ?></p>
                <?php endif ?>
            </div>
            <div class="col">
                <p class="text-muted small pt-5"><?= ucfirst(lang('Core.mayBeEitherAFullOrRelativeUrl')); ?></p>
            </div>
        </div>

        <!-- Consent Message -->
        <div class="row mb-3">
            <div class="col-12 col-sm-6">
                <label class="form-label" for="consentMessage"><?= ucfirst(lang('Core.initialMessageOnConsentForm')); ?></label>
                <textarea name="consentMessage" rows="4" class="form-control"><?= old('consentMessage', setting('Consent.consentMessage')) ?></textarea>
                <?php if (has_error('consentMessage')) : ?>
                    <p class="text-danger"><?= error('consentMessage') ?></p>
                <?php endif ?>
            </div>
            <div class="col">
                <p class="text-muted small pt-5"><?= ucfirst(lang('Core.initialMessageOnConsentForm')); ?></p>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
    </div>

</div>

<?= form_open('', ['id' => 'kt_' . strtolower($name) . '_form', 'class' => 'kt-form', 'novalidate' => false]); ?>
<input type="hidden" name="action" value="edit" />

<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.consents')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9">

        <p><?= ucfirst(lang('Core.theAvailableConsentsThatTheUserMayAgreeTo')); ?></p>

        <?php if (isset($consents) && count($consents)) : ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="col-3">Alias</th>
                    <th class="col-3">Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach (setting('Consent.consents') as $alias => $info) : ?>
                <tr>
                    <td>
                        <input type="text" class="form-control" disabled readonly value="<?= esc($alias) ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="consents[<?= $alias ?>][name]" value="<?= old("consents[{$alias}][name]", $info['name']) ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="consents[<?= $alias ?>][desc]" value="<?= old("consents[{$alias}][desc]", $info['desc']) ?>">
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        <?php endif ?>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
    </div>

</div>


<?= form_open('', ['id' => 'kt_' . strtolower($name) . '_form', 'class' => 'kt-form', 'novalidate' => false]); ?>
<input type="hidden" name="action" value="edit" />

<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.listAnalytics')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9">

       
    <div class="row mb-10">
        <label for="tagManager" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.tagManager')); ?>* : </label>
        <div class="col-lg-8">
            <input class="form-control form-control-solid" type="text" value="<?= old('tagManager') ? old('tagManager') : service('settings')->get('Consent.tagManager'); ?>" name="tagManager" id="tagManagercode">
        </div>
    </div>

    <div class="row mb-10">
        <label for="googleAnalitycs" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.googleAnalitycsCode')); ?>* : </label>
            <div class="col-lg-8">
            <input class="form-control form-control-solid" type="text" value="<?= old('googleAnalitycs') ? old('googleAnalitycs') : service('settings')->get('Consent.googleAnalitycs'); ?>" name="googleAnalitycs" id="consent-googleAnalitycs" id="googleAnalitycs">
        </div>
    </div>


    <div class="row mb-10">
        <label for="google_maps" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.googleMaps')); ?>* : </label>
        <div class="col-lg-8">
            <input class="form-control form-control-solid" type="text" value="<?= old('googleMaps') ? old('googleMaps') : service('settings')->get('Consent.googleMaps'); ?>" name="googleMaps" id="googleMaps">
        </div>
    </div>

    <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>

    <div class="row mb-10">
        <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.rgpdYoutube')); ?></label>
        <div class="col-lg-8">
            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox"  <?= service('settings')->get('Consent.rgpdYoutube') == true ? 'checked="checked"' : ''; ?> name="rgpd[rgpdYoutube]" value="1">
                    <label class="form-check-label" for="flexCheckDefault"></label>
            </div>
        </div>
    </div>

    <div class="row mb-10">
        <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.rgpdFacebook')); ?></label>
        <div class="col-lg-8">
            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" <?= service('settings')->get('Consent.rgpdFacebook') == true ? 'checked="checked"' : ''; ?> name="rgpd[rgpdFacebook]" value="1">
                    <label class="form-check-label" for="flexCheckDefault"></label>
            </div>
        </div>
    </div>

    <div class="row mb-10">
        <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.rgpdTwitter')); ?></label>
        <div class="col-lg-8">
            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" <?= service('settings')->get('Consent.rgpdTwitter') == true ? 'checked="checked"' : ''; ?> name="rgpd[rgpdTwitter]" value="1">
                    <label class="form-check-label" for="flexCheckDefault"></label>
            </div>
        </div>
    </div>

    <div class="row mb-10">
        <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.rgpdStoreCookieConsent')); ?></label>
        <div class="col-lg-8">
            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" <?= service('settings')->get('Consent.rgpdStoreCookieConsent') == true ? 'checked="checked"' : ''; ?> name="rgpd[rgpdStoreCookieConsent]" value="1">
                    <label class="form-check-label" for="flexCheckDefault"></label>
            </div>
        </div>
    </div>

    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
    </div>

    </div>

</div>




