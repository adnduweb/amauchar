<?= form_open(route_to('group.save.permissions'), ['id' => 'kt_users_permissions_form', 'class' => 'kt-form', 'novalidate' => false]); ?>
<input type="hidden" name="alias" value="<?= $alias; ?>" />
<div class="fv-row mt-20">
	<!--begin::Label-->
	<label class="fs-5 fw-bolder form-label mb-2">Role Permissions</label>
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
                
				<td class="text-gray-800"><?= esc($groupPermission->title) ?>
                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i>
                </td>
			
            </tr>
            

            <p>Select the permissions this group should have access to.</p>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 3rem"></th>
                    <th>Permission</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($permissions as $permission => $description) : ?>
                        <tr>
                            <td>
                                <label class="form-check  form-check-sm form-check-custom form-check-solid <?= ($groupPermission->can($permission)) ? 'checkbox-success' : '' ?>">
                                    <input class="permission_group form-check-input" type="checkbox" name="permissions[]" value="<?= $permission ?>" <?php if ($groupPermission->can($permission)) : ?> checked <?php endif ?> >
                                </label>
                                <span></span>
                            </td>
                            <td><?= $permission ?></td>
                            <td><?= $description ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </table>
    </div>
    <!--end::Table wrapper-->
</div>

<?= form_close(); ?>