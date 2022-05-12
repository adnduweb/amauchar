<!--begin:::Tab pane-->
<div class="tab-pane fade" id="kt_user_view_overview_permissions_tab" role="tabpanel">
   <!--begin::Permissions-->
    <!--begin::Card-->
    <div class="card pt-4 mb-6 mb-xl-9">
        <!--begin::Card header-->
        <div class="card-header border-0">
            <!--begin::Card title-->
            <div class="card-title">Role Permissions</div>
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-body">
            <!--end::Label-->

            <?= form_open('', ['id' => 'kt_users_permissions_form', 'class' => 'kt-form form', 'novalidate' => false]); ?>
            <input type="hidden" name="action" value="edit_user_persmissions" />
            <input type="hidden" name="uuid" value="<?= $form->uuid; ?>" />

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
                                <label class="form-check  form-check-sm form-check-custom form-check-solid <?= ($form->hasPermission($permission)) ? 'checkbox-success' : '' ?>">
                                    <input class="permission_group form-check-input <?= $form->can($permission) ? 'in-group' : '' ?>" type="checkbox" name="permissions[]" value="<?= $permission ?>"
                                        <?php if ($form->hasPermission($permission)) : ?>
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

         <!--begin::Action buttons-->
         <div class="d-flex justify-content-end align-items-center mt-12">
            <x-modal-action-footer type="<?= $controller; ?>" submitaction="permissions" dismiss="false" ></x-modal-action-footer>
        </div>
            <!--begin::Action buttons-->
        <?= form_close(); ?>
	</div>
	<!--end::Table wrapper-->
</div>
<!--end::Permissions-->
</div>
<!--end:::Tab pane-->

<?= $this->section('pageAdminScripts') ?>

<script type="text/javascript">

"use strict";

// let inputs = document.getElementsByClassName('in-group');
//     Array.prototype.forEach.call(inputs, function(el, i){
//         el.indeterminate = true;
//     });

// Class definition
var KTUPermissionsUsersUpdate = function () {

    const element = document.getElementById('kt_user_view_overview_permissions_tab');
    const check = element.querySelector('#ckeck-list-checkbox');
    const form = element.querySelector('#kt_users_permissions_form');
    const inputCheck = element.querySelectorAll('.form-check input.permission_group');

    // Init add schedule modal
    var initPermissionsUserUpdateOnly = () => {

        inputCheck.forEach(d => {

            d.addEventListener('click', function (e) {

                if ($(this).is(':checked')) {
                    var $action = 'add';
                } else {
                    var $action = 'delete';
                }
                var $val = $(this).val();

                const formData = new FormData(form);
                formData.append('crud', $action); 

                // const packets = {
                //     value:  $val,
                //     crud: $action,
                //     form: $('#kt_users_permissions_form').serialize()
                // };


                axios.post("<?= route_to('users.update') ?>", formData)
                .then( response => {
                    toastr.success(response.data.messages.success, _LANG_.updated + "!"); // Notif
                })
                .catch(error => { }); 
            });

        });
    }

return {
        // Public functions
        init: function () {
            initPermissionsUserUpdateOnly();
        }
    };

}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUPermissionsUsersUpdate.init();
});

</script>

<?= $this->endSection() ?>
