<?php

namespace Amauchar\Core\Controllers\Admin;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Amauchar\Core\Controllers\Admin\AdminController;
use CodeIgniter\CodeIgniter;

/**
 * Class DashboardController
 *
 * A generic controller to handle Authentication Actions.
 */
class InformationsController extends AdminController
{

    use ResponseTrait;

    protected $viewPrefix = '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\informations\\';

    protected $helpers    = ['error'];

    /**
     * Displays the form the login to the site.
     */
    public function index()
    {

        global $app;
        $db = db_connect();

        helper('filesystem');
        helper('number');

        $this->viewData['ciVersion']  = CodeIgniter::CI_VERSION;
        $this->viewData['dbDriver']  = $db->DBDriver;
        $this->viewData['dbVersion']  = $db->getVersion();
        $this->viewData['serverLoad'] = function_exists('sys_getloadavg')?current(sys_getloadavg()):null;

        return $this->render($this->viewPrefix . 'index', $this->viewData);
    }

     /**
     * Displays Detailed PHP Info
     */
    public function phpInfo()
    {
        echo phpinfo();
    }

    public function initPageHeaderToolbar()
    {
        parent::initPageHeaderToolbar();
        $this->pageHeaderToolbarBtn = [];
    }

}
