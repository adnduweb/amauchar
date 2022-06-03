<?php

namespace Amauchar\Pages\Config;

use Tatter\Alerts\Config\Alerts as TatterAlerts;

class Alerts extends TatterAlerts
{
    /**
     * Template to use for HTML output.
     *
     * @var string
     */
    public $template = '\Themes\frontend\default\_partials\alerts';
}
