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
	//use \Tatter\Relations\Traits\ModelTrait, \Adnduweb\Ci4Core\Traits\AuditsTrait, \Adnduweb\Ci4Core\Models\BaseModel;
	//use \Tatter\Permits\Traits\PermitsTrait;
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

}
