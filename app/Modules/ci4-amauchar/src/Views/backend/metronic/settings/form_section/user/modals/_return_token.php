<?php if($raw_token){ ?>


    <div class="d-flex align-items-center flex-wrap">
            <!--begin::Input-->
            <div id="kt_clipboard_4" class="me-5"><?= $raw_token; ?></div>
            <!--end::Input-->

            <!--begin::Button-->
            <button class="btn btn-active-color-primary btn-icon btn-sm btn-outline-light" data-clipboard-target="#kt_clipboard_4">
                <!--begin::Svg Icon | path: icons/duotune/general/gen054.svg-->
                <?= theme()->getSVG('icons/duotone/general/gen054.svg', "svg-icon svg-icon-2"); ?>
            </button>
            <!--end::Button-->
        </div>

        <p class="text-muted"><?= ucfirst(lang("Core.yourTokenKeep")); ?> </p>


<?php } ?>