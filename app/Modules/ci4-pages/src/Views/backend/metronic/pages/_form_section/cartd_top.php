<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('<?= theme()->getMediaUrl('illustrations/sketchy-1/4.png'); ?>')">
    <!--begin::Card header-->
    <div class="card-body pb-0">
        <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
            <div class="d-flex flex-center  w-100px  w-lg-150px  me-7 mb-4">
                <!--begin::Icon-->
                <div class="symbol symbol-circle me-5">
                    <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed symbol h-80px w-80px symbol-45px symbol-circle">
                        <span class="symbol-label bg-light-primary text-primary fw-bold"><?= ucfirst($formItem->lang->name[0] ?? lang('Page.newLastname'))[0]; ?> <?= ucfirst($formItem->lang->name2[0] ?? lang('Page.newFirstname'))[0]; ?></span>
                    </div>
                </div>
                <!--end::Icon-->
            </div>

            <div class="flex-grow-1">
                <!--begin::Head-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">

                    <!--begin::Title-->
                    <div class="d-flex flex-column">
                        <h2 class="mb-1"><?= ucfirst($formItem->lang->name ?? lang('Page.newPage')); ?></h2>
                        <div class="text-muted fw-bolder">
                            <?= ucfirst($formItem->lang->description_short ?? lang('Page.newDescriptionShort')); ?>
                        </div>
                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                            <a href="<?= base_url($formItem->lang->slug ?? "#"); ?>" target="_blank" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                <?= theme()->getSVG('icons/duotune/communication/com001.svg', 'svg-icon svg-icon-4 me-1', true); ?> 
                                <span><?= $formItem->lang->slug ?? lang('Core.noContent'); ?></span>
                            </a>
                        </div>
                    </div>
                    <!--end::Title-->

                </div>
            </div>

        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0 pb-0">
        <!--begin::Navs-->
        <div class="d-flex overflow-auto h-55px">
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold flex-nowrap">
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 <?= $active; ?> <?= $active == 'general' ? 'active' : ''; ?>" href="<?= (empty($formItem->id)) ? current_url() :route_to('page.edit', $formItem->id ?? null); ?>"><?= ucfirst(lang('Core.general')); ?></a>
                </li>
                <!--end::Nav item-->
                <?php if(!empty($formItem->id)){ ?>
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary me-6 <?= $active == 'composer' ? 'active' : ''; ?>" href="<?= route_to('page.composer.index', $formItem->id ?? null); ?>"><?= ucfirst(lang('Page.composer')); ?></a>
                </li>
                <!--end::Nav item-->
                <?php } ?>
            </ul>
        </div>
        <!--begin::Navs-->
    </div>
    <!--end::Card body-->
</div>