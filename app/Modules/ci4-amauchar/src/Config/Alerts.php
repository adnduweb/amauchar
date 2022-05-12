<?php namespace Amauchar\Core\Config;

use CodeIgniter\Config\BaseConfig;

class Alerts extends BaseConfig
{
    /**
     * Template to use for HTML output.
     *
     * @var string
     */
    public $template = '\Amauchar\Core\Views\alerts\toast';

    /**
     * Mapping of Session keys to their CSS classes.
     * Note: Some templates may add prefixes to the class,
     * like Bootstrap "alert-{$class}".
     *
     * @var array<string,string>
     */
    public $classes = [
        // Bootstrap classes
        'primary'   => 'primary',
        'secondary' => 'secondary',
        'success'   => 'success',
        'danger'    => 'danger',
        'warning'   => 'warning',
        'info'      => 'info',

        // Additional log levels
        'message'   => 'primary',
        'notice'    => 'secondary',
        'error'     => 'error',
        'critical'  => 'danger',
        'emergency' => 'danger',
        'alert'     => 'warning',
        'debug'     => 'info',

        // Common framework keys
        'messages' => 'primary',
        'errors'   => 'danger',
    ];
}
