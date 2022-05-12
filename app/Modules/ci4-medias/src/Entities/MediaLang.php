<?php namespace Amauchar\Medias\Entities;

use CodeIgniter\Entity;

class MediaLang extends Entity
{
	protected $table      = 'medias_langs';
	protected $primaryKey = 'id_media_lang';

	protected $dates = ['created_at'];
	protected $casts = [
		'source_id' => 'int',
		'user_id'   => 'int',
	];
}