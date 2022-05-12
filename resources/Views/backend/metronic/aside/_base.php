<?php $logoFileName = 'logo-ADN.svg'; ?>
 <?php  if (theme()->getOption('layout', 'aside/theme') == 'light'){ ?>
     <?php $logoFileName = 'logo-1-dark.svg'; ?>
 <?php } ?>
 
 <!--begin::Aside-->
 <div
     id="kt_aside"
     class="aside <?= service('theme')->printHtmlClasses('aside', false); ?>"
     data-kt-drawer="true"
     data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}"
     data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'200px', '300px': '250px'}"
     data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle"
 >
 
    <!--begin::Brand-->
     <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
         <a href="<?= route_to('dashboard.index'); ?> ">
             <img alt="Logo" src="<?= theme()->getMediaUrl('logos/' . $logoFileName); ?>" class="h-35px logo"/>
         </a>
        <!--end::Logo-->
         <?php  if (theme()->getOption('layout', 'aside/minimize') == true){ ?>
            <!--begin::Aside toggler-->
             <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                  data-kt-toggle="true"
                  data-kt-toggle-state="active"
                  data-kt-toggle-target="body"
                  data-kt-toggle-name="aside-minimize" 
                  data-kt-url="<?= route_to('settings.update.user') ; ?>?asideToogle=true" 
             >
 
                 <?= theme()->getSVG("icons/duotune/arrows/arr080.svg", "svg-icon-1 rotate-180"); ?>
             </div>
            <!--end::Aside toggler-->
            <?php } ?>
     </div>
    <!--end::Brand-->
 
    <!--begin::Aside menu-->
     <div class="aside-menu flex-column-fluid">
         <?=  $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\aside\_menu'); ?>
     </div>
    <!--end::Aside menu-->
 
    <!--begin::Footer-->
     <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
         <?=  $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\aside\_account'); ?>
     </div>
    <!--end::Footer-->
 </div>
 <!--end::Aside-->
 