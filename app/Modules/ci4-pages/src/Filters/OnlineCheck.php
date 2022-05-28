<?php namespace Adnduweb\Pages\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class OnlineCheck implements FilterInterface
{
    /**
     * Checks the App.siteOnline setting. If not `true`, will
     * stop script execution and display the Site Offline page.
     * This view is expected to be found in:
     *      app/Views/errors/offline.php
     *
     * @param array|null $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! function_exists('logged_in'))
		{
			helper('auth');
		}

        
		$current = (string)current_url(true)
        ->setHost('')
        ->setScheme('')
        ->stripQuery('token');

        if(!in_array(CI_AREA_ADMIN, service('request')->getUri()->getSegments()) && !in_array((string)$current, [route_to('site-adw-offline')])){
            if ( service('settings')->get('App.core', 'ModeMaintenance') == true) {
                $user = user();

                if ($user !== null && ! inGroups(1, $user->id) && ! has_permission('site.viewOffline')) {
                      return redirect()->to(route_to('site-adw-offline'));
                }
            }
        }
        if ( service('settings')->get('App.core', 'ModeMaintenance') == false) {
            if(!in_array(CI_AREA_ADMIN, service('request')->getUri()->getSegments()) && in_array((string)$current, [route_to('site-adw-offline')])){
                return redirect()->to('/');
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param array|null $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
