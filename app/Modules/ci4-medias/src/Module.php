<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Amauchar\Medias;

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
            'title'      => 'Medias.medias',
            'namedRoute' => 'medias.index',
            'IconSvg'    => ["icons/duotune/files/fil025.svg", "svg-icon"],
            'permission' => 'admin.settings',
        ]);
       
        $sidebar->menu('sidebar')->collection('module')->addItem($item);
       
    }
}
