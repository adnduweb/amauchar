<?php 

namespace Amauchar\Core\Entities;

use CodeIgniter\Entity\Entity;

class UserAdresse extends Entity
{
    protected $table      = 'users_adresses';
    protected $primaryKey = 'id';
    protected $datamap = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'last_active',
    ];

}
