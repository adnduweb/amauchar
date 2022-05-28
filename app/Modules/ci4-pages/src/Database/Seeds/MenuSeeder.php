<?php

namespace Adnduweb\Pages\Database\Seeds;

use Adnduweb\Ci4_menu\Models\MenuModel;

class MenuSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {

        $db = \Config\Database::connect();

        //Menu
        $rowsItem = [
            'id'         => 1,
            'name'       => 'main menu',
            'handle'     => 'main_menu',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $db->table('menus_mains')->insert($rowsItem);
        //$menu_main_id = $db->insertID();

        $rows = [
            'id_menu'        => 1,
            'menu_main_id'   => 1,
            'id_parent'      => 0,
            'depth'          => 1,
            'left'           => 2,
            'right'          => 3,
            'position'       => 1,
            'id_module'      => null,
            'id_item_module' => null,
            'active'         => 1,
            'icon'           => '',
        ];
        $db->table('menus')->insert($rows);

        $rowsLang =  [
            'menu_id' => 1,
            'lang'    => 'fr',
            'name'    => 'Page d\'accueil',
            'slug'    => '/'
        ];
        $db->table('menus_langs')->insert($rowsLang);

    }
}