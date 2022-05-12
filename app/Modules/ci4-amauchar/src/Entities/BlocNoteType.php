<?php 

namespace Amauchar\Core\Entities;

use CodeIgniter\Entity\Entity;

class BlocNoteType extends Entity
{
    protected $table      = 'blocnote_type';
    protected $primaryKey = 'id';
    protected $datamap = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'last_active',
    ];

}
