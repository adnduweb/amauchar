<?php namespace Amauchar\Core\Models;

use CodeIgniter\Model;
use Amauchar\Core\Entities\Audit;

class AuditModel extends Model
{
	protected $table      = 'audits';
	protected $primaryKey = 'id';
	protected $returnType = Audit::class;

	protected $useTimestamps  = false;
	protected $useSoftDeletes = false;
	protected $skipValidation = true;

	protected $allowedFields = ['source', 'source_id', 'user_id', 'event', 'summary', 'properties', 'created_at'];

	const ORDERABLE = [
        1 => 'id',
        2 => 'source',
        3 => 'event',
        4 => 'source_id',
        5 => 'user_id',
        6 => 'created_at',
    ];

	public static $orderable = ['source', 'event', 'source_id', 'user_id', 'data', 'created_at'];
	
	
	/**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '')
    {
        $builder =  $this->db->table('audits')
            ->select('*');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('source', $search)
                ->orLike('event', $search)
            ->groupEnd();

        return $condition;
    }
}
