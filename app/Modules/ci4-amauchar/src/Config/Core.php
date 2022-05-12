<?php

namespace Amauchar\Core\Config;

use CodeIgniter\Config\BaseConfig;

class Core extends BaseConfig
{

    public $version= '1.7.0';
    /**
     * ////////////////////////////////////////////////////////////////////
     * Layout
     * ////////////////////////////////////////////////////////////////////
     */
    public $views = [
        'layout-auth'                   => '\Themes\backend\\'.ADMIN_THEME.'\login',
        'layout-register'               => '\Themes\backend\\'.ADMIN_THEME.'\register',
        'layout'                        => '\Themes\backend\\'.ADMIN_THEME.'\layout',
        'dashboard'                     => '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\dashboard',
        'backend'                       => ROOTPATH . 'public/backend/themes',
    ];

}