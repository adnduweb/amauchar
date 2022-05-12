<?php

namespace Amauchar\Core\Models;

use CodeIgniter\Model;
use Amauchar\Core\Entities\UserAdresse;
use \Amauchar\Core\Traits\AuditsTrait;


class UserAdresseModel extends Model
{ 

    use AuditsTrait;
	protected $afterInsert = ['auditInsert'];
	protected $afterUpdate = ['auditUpdate'];
    protected $afterDelete = ['auditDelete'];
    
    protected $table      = 'users_adresses';
    //protected $with       = ['auth_groups_users', 'auth_users_permissions', 'settings'];
    protected $with       = [];
    protected $without    = [];
    protected $primaryKey = 'id';

    protected $returnType     = UserAdresse::class;
    protected $useSoftDeletes = true;
    protected $protectFields = true;

    protected $allowedFields = [
        'user_id', 'country', 'adresse1', 'adresse2', 'code_postal', 'ville', 'phone', 'phone_mobile', 'default', 'created_at', 'updated_at',
        
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $lastLoginAt = 'last_login_at';

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
}
