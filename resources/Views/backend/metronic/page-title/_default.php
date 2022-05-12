<?php
   // $breadcrumb = \Adnduweb\Ci4Admin\Libraries\Init::getBreadcrumb();
   $breadcrumb = [];

    if (theme()->getOption('layout', 'page-title/direction') === 'column') {
        $baseClass = 'flex-column align-items-start me-3';
    } else {
        $baseClass = 'align-items-center me-3';
    }

    $attr = array();
    if (theme()->getOption('layout', 'toolbar/fixed/desktop') === true && theme()->getOption('layout', 'toolbar/fixed/tablet-and-mobile')== true &&  theme()->getOption('layout', 'page-title/responsive') === true) {
        $baseClass .= " flex-wrap mb-5 mb-lg-0 lh-1";
    }
?>

<!--begin::Page title-->
<div  <?= service('theme')->printHtmlAttributes('page-title'); ?> class="d-flex <?= $baseClass; ?>">
    <!--begin::Title-->
    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-4 lh-1">
    <?= isset($pageTitleDefault) ? $pageTitleDefault : ''; ?>

        <?php  if (theme()->getOption('layout', 'page/description') && theme()->getOption('layout', 'page-title/description')  === true ) { ?>
        <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
            <!--end::Separator-->

            <!--begin::Description-->
            <small class="text-muted fs-7 fw-bold my-1 ms-1">
                <?= theme()->getOption('layout', 'page/description'); ?>
            </small>
            <!--end::Description-->
        <?php } ?>
    </h1>
    <!--end::Title-->



<?php  if (theme()->getOption('layout', 'page-title/breadcrumb') === true  & isset($breadcrumbs)) { ?>
    <?php  if (theme()->getOption('layout', 'page-title/direction') === 'row') { ?>
        <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <!--end::Separator-->
    <?php } ?>

    <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
             <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
           <?php foreach($breadcrumbs as $item ){ ?>
                <!--begin::Item-->
                    <?php if ( $item['active'] === true ){ ?>
                        <li class="breadcrumb-item text-dark">
                            <a href="<?= $item['path']; ?>" class="text-muted text-hover-primary">
                                <?= ucfirst($item['title']); ?>
                            </a>
                        </li>
                   <?php }else{ ?>
                        <li class="breadcrumb-item text-muted">
                            <?php if ( ! empty($item['path']) ){ ?>
                                <a href="<?= $item['path']; ?>" class="text-muted text-hover-primary">
                                    <?= ucfirst($item['title']); ?>
                                </a>
                           <?php }else{ ?>
                            <?= ucfirst($item['title']); ?>
                            <?php } ?>
                        </li>
                    <?php } ?>
                <!--end::Item-->
                    <?php if (@next($breadcrumbs)){ ?>
                    <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                    <?php } ?>
                <?php } ?>
            </ul>
        </ul>
        <!--end::Breadcrumb-->
    <?php } ?>
</div>
<!--end::Page title-->
