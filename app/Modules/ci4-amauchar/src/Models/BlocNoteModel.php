<?php

namespace Amauchar\Core\Models;

use Amauchar\Core\Models\BaseModel;
use Amauchar\Core\Entities\BlocNote;
use \Amauchar\Core\Traits\AuditsTrait;


class BlocNoteModel  extends BaseModel
{ 

    use AuditsTrait;
	protected $afterInsert = ['auditInsert'];
	protected $afterUpdate = ['auditUpdate'];
    protected $afterDelete = ['auditDelete'];
    
    protected $table      = 'blocnote';
    protected $with       = [];
    protected $without    = [];
    protected $primaryKey = 'id_blocnote';
    protected $uuidFields = ['uuid'];

    protected $returnType     = BlocNote::class;
    protected $useSoftDeletes = true;
    protected $protectFields = true;

    protected $allowedFields = [
        'uuid', 'user_id', 'blocnote_type_id', 'titre', 'contenu', 'created_at', 'updated_at',
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
        2 => 'contenu',
        3 => 'created_at'
    ];

    public static $orderable = ['titre', 'contenu', 'created_at'];

               /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '')
    {
        $builder =  $this->db->table('blocnote')
            ->select('*');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('titre', $search)
            ->groupEnd();

        return $condition->where([
            'blocnote.deleted_at'  => null,
            'blocnote.deleted_at' => null,
        ]);
    }

}
