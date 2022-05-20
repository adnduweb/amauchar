<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('<?= theme()->getMediaUrl('illustrations/sketchy-1/4.png'); ?>')">
    <!--begin::Card header-->
    <div class="card-header pt-10">
        <div class="d-flex align-items-center">
            <!--begin::Icon-->
            <div class="symbol symbol-circle me-5">
                <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                    <?= theme()->getSVG('duotune/abstract/abs020.svg', "svg-icon svg-icon-2x svg-icon-primary"); ?>
                </div>
            </div>
            <!--end::Icon-->
            <!--begin::Title-->
            <div class="d-flex flex-column">
                <h2 class="mb-1"><?= ucfirst(lang('Customer.gestionCustomer')); ?></h2>
                <div class="text-muted fw-bolder">
                    <?= $customerCount; ?> <?= $customerCount > 1 ? lang('Customer.customers') : singular(lang('Customer.customers')); ?></div>
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
                    <a class="nav-link text-active-primary me-6 <?= $active == 'medias' ? 'active' : ''; ?>" href="<?= route_to($name . '.index'); ?>"><?= ucfirst(lang('Core.list: %s', [lang('Customer.customers')])); ?></a>
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 <?= $active == 'settings' ? 'active' : ''; ?>" href="<?= route_to($name . '.settings'); ?>"><?= ucfirst(lang('Core.settings')); ?></a>
                </li>
                <!--end::Nav item-->
            </ul>
        </div>
        <!--begin::Navs-->
    </div>
    <!--end::Card body-->
</div>