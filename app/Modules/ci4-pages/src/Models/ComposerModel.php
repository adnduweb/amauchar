<?php

namespace Adnduweb\Pages\Models;
use Adnduweb\Pages\Entities\Composer;
use CodeIgniter\Model;

class ComposerModel extends Model
{
    use \Tatter\Relations\Traits\ModelTrait, \Adnduweb\Ci4Core\Traits\AuditsTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'pages_composer';
    protected $primaryKey       = 'id_page_composer';
    protected $useAutoIncrement = true;
    protected $lang             = false;
    protected $insertID         = 0;
    protected $returnType       = Composer::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['page_id', 'lang', 'items'];

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


    public function saveComposer(array $items){

        if(!is_array($items))
            return false;

        // if (! is_dir(config('Medias')->getPath() . config('Carousels')->segementUrl . DIRECTORY_SEPARATOR . $carousel_id) && ! @mkdir(config('Medias')->getPath() . config('Carousels')->segementUrl . DIRECTORY_SEPARATOR . $carousel_id, 0775, true)){
        //     throw MediasException::forDirFail(config('Medias')->getPath() . $carousel_id);
        // }

        $builders = $items['builder'];

        //print_r($builders); exit;

        $construction = [];
        $i = 0;
        foreach($builders as $e => $t){

            foreach($t as $k => $v){

                if($e != '__i__'){

                    $construction[$e][$k] = $v;
                }
                $i++;
            }
        }
       // print_r($construction);

        $i = 0;
        foreach($construction as $builder){

                $item = $this->db->table('pages_composer')
                ->where('page_id', $items['id'])
                ->where('lang', service('request')->getLocale())
                ->get()->getRow();
                //print_r($item); exit;
                if(!empty($item)){

                    $data = [
                        'page_id' => $items['id'],
                        'lang'    => service('request')->getLocale(),
                        'items'    => serialize($construction),
                        'updated_at'  => date('Y-m-d H:i:s')
                    ];
                    if(!$this->db->table('pages_composer')->update($data, ['page_id' => $items['id']])){
                        return $this->errors();
                    }


                }else{

                    $data = [
                        'page_id' => $items['id'],
                        'lang'    => service('request')->getLocale(),
                        'items'    => serialize($construction),
                        'created_at'  => date('Y-m-d H:i:s')
                    ];
                    if(!$this->db->table('pages_composer')->insert($data)){
                        return $this->errors();
                    }

                }
            $i++;
        }

        //exit;

        return true;

    }

    

    public function getComposer( int $page_id)
    {
        $composer = $this->select()
            ->where('page_id', $page_id)
            ->where('lang', service('request')->getLocale())
            ->first();
        
        return $composer;
    }


    public function saveComposerItems(array $items,  int $page_id){

        $data = [
            'page_id' => $page_id,
            'lang'    => service('request')->getLocale(),
            'items'    => serialize($items),
            'updated_at'  => date('Y-m-d H:i:s')
        ];
        if(!$this->db->table('pages_composer')->update($data, ['page_id' => $page_id, 'lang' => service('request')->getLocale()])){
            return $this->errors();
        }

        return true;
    }

}
