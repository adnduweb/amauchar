<?php 

namespace Amauchar\Medias\Config;

/**
 * Class Registrar
 *
 * Provides a basic registrar class for testing BaseConfig registration functions.
 */

class Registrar
{
	/**
	 * Override database config
	 *
	 * @return array
	 */
	public static function Pager()
	{
		return [
			'templates' => [
				'files_bootstrap' => 'Amauchar\Medias\Views\themes\metronic\pager',
			],
		];
	}
}
