<?php namespace Adnduweb\Pages\Config;

use Config\Filters;
use \Adnduweb\Pages\Filters\MenusFilter;
use \Adnduweb\Pages\Filters\OnlineCheck;
use \Adnduweb\Pages\Filters\ConsentFilter;
use \Adnduweb\Pages\Filters\ShortcodesFilter;
use \Tatter\Alerts\Filters\AlertsFilter;

/**
 * @var Filters $filters
 */
$filters->aliases['alerts'] = AlertsFilter::class;
$filters->aliases['menus'] = MenusFilter::class;
$filters->aliases['online'] = OnlineCheck::class;
$filters->aliases['consent'] = ConsentFilter::class;
$filters->aliases['shortcodes'] = ShortcodesFilter::class;
$filters->globals['before'] = array_merge(['online'], $filters->globals['before']);
//$filters->globals['after'] = ['toolbar','menus', 'alerts', 'consent' => ['except' => CI_AREA_ADMIN . '*'],];
$filters->globals['after'] = ['toolbar','menus', 'alerts', 'shortcodes'];