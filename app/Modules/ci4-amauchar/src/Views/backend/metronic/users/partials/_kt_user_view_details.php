<div class="pb-5 fs-6">
    <!--begin::Details item-->
    <div class="fw-bolder mt-5">Account ID</div>
    <div class="text-gray-600">ID-<?= $form->uuid; ?></div>
    <!--begin::Details item-->
    <!--begin::Details item-->
    <div class="fw-bolder mt-5">Email</div>
    <div class="text-gray-600">
        <a href="mailto:<?= $form->email; ?>" class="text-gray-600 text-hover-primary"><?= $form->email; ?></a>
    </div>

    <?php //print_r($allCountry);exit; ?>
    <!--begin::Details item-->
    <!--begin::Details item-->
    <div class="fw-bolder mt-5">Address</div>
    <div class="text-gray-600"><?= (!empty($adresseDefault)) ? $adresseDefault->adresse1 .  ', <br>' : ''; ?>
    <?= (!empty($adresseDefault)) ? $adresseDefault->code_postal : ''; ?> <?= (!empty($adresseDefault)) ? $adresseDefault->ville . '<br>' : ''; ?>
    <?= !empty($adresseDefault->country) ? $allCountry[strtoupper($adresseDefault->country)]['name'] : 'nc'; ?></div>
    <!--begin::Details item-->
    <!--begin::Details item-->
    <div class="fw-bolder mt-5">Language</div>
    <div class="text-gray-600"><?= $form->lang; ?></div>
    <!--begin::Details item-->
    <!--begin::Details item-->
    <div class="fw-bolder mt-5">Last Login</div>
    <div class="text-gray-600"><?= ($form->lastLogin(true) == null) ? 'Jamais connecté' : $form->lastLogin(true)->date; ?> </div>
    <!--begin::Details item-->
</div>