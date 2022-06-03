<?php

namespace Amauchar\Pages\Models;

use CodeIgniter\Model;
use Amauchar\Core\Traits\AuditsTrait;
use Amauchar\Pages\Entities\PageLang;
use Amauchar\Core\Libraries\Util;

class PageLangModel extends Model
{
    use AuditsTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'pages_langs';
    protected $primaryKey       = 'id_page_lang';
    protected $useAutoIncrement = true;
    protected $lang             = true;
    protected $insertID         = 0;
    //protected $with             = ['pages_langs'];
    protected $returnType       = PageLang::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['page_id', 'lang', 'name', 'name2', 'description_short', 'description', 'meta_title', 'meta_description', 'robots', 'og_type', 'og_title', 'og_description', 'twitter_type', 'twitter_title', 'twitter_description'];

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

    
}
