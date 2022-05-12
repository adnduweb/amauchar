<?php

namespace Amauchar\Core\Controllers\Admin;

use Amauchar\Core\Controllers\Admin\AdminController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Amauchar\Core\Entities\Group;
use Amauchar\Core\Models\GroupModel;
use CodeIgniter\Shield\Authorization\Groups;
use CodeIgniter\API\ResponseTrait;

class GroupsController extends AdminController
{

    use ResponseTrait;

    /**  @var string  */
    protected $viewPrefix = '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\groups\\';

    /**  @var object  */
    public $tableModel = GroupModel::class;

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
        theme()->add_js('plugins/custom/datatables/datatables.bundle.js');
        return $this->render($this->viewPrefix . 'index', $this->viewData);
    }

      /**
     * Function datatable.
     *
     * @return CodeIgniter\Http\Response
     */
    public function ajaxDatatable(): ResponseInterface
    {
        if ($this->request->isAJAX()) {
            $data = [];
            $start = $this->request->getVar('start');
            $length = $this->request->getVar('length');
            $search = $this->request->getVar('search[value]');
            $order = $this->tableModel::ORDERABLE[$this->request->getVar('order[0][column]')];
            $dir = $this->request->getVar('order[0][dir]');

            $groups = setting('AuthGroups.groups');
            asort($groups);
    
            // Find the number of users in this group
            $i = 0;
            foreach ($groups as $alias => &$group) {
                $data[$i] = $group;
                $data[$i]['alias'] = $alias;
                $data[$i]['user_count'] = db_connect()
                    ->table('auth_groups_users')
                    ->where('group', $alias)
                    ->countAllResults(true);
                $i++;
            }
            //asort($data);
           return $this
            ->response
            ->setStatusCode(200)
            ->setJSON([
                'draw'            => $this->request->getVar('draw'),
                'recordsTotal'    => count($data),
                'recordsFiltered' => count($data),
                'data'            => $data, 
                '_token'           => csrf_hash()
            ]);

        }

        return $this->respond(['success' => lang('Core.noContent')], ResponseInterface::HTTP_NO_CONTENT);
    }

    /**
     * Allows the user to choose the permissions for a group.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|string
     */
    public function show(string $alias)
    {

        if (! auth()->user()->can('groups.edit')) {
            alert('error', lang('Core.notAuthorized'));
            return redirect()->back();
        }

        $this->viewData['alias'] = $alias;
        $this->viewData['group'] = setting('AuthGroups.groups')[$alias];
        $this->viewData['pageTitleDefault'] = lang('Core.EditGroupsAndPermission') . ' : ' . ucfirst($alias) ;

        if (empty($this->viewData['group'])) {
            return redirect()->back()->with('error', lang('Bonfire.resourceNotFound', ['user group']));
        }

        $this->permissions($alias);

        return $this->render($this->viewPrefix . 'form', $this->viewData);

    }

    /**
     * Save the group settings
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|void
     */
    public function saveGroup()
    {
        if ($this->request->isAJAX()) {

            $alias = $this->request->getPost('alias');

            if (! auth()->user()->can('groups.edit')) {
                $response = ['errors' => lang('Core.notAuthorized')];
                return $this->respond($response, ResponseInterface::HTTP_UNAUTHORIZED);
            }

            $group = setting('AuthGroups.groups')[$alias];

            if (empty($group)) {
                $response = ['errors' => lang('Core.resourceNotFound', ['user group'])];
                return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            }

            // Validate
            $rules = [
                'title'       => 'required|string',
                'description' => 'permit_empty|string',
            ];

            if (! $this->validate($rules)) {
                $response = ['errors' => $this->validator->getErrors()];
                return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            }

            // Save the settings
            $groupConfig         = setting('AuthGroups.groups');
            $groupConfig[$alias] = [
                'title'       => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
            ];

            setting('AuthGroups.groups', $groupConfig);

           // Success!
           $response = [
            'messages' => [
                'sucess' => lang('Core.resourcesSaved')
                ]
            ];

            return $this->respond($response, ResponseInterface::HTTP_OK);
        }
    }

     /**
     * Displays a list of all Permissions for a single group
     *
     * @return RedirectResponse|string
     */
    public function permissions(string $groupName)
    {
        $groups = new Groups();
        $group  = $groups->info($groupName);
        if ($group === null) {
            $response = ['errors' => lang('Core.resourceNotFound', ['user group'])];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }

        $permissions = setting('AuthGroups.permissions');
        if (is_array($permissions)) {
            ksort($permissions);
        }

        $this->viewData['groupPermission'] = $group;
        $this->viewData['permissions'] = $permissions;
        
    }

    /** 
     * Updates the permissions for a single group.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function savePermissions()
    {
        $alias = $this->request->getPost('alias');

        $groups = new Groups();
        $group  = $groups->info($alias);
        if ($group === null) {
            $response = ['errors' => lang('Core.resourceNotFound', ['user group'])];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }

        $group->setPermissions($this->request->getPost('permissions') ?? []);

        // Success!
        $response = [
            'messages' => [
                'sucess' => lang('Core.resourcesSaved')
                ]
            ];

            return $this->respond($response, ResponseInterface::HTTP_OK);
    }

    public function initPageHeaderToolbar()
    {
        if(service('router')->methodName() == 'show' ){
            $this->pageHeaderToolbarBtn['back'] = [
                'color' => 'secondary',
                'href'  => site_url(route_to('groups.index')),
                'svg'   => theme()->getSVG("icons/duotone/Navigation/Arrow-from-right.svg", "svg-icon-5 svg-icon-gray-500 me-1"),
                'desc'  => lang('Core.BackToList'),
             ];
        }
    }

}
