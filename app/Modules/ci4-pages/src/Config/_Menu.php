<?php

namespace Amauchar\Pages\Config;

use CodeIgniter\Config\BaseConfig;

class _Menu extends BaseConfig
{

    public $vertical = [ 
             // Pages
             array(
                'title'      => 'Front',
                'icon'       => array(
                    'svg'  => "icons/duotone/Layout/Layout-4-blocks.svg",
                    'font' => '<i class="bi bi-layers fs-3"></i>',
                ),
                'classes'    => array('item' => 'menu-accordion'),
                'ancre'      => "pages",
                'attributes' => array(
                    "data-kt-menu-trigger" => "click",
                ),
                'sub'        => array(
                    'class' => 'menu-sub-accordion menu-active-bg',
                    'items' => array(
                        array(
                            'title'      => 'Liste des pages',
                            'ancre'      => "pages",
                            'path'       => 'pages',
                            'bullet'     => '<span class="bullet bullet-dot"></span>',
                        ),
                        array(
                            'title'      => 'Liste des menus',
                            'ancre'      => "menus/1",
                            'path'       => 'menus/1',
                            'bullet'     => '<span class="bullet bullet-dot"></span>',
                        )
                    ),
                ),
               
            ),

        ];

        public $position = ["vertical" => '2'];
        
        public $module = true;

        public $collection = 'module';

}