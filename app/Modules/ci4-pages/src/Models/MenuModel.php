<?php

namespace Amauchar\Pages\Models;

use CodeIgniter\Model;
use Amauchar\Core\Traits\AuditsTrait;
use Amauchar\Pages\Entities\Menu;

class MenuModel extends Model
{
    use AuditsTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'menus';
    protected $primaryKey       = 'id_menu';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $lang             = true;
    //protected $with             = ['menus_langs'];
    protected $returnType       = menu::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['menu_main_id', 'active', 'depth', 'left', 'right', 'id_parent', 'position', 'id_module', 'id_item_module', 'icon'];

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
        $builder =  $this->db->table('designations')
            ->select('*');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('name', $search)
            ->groupEnd();

        return $condition->where([
            'designations.deleted_at'  => null,
            'designations.deleted_at' => null,
        ]);
    }


    public function getMainMenu()
    {
        $menu = $this->select()
            ->join('menus_langs', 'menus.id_menu = menus_langs.menu_id')
            ->where('active', '1')
            ->where('menu_main_id', '1')
            ->where('id_parent', '0')
            ->where('lang', service('request')->getLocale())
            ->OrderBy('position ASC')
            ->findAll();
        
        return $menu;
    }

    public function getMenusMains()
    {
        return $this->db->table('menus_mains')->orderBy('id', 'ACS')->get()->getResult();
    }


    public function getMenuMain(int $menu_main_id)
    {
        return  $this->db->table('menus_mains')->where('id', $menu_main_id)->get()->getRow();
    }

    public function getMenuAdmin(int $menu_main_id)
    {
        $groupsRow = $this->select()
        ->select('menus.created_at as date_create_at')
        ->join('menus_langs', 'menus.id_menu = menus_langs.menu_id')
        ->where(['menu_main_id' => $menu_main_id, 'menus_langs.lang' =>  service('request')->getLocale()])
        ->orderBy('position ASC')
        ->findAll();
        //echo $this->getCompiledSelect(); exit;
        // 30 31 29
        return $groupsRow;
    }

    public function deleteItem(int $id)
    {
        return $this->db->table('menus')->delete(['id_menu' => $id]) && $this->db->table('menus_langs')->delete(['id_menu_lang' => $id]);
    }

    public function getMenuItem(int $id_menu){
        $menu = $this->select()
        ->join('menus_langs', 'menus.id_menu = menus_langs.menu_id')
        ->where('id_menu', $id_menu)
        ->where('lang', service('request')->getLocale())
        ->first();
    
        return $menu;
    }


    public function insertLang($params){

        if($this->lang == true){

            $post = service('request')->getPost();
            if(isset($post['lang'])){                
                
                $data = $post['lang'][service('request')->getLocale()];
                $data['menu_id'] = $params['id'];
                $data['slug'] = empty($data['slug']) ? uniforme($data['lang'][service('request')->getLocale()]['name']) : uniforme($data['slug']) ;
                $data['lang'] = service('request')->getLocale();

               if(!$this->db->table('menus_langs')->insert($data)){
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

               if(!$this->db->table('menus_langs')->update($data, ['id_menu_lang' => $post['id_menu_lang']])){
                    return $this->errors();
               }
            }

        }

    }

}
