
<?= form_open(route_to('users.settings.update'), ['id' => 'kt_' . strtolower($name) . '_form', 'class' => 'kt-form', 'novalidate' => false]); ?>
<input type="hidden" name="action" value="edit" />
<input type="hidden" name="controller" value="AdminSettingController" />

<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.registration')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9">

        <label class="form-check form-check-custom form-check-solid align-items-start">
            <!--begin::Input-->
            <input class="form-check-input me-3" type="checkbox" name="allowRegistration" value="1" id="allow-registration" <?php if (old('allowRegistration', setting('Auth.allowRegistration'))) : ?> checked <?php endif ?> >
            <!--end::Input-->
            <!--begin::Label-->
            <span class="form-check-label d-flex flex-column align-items-start">
                <span class="fw-bolder fs-5 mb-0"><?= ucfirst(lang('Core.AllowUsersToRegisterThemselvesOnTheSite')); ?>.</span>
                <span class="text-muted fs-6"><?= ucfirst(lang('Core.IfUncheckedAnAdminWillNeedToCreateUsers')); ?></span>
            </span>
            <!--end::Label-->
        </label>

        <div class="separator separator-dashed my-6"></div>

        <label class="form-check form-check-custom form-check-solid align-items-start">
            <!--begin::Input-->
            <input class="form-check-input me-3" type="checkbox" name="emailActivation" 
                    value='CodeIgniter\Shield\Authentication\Actions\EmailActivate' id="email-activation"
                <?php if (old('emailActivation', setting('Auth.actions')['register']) === 'CodeIgniter\Shield\Authentication\Actions\EmailActivate') : ?>
                    checked
                <?php endif ?>
            >
            <!--end::Input-->
            <!--begin::Label-->
            <span class="form-check-label d-flex flex-column align-items-start">
                <span class="fw-bolder fs-5 mb-0"><?= ucfirst(lang('Core.ForceEmailVerificationAfterRegistration')); ?></span>
                <span class="text-muted fs-6"><?= ucfirst(lang('Core.IfCheckedWillSendACodeViaEmailForThemToConfirm')); ?></span>
            </span>
            <!--end::Label-->
        </label>

        <div class="separator separator-dashed my-6"></div>


        <?php if (isset($groups) && count($groups)) : ?>
        <!-- Default Group -->
        <div class="table-responsive">
            <table class="table table-row-dashed border-gray-300 align-middle gy-6">
                <tbody class="fs-6 fw-bold">
                    <tr>
                        <td class="min-w-250px fs-4 fw-bolder"><?= ucfirst(lang('Core.defaultUserGroup')); ?>:</td>
                        <td class="w-125px"></td>
                    </tr>

                <?php foreach ($groups as $group => $info) : ?>
                <tr class="">
                    <td class="form-check-label" for="defaultGroup"> <?= esc($info['title']) ?></td>
                    <td><input class="form-check-input" type="radio" name="defaultGroup"
                            value="<?= $group ?>"
                            <?php if ($group === $defaultGroup) : ?> checked <?php endif ?>>
                    </td>
                    
                </tr>
                <?php endforeach ?>

            </table>
            <div class="col px-5 py-4">
                <p class="form-text text-muted small"><?= ucfirst(lang('Core.TheUserGgroupNewlyRegisteredUsersAreMembersOf')); ?></p>
            </div>
        </div>
        <?php endif ?>

        <?php if (!empty($form->id)) { ?> <?= form_hidden('_id', $form->_id); ?> <?php } ?>


        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
    </div>

</div>

<div class="card mb-5 mb-xl-10"  x-data="{remember: <?= old('allowRemember', setting('Auth.sessionConfig')['allowRemembering']) ? 1 : 0 ?>}">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.login')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9">


        <label class="form-check form-check-custom form-check-solid align-items-start">
            <!--begin::Input-->
            <input class="form-check-input me-3" type="checkbox" name="allowRemember" value="1" id="allow-remember" <?php if (old('allowRemember', setting('Auth.sessionConfig'))) : ?> checked <?php endif ?> >
            <!--end::Input-->
            <!--begin::Label-->
            <span class="form-check-label d-flex flex-column align-items-start">
                <span class="fw-bolder fs-5 mb-0"><?= ucfirst(lang('Core.AllowUsersToBeRemembered')); ?></span>
                <span class="text-muted fs-6"><?= ucfirst(lang('Core.ThisMakesItSoUsersDoNotHaveToLoginEveryVisit')); ?></span>
            </span>
            <!--end::Label-->
        </label>

        <div class="separator separator-dashed my-6"></div>

        <div class="form-group form-group-sm row mb-6" x-show="remember">
            <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.rememberUsersForHowLong')); ?></label>
            <div class="col-lg-8">
                <select data-kt-select2="true" name="rememberLength" class="form-select form-control form-control-solid">
                    <option value="0"><?= ucfirst(lang('Core.HowLongToRemember')); ?></option>
                    <?php if (isset($rememberOptions) && count($rememberOptions)) : ?>
                        <?php foreach ($rememberOptions as $title => $seconds) : ?>
                            <option value="<?= $seconds ?>"
                                <?php if (old('rememberLength', setting('Auth.sessionConfig')['rememberLength']) === (string) $seconds) : ?> selected <?php endif?>
                            >
                                <?= lang('Core.' . $title); ?>
                            </option>
                        <?php endforeach ?>
                    <?php endif ?>
                </select>
            </div>
        </div>

        <div class="separator separator-dashed my-6"></div>

        <label class="form-check form-check-custom form-check-solid align-items-start">
            <!--begin::Input-->
            <input class="form-check-input me-3" type="checkbox" name="email2FA"
                    value="CodeIgniter\Shield\Authentication\Actions\Email2FA" id="email-2fa"
                <?php if (old('email2FA', setting('Auth.actions')['login']) === 'CodeIgniter\Shield\Authentication\Actions\Email2FA') : ?>
                    checked
                <?php endif ?>
            >
            <!--end::Input-->
            <!--begin::Label-->
            <span class="form-check-label d-flex flex-column align-items-start">
                <span class="fw-bolder fs-5 mb-0"><?= ucfirst(lang('Core.force2FACheckAfterLogin')); ?></span>
                <span class="text-muted fs-6"><?= ucfirst(lang('Core.IfCheckedWillSendACodeViaEmailForThemToConfirm')); ?></span>
            </span>
            <!--end::Label-->
        </label>

        <div class="separator separator-dashed my-6"></div>

        <label class="form-check form-check-custom form-check-solid align-items-start">
            <!--begin::Input-->
            <input class="form-check-input me-3" type="checkbox" name="allowMagicLinkLogin" <?php if (old('allowMagicLinkLogin', setting('Auth.allowMagicLinkLogin'))) : ?> checked <?php endif ?>>
            <!--end::Input-->
            <!--begin::Label-->
            <span class="form-check-label d-flex flex-column align-items-start">
                <span class="fw-bolder fs-5 mb-0"><?= ucfirst(lang('Core.allowMagicLinkLogin')); ?></span>
                <span class="text-muted fs-6"><?= ucfirst(lang('Core.IfCheckedWillSendACodeViaEmailForThemToConfirm')); ?></span>
            </span>
            <!--end::Label-->
        </label>

        <div class=" my-6"></div>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
    </div>

</div>


<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.Passwords')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9">


    <div class="form-group form-group-sm row mb-6" x-show="remember">
            <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.minimumPasswordLength')); ?></label>
            <div class="col-lg-8">
                <input type="number" name="minimumPasswordLength" class="form-control form-control-solid" min="8" step="1"
                        value="<?= old('minimumPasswordLength', setting('Auth.minimumPasswordLength')) ?>">
                <?php if (has_error('minimumPasswordLength')) : ?>
                    <p class="text-danger"><?= error('minimumPasswordLength') ?></p>
                <?php endif ?>
                <p class="form-text text-muted small mt-5"><?= ucfirst(lang('Core.AMinimumValueOf8IsSuggested10IsRecommended')); ?></p>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table table-row-dashed border-gray-300 align-middle gy-6">
                <tbody class="fs-6 fw-bold">
                    <tr>
                        <td class="min-w-250px fs-4 fw-bolder">
                            <?= ucfirst(lang('Core.passwordValidators')); ?>
                            <p class="text-muted"><?= ucfirst(lang('Core.theseRulesDetermineHowSecureAPasswordMustBe')); ?></p>
                        </td>
                        <td class="w-125px"></td>
                    </tr>
                    <tr class="">
                        <td> <label class="form-check-label"> Composition Validator </label> </td>
                        <td> <input class="form-check-input" type="checkbox" name="validators[]"
                                   value="CodeIgniter\Shield\Authentication\Passwords\CompositionValidator"
                                <?php if (in_array(
                                    'CodeIgniter\Shield\Authentication\Passwords\CompositionValidator',
                                    old('validators', setting('Auth.passwordValidators') ?? []),
                                    true
                                )) : ?>
                                    checked
                                <?php endif ?>
                            >
                        </td>
                    </tr>

                    <tr class="">
                        <td> <label class="form-check-label"> Nothing Personal Validator </label> </td>
                        <td> <input class="form-check-input" type="checkbox" name="validators[]"
                        value="CodeIgniter\Shield\Authentication\Passwords\NothingPersonalValidator"
                                <?php if (in_array(
                                        'CodeIgniter\Shield\Authentication\Passwords\NothingPersonalValidator',
                                        old('validators', setting('Auth.passwordValidators') ?? []),
                                        true
                                    )) : ?>
                                    checked
                                <?php endif ?>
                            >
                        </td>
                    </tr>

                    <tr class="">
                        <td> <label class="form-check-label"> Dictionary Validator </label> </td>
                        <td> <input class="form-check-input" type="checkbox" name="validators[]"
                        value="CodeIgniter\Shield\Authentication\Passwords\DictionaryValidator"
                                <?php if (in_array(
                                        'CodeIgniter\Shield\Authentication\Passwords\DictionaryValidator',
                                        old('validators', setting('Auth.passwordValidators') ?? []),
                                        true
                                    )) : ?> 
                                    checked
                                <?php endif ?>
                            >
                        </td>
                    </tr>

                    <tr class="">
                        <td> <label class="form-check-label"> Pwned Validator </label> </td>
                        <td> <input class="form-check-input" type="checkbox" name="validators[]"
                        value="CodeIgniter\Shield\Authentication\Passwords\PwnedValidator"
                                <?php if (in_array(
                                        'CodeIgniter\Shield\Authentication\Passwords\PwnedValidator',
                                        old('validators', setting('Auth.passwordValidators') ?? []),
                                        true
                                    )) : ?>
                                    checked
                                <?php endif ?>
                            >
                        </td>
                    </tr>

                </tbody>
            </table>
            <p class="form-text text-muted small mt-4"><?= ucfirst(lang('Core.NoteUncheckingTheseWillReduce')); ?></p>
        </div>

        <div class="col-6 px-4">
            <ul class="form-text text-muted small">
                <?= lang('Core.compositionValidatorPrimarilyText'); ?>
            </ul>
        </div>




                <!-- <div class="row">


                        <p class="form-text text-muted small mt-4">Note: Unchecking these will reduce the password security requirements.</p>
                    </div>
                    <div class="col-6 px-4">
                        <ul class="form-text text-muted small">
                            <li>Composition Validator primarily checks the password length requirements.</li>
                            <li>Nothing Personal Validator checks the password for similarities between the password,
                                the email, username, and other personal fields to ensure they are not too similar and easy to guess.</li>
                            <li>Dictionary Validator checks the password against nearly 600,000 leaked passwords.</li>
                            <li>Pwned Validator uses a <a href="https://haveibeenpwned.com/Passwords" target="_blank">third-party site</a>
                                to check the password against millions of leaked passwords.</li>
                            <li>NOTE: You only need to select only one of Dictionary and Pwned Validators.</li>
                        </ul>
                    </div>
                </div> -->
          

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
    </div>

</div>



<div class="card mb-5 mb-xl-10"  x-data="{remember: <?= old('allowRemember', setting('Auth.sessionConfig')['allowRemembering']) ? 1 : 0 ?>}">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.avatars')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>

    <div class="card-body border-top p-9"  x-data="{useGravatar: <?= old('useGravatar', setting('Users.useGravatar')) ? true : false ?>}">


        <div class="form-group form-group-sm row mb-6" x-show="remember">
            <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.displayInitialsBasedOn')); ?></label>
            <div class="col-lg-8">
                <select data-kt-select2="true" name="avatarNameBasis" class="form-select form-control form-control-solid">
                    <option value="name" <?= old('avatarNameBasis', setting('Users.avatarNameBasis')) === 'name' ? 'selected' : '' ?>>Full Name</option>
                    <option value="username" <?= old('avatarNameBasis', setting('Users.avatarNameBasis')) === 'username' ? 'selected' : '' ?>>Username</option>
                </select>
                <p class="form-text text-muted small"><?= ucfirst(lang('Core.willUseEitherTheUserFullName')); ?></p>
            </div>

        </div>

        <div class="separator separator-dashed my-6"></div>

        <label class="form-check form-check-custom form-check-solid align-items-start">
            <!--begin::Input-->
            <input class="form-check-input me-3" type="checkbox" name="useGravatar"
                            value="1" id="use-gravatar"
                            @change="useGravatar = ! useGravatar"
                        <?php if (old('useGravatar', setting('Users.useGravatar'))) : ?> checked <?php endif ?>
                    >
            <!--end::Input-->
            <!--begin::Label-->
            <span class="form-check-label d-flex flex-column align-items-start">
                <span class="fw-bolder fs-5 mb-0"><?= ucfirst(lang('Core.useGravatar')); ?></span>
                <span class="text-muted fs-6"><?= ucfirst(lang('Core.willUseGravatarToProvidePortableUseAvatars', ['//' . service('request')->getLocale() . '.gravatar.com'])); ?></span>
            </span>
            <!--end::Label-->
        </label>

        <div class="separator separator-dashed my-6"></div>

        <div class="form-group form-group-sm row mb-6" x-show="useGravatar">
            <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.gravatarDefaultStyle')); ?></label>
            <div class="col-lg-8">
                <select data-kt-select2="true" name="gravatarDefault" class="form-select form-control form-control-solid">
                    <option value="">Select default style....</option>
                    <option value="mp" <?= old('gravatarDefault', setting('Users.gravatarDefault')) === 'mp' ? 'selected' : '' ?>>mystery person</option>
                    <option value="identicon" <?= old('gravatarDefault', setting('Users.gravatarDefault')) === 'identicon' ? 'selected' : '' ?>>identicon</option>
                    <option value="monsterid"  <?= old('gravatarDefault', setting('Users.gravatarDefault')) === 'monsterid' ? 'selected' : '' ?>>monsterid</option>
                    <option value="wavatar" <?= old('gravatarDefault', setting('Users.gravatarDefault')) === 'wavatar' ? 'selected' : '' ?>>wavatar</option>
                    <option value="retro" <?= old('gravatarDefault', setting('Users.gravatarDefault')) === 'retro' ? 'selected' : '' ?>>retro</option>
                    <option value="robohash" <?= old('gravatarDefault', setting('Users.gravatarDefault')) === 'robohash' ? 'selected' : '' ?>>robohash</option>
                    <option value="blank" <?= old('gravatarDefault', setting('Users.gravatarDefault')) === 'blank' ? 'selected' : '' ?>>blank</option>
                </select>
                <p class="form-text text-muted small"><?= ucfirst(lang('Core.VisitGravatarForImageExample', ['//' . service('request')->getLocale() . '.gravatar.com/site/implement/images/'])); ?></p>
            </div>
        </div>

        <?php if (!empty($form->id)) { ?> <?= form_hidden('_id', $form->_id); ?> <?php } ?>


        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
    </div>

</div>


<div class="card mb-5 mb-xl-10"  x-data="{remember: <?= old('allowRemember', setting('Auth.sessionConfig')['allowRemembering']) ? 1 : 0 ?>}">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0"><?= ucfirst(lang('Core.compteSociaux')); ?></h3>
        </div>
        <!--end::Card title-->
    </div>
    <div class="card-body border-top p-9">

        <div  x-data="{ show: <?= (service('settings')->get('App.activeGoogle') == true) ? 'true' : 'false'; ?> }" >
            <div class="form-group form-group-sm row mb-6 ">
                <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.activeGoogle')); ?></label>
                <div class="col-lg-8">
                    <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                        <input @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }" class="form-check-input" type="checkbox" <?= ( service('settings')->get('App.activeGoogle') == true) ? 'checked="checked"' : ''; ?> name="activeGoogle" value="1"> 
                        <label class="form-check-label" for="flexCheckDefault"></label>
                    </div>
                </div>
            </div>

            <div  x-show="show" style="display:none" class="row mb-6">
                <label for="gclientID" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.gclientID')); ?>* : </label>
                <div class="col-lg-8">
                    <input class="form-control form-control-solid" required type="text" value="<?= old('gclientID') ? old('gclientID') : service('settings')->get('App.gclientID'); ?>" name="gclientID" id="gclientID">
                    <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
                </div>
            </div>

            <div  x-show="show" style="display:none" class="row mb-6">
                <label for="gclientID" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.gsecretID')); ?>* : </label>
                <div class="col-lg-8">
                    <input class="form-control form-control-solid" required type="text" value="<?= old('gsecretID') ? old('gsecretID') : service('settings')->get('App.gsecretID'); ?>" name="gsecretID" id="gsecretID">
                    <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
                </div>
            </div>
        </div>

        <div  x-data="{ show: <?= (service('settings')->get('App.activeFacebook') == true) ? 'true' : 'false'; ?> }" >
            <div class="form-group form-group-sm row mb-6 ">
                <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.activeFacebook')); ?></label>
                <div class="col-lg-8">
                    <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                        <input @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }" class="form-check-input" type="checkbox" <?= ( service('settings')->get('App.activeFacebook') == true) ? 'checked="checked"' : ''; ?> name="activeFacebook" value="1"> 
                        <label class="form-check-label" for="flexCheckDefault"></label>
                    </div>
                </div>
            </div>

            <div  x-show="show" style="display:none" class="row mb-6">
                <label for="gclientID" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.fclientID')); ?>* : </label>
                <div class="col-lg-8">
                    <input class="form-control form-control-solid" required type="text" value="<?= old('fclientID') ? old('fclientID') : service('settings')->get('App.fclientID'); ?>" name="fclientID" id="fclientID">
                    <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
                </div>
            </div>

            <div  x-show="show" style="display:none" class="row mb-6">
                <label for="gclientID" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.fsecretID')); ?>* : </label>
                <div class="col-lg-8">
                    <input class="form-control form-control-solid" required type="text" value="<?= old('fsecretID') ? old('fsecretID') : service('settings')->get('App.fsecretID'); ?>" name="fsecretID" id="fsecretID">
                    <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
                </div>
            </div>
        </div>

        <div  x-data="{ show: <?= (service('settings')->get('App.activeApple') == true) ? 'true' : 'false'; ?> }" >
            <div class="form-group form-group-sm row mb-6 ">
                <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.activeApple')); ?></label>
                <div class="col-lg-8">
                    <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                        <input @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }" class="form-check-input" type="checkbox" <?= ( service('settings')->get('App.activeApple') == true) ? 'checked="checked"' : ''; ?> name="activeApple" value="1"> 
                        <label class="form-check-label" for="flexCheckDefault"></label>
                    </div>
                </div>
            </div>

            <div  x-show="show" style="display:none" class="row mb-6">
                <label for="gclientID" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.aclientID')); ?>* : </label>
                <div class="col-lg-8">
                    <input class="form-control form-control-solid" required type="text" value="<?= old('aclientID') ? old('aclientID') : service('settings')->get('App.aclientID'); ?>" name="aclientID" id="aclientID">
                    <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
                </div>
            </div>

            <div  x-show="show" style="display:none" class="row mb-6">
                <label for="gclientID" class="col-lg-4 col-form-label required fw-bold fs-6"><?= ucfirst(lang('Core.asecretID')); ?>* : </label>
                <div class="col-lg-8">
                    <input class="form-control form-control-solid" required type="text" value="<?= old('asecretID') ? old('asecretID') : service('settings')->get('App.asecretID'); ?>" name="asecretID" id="asecretID">
                    <div class="invalid-feedback"><?= lang('Core.this_field_is_requis'); ?> </div>
                </div>
            </div>
        </div>
        <?php if (!empty($form->id)) { ?> <?= form_hidden('_id', $form->_id); ?> <?php } ?>


        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <x-form-action-footer type="<?= strtolower($name); ?>"></x-form-action-footer>
        </div>
    </div>

</div>

<?= form_close(); ?>