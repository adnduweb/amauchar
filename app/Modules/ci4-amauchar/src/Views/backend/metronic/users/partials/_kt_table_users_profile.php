<!--begin::Table body-->
<tbody class="fs-6 fw-bold text-gray-600">
    <tr>
        <td>Email</td>
        <td><?= $form->email; ?></td>
        <td class="text-end">
            <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_email">
                <?= service('theme')->getSVG('icons/duotune/art/art005.svg', "svg-icon svg-icon-3"); ?>
            </button>
        </td>
    </tr>
    <tr>
        <td>Password</td>
        <td>******</td>
        <td class="text-end">
            <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_password">
                <?= service('theme')->getSVG('icons/duotune/art/art005.svg', "svg-icon svg-icon-3"); ?>
            </button>
        </td>
    </tr>
    <tr>
        <td>Role</td>
        <td><?= ucfirst($form->getAuthGroupsUsers()[0]->group); ?></td>
        <td class="text-end">
            <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">
                <?= service('theme')->getSVG('icons/duotune/art/art005.svg', "svg-icon svg-icon-3"); ?>
            </button>
        </td>
    </tr>
    <tr>
        <td>Phone</td>
        <td>
            <?= (!empty($adresseDefault->phone)) ? service('theme')->getSVG('icons/duotone/Devices/Headphones.svg', "svg-icon svg-icon-1") . '<a href="tel:' .trim($adresseDefault->phone) . '">' .$adresseDefault->phone . '</a> ' : 'nc'; ?>
            <?= (!empty($adresseDefault->phone_mobile)) ? '<br/>' . service('theme')->getSVG('icons/duotone/Devices/Phone.svg', "svg-icon svg-icon-1") . '<a href="tel:' .trim($adresseDefault->phone_mobile) . '">' .$adresseDefault->phone_mobile . '</a>' : 'nc'; ?>
        </td>
        <td class="text-end">
            <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_phone">
                <?= service('theme')->getSVG('icons/duotune/art/art005.svg', "svg-icon svg-icon-3"); ?>
            </button>
        </td>
    </tr>
</tbody>
<!--end::Table body-->