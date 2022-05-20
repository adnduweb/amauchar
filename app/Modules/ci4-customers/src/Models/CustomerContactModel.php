<?php

namespace Amauchar\Customers\Models;

use CodeIgniter\Model;
use \Amauchar\Core\Traits\AuditsTrait;
use Amauchar\Customers\Entities\CustomerContact;


class CustomerContactModel extends model
{
    use AuditsTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'customers_contacts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = CustomerContact::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['customer_id', 'country', 'company', 'firstname', 'lastname', 'email', 'phone', 'phone_mobile'];

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

    const ORDERABLE = [
        1 => 'firstname',
        2 => 'lastname'
    ];

    public static $orderable = ['firstname', 'lastname'];

    /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '', int $customer_id)
    {
        $builder =  $this->db->table('customers_contacts')
            ->select('*');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('lastname', $search)
                ->orlike('firstname', $search)
                ->orlike('company', $search)
            ->groupEnd();

        return $condition->where([
            'customers_contacts.deleted_at'  => null,
            'customers_contacts.customer_id' => $customer_id,
        ]);
    }
}
