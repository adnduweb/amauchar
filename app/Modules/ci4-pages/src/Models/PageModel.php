<?php

namespace Adnduweb\Pages\Models;
use Adnduweb\Pages\Entities\Page;
use CodeIgniter\Model;

class PageModel extends Model
{
    use \Tatter\Relations\Traits\ModelTrait, \Adnduweb\Ci4Core\Traits\AuditsTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'pages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $lang             = true;
    protected $insertID         = 0;
    //protected $with             = ['pages_langs'];
    protected $returnType       = Page::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_parent', 'media_id', 'template', 'active', 'visible_title', 'no_follow_no_index', 'handle', 'is_natif', 'display_title', 'order'];

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
    protected $afterInsert    = ['auditInsert', 'insertLang'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = ['auditUpdate', 'updatelang'];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = ['auditDelete'];

    const ORDERABLE = [
        1 => 'name'
    ];

    public static $orderable = ['name'];

            /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '')
    {
        $builder =  $this->db->table('pages')
            ->select('*')->join('pages_langs', 'pages.id = pages_langs.page_id')->where('lang', service('request')->getLocale());

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('name', $search)
            ->groupEnd();

        return $condition->where([
            'pages.deleted_at'  => null,
            'pages.deleted_at' => null,
        ]);
    }


    public function getPageHome( int $id)
    {
        $home = $this->select()
            ->join('pages_langs', 'pages.id = pages_langs.page_id')
            ->where('active', '1')
            ->where('pages.id', $id)
            ->where('lang', service('request')->getLocale())
            ->find(1);
        
        return $home;
    }

    public function getPage( string $slug)
    {
        $home = $this->select()
            ->join('pages_langs', 'pages.id = pages_langs.page_id')
            ->where('active', '1')
            ->where('pages_langs.slug', $slug)
            ->where('lang', service('request')->getLocale())
            ->first();
        
        return $home;
    }

    public static function getNatifById(int $id)
    {
        $db = \Config\Database::connect();
        $page = $db->table('pages')->select('is_natif')->where(['id' => $id])->get()->getRow();
        return ($page->is_natif) ? true : false;
    }

    


    // // ...
    // protected function checkCache(array $data)
    // {
    //     // Check if the requested item is already in our cache
    //     print_r($data); exit;

    // }

    public function insertLang($params){

        if($this->lang == true){

            $post = service('request')->getPost();
            if(isset($post['lang'])){                
                
                $data = $post['lang'][service('request')->getLocale()];
                $data['page_id'] = $params['id'];
                $data['slug'] = empty($data['slug']) ? uniforme($data['lang'][service('request')->getLocale()]['name']) : uniforme($data['slug']) ;
                $data['lang'] = service('request')->getLocale();

               if(!$this->db->table('pages_langs')->insert($data)){
                    return $this->errors();
               }
            }
        }
    }

    public function updatelang($params){

        if($this->lang == true){

            $post = service('request')->getPost();
            if(isset($post['lang'])){                
                
                $data = $post['lang'][service('request')->getLocale()];
                $data['lang'] = service('request')->getLocale();
                $data['slug'] = empty($data['slug']) ? uniforme($data['lang'][service('request')->getLocale()]['name']) : uniforme($data['slug']) ;

               if(!$this->db->table('pages_langs')->update($data, ['id_page_lang' => $post['id_page_lang']])){
                    return $this->errors();
               }
            }

        }
    }

    public function getPageBuilder(int $id) {
        $builder = $this->db->table('pages_builder')
        ->where('page_id', $id)
        ->where('lang', service('request')->getLocale())
        ->get()->getRow();
    
        return $builder;
    }


    public function insertBuilder(array $data){

        if(!$this->db->table('pages_builder')->insert($data)){
            return $this->errors();
       }
       return true;
    }

    public function updateBuilder(array $data, $id){
        
        if(!$this->db->table('pages_builder')->update($data,  ['id' => $id])){
            return $this->errors();
       }
       return true;
    }

}
