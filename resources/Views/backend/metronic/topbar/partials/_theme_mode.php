<div class="d-flex align-items-center ms-1 ms-lg-3">
    <!--begin::Menu toggle-->
    <a href="<?= current_url(); ?>" data-darkModeCurrent="true"  class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px darkModeCurrent" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom" data-bs-toggle="tooltip" title="" data-bs-original-title="<?= ucfirst(lang("Core.darkMode")); ?>" aria-label="<?= ucfirst(lang("Core.darkMode")); ?>">
        <i class="la la-sun fs-2  <?= service('settings')->get('App.modeDark', 'user:' . user_id()) != 0 ? 'd-none' : '' ; ?>"></i>
        <i class="la la-moon fs-2 <?= service('settings')->get('App.modeDark', 'user:' . user_id()) != 1 ? 'd-none' : '' ; ?>"></i>
    </a>
    <!--begin::Menu toggle-->
    <!--begin::Menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-muted menu-active-bg menu-state-primary fw-bold py-4 fs-6 w-200px" data-kt-menu="true" style="">
        <!--begin::Menu item-->
        <div class="menu-item px-3 my-1">
            <a href="<?= base_url(route_to('settings.update.user')) ; ?>?darkModeEnabled=true" data-darkModeEnabled="change" data-kt-url="<?= base_url(route_to('settings.update.darkmodeenabled')) ; ?>" data-current="light" class="menu-link px-3 darkModeEnabled <?= service('settings')->get('App.modeDark', 'user:' . user_id()) == 0 ? 'active' : '' ; ?>">
                <span class="menu-icon">
                    <i class="la la-sun fs-2"></i>
                </span>
                <span class="menu-title">Light</span>
            </a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-3 my-1">
            <a href="<?= base_url(route_to('settings.update.user')) ; ?>?darkModeEnabled=false" data-darkModeEnabled="change" data-kt-url="<?= base_url(route_to('settings.update.darkmodeenabled')) ; ?>" data-current="dark" class="menu-link px-3 darkModeEnabled <?= service('settings')->get('App.modeDark', 'user:' . user_id()) == 1 ? 'active' : '' ; ?>">
                <span class="menu-icon">
                    <i class="la la-moon fs-2"></i>
                </span>
                <span class="menu-title">Dark</span>
            </a>
        </div>
        <!--end::Menu item-->
    </div>
    <!--end::Menu-->
</div>