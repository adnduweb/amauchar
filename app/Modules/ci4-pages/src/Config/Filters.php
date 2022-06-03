<?php namespace Amauchar\Pages\Config;

use Config\Filters;
use \Amauchar\Pages\Filters\MenusFilter;
use \Amauchar\Pages\Filters\OnlineCheck;
use \Amauchar\Pages\Filters\ConsentFilter;
use \Amauchar\Pages\Filters\ShortcodesFilter;
//use \Tatter\Alerts\Filters\AlertsFilter;

/**
 * @var Filters $filters
 */
//$filters->aliases['alerts'] = AlertsFilter::class;
$filters->aliases['menus'] = MenusFilter::class;
$filters->aliases['online'] = OnlineCheck::class;
$filters->aliases['consent'] = ConsentFilter::class;
$filters->aliases['shortcodes'] = ShortcodesFilter::class;
$filters->globals['before'] = array_merge(['online'], $filters->globals['before']);
//$filters->globals['after'] = ['toolbar','menus', 'alerts', 'consent' => ['except' => CI_AREA_ADMIN . '*'],];
// $filters->globals['after'] = ['toolbar','menus', 'shortcodes'];