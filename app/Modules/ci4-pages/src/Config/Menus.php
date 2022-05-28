<?php namespace Adnduweb\Pages\Config;

use CodeIgniter\Config\BaseConfig;
use Adnduweb\Pages\Menus\BreadcrumbsMenu;

class Menus extends BaseConfig
{
	/**
	 * Menu class aliases.
	 *
	 * @var array<string, string>
	 */
	public $aliases = [
        'mainmenu'  => \Adnduweb\Pages\Libraries\MainMenu::class,
		//'breadcrumbs' => BreadcrumbsMenu::class,
	];
}