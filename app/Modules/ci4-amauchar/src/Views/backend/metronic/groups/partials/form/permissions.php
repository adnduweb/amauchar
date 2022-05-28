<?= form_open(route_to('group.save.permissions'), ['id' => 'kt_users_permissions_form', 'class' => 'kt-form', 'novalidate' => false]); ?>
<input type="hidden" name="alias" value="<?= $alias; ?>" />
<div class="fv-row mt-20">
	<!--begin::Label-->
	<label class="fs-5 fw-bolder form-label mb-2"><?= ucfirst(lang('Core.groupsAndPermissions')); ?> </label>
	<!--end::Label-->

    <!--begin::Table wrapper-->
    <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5 ckeck-list-checkbox" id="ckeck-list-checkbox">
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold">
                        
                    <tr>
                        <td>
                            <!--begin::Checkbox-->
                            <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                <input class="form-check-input" type="checkbox" value="" id="kt_select_all" />
                                <span class="form-check-label" for="kt_select_all">Select all</span>
                            </label>
                            <!--end::Checkbox-->
                        </td>
                    </tr>


                    <?php foreach ($permissions as $permission => $description) : ?>
                        <tr>
                            <td>
                                <label class="form-check  form-check-sm form-check-custom form-check-solid <?= ($groupPermission->can($permission)) ? 'checkbox-success' : '' ?>">
                                    <input class="permission_group form-check-input <?= $groupPermission->can($permission) ? 'in-group' : '' ?>" type="checkbox" name="permissions[]" value="<?= $permission ?>"
                                    <?php if ($alias == 'superadmin') : ?> checked disabled <?php endif ?> 
                                        <?php if ($groupPermission->can($permission)) : ?>
                                            checked="checked"
                                        <?php endif ?>
                                    >
                                </label>
                                <span></span>
                            </td>
                            <td><?= $permission ?></td>
                            <td><?= $description ?></td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>


</div>

<?= form_close(); ?>