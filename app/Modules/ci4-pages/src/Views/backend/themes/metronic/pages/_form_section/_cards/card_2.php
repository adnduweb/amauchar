<!--begin::Connected Accounts-->
<div class="card mb-5 mb-xl-8 card_2">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <div class="card-title">
            <h3 class="fw-bolder m-0">Actions</h3>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-2">
        <!--begin::Items-->
        <div class="py-2">
            <!--begin::Item-->

            <div class="fv-row mb-7">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <label class="fs-6 fw-bold mb-2" ><?= ucfirst(lang('Core.active')); ?></label>
                    </div>
                
                    <div class="d-flex justify-content-end">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px" type="checkbox"  name="active" <?= ($form->getActive() == 1) ? 'checked' : '' ?> value="1">
                            <label class="form-check-label" for="flexCheckDefault"></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-dashed my-5"></div>
            <div class="fv-row mb-7">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column">
                        <label class="fs-6 fw-bold mb-2" ><?= ucfirst(lang('Pages.displayTitle')); ?></label>
                    </div>
                
                    <div class="d-flex justify-content-end">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input w-30px h-20px" type="checkbox"  name="display_title" <?= ($form->getDisplayTitle() == 1) ? 'checked' : '' ?> value="1">
                            <label class="form-check-label" for="flexCheckDefault"></label>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="separator separator-dashed my-5"></div>
            <div class="fv-row mb-7">
                <label for="id_group" class="fs-6 fw-bold mb-2" ><?= ucfirst(lang('Pages.template')); ?>* : </label>
                <select required name="template" class="form-select form-select-solid" data-kt-select2="true" data-placeholder="<?= ucfirst(lang('Core.choose_one_of_the_following')); ?>" data-hide-search="true">
                    <option value=""><?= lang("Core.sectionner votre élément"); ?></option>
                    <option <?= 'page_default' == $form->getTemplate() ? 'selected' : ''; ?> value="page_default"><?= lang("Pages.pageParDefaut"); ?></option>
                    <option <?= 'page_100_per_cent' == $form->getTemplate() ? 'selected' : ''; ?> value="page_100_per_cent"><?= lang("Pages.pageWidth"); ?></option>
                    <option <?= 'page_contact' == $form->getTemplate() ? 'selected' : ''; ?> value="page_contact"><?= lang("Pages.pageContact"); ?></option>
                </select>
            </div>

            <div class="separator separator-dashed my-5"></div>
            <div class="fv-row mb-7">
                <label for="id_group" class="fs-6 fw-bold mb-2" ><?= ucfirst(lang('Pages.changeLangues')); ?>* : </label>
                <select required name="lang" class="form-select form-select-solid" data-kt-select2="true" data-placeholder="<?= ucfirst(lang('Core.choose_one_of_the_following')); ?>" data-hide-search="true">
                   <?php foreach($supportedLocales as $lang){ ?>
                        <option value="<?= $lang['iso_code']; ?>"><?= ucfirst(lang($lang['name'])); ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <!--end::Items-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Connected Accounts-->