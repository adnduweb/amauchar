<?php

namespace Amauchar\Core\Controllers\Admin;

use Amauchar\Core\Controllers\Admin\AdminController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;

class PermissionsController extends AdminController
{

    use ResponseTrait;

    /**  @var string  */
    protected $viewPrefix = '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\permissions\\';

    /**  @var object  */
    public $tableModel = null;

    public $filterDatabase = true;

    public $allow_export = true;

    protected $group;

    protected $helpers    = ['error'];
    /**
     * Displays a list of available.
     *
     * @return string
     */
    public function index(): string
    {
        $permissions = setting('AuthGroups.permissions');
        asort($permissions);

        $this->viewData['permissions'] = $permissions;

        return $this->render($this->viewPrefix . 'index', $this->viewData);
    }

}
