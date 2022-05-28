<?php

namespace Adnduweb\Pages\Database\Seeds;

use Adnduweb\Pages\Models\PageModel;

class PageSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        // Define default project setting templates
        $rows = [
            [
                'id'                 => 1,
                'id_parent'          => 0,
                'template'           => 'page_default',
                'active'             => 1,
                'visible_title'      => 1,
                'no_follow_no_index' => 0,
                'handle'             => 'home',
                'is_natif'           => 1,
                'display_title'      => 1,
                'order'              => 1,
                'created_at'         => date('Y-m-d H:i:s'),
            ],
            [
                'id'                 => 2,
                'id_parent'          => 0,
                'template'           => 'page_default',
                'active'             => 1,
                'visible_title'      => 1,
                'no_follow_no_index' => 0,
                'handle'             => 'mentions-legales',
                'is_natif'           => 1,
                'display_title'      => 1,
                'order'              => 1,
                'created_at'         => date('Y-m-d H:i:s'),
            ],
            [
                'id'                 => 3,
                'id_parent'          => 0,
                'template'           => 'page_default',
                'active'             => 1,
                'visible_title'      => 1,
                'no_follow_no_index' => 0,
                'handle'             => 'politique-de-confidentialite',
                'is_natif'           => 1,
                'display_title'      => 1,
                'order'              => 1,
                'created_at'         => date('Y-m-d H:i:s'),
            ],
            [
                'id'                 => 4,
                'id_parent'          => 0,
                'template'           => 'page_contact',
                'active'             => 1,
                'visible_title'      => 1,
                'no_follow_no_index' => 0,
                'handle'             => 'contactez-nous',
                'is_natif'           => 1,
                'display_title'      => 1,
                'order'              => 1,
                'created_at'         => date('Y-m-d H:i:s'),
            ],
            [
                'id'                 => 5,
                'id_parent'          => 0,
                'template'           => 'page_default',
                'active'             => 1,
                'visible_title'      => 1,
                'no_follow_no_index' => 0,
                'handle'             => 'condition-utilisation',
                'is_natif'           => 1,
                'display_title'      => 1,
                'order'              => 1,
                'created_at'         => date('Y-m-d H:i:s'),
            ]


        ];

        // Check for and create project setting templates
        //$pages = new PageModel();
        $db = \Config\Database::connect();
        foreach ($rows as $row) {
            $page = $db->table('pages')->where('id', $row['id'])->get()->getRow();
            //print_r($page); exit;
            if (empty($page)) {
                // No setting - add the row
                $db->table('pages')->insert($row);
            }
        }

        $rowsLang = [
            [
                'page_id'           => 1,
                'lang'              => 'fr',
                'name'              => 'Welcome to CodeIgniter',
                'name_2'            => 'The small framework with powerful features',
                'description_short' => static::faker()->sentence(),
                'description'       => static::faker()->text(),
                'meta_title'        => static::faker()->sentence(),
                'meta_description'  => static::faker()->sentence(),
                'robots'            => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
                'tags'              => 'test',
                'slug'              => '/'
            ],
            [
                'page_id'           => 2,
                'lang'              => 'fr',
                'name'              => 'Mentions légales',
                'name_2'            => static::faker()->name(),
                'description_short' => static::faker()->sentence(),
                'description'       => static::faker()->text(),
                'meta_title'        => static::faker()->sentence(),
                'meta_description'  => static::faker()->sentence(),
                'robots'            => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
                'tags'              => 'test',
                'slug'              => 'mentions-legales'
            ],
            [
                'page_id'           => 3,
                'lang'              => 'fr',
                'name'              => 'Politique de confidentialité',
                'name_2'            => static::faker()->name(),
                'description_short' => static::faker()->sentence(),
                'description'       => static::faker()->text(),
                'meta_title'        => static::faker()->sentence(),
                'meta_description'  => static::faker()->sentence(),
                'robots'            => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
                'tags'              => 'test',
                'slug'              => 'politique-de-confidentialite'
            ],
            [
                'page_id'           => 4,
                'lang'              => 'fr',
                'name'              => 'Contactez nous',
                'name_2'            => static::faker()->name(),
                'description_short' => static::faker()->sentence(),
                'description'       => static::faker()->text(),
                'meta_title'        => static::faker()->sentence(),
                'meta_description'  => static::faker()->sentence(),
                'robots'            => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
                'tags'              => 'test',
                'slug'              => 'contactez-nous'
            ],
            [
                'page_id'           => 5,
                'lang'              => 'fr',
                'name'              => "Condition d'utilisation",
                'name_2'            => static::faker()->name(),
                'description_short' => static::faker()->sentence(),
                'description'       => static::faker()->text(),
                'meta_title'        => static::faker()->sentence(),
                'meta_description'  => static::faker()->sentence(),
                'robots'            => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
                'tags'              => 'test',
                'slug'              => 'condition-utilisation'
            ]

        ];

        foreach ($rowsLang as $rowLang) {
            $pagelang = $db->table('pages_langs')->where('page_id', $rowLang['page_id'])->get()->getRow();

            if (empty($pagelang)) {
                // No setting - add the row
                $db->table('pages_langs')->insert($rowLang);
            }
        }
    }
}