<?php

namespace Amauchar\Core\Models;

use CodeIgniter\Model;
use CodeIgniter\Shield\Entities\Group;

class GroupModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'auth_groups_users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Group::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields  = [
        'user_id', 'group'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    const ORDERABLE = [
        1 => 'name',
        2 => 'description',
        3 => 'login_destination'
    ];

    public static $orderable = ['name', 'description', 'login_destination'];

}
