<?php

namespace Amauchar\Core\Models;

use Amauchar\Core\Entities\Company;
use Faker\Generator;
use CodeIgniter\I18n\Time;

class CompanyModel extends BaseModel
{

    protected $DBGroup          = 'default';
    protected $table            = 'companies';
    protected $primaryKey       = 'id';
    protected $uuidFields     = ['uuid'];
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Company::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'uuid', 'company_type_id', 'country_id', 'currency_id', 'raison_social',
        'adresse', 'adresse2', 'code_postal', 'ville', 'email', 'phone', 'phone_mobile', 'fax', 'siret', 'ape', 'is_actif', 'tva', 'is_ttc', 'bio',
        'logo', 'created_at', 'updated_at', 'deleted_at'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules = [
    //     'company_type_id'           => 'required',
    //     'raison_social'             => 'required|is_unique[companies.raison_social,id,{id}]',
    // ];
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
        1 => 'raison_social',
        2 => 'email',
        3 => 'created_at'
    ];

    public static $orderable = ['raison_social', 'email', 'created_at'];

    /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '')
    {
        $builder =  $this->db->table('companies')
            ->select('*');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('raison_social', $search)
            ->groupEnd();

        return $condition->where([
            'companies.deleted_at'  => null,
            'companies.deleted_at' => null,
        ]);
    }

    public function fake(Generator &$faker)
    {
        return [
            'uuid'    => service('uuid')->uuid4()->toString(),
            'company_type_id' => 1,
            'country'         => 'fr',
            'raison_social'   => 'Company Name',
            'email'           => 'contact@exemple.fr',
            'adresse'         => '3, street Eminem',
            'adresse2'        => '',
            'ville'           => 'Houston',
            'code_postal'     => '2456 67',
            'phone'           => '+33684521245',
            'phone_mobile'    => '+33684521245',
            'fax'             => '+33684521245',
            'siret'           => '78979907890',
            'ape'             => 'z4567',
            'tva'             => 1,
            'is_ttc'          => 0,
            'logo'            => null,
            'active'          => true,
            'created_at'      => date('Y-m-d H:i:s'),
        ];
    }
}
