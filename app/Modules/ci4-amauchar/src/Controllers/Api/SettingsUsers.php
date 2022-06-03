<?php


namespace Amauchar\Core\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class SettingsUsers extends ResourceController
{

    public $helpers = ['auth', 'assets', 'setting', 'themes', 'form', 'array', 'alerts'];

    public function darkModeEnabled(){

        $response = json_decode($this->request->getBody());

        if($response->darkModeEnabled){
            $context = 'user:' . user_id();
            $mode = ($response->darkModeEnabled == 'light') ? 0 : 1;
            service('settings')->set('App.modeDark', $mode, $context ); 

            $asset_link_array;
            $atbs;
            foreach (Config('AdminTheme')->assets['css'] as $style) {
                $asset_link_array =  asset_link_array('backend/themes/metronic/' . $style, 'css'); 
                $atbs[str_replace('-', '_', $asset_link_array['name'])] = $asset_link_array['href'];
            }

           $response = [
            'messages' => [
                'sucess' => lang('Core.resourcesSaved')
            ],
            $atbs
        ];
        return $this->respond($response, 200);

        }
    }
}