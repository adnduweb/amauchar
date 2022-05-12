<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('<?= theme()->getMediaUrl('illustrations/sketchy-1/4.png'); ?>')">
    <!--begin::Card header-->
    <div class="card-header pt-10">
        <div class="d-flex align-items-center">
            <!--begin::Icon-->
            <div class="symbol symbol-circle me-5">
                <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                    <?= auth()->user()->renderAvatar(50);?>
                </div>
            </div>
            <!--end::Icon-->
            <!--begin::Title-->
            <div class="d-flex flex-column">
                <h2 class="mb-1"><?= ucfirst(lang('Core.pageSettings')); ?></h2>
                <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                    <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                        <?= theme()->getSVG('icons/duotune/communication/com006.svg', 'svg-icon svg-icon-4 me-1', true); ?> 
                        <span>Developer</span>
                    </a>
                    <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                        <?= theme()->getSVG('icons/duotune/general/gen018.svg', 'svg-icon svg-icon-4 me-1', true); ?> 
                        <span>SF, Bay Area</span>
                    </a>
                    <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                        <?= theme()->getSVG('icons/duotune/communication/com011.svg', 'svg-icon svg-icon-4 me-1', true); ?> 
                        <span>SF, Bay Area</span>
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
                    <a class="nav-link text-active-primary me-6 <?= $active == 'general' ? 'active' : ''; ?>" href="<?= route_to('settings.index'); ?>"><?= ucfirst(lang('Core.general')); ?></a>
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 <?= $active == 'user' ? 'active' : ''; ?>" href="<?= route_to('users.settings'); ?>"><?= ucfirst(lang('Core.users')); ?></a>
                </li>
                <!--end::Nav item-->
                 <!--begin::Nav item-->
                 <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 <?= $active == 'email' ? 'active' : ''; ?>" href="<?= route_to('settings.email'); ?>"><?= ucfirst(lang('Core.email')); ?></a>
                </li>
                <!--end::Nav item-->
                 <!--begin::Nav item-->
                 <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 <?= $active == 'consent' ? 'active' : ''; ?>" href="<?= route_to('settings.consent'); ?>"><?= ucfirst(lang('Core.consent')); ?></a>
                </li>
                <!--end::Nav item-->
            </ul>
        </div>
        <!--begin::Navs-->
    </div>
    <!--end::Card body-->
</div>