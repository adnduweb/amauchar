<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('<?= theme()->getMediaUrl('illustrations/sketchy-1/4.png'); ?>')">
    <!--begin::Card header-->
    <div class="card-header pt-10">
        <div class="d-flex align-items-center">
            <!--begin::Icon-->
            <div class="symbol symbol-circle me-5">
                <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed symbol h-80px w-80px symbol-45px symbol-circle">
                <span class="symbol-label bg-light-primary text-primary fw-bold"><?= ucfirst($formItem->lastname[0] ?? lang('Customer.newLastname'))[0]; ?> <?= ucfirst($formItem->firstname[0] ?? lang('Customer.newFirstname'))[0]; ?></span>
                </div>
            </div>
            <!--end::Icon-->
            <!--begin::Title-->
            <div class="d-flex flex-column">
                <h2 class="mb-1"><?= ucfirst($formItem->company ?? lang('Customer.newCompany')); ?></h2>
                <div class="text-muted fw-bolder">
                    <?= ucfirst($formItem->lastname ?? lang('Customer.newLastname')); ?> <?= ucfirst($formItem->firstname ?? lang('Customer.newFirstname')); ?>
                </div>
                <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                    <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                        <?= theme()->getSVG('icons/duotune/general/gen018.svg', 'svg-icon svg-icon-4 me-1', true); ?> 
                        <span><?= ucfirst($formItemAddresseDefaut->address1 ?? lang('Core.noContent')); ?></span>
                    </a>
                    <a href="mailto:<?= ucfirst($formItem->email ?? lang('Core.noContent')); ?>" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                        <?= theme()->getSVG('icons/duotune/communication/com011.svg', 'svg-icon svg-icon-4 me-1', true); ?> 
                        <span><?= ucfirst($formItem->email ?? lang('Core.noContent')); ?></span>
                    </a>
                </div>
            </div>
            <!--end::Title-->
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pb-0">
        <!--begin::Navs-->
        <div class="d-flex overflow-auto h-55px">
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold flex-nowrap">
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 <?= $active; ?> <?= $active == 'customers' ? 'active' : ''; ?>" href="<?= (empty($formItem->uuid)) ? current_url() :route_to('customer.edit', $formItem->uuid ?? null); ?>"><?= ucfirst(lang('Core.general')); ?></a>
                </li>
                <!--end::Nav item-->
                <?php if(!empty($formItem->uuid)){ ?>
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 <?= $active == 'addresses' ? 'active' : ''; ?>" href="<?= route_to('customers.address.index', $formItem->uuid ?? null); ?>"><?= ucfirst(lang('Customer.addressesList')); ?></a>
                </li>
                <!--end::Nav item-->
                 <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 <?= $active == 'contacts' ? 'active' : ''; ?>" href="<?= route_to('customers.contacts.index', $formItem->uuid ?? null); ?>"><?= ucfirst(lang('Customer.contactsList')); ?></a>
                </li>
                <!--end::Nav item-->
                 <!--begin::Nav item-->
                 <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 <?= $active == 'notes' ? 'active' : ''; ?>" href="<?= route_to('customers.notes.index', $formItem->uuid ?? null); ?>"><?= ucfirst(lang('Customer.notesList')); ?></a>
                </li>
                <!--end::Nav item-->
                <?php } ?>
            </ul>
        </div>
        <!--begin::Navs-->
    </div>
    <!--end::Card body-->
</div>