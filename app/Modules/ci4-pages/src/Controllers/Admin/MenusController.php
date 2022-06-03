<?php

namespace Amauchar\Pages\Controllers\Admin;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Adnduweb\Ci4Admin\Libraries\Theme;
use Amauchar\Pages\Entities\Menu;
use Amauchar\Pages\Models\MenuModel;
use CodeIgniter\API\ResponseTrait;

class MenusController extends \Adnduweb\Ci4Admin\Controllers\BaseAdminController
{

    use ResponseTrait;

    /**  @var string  */
    protected $table = 'menus';

    /**  @var string  */
    protected $className = 'Menu';

    /**  @var string  */
    public $path = "\Adnduweb\Ci4Pages";

    /**  @var string  */
    protected $viewPrefix = 'Amauchar\Pages\Views\backend\themes\\';

    /**  @var string  */
    public $category  = '';

    /**  @var object  */
    public $tableModel = MenuModel::class;

    public $module;


    public function renderView($id = null)
    {

        helper('menu');

        //Theme::add_js('plugins/custom/tinymce/tinymce.bundle.js');
        Theme::add_js('https://cdn.jsdelivr.net/npm/nested-sort/dist/nested-sort.umd.min.js');
        https://cdn.jsdelivr.net/npm/nested-sort/dist/nested-sort.umd.min.js
        
        $this->viewData['menu_main']         = $this->tableModel->getMenuMain($id);
        if (empty($this->viewData['menu_main'])) {
            Theme::set_message('danger', lang('Core.item_no_exist'), lang('Core.warning_error'));
            return redirect()->to($this->path_redirect . '/' . $id);
        }
        $edit = $this->request->getGet('edit');

        $this->viewData['menu_item'] = new Menu();
        if(!empty($edit)){
            $this->viewData['menu_item'] = $this->tableModel->getMenuItem($edit);
        }
        $this->viewData['menu'] = $this->tableModel->getMenuAdmin($id);
        $this->viewData['menu_items'] = $this->tableModel->getMenusMains();
        return $this->render($this->viewPrefix . $this->theme . '\menus\index', $this->viewData);
    }

    /**
     * Save item details.
     *
     * @param string $itemId
     *
     * @return RedirectResponse
     */
    public function save( string $id): RedirectResponse
    {
        
        helper('string');
        // validate
        $this->rules = [
            'lang.'.service('request')->getLocale() . '.name'         => 'required',
            'lang.'.service('request')->getLocale() . '.slug' => 'required',
        ];

        if (!$this->validate($this->rules)) {
            Theme::set_message('error', $this->validator->getErrors(), lang('Core.warning_error'));
            return redirect()->back()->withInput();
        }


        // try to update the item
        $menu = $this->request->getPost();
        $menu['active'] = isset($menu['active']) ? $menu['active'] : 0;
        if (! $menuId = model(MenuModel::class)->save($menu, true)) {
            Theme::set_message('error', model(MenuModel::class)->errors(), lang('Core.warning_error'));
            return redirect()->back()->withInput();
        }

         // Success!
         Theme::set_message('success', lang('Core.saved_data'), lang('Core.cool_success'));
         return redirect()->to($this->path_redirect . '/' . $id);
    }


    /**
     * Delete the item (soft).
     *
     * @param string $itemId
     *
     * @return RedirectResponse
     */
    public function deleteItem(int $id_menu ) : ResponseInterface
    {
        $this->tableModel->deleteItem($id_menu);

        Theme::set_message('success', lang('Core.delete_data'), lang('Core.cool_success'));
        return redirect()->to($this->path_redirect . '/1');
    }


    /**
     * SortMenu
     * 
     * @return RedirectResponse
     *  : ResponseInterface
     */
    public function sortMenu(int $id_menu_main )
    {

        if ($this->request->isAJAX()) {

            $response = json_decode($this->request->getBody());
            //print_r($response); exit;
            $data = $response->data; 

            $error = [];
            if (is_array($data)) {
                foreach ($data as $v) {

                    $menu = model(MenuModel::class)->find($v->id);

                    $menu->position = $v->order; 
                    $menu->id_parent = isset($v->parent) ? $v->parent : '0'; 

                    //print_r($menu); exit;

                    if (!model(MenuModel::class)->save($menu)) {
                        $error[] = model(MenuModel::class)->errors();
                    }

                }
            }

            if (count($error) > 0) {
                return $this->getResponse(['error' => lang('Core.une erreur est survenue') .  ' : ' . print_r($error, true)], 500);
            } else {
                return $this->getResponse(['success' => lang('Core.cool_success')], 200);
            }
        }

    }
}