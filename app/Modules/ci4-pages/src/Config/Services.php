<?php namespace Amauchar\Pages\Config;

use CodeIgniter\Config\BaseService;
use CodeIgniter\Model;
use Amauchar\Pages\Libraries\Theme;
use Amauchar\Pages\Libraries\Shortcode;
use Amauchar\Pages\Libraries\Widget;


class Services extends BaseService
{ 
  
	/**
	 * Return List Theme.
	 *
	 * @param Theme|null $config
	 * @param bool      $getShared
	 *
	 * @return ResetterInterface
	 */
	public static function themefo(Theme $config = null, bool $getShared = true): Theme
	{
		if ($getShared)
		{
			return self::getSharedInstance('themefo', $config);
		}

		$config = $config ?? config(FrontTheme::class);

		return new Theme($config ?? config(FrontTheme::class));
	}


	/**
	 * Return Shortcode.
	 *
	 * @param Shortcode|null $config
	 * @param bool      $getShared
	 *
	 * @return ResetterInterface
	 */
	public static function shortcode(bool $getShared = true): Shortcode
	{
		if ($getShared)
		{
			return self::getSharedInstance('shortcode');
		}

		return new Shortcode();
	}

	/**
	 * Return Shortcode.
	 *
	 * @param Shortcode|null $config
	 * @param bool      $getShared
	 *
	 * @return ResetterInterface
	 */
	public static function widget(bool $getShared = true): Widget
	{
		if ($getShared)
		{
			return self::getSharedInstance('widget');
		}

		return new Widget();
	}

	
}
