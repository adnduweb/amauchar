<!--begin::Aside Menu-->
<?php
$menu2 = service('menus')->menu('sidebar');

//print_r($menu2); exit;

$menuClasses = '';
?>

<div
    class="hover-scroll-overlay-y my-5 my-lg-5"
    id="kt_aside_menu_docs_wrapper"
    data-kt-scroll="true"
    data-kt-scroll-activate="{default: false, lg: true}"
    data-kt-scroll-height="auto"
    data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
    data-kt-scroll-wrappers="#kt_aside_menu"
    data-kt-scroll-offset="0"
>
    <!--begin::Menu-->
    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 {{ $menuClasses }}" id="#kt_aside_menu" data-kt-menu="true">


    <div class="menu-item">
        <a class="menu-link" href="<?= route_to('dashboard.index'); ?>">
            <span class="menu-icon">
                <?= theme()->getSVG("icons/duotune/general/gen025.svg", "svg-icon svg-icon-2");; ?>
            </span>
            <span class="menu-title"><?= lang('Core.dashboard'); ?></span>
        </a>
    </div>
    <?php if (isset($menu2)) : ?>
        <?php foreach ($menu2->collections() as $collection) : ?>
                <?php if ($collection->isCollapsible()) : ?>
                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1"><?= $collection->title ?></span>
                        </div>
                    </div>

                    <?php endif ?>

                    <?= '' //print_r($collection->sectionItems()); ?>

                <?php foreach ($collection->items() as $item) : ?>
                

                    <?php if ($item->userCanSee()):  ?>

                        <?php if ($item->group()):  ?>
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?= $item->active ?>">
                                <span class="menu-link">
                                    <span class="menu-icon"><?= $item->icon ?></span>
                                    <span class="menu-title"><?= ucfirst(lang($item->title)) ?></span>
                                    <span class="menu-arrow"></span>
                                </span>
                            <?php if ($item->children()):  ?>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <?php foreach ($item->children() as $children) : ?>
                                    <div class="menu-item <?= $children->active ?>">
                                        <a class="menu-link <?= $children->active ?>" href="<?= $children->url ?>">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title"><?= ucfirst(lang($children->title)) ?></span>
                                        </a>
                                    </div>
                                <?php endforeach ?>
                                </div>
                                <?= '' //print_r($item->children()); exit; ?>
                                <?php endif ?>
                            </div>
                        <?php else: ?>
                            <div class="menu-item  <?= $item->active ?>">
                                <a class="menu-link" href="<?= $item->url ?>">
                                    <span class="menu-icon">
                                        <?= $item->icon ?>
                                    </span>
                                    <span class="menu-title"><?= ucfirst(lang($item->title)) ?></span>
                                </a>
                            </div>
                        <?php endif ?>



                       

                    <?php endif ?>
                <?php endforeach ?>
                <?php if ($collection->isCollapsible()) : ?>
                    </ul>
                <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>
    
    </div>
    <!--end::Menu-->
</div>
<!--end::Aside Menu-->
