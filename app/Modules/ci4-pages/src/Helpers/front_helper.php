<?php

if (!function_exists('assetFront')) {
    /**
     * Get the asset path of RTL if this is an RTL request
     *
     * @param $path
     * @param  null  $secure
     *
     * @return string
     */
    function assetFront($path, $webpackMix = true, $type = false) 
    { 

		if (service('Theme')->isDarkModeEnabled()) {
			 $darkPath = str_replace('.bundle', '.'.service('Theme')->getCurrentMode().'.bundle', $path);
            if (file_exists(ROOTPATH .'public/frontend/themes/' . service('settings')->get('App.theme_fo', 'name') . '/'.$darkPath)) {
                return site_url('frontend/themes/' . service('settings')->get('App.theme_fo', 'name') . '/'.$darkPath);
            }
		}else{
			return site_url('frontend/themes/' . service('settings')->get('App.theme_fo', 'name') . '/'.$path);
		}
    }
}