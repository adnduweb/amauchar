<?php

namespace Amauchar\Pages\Models;
use Amauchar\Pages\Entities\FormContact;
use CodeIgniter\Model;

class FormContactModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'form_contact';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $lang             = false;
    protected $insertID         = 0;
    protected $returnType       = FormContact::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['lastname', 'firstname', 'email', 'phone', 'entreprise', 'fonction', 'ou', 'projet'];

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
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


}
