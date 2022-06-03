<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Amauchar\Core;

use Amauchar\Core\Libraries\BootstrapDemo1;

/**
 * Class Bonfire
 *
 * Provides basic utility functions used throughout the
 * lifecycle of a request in the admin area.
 */
class Amauchar
{
    /**
     * Holds cached instances of all Module classes
     *
     * @var array
     */
    private $moduleConfigs = [];

    /**
     * Are we currently in the admin area?
     *
     * @var bool
     */
    public $inAdmin = false;


    /**
     * @var array
     */
    public static $paramJs = [];

    /**
     * Sets up admin menus, initializes modules.
     */
    public function boot()
    {
        if (!is_cli()) { 

            if (! file_exists(ROOTPATH . '.env')) {
                return false;
            }

           

            helper('filesystem', 'themes');
        
            $this->saveInAdmin();

            if ($this->inAdmin) {

                BootstrapDemo1::run();
                $this->setupMenus();
            }
            $this->discoverCoreModules();
            $this->initModules();

        }
       
    }

    /**
     * Checks to see if we're in the admin area
     * by analyzing the current url and the ADMIN_AREA constant.
     */
    private function saveInAdmin()
    {
        $url = current_url();

        $path = parse_url($url, PHP_URL_PATH);

        $this->inAdmin = strpos($path, ADMIN_AREA) !== false;
    }


        /**
     * Creates any admin-required menus so they're
     * available to use by any modules.
     */
    private function setupMenus()
    {
        $menus = service('menus');

        // Sidebar menu
        $menus->createMenu('sidebar');
        $menus->menu('sidebar')
            ->createCollection('content', 'Content');
        $menus->menu('sidebar')
            ->createCollection('module', 'Module')
            ->setFontAwesomeIcon('fas fa-cog')
            ->setCollapsible();
        $menus->menu('sidebar')
            ->createCollection('system', 'Systéme')
            ->setFontAwesomeIcon('fas fa-toolbox')
            ->setCollapsible();

        // Top "icon" menu for notifications, account, etc.
        $menus->createMenu('iconbar');

        ///print_r(service('menus')->menu('sidebar')); exit;
    }


    /**
     * Adds any directories within bonfire/Modules
     * into routes as a new namespace so that discover
     * features will automatically work for core modules.
     */
    private function discoverCoreModules()
    {
        if (! $modules = cache('amau-modules-search')) {
            $modules = [];

            $map = directory_map(APPPATH . 'Modules', 1);

           // print_r( $map); exit;

            foreach ($map as $row) {
                if (substr($row, -1) !== DIRECTORY_SEPARATOR) {
                    continue;
                }

                $name                                 = trim($row, DIRECTORY_SEPARATOR);
                $key = str_replace('ci4-', '' , $name);
                if($key == 'amauchar')
                    $modules["Amauchar\Core"] = APPPATH . "Modules/{$name}/src";
                else
                    $modules["Amauchar\\" . ucfirst($key)] = APPPATH . "Modules/{$name}/src";
            }

            cache()->save('amau-modules-search', $modules);
        }

        // save instances of our module configs
        foreach ($modules as $namespace => $dir) {
            if (! is_file($dir . '/Module.php')) {
                continue;
            }

            include_once $dir . '/Module.php';
            $className                       = $namespace . '\Module';
            $this->moduleConfigs[$namespace] = new $className();
        }
    }

    /**
     * Performs any initialization needed for our modules.
     */
    private function initModules()
    {
        $method = $this->inAdmin ? 'initAdmin' : 'initFront';

        foreach ($this->moduleConfigs as $config) {
            $config->{$method}($this);
        }
    }

}
