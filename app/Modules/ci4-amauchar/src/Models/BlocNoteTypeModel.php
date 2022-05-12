<?php

namespace Amauchar\Core\Models;

use CodeIgniter\Model;
use Amauchar\Core\Entities\BlocNoteType;
use \Amauchar\Core\Traits\AuditsTrait;


class BlocNoteTypeModel  extends Model
{ 

    use AuditsTrait;
	protected $afterInsert = ['auditInsert'];
	protected $afterUpdate = ['auditUpdate'];
    protected $afterDelete = ['auditDelete'];
    
    protected $table      = 'blocnote_type';
    protected $with       = [];
    protected $without    = [];
    protected $primaryKey = 'id_type_blocnote';

    protected $returnType     = BlocNoteType::class;
    protected $useSoftDeletes = true;
    protected $protectFields = true;

    protected $allowedFields = [
        'titre','created_at', 'updated_at',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;


    const ORDERABLE = [
        1 => 'titre',
        2 => 'created_at'
    ];

    public static $orderable = ['titre', 'created_at'];

    /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '')
    {
        $builder =  $this->db->table('blocnote_type')
            ->select('*');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('titre', $search)
            ->groupEnd();

        return $condition->where([
            'blocnote_type.deleted_at'  => null,
            'blocnote_type.deleted_at' => null,
        ]);
    }

    public function getNbreBlocs( int $id){

        $nbreBlocs =  $this->db->table('blocnote')
        ->select('id_blocnote')
        ->where('blocnote_type_id', $id)
        ->countAllResults();

         return $nbreBlocs;
    }

}
