<?php

namespace Amauchar\Core\Entities;

use Amauchar\Core\Entities\UUid;

class Company extends UUid
{
    protected $primaryKey     = 'id';
    protected $uuids          = ['uuid_company'];

    protected $datamap = [];

    /**
     * Define properties that are automatically converted to Time instances.
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Array of field names and the type of value to cast them as
     * when they are accessed.
     */
    protected $casts = [
        'active'           => 'boolean',
    ];

}
