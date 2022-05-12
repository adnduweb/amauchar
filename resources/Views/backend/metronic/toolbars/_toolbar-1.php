<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class=" <?= theme()->printHtmlClasses('toolbar-container', false); ?> d-flex flex-stack">
        <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\page-title\_default') ?>

		<!--begin::Actions-->
        <div class="d-flex align-items-center py-1">

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
