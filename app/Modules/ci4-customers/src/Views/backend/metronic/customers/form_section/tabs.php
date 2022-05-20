<!--begin:::Tabs-->
<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
    <!--begin:::Tab item-->
    <li class="nav-item">
        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_tabs_<?= $name; ?>_general"><?= ucfirst(lang("Core.general")); ?></a>
    </li>
    <!--end:::Tab item-->

    <!--begin:::Tab item-->
    <li class="nav-item">
        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_tabs_<?= $name; ?>_addresses"><?= ucfirst(lang("Customer.addressesList")); ?></a>
    </li>
    <!--end:::Tab item-->

     <!--begin:::Tab item-->
     <li class="nav-item">
        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_tabs_<?= $name; ?>_contacts"><?= ucfirst(lang("Customer.contactsList")); ?></a>
    </li>
    <!--end:::Tab item-->
</ul>
<!--end:::Tabs-->