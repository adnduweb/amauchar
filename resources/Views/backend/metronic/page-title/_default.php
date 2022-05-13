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



<?php  if (theme()->getOption('layout', 'page-title/breadcrumb') === true ) { ?>
    <?php  if (theme()->getOption('layout', 'page-title/direction') === 'row') { ?>
        <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <!--end::Separator-->
    <?php } ?>

    <!--begin::Breadcrumb--> 
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
             <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <li class="breadcrumb-item text-muted">
                <a href="<?= route_to('dashboard.index'); ?>">
                    <?= ucfirst(lang('Core.home')); ?>     
                </a>     
            </li>
           
        <?php $menu2 = service('menus')->menu('sidebar'); $uri = service('uri')->getSegments(); ?>
            <?php foreach ($menu2->collections() as $collection) : ?>
            
                <?php if ($collection->isCollapsible()) : ?>
                    <?php if(in_array($collection->title, $uri)): ?>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <?= ucfirst($collection->title); ?>          
                        </li>
                    <?php endif ?>
                <?php endif ?>
                

                <?php foreach ($collection->items() as $item) : ?>
                    <?php if ($item->userCanSee()):  ?>

                        <?php if ($item->group()):  ?>
                     
                            <?php if(in_array(lang($item->title), $uri)): ?>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                                </li>
                                <li class="breadcrumb-item text-muted">
                                    <?= ucfirst(lang($item->title)); ?>          
                                </li>
                               
                            <?php endif ?>

                            <?php if ($item->children()):  ?>
                                <?php foreach ($item->children() as $children) : ?>
                                    <?php if(in_array(lang($children->title), $uri)): ?>
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                                        </li>
                                        <li class="breadcrumb-item text-muted">
                                            <?= ucfirst(lang($children->title)); ?>          
                                        </li>
                                    <?php endif ?>
                                <?php endforeach ?>
                            <?php endif ?>
                        <?php else: ?>
                            <?php if(in_array(lang($item->title), $uri)): ?>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                                </li>
                                <li class="breadcrumb-item text-muted">
                                    <?= ucfirst(lang($item->title)); ?>          
                                </li>
                            <?php endif ?>
                        <?php endif ?>

                    <?php endif ?>
                <?php endforeach ?>


            <?php endforeach ?>

            <?php if(isset($formItem)){  ?>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">
                    <?= ucfirst(lang($formItem->getName())); ?>          
                </li>
            <?php } ?>
        
        </ul>
        <!--end::Breadcrumb-->
    <?php } ?>
</div>
<!--end::Page title-->
