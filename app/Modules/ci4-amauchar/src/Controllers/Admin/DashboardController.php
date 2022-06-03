<?php

namespace Amauchar\Core\Controllers\Admin;

use Amauchar\Core\Controllers\Admin\AdminController;

/**
 * Class DashboardController
 *
 * A generic controller to handle Authentication Actions.
 */
class DashboardController extends AdminController
{
    /**
     * Displays the form the login to the site.
     */
    public function indexView()
    {

        //print_r($this->viewData); exit;
        //print_r(setting('Amauchar.views')); exit;
         echo view(setting('Amauchar.views')['dashboard'], $this->viewData);

       // echo $this->render(setting('Amauchar.views')['dashboard'], $this->viewData);
    }
}
//service('settings')->set('App.siteName', 'My Great Site');