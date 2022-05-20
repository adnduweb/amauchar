<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Amauchar\Customers;

use Amauchar\Core\Config\BaseModule;
use Amauchar\Core\Libraries\Menus\MenuItem;

/**
 * Email Module setup
 */
class Module extends BaseModule
{
    /**
     * Setup our admin area needs.
     */
    public function initAdmin()
    {
        // Settings menu for sidebar
        $sidebar = service('menus');
        $item    = new MenuItem([
            'title'      => 'Customer.customers',
            'namedRoute' => 'customers.index',
            'IconSvg'    => ["icons/duotune/finance/fin006.svg", "svg-icon"],
            'permission' => 'admin.settings',
        ]);
       
        $sidebar->menu('sidebar')->collection('module')->addItem($item);       
    }
}
