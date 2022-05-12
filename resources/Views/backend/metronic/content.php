<!--begin::Main-->
<?php if (theme()->getOption('layout', 'main/type') === 'blank'){ ?>
    <div class="d-flex flex-column flex-root">
    <?= $slot ; ?>
    </div>
    <?php }else{?>
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
        <?php if (theme()->getOption('layout', 'aside/display') === true){ ?>
            <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\aside\_base') ?>
        <?php } ?>

        <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\header\_base') ?>

          

            <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            
                <?php if (theme()->getOption('layout', 'toolbar/display') === true){ ?>
                    <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\toolbars\_' . theme()->getOption('layout', 'toolbar/layout')) ?>
                <?php } ?>

                <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\_partials\notice') ?>

                <!--  -->

                <!--begin::Post-->
                    <div class="post fs-base d-flex flex-column-fluid" id="kt_post">
                        <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\content\_' . theme()->getOption('layout', 'content/layout')) ?>
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Content-->

                <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\_partials\footer') ?>
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <?php if (theme()->getOption('layout', 'scrolltop/display') === true){ ?>
        <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\_partials\scrolltop') ?>
    <?php } ?>
<?php } ?>
    <!--end::Main-->


