<?= form_open(($display == 'new') ? route_to('companies.create') : route_to('companies.update', $form->id ), ['id' => 'kt_' . strtolower($name) . '_form', 'class' => 'kt-form', 'novalidate' => false]); ?> 
<input type="hidden" name="action" value="<?= $display; ?>" />
<input type="hidden" name="uuid" value="<?= $form->uuid ?? false; ?>" />
<input type="hidden" name="id" value="<?= $form->id ?? false; ?>" />

<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.general')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9">

        <div class="row fv-row mb-6">
            <label for="raison_social" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.raisonSocial')); ?>* : </label>
            <div class="col-lg-8">
                <input class="form-control form-control-solid" required type="text" value="<?= old('raison_social') ? old('raison_social') : $form->raison_social; ?>" name="raison_social" id="raison_social">
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>
        

        <div class="row fv-row mb-6">
            <label for="email" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.typeRaison')); ?>* : </label>
            <div class="col-lg-8">
                <select name="company_type_id" class="form-control form-control-solid" data-kt-select2="true" data-placeholder="<?= ucfirst(lang('Core.choose_one_of_the_following')); ?>">
                    <?php foreach (\Amauchar\Core\Libraries\Data::getCompagniesType() as $k => $type) : ?>
                        <option value="<?= $type['id']  ?>" <?php if ($form->company_type_id == $type['id']) : ?> selected <?php endif ?>>
                            <?= $type['nom_long'] ?> (<?= $type['nom_court']; ?>)
                        </option>
                    <?php endforeach ?>
                </select>
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>

        <div class="row fv-row mb-6">
            <label for="email" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.emaiContact')); ?>* : </label>
            <div class="col-lg-8">
                <input class="form-control form-control-solid" required type="text" value="<?= old('email') ? old('email') : $form->email; ?>" name="email" id="email">
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>

        <div class="row fv-row mb-6">
            <label for="email" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.country')); ?>* : </label>
            <div class="col-lg-8">
                <select name="country" class="form-control form-control-solid" data-kt-select2="true" data-placeholder="<?= ucfirst(lang('Core.choose_one_of_the_following')); ?>">
                    <?php foreach (\Amauchar\Core\Libraries\Data::getCountriesList() as $k => $country) : ?>
                        <option value="<?= $k  ?>" <?php if ($form->country == $k) : ?> selected <?php endif ?>>
                            <?= $country['name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>

        <div class="row fv-row mb-6">
            <label for="email" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.phone')); ?>* : </label>
            <div class="col-lg-8">
                <input class="form-control form-control-solid" required type="text" value="<?= old('phone') ? old('phone') :  $form->phone; ?>" name="phone" id="phone">
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>

        <div class="row fv-row mb-6">
            <label for="email" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.phoneMobile')); ?> : </label>
            <div class="col-lg-8">
                <input class="form-control form-control-solid" type="text" value="<?= old('phone_mobile') ? old('phone_mobile') : $form->phone_mobile; ?>" name="phone_mobile" id="phone_mobile">
             </div>
        </div>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
    </div>

</div>

<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.Adresse')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9">

        <div class="row fv-row mb-6">
            <label for="raison_social" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.adresse')); ?> : </label>
            <div class="col-lg-8">
                <input class="form-control form-control-solid" type="text" value="<?= old('adresse') ? old('adresse') : $form->adresse; ?>" name="adresse" id="adresse">
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>

        <div class="row fv-row mb-6">
            <label for="raison_social" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.codePostal')); ?> : </label>
            <div class="col-lg-8">
                <input class="form-control form-control-solid" type="text" value="<?= old('code_postal') ? old('code_postal') : $form->code_postal; ?>" name="code_postal" id="code_postal">
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>
        
        <div class="row fv-row mb-6">
            <label for="raison_social" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.ville')); ?> : </label>
            <div class="col-lg-8">
                <input class="form-control form-control-solid" type="text" value="<?= old('ville') ? old('ville') : $form->ville; ?>" name="ville" id="ville">
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
    </div>

</div>

<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.societe&Taxes')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9">

        <div class="row fv-row mb-6">
            <label for="siret" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.siret')); ?> : </label>
            <div class="col-lg-8">
                <input class="form-control form-control-solid" type="text" value="<?= old('siret') ? old('siret') : $form->siret; ?>" name="siret" id="siret">
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>

        <div class="row fv-row mb-6">
            <label for="ape" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.ape')); ?> : </label>
            <div class="col-lg-8">
                <input class="form-control form-control-solid" type="text" value="<?= old('ape') ? old('ape') : $form->ape; ?>" name="ape" id="ape">
                <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
            </div>
        </div>
        
        <div class="form-group form-group-sm row mb-6 ">
            <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.displayTTC')); ?></label>
            <div class="col-lg-8">
                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" <?= ( $form->is_ttc == true) ? 'checked="checked"' : ''; ?> name="is_ttc" value="1"> 
                    <label class="form-check-label" for="flexCheckDefault"></label>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
    </div>

</div>

<?= form_close(); ?>