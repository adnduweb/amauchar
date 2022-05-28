<?php namespace Adnduweb\Pages\Config;

use CodeIgniter\Model;
use Adnduweb\Pages\Libraries\Theme;
use Adnduweb\Pages\Libraries\Shortcode;
use Adnduweb\Pages\Libraries\Widget;
use Config\Services as BaseService;

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
	public static function theme_fo(Theme $config = null, bool $getShared = true): Theme
	{
		if ($getShared)
		{
			return self::getSharedInstance('theme_fo', $config);
		}

		$config = $config ?? config(ThemeFo::class);

		return new Theme($config ?? config(ThemeFo::class));
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
