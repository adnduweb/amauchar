<?php namespace Amauchar\Pages\Libraries;

 class Shortcode
{

    public function __construct(){
		
	}

	public function render(object $instance, string $module, $view, $options)
    {
        $all = $instance->getAllInstance();

        return view('Adnduweb\Ci4'.plural($module).'\Views\frontend\themes\\'.service('settings')->get('App.theme_fo', 'name').'\_widgets\widget_' .$view, ['items' => $all, 'options' => $options]);
	}

}
