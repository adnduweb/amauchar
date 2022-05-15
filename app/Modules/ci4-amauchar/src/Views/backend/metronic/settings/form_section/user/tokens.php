<?php if($tokens){ ?>

<div class="table-responsive">
    <!--begin::Table-->
    <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9 table-p-0" id="kt_api_keys_table">
        <!--begin::Thead-->
        <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
            <tr>
                <th class="w-250px min-w-175px ps-9">Label</th>
                <th class="min-w-125px min-w-125px">Created</th>
                <th class="min-w-125px">Expired</th>
                <th class="w-100px"></th>
            </tr>
        </thead>
        <!--end::Thead-->
        <!--begin::Tbody-->
        <tbody class="fs-6 fw-bold text-gray-600">

        <?php foreach($tokens as $token){ ?>
            <tr class="p-0">
                <td class="ps-9"><?= $token->name; ?></td>
                <td><?= $token->created_at ?></td>
                <td>
                    <span class="badge badge-light-success fs-7 fw-bold"><?= $token->expires ?? \CodeIgniter\I18n\Time::parse($token->created_at)->addSeconds(config('Auth')->unusedTokenLifetime); ?></span>
                </td>
                <td class="pe-9">
                    <a href="javascript:;" data-action="delete-key" class="btn btn-sm btn-danger "><?= ucfirst(lang('Core.delete')); ?></a>
                </td>
            <?php ''// echo '<pre>'; print_r($token); echo '</pre>'; ?>
            </tr>
        <?php } ?>
        </tbody>
        <!--end::Tbody-->
    </table>
    <!--end::Table-->
</div>
<!--end::Table wrapper-->
<?php } ?>