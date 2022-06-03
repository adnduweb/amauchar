<?php 

namespace Amauchar\Pages\Entities;

use CodeIgniter\Entity\Entity;

class PageLang extends Entity
{
    protected $datamap = [];
    /**
     * Define properties that are automatically converted to Time instances.
     */
    protected $dates = ['updated_at'];
    /**
     * Array of field names and the type of value to cast them as
     * when they are accessed.
     */
    protected $casts = [];

    protected $attributes = [
        'id_page_lang'         => null,
        'page_id'       => null, // Represents a username
        'lang'      => null,
        'name'   => null,
        'name_2'   => null,
        'description_short'   => null,
        'description'   => null,
        'meta_title'   => null,
        'meta_description'   => null,
        'robots'   => null,
        'og_type'   => null,
        'og_title'   => null,
        'og_description'   => null,
        'twitter_type'   => null,
        'twitter_title'   => null,
        'twitter_description'   => null,
        'tags'   => null,
        'slug'   => null,
        'created_at' => null,
        'updated_at' => null,
    ];

}
