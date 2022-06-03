<?php namespace Amauchar\Pages\Config;

use CodeIgniter\Config\BaseConfig;
use Amauchar\Pages\Menus\BreadcrumbsMenu;

class Menus extends BaseConfig
{
	/**
	 * Menu class aliases.
	 *
	 * @var array<string, string>
	 */
	public $aliases = [
        'mainmenu'  => \Amauchar\Pages\Libraries\MainMenu::class,
		//'breadcrumbs' => BreadcrumbsMenu::class,
	];
}