<?php

namespace Amauchar\Customers\Models;

use Amauchar\Core\Models\BaseModel;
use Amauchar\Core\Traits\AuditsTrait;
use Amauchar\Customers\Entities\CustomerNote;


class CustomerNoteModel extends BaseModel
{
    use AuditsTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'customers_notes';
    protected $primaryKey       = 'id';
    protected $uuidFields       = ['uuid'];
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = CustomerNote::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['uuid', 'customer_id', 'blocnote_type_id', 'titre', 'contenu'];

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
        1 => 'titre',
        2 => 'contenu'
    ];

    public static $orderable = ['titre', 'contenu'];

    /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '', int $customer_id)
    {
        $builder =  $this->db->table('customers_notes')
            ->select('*');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('titre', $search)
                ->orlike('contenu', $search)
                ->orlike('created_at', $search)
            ->groupEnd();

        return $condition->where([
            'customers_notes.deleted_at'  => null,
            'customers_notes.customer_id' => $customer_id,
        ]);
    }
}
