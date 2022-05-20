<?php

namespace Amauchar\Customers\Models;

use CodeIgniter\Model;
use \Amauchar\Core\Traits\AuditsTrait;
use Amauchar\Customers\Entities\CustomerAddress;


class CustomerAddressModel extends Model
{
    use AuditsTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'customers_addresses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = CustomerAddress::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['customer_id', 'lang', 'country', 'company', 'firstname', 'lastname', 'address1', 'address2', 'postcode', 'city', 'phone', 'phone_mobile', 'defaut', 'active'];

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
        1 => 'lastname',
        2=> 'firstname',
        3 => 'company'
    ];

    public static $orderable = ['lastname', 'firstname', 'company'];

    /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '', int $customer_id)
    {
        $builder =  $this->db->table('customers_addresses')
            ->select('*');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('lastname', $search)
                ->orlike('firstname', $search)
                ->orlike('company', $search)
            ->groupEnd();

        return $condition->where([
            'customers_addresses.deleted_at'  => null,
            'customers_addresses.customer_id' => $customer_id,
        ]);
    }

    public function getExport(){
        $builder = $this->query("
        SELECT `".$this->db->prefixTable('customers_addresses')."`.id, 
        `".$this->db->prefixTable('customers_addresses')."`.name as designation_name 
        FROM `".$this->db->prefixTable('customers_addresses')."` 
        WHERE ".$this->db->prefixTable('customers_addresses').".deleted_at IS NULL");

        return ['column' => $builder->getFieldNames(), 'data' => $builder->getResultArray()];

    }

    public function getAddressDefault(int $id_customer){

        return $this->where(['customer_id' => $id_customer, 'defaut' => 1])
        ->get()
        ->getRow();
  
    }

}
