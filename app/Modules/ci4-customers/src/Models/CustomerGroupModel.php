<?php

namespace Amauchar\Customers\Models;

use CodeIgniter\Model;
use \Amauchar\Core\Traits\AuditsTrait;
use Amauchar\Customers\Entities\CustomerGroup;


class CustomerGroupModel extends Model
{
    use AuditsTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'customers_groups';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = CustomerGroup::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'handle', 'active'];

    // Dates
    protected $useTimestamps = true;
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
    protected $afterInsert    = ['auditInsert'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = ['auditUpdate'];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = ['auditDelete'];

}
