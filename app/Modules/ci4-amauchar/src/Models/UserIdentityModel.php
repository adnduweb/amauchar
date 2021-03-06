<?php

namespace Amauchar\Core\Models;

use CodeIgniter\Model;
use Faker\Generator;
use Amauchar\Core\Traits\AuditsTrait;
use Amauchar\Core\Entities\UserIdentity;

class UserIdentityModel extends Model
{

    use AuditsTrait;
	protected $afterInsert = ['auditInsert'];
	protected $afterUpdate = ['auditUpdate'];
    protected $afterDelete = ['auditDelete'];

    protected $table          = 'auth_identities';
    protected $primaryKey     = 'id';
    protected $returnType     = UserIdentity::class;
    protected $useSoftDeletes = false;
    protected $allowedFields  = [
        'user_id',
        'type',
        'name',
        'secret',
        'secret2',
        'expires',
        'extra',
        'force_reset',
        'last_used_at',
    ];
    protected $useTimestamps = true;

    public function fake(Generator &$faker)
    {
        return [
            'user_id'      => fake(UserModel::class)->id,
            'type'         => 'email_password',
            'name'         => null,
            'secret'       => password_hash('secret', PASSWORD_DEFAULT),
            'secret2'      => null,
            'expires'      => null,
            'extra'        => null,
            'force_reset'  => false,
            'last_used_at' => null,
        ];
    }
}
