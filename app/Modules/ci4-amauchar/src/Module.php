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

        $itemAccount     = [[
            'title'      => 'Core.account',
            'group'      => 'account',
            'namedRoute' => '#',
            'IconSvg'    => ["icons/duotune/general/gen051.svg", "svg-icon"],
            'permission' => 'admin.settings',
            'children'   => [
                [
                    'title'      => 'Core.users',
                    'group'      => 'account',
                    'namedRoute' => 'users.index',
                    'IconSvg'    => ["icons/duotone/Design/PenAndRuller.svg", "svg-icon"],
                    'permission' => 'admin.settings',
                ],
                [
                    'title'      => 'Core.company',
                    'group'      => 'account',
                    'namedRoute' => 'companies.index',
                    'IconSvg'    => ["icons/duotone/Design/PenAndRuller.svg", "svg-icon"],
                    'permission' => 'admin.settings',
                ],
                [
                    'title'      => 'Core.permissions',
                    'group'      => 'account',
                    'namedRoute' => 'permissions.index',
                    'IconSvg'    => ["icons/duotone/Design/PenAndRuller.svg", "svg-icon"],
                    'permission' => 'admin.settings',
                ],
                [
                    'title'      => 'Core.roles',
                    'group'      => 'account',
                    'namedRoute' => 'groups.index',
                    'IconSvg'    => ["icons/duotone/Design/PenAndRuller.svg", "svg-icon"],
                    'permission' => 'admin.settings',
                ],
            ]
        ]];

        $sidebar->menu('sidebar')->collection('system')->addGroup($itemAccount);
        
        $itemSettings    = new MenuItem([
            'title'      => 'Core.settings',
            'namedRoute' => 'settings.index',
            'IconSvg'    => ["icons/duotune/coding/cod003.svg", "svg-icon"],
            'permission' => 'admin.settings',
        ]);
       
        $sidebar->menu('sidebar')->collection('system')->addItem($itemSettings);

        $itemTools     = [[
            'title'      => 'Core.tools',
            'group'      => 'tools',
            'namedRoute' => '#',
            'IconSvg'    => ["icons/duotune/general/gen019.svg", "svg-icon"],
            'permission' => 'admin.settings',
            'children'   => [
                [
                    'title'      => 'Core.logs',
                    'group'      => 'tools',
                    'namedRoute' => 'logs.index',
                    'IconSvg'    => ["icons/duotone/Design/PenAndRuller.svg", "svg-icon"],
                    'permission' => 'admin.settings',
                ],
                [
                    'title'      => 'Core.informations',
                    'group'      => 'account',
                    'namedRoute' => 'informations.index',
                    'IconSvg'    => ["icons/duotone/Design/PenAndRuller.svg", "svg-icon"],
                    'permission' => 'admin.settings',
                ],
                [
                    'title'      => 'Core.translates',
                    'group'      => 'account',
                    'namedRoute' => 'translates.index',
                    'IconSvg'    => ["icons/duotone/Design/PenAndRuller.svg", "svg-icon"],
                    'permission' => 'admin.settings',
                ],
                [
                    'title'      => 'Core.blocnotes',
                    'group'      => 'account',
                    'namedRoute' => 'blocsnotes.index',
                    'IconSvg'    => ["icons/duotone/Design/PenAndRuller.svg", "svg-icon"],
                    'permission' => 'admin.settings',
                ],
            ]
        ]];

        $sidebar->menu('sidebar')->collection('system')->addGroup($itemTools);
       
    }
}
