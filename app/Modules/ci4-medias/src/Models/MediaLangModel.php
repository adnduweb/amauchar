<?php namespace Amauchar\Medias\Models;

use CodeIgniter\Files\File as CIFile;
use Amauchar\Core\Models\BaseModel;
use Config\Mimes;
use Faker\Generator;
use Amauchar\Core\Traits\AuditsTrait;
use Amauchar\Medias\Entities\MediaLang;
use Amauchar\Medias\Exceptions\MediasException;
use Adnduweb\Ci4Core\Exceptions\ThumbnailsException;


class MediaLangModel extends BaseModel
{
	use AuditsTrait;

	protected $table          = 'medias_langs';
	protected $primaryKey     = 'id_media_lang';
	protected $returnType     = MediaLang::class;
	protected $useSoftDeletes = false;

	protected $allowedFields = [
		'media_id',
		'lang',
		'titre',
		'legende',
		'description'
	];

	// Dates
	protected $useTimestamps = false;

	// Validation
	protected $validationRules = [
		'media_id' => 'required',
	];
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

	public function updatelang($params){
	
		if($this->db->table('medias_langs')->select('media_id')->where( ['media_id' => $params['media_id'], 'lang' => $params['lang']])->get()->getRow()){

			if(!$this->db->table('medias_langs')->update($params, ['media_id' => $params['media_id'], 'lang' => $params['lang']])){
					return $this->db->errors();
			}
		}else{
			if(!$this->db->table('medias_langs')->insert($params)){
				return $this->db->errors();
			}
		}
		return true;
    }

}
