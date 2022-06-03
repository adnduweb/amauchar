<?php

namespace Amauchar\Core\Config;

use Amauchar\Core\Amauchar;
use Amauchar\Core\View\View;
use Amauchar\Core\View\Theme;
use CodeIgniter\Config\BaseService;
use Config\Services as AppServices;
use Config\View as ViewConfig;
use Amauchar\Core\Config\AdminTheme as AdminTheme;
use Amauchar\Core\Libraries\Util;
use Amauchar\Core\Libraries\Audits;
use Amauchar\Core\Config\Audits as AuditsConfig;
use Amauchar\Core\Libraries\Mail;
use Amauchar\Core\Libraries\Module;


/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{


	/**
     * The Renderer class is the class that actually displays a file to the user.
     * The default View class within CodeIgniter is intentionally simple, but this
     * service could easily be replaced by a template engine if the user needed to.
     *
     * @return View
     */
    public static function renderer(?string $viewPath = null, ?ViewConfig $config = null, bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('renderer', $viewPath, $config);
        }

        $viewPath = $viewPath ?: config('Paths')->viewDirectory;
        $config ??= config('View');

        return new View($config, $viewPath, AppServices::locator(), CI_DEBUG, AppServices::logger());
    }
  
    /**
     * Core utility class for Amauchar's system.
     *
     * @return Amauchar|mixed
     */
    public static function amauchar(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('amauchar');
        }

        return new Amauchar();
    }
    
    /**
     * Returns the system menu manager
     *
     * @return Amauchar\Core\Libraries\Menus\Manager|mixed
     */
    public static function menus(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('menus');
        }

        return new \Amauchar\Core\Libraries\Menus\Manager();
    }
	
	 /**
     * Core utility class for Util's system.
     *util
     * @return Util|mixed
     */
    public static function util(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('util');
        }

        return new Util();
    }

    	/**
	 * Return List AdminTheme.
	 *
	 * @param AdminTheme|null $config
	 * @param bool      $getShared
	 *

	 */
	public static function theme(AdminTheme $config = null, bool $getShared = true): Theme
	{
		if ($getShared)
		{
			return self::getSharedInstance('theme', $config);
		}

		$config = $config ?? config(AdminTheme::class);

		return new Theme($config ?? config(AdminTheme::class));
    }

    /**
	 * @param AuditsConfig|null $config
	 * @param bool $getShared
	 *
	 * @return Audits
	 */
    public static function audits(AuditsConfig $config = null, bool $getShared = true): Audits
    {
		if ($getShared)
		{
			return static::getSharedInstance('audits', $config);
		}

		// If no config was injected then load one
		if (empty($config))
		{
			$config = config('Audits');
		}

		return new Audits($config);
    }
    
    
	public static function mail(bool $getShared = true)
    {
		if ($getShared):
			return static::getSharedInstance('mail');
		endif;

		return new Mail();
    }
    
    /**
	 * Return List Theme.
	 *
	 * @param Module|null $config
	 * @param bool      $getShared
	 *
	 * @return ResetterInterface
	 */
	public static function module(Modules $config = null, bool $getShared = true): Module
	{
		if ($getShared)
		{
			return self::getSharedInstance('module', $config);
		}

		$config = $config ?? config(Modules::class);

		return new Module($config ?? config(Modules::class));
	}

}
