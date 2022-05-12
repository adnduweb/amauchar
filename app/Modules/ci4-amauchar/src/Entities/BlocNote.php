<?php 

namespace Amauchar\Core\Entities;

use Amauchar\Core\Entities\UUid;

class BlocNote extends UUid
{
    protected $table      = 'blocnote';
    protected $primaryKey = 'id';
    protected $uuids = ['uuid'];
    
    protected $datamap = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'last_active',
    ];

}
