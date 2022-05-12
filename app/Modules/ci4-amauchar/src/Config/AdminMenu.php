<?php

namespace Amauchar\Core\Config;

use CodeIgniter\Config\BaseConfig;

class AdminMenu extends BaseConfig
{

    public $dashboard = [

        [
            'title' => 'Core.dashboard',
            'path'  => 'dashboard',
            'icon'  => "icons/duotone/Design/PenAndRuller.svg"
        ]
    ];

    public $vertical = [
            // Main menu
           

            array(
                'name'  => 'dashboard',
                'title' => 'Core.dashboard',
                'path'  => 'dashboard',
                'icon'  => "icons/duotone/Design/PenAndRuller.svg"
            ),

             // Section
             array(
                'classes' => array('content' => 'pt-8 pb-2'),
                'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">Modules</span>',
            ),

            array(
                'name'       => 'medias',
                'title'      => 'Medias',
                'path'       => 'medias',
                'icon'  => "icons/duotone/Design/PenAndRuller.svg"
            ),

            // Section
            array(
                'classes' => array('content' => 'pt-8 pb-2'),
                'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">Systéme</span>',
            ),

         
            // System
            array(
               // 'name'       => 'account',
                'title'      => 'Account',  
                'icon'       => array(
                    'svg'  => "icons/duotune/general/gen025.svg",
                    'font' => '<i class="bi bi-layers fs-3"></i>',
                ),
                'classes'    => array('item' => 'menu-accordion'),
                'path'       => 'account',
                'attributes' => array(
                    "data-kt-menu-trigger" => "click",
                ),
                'sub'        => array(
                    'class' => 'menu-sub-accordion menu-active-bg',
                    'items' => array(
                        array(
                            'name'       => 'users',
                            'title'      => 'Users',
                            'path'       => 'users',
                            'bullet'     => '<span class="bullet bullet-dot"></span>',
                        ),

                        array(
                            'name'       => 'permissions',
                            'title'      => 'Permissions',
                            'path'       => 'permissions',
                            'bullet'     => '<span class="bullet bullet-dot"></span>',
                        ),
                        array(
                            'name'       => 'groups',
                            'title'      => 'Rôles',
                            'path'       => 'groups',
                            'bullet'     => '<span class="bullet bullet-dot"></span>',
                        ),
                    ),
                ),
            ),

            array(
                'name'       => 'settings',
                'title'      => 'Settings',
                'path'       => 'settings',
                'icon'  => "icons/duotone/Design/PenAndRuller.svg"
            ),

             // Tools
             array(
                'title'      => 'Tools',  
                'icon'       => array(
                    'svg'  => "icons/duotune/general/gen025.svg",
                    'font' => '<i class="bi bi-layers fs-3"></i>',
                ),
                'classes'    => array('item' => 'menu-accordion'),
                'path'       => 'tools',
                'attributes' => array(
                    "data-kt-menu-trigger" => "click",
                ),
                'sub'        => array(
                    'class' => 'menu-sub-accordion menu-active-bg',
                    'items' => array(
                        array(
                            'name'       => 'logs',
                            'title'      => 'Audit Log',
                            'path'       => 'logs',
                            'bullet'     => '<span class="bullet bullet-dot"></span>',
                        ),
                        array(
                            'name'       => 'informations',
                            'title'      => 'Informations',
                            'path'       => 'informations',
                            'bullet'     => '<span class="bullet bullet-dot"></span>',
                        ),
                        array(
                            'name'       => 'translates',
                            'title'      => 'Traductions',
                            'path'       => 'translates',
                            'bullet'     => '<span class="bullet bullet-dot"></span>',
                        ),
                    ),
                ),
            ),
           
            array(
                'name'       => 'modules',
                'title'      => 'Modules',
                'path'       => 'modules',
                'icon'  => "icons/duotone/Design/PenAndRuller.svg"
            ),

            // Separator
            array(
                'content' => '<div class="separator mx-1 my-4"></div>',
            ),

            // Changelog
            array(
                'name'  => 'changelog',
                'title' => 'Changelog __v__',
                'icon'  => "icons/duotone/Files/File.svg",
                'path'  => 'changelog',
            )
        ];

        public $horizontal = [

             
                // Resources
                array(
                    'name'              => 'cache',
                    'title'             => 'Cache',
                    'restrict'          => true,
                    'menu-link-classes' => 'btn btn-light-primary font-weight-bolder btn-sm',
                    'classes'           => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
                    'path'              => 'system',
                    'attributes'        => array(
                        'data-kt-menu-trigger'   => "click",
                        'data-kt-menu-placement' => "bottom-start",
                    ),
                    'sub'        => array(
                        'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                        'items' => array(

                            // Documentation
                            array(
                                'name'       => 'cache',
                                'title' => 'Cache Script ',
                                'icon'  => "icons/duotone/Home/Library.svg",
                                'path'  => 'system/cache?type=script',
                                'params' => '?type=script'
                            ),

                            // Changelog
                            array(
                                'name'   => 'cache',
                                'title'  => 'Cache Codeigniter',
                                'icon'   => "icons/duotone/files/fil001.svg",
                                'path'   => 'system/cache?type=ci4',
                                'params' => '?type=ci4'
                            ),
                        ),
                    ),
                ),

        ];
    

        public $documentation = [
            // Documentation menu
            // Getting Started
            array(
                'heading' => 'Getting Started'
            ),

            // Overview
            array(
                'title' => 'Overview',
                'path' => 'documentation/getting-started/overview'
            ),

            // Build
            array(
                'title' => 'Build',
                'path' => 'documentation/getting-started/build'
            ),

            array(
                'title' => 'Multi-demo',
                'path' => 'documentation/getting-started/multi-demo'
            ),

            // File Structure
            array(
                'title' => 'File Structure',
                'path' => 'documentation/getting-started/file-structure'
            ),

            // Customization
            array(
                'title' => 'Customization',
                'attributes' => array("data-kt-menu-trigger" => "click"),
                'classes' => array('item' => 'menu-accordion'),
                'sub' => array(
                    'class' => 'menu-sub-accordion',
                    'items' => array(
                        array(
                            'title' => 'SASS',
                            'path' => 'documentation/getting-started/customization/sass',
                            'bullet' => '<span class="bullet bullet-dot"></span>'
                        ),
                        array(
                            'title' => 'Javascript',
                            'path' => 'documentation/getting-started/customization/javascript',
                            'bullet' => '<span class="bullet bullet-dot"></span>'
                        )
                    )
                )
            ),

            // RTL
            array(
                'title' => 'RTL Version',
                'path' => 'documentation/getting-started/rtl'
            ),

            // Troubleshoot
            array(
                'title' => 'Troubleshoot',
                'path' => 'documentation/getting-started/troubleshoot'
            ),

            // Changelog
            array(
                'title' => 'Changelog <span class="badge badge-Changelog badge-light-danger bg-hover-danger text-hover-white fw-bold fs-9 px-2 ms-2">__v__</span>',
                'breadcrumb-title' => 'Changelog',
                'path' => 'documentation/getting-started/changelog'
            ),

            // References
            array(
                'title' => 'References',
                'path' => 'documentation/getting-started/references'
            ),

            // Separator
            array(
                'custom' => '<div class="h-30px"></div>'
            ),

            // HTML Theme
            array(
                'heading' => 'HTML Theme'
            ),

            array(
                'title' => 'Components',
                'path' => '//preview.keenthemes.com/metronic8/demo1/documentation/base/utilities.html'
            ),

            array(
                'title' => 'Documentation',
                'path' => '//preview.keenthemes.com/metronic8/demo1/documentation/getting-started.html'
            ),
        ];

}