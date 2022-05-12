<?php
    $toolbarButtonMarginClass = "ms-1 ms-lg-3";
    $toolbarButtonHeightClass = "w-40px h-40px";
    $toolbarUserAvatarHeightClass = "symbol-40px";
    $toolbarButtonIconSizeClass = "svg-icon-1";
?>

<!--begin::Toolbar wrapper-->
<div class="d-flex align-items-stretch flex-shrink-0">
    <?php if (class_exists('\Adnduweb\Ci4Pages\Controllers\Admin\PagesController')) { ?>
        <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\topbar\partials\_front'); ?>
    <?php } ?>

    <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\topbar\partials\_theme_mode'); ?>


    <!--begin::User-->
    <?php if( auth()->loggedIn() ){ ?>

        <div class="d-flex align-items-center <?= $toolbarButtonMarginClass; ?>" id="kt_header_user_menu_toggle">
            <!--begin::Menu-->
            <div class="cursor-pointer symbol <?= $toolbarUserAvatarHeightClass; ?>" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
            <?= auth()->user()->renderAvatar(50);?>
            </div>
            <?= $this->include('\Themes\backend\/'.service('settings')->get('App.themebo').'/\topbar\partials\_user-menu'); ?>
            <!--end::Menu-->
        </div>
    <?php } ?>
    <!--end::User -->

</div>
<!--end::Toolbar wrapper-->
