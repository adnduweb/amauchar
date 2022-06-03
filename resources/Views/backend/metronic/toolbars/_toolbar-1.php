<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class=" <?= theme()->printHtmlClasses('toolbar-container', false); ?> d-flex flex-stack">
        <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\page-title\_default') ?>

       
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-1">
        <?php if(!empty($selectLangues)){ ?>
            <button class="btn btn-sm btn-dark me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <?= ucfirst(lang('Core.selectLangues')); ?>
            </button>
            <!--begin::Menu 3-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true" style="">
            <?php foreach($supportedLocales as $lang){ ?>
                <div class="menu-item px-3">
                    <a href="<?= current_url(); ?>" data-choice-lang="<?= $lang['iso_code']; ?>" class="data-choice-lang menu-link px-3"><?= ucfirst(lang($lang['name'])); ?></a>
                </div>
            <?php } ?>
            </div>
        <?php } ?>
            

            <?php if(!empty($pageHeaderToolbarBtn)){ ?>
                <?php foreach($pageHeaderToolbarBtn as $k => $toolbar_btn){ ?>
                    <a type="button" class="btn btn-sm btn-<?= $toolbar_btn['color']; ?>  fw-bolder <?= (count($pageHeaderToolbarBtn) >1) ? 'me-4' : '' ; ?>" href="<?= $toolbar_btn['href']; ?>">
                        <?= $toolbar_btn['svg']; ?>                   
                        <?= $toolbar_btn['desc']; ?>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
        <!--end::Actions-->
 
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
