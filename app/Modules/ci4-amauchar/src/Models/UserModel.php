<?php

namespace Amauchar\Core\Models;

use Amauchar\Core\Models\BaseUserModel;
use Amauchar\Core\Entities\User;
use Amauchar\Core\Traits\AuditsTrait;
use Faker\Generator; 
use InvalidArgumentException;


/**
 * This User model is ready for your customization.
 * It extends Shield's UserModel, providing many auth
 * features built right in.
 */
class UserModel extends BaseUserModel
{
    use AuditsTrait;
	protected $afterInsert = ['auditInsert'];
	protected $afterUpdate = ['auditUpdate'];
	protected $afterDelete = ['auditDelete'];

    protected $table          = 'users';
    protected $primaryKey     = 'id';
    protected $uuidFields     = ['uuid'];
    protected $returnType     = User::class;
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'username', 'status', 'status_message', 'active', 'last_active', 'deleted_at',
        'uuid', 'compagny_id', 'avatar', 'first_name', 'last_name',
    ];

    const ORDERABLE = [
        1 => 'group',
        2 => 'username',
        3 => 'secret',
        4 => 'last_name',
        5 => 'first_name',
        6 => 'created_at',
    ];

    public static $orderable = ['group', 'username', 'secret', 'last_name', 'first_name', 'created_at'];

    protected $useTimestamps = true;
    protected $afterFind     = ['fetchIdentities'];

    /**
     * Whether identity records should be included
     * when user records are fetched from the database.
     */
    protected bool $fetchIdentities = false;

    /**
     * Performs additional setup when finding objects
     * for the recycler. This might pull in additional
     * fields.
     */
    public function setupRecycler()
    {
		$dbPrefix = $this->getPrefix();
        return $this->select("{$dbPrefix}users.*,
            (SELECT secret
                from {$dbPrefix}auth_identities
                where user_id = {$dbPrefix}users.id
                    and type = 'email_password'
                order by last_used_at desc
                limit 1
            ) as email
       ");
    }

     /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '')
    {
        $builder =  $this->db->table('users')
            ->select('*');
            $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'inner');
            $builder->join('auth_identities', 'auth_identities.user_id = users.id', 'inner');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('group', $search)
                ->orLike('username', $search)
                ->orLike('secret', $search)
                ->orLike('last_name', $search)
                ->orLike('first_name', $search)
            ->groupEnd();

        return $condition->where([
            'users.deleted_at'  => null,
            'users.deleted_at' => null,
        ]);
    }
}
