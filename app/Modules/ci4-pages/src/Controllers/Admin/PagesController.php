<?php

namespace Adnduweb\Pages\Controllers\Admin;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Adnduweb\Ci4Admin\Libraries\Theme;
use Adnduweb\Pages\Entities\Page;
use Adnduweb\Pages\Models\PageModel;
use Adnduweb\Pages\Entities\Composer;
use Adnduweb\Pages\Models\ComposerModel;
use Adnduweb\Ci4Medias\Models\MediaModel;
use Adnduweb\Ci4Core\Traits\ExportData;
use CodeIgniter\API\ResponseTrait;

class PagesController extends \Adnduweb\Ci4Admin\Controllers\BaseAdminController
{

    use ResponseTrait;
    use ExportData;

    /**  @var string  */
    protected $table = "pages";

    /**  @var string  */
    protected $className = "Page";

    /**  @var string  */
    public $path = "\Adnduweb\Ci4Pages";

    /**  @var string  */
    protected $viewPrefix = 'Adnduweb\Pages\Views\backend\themes\\';

    /**  @var string  */
    public $category  = '';

    /**  @var object  */
    public $tableModel = PageModel::class;

    /**  @var string  */
    public $identifier_name = 'name'; 

    /** @var bool */
    public $filterDatabase = false;

     /** @var bool */
     public $stopConcurrentOperations = true;


    /**
     * Displays a list of available.
     *
     * @return string
     */
    public function index(): string
    {
        Theme::add_js('plugins/custom/datatables/datatables.bundle.js');
        parent::index();
        $this->viewData['lists'] = model(PageModel::class)->countAllResults();
		$this->viewData['active'] = 'medias';

        return $this->render($this->viewPrefix . $this->theme . '/\pages\index', $this->viewData);
    }

      /**
	 * Charge Params JS
	 */

	protected function initParamJs(){
		parent::initParamJs();
		$this->viewData['paramJs']['Medias'] = service('media')->addParamsJs();
	}

    /**
     * Shows details for one item.
     *
     * @param string $itemId
     *
     * @return string
     */
    public function edit(string $id): string
    {
        parent::edit($id);

        //$this->display_notice();
        Theme::add_js('plugins/custom/tinymce/tinymce.bundle.js');
        Theme::add_js('plugins/custom/tinymce/plugins/code/plugin.bundle.js');      

        helper(['tools']);

        $this->viewData['title_detail'] =  $this->object->name  . ' - ' .  $this->object->description;
        $this->viewData['form'] = $this->object;
        $this->viewData['medias'] = model(MediaModel::class)->where('id !=1')->findAll();
        $composer = model(ComposerModel::class)->where('page_id', $this->object->id)->first();
        $this->viewData['composer'] = (!empty($composer)) ? $composer : new Composer() ;
        $this->viewData['widgets'] = service('widget')->getAll($this->viewData['composer']);
        

         //print_r($this->viewData['widgets']); exit;
         //print_r($this->viewData['composer']->getItems());exit;

        if($this->request->getGet('builderpage')){
            return $this->render($this->viewPrefix . $this->theme . '/\pages\editor', $this->viewData);
        }else{
            return $this->render($this->viewPrefix . $this->theme . '/\pages\form', $this->viewData);
        }

        

    }

    /**
     * Displays the form for a new item.
     *
     * @return string
     */
    public function new(): string
    {
        helper('tools');
        Theme::add_js('plugins/custom/tinymce/tinymce.bundle.js');

        // Initialize form
        $this->viewData['form'] = new Page();

        return $this->render($this->viewPrefix . $this->theme . '/\pages\form', $this->viewData);
    }

    /**
     * Creates a item from the new form data.
     *
     * @return RedirectResponse
     */
    public function create(): RedirectResponse
    {

        // validate
        $creations = new PageModel();
        $this->rules = [
            'lang.'.service('request')->getLocale() . '.name'         => 'required',
            'lang.'.service('request')->getLocale() . '.slug' => 'required',
        ];
        if (!$this->validate($this->rules)) {
            Theme::set_message('error', $this->validator->getErrors(), lang('Core.warning_error'));
            return redirect()->back()->withInput();
        }

        // Try to create the item
        $page = $this->request->getPost();
        $page['active'] = isset($page['active']) ? $page['active'] : 0;
        $page['display_title'] = isset($page['display_title']) ? $page['display_title'] : 0;
        $page['handle'] = uniforme($page['lang'][service('request')->getLocale()]['name']);
        if (! $pageId = model(PageModel::class)->insert($page, true)) {
            Theme::set_message('error', model(PageModel::class)->errors(), lang('Core.warning_error'));
            return redirect()->back()->withInput();
        }

    
          // Success!
          Theme::set_message('success', lang('Core.saved_data'), lang('Core.cool_success'));
          return redirect()->to($this->path_redirect . '/edit/' . $pageId  . '?token=' . $this->token );

    }

   /**
     * Update item details.
     *
     * @param string $itemId
     *
     * @return RedirectResponse
     */
    public function update( string $id): RedirectResponse
    {
         //print_r($this->request->getPost()); exit;

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
        $page = $this->request->getPost();
        $page['active'] = isset($page['active']) ? $page['active'] : 0;
        $page['display_title'] = isset($page['display_title']) ? $page['display_title'] : 0;
        if (! $menuId = model(PageModel::class)->save($page, true)) {
            Theme::set_message('error', model(PageModel::class)->errors(), lang('Core.warning_error'));
            return redirect()->back()->withInput();
        }

        // Builder
        if (! $menuId = model(ComposerModel::class)->saveComposer($page, true)) {
            Theme::set_message('error', model(PageModel::class)->errors(), lang('Core.warning_error'));
            return redirect()->back()->withInput();
        }
            cache()->delete('page-'.$page['lang'][service('request')->getLocale()]['slug']);
         // Success!
         Theme::set_message('success', lang('Core.saved_data'), lang('Core.cool_success'));
         return redirect()->to($this->path_redirect . '/edit/' . $id);

    }

      /**
     * Update item details. https://www.positronx.io/codeigniter-rest-api-tutorial-with-example/
     * 
     *
     * @return RedirectResponse
     */
    public function updateAjax(): ResponseInterface
    {
        parent::updateAjax();

        switch ($this->object->id) {
            case $this->object->id == 1:
                return $this->getResponse(['error' => lang('Core.not_desactivate_home')], 403);
                break;
        }
 
        if($this->object->active == 0){
            $this->object->activate();
        }else{
            $this->object->deactivate();
        }

        if(!model(PageModel::class)->save($this->object)){
            return $this->failure(400, 'No page save', true);
        }

        return $this->getResponse(['success' => 'page updated successfully'], 200);
        
    }


    /**
     * Delete the item (soft).
     *
     * @param string $itemId
     *
     * @return RedirectResponse
     */
    public function delete() : ResponseInterface
    {

        //print_r($this->request->getRawInput('id')); exit;

        if ($this->request->isAJAX()) {

            //$ids = $this->request->getRawInput('id');
            $response = json_decode($this->request->getBody());
            //print_r($response); exit;
            if(!is_array($response->id))
                return false; 

                //print_r($rawInput['id']); exit;
                $isNatif = false;
                foreach ($response->id as $key => $id) {

                    $isNatif = PageModel::getNatifById($id);

                    if($isNatif == '1'){
                        $isNatif = true;
                        break;
                    }

                    $this->tableModel->delete(['id' => $id]);
                }

                if ($isNatif == true) {
                    return $this->getResponse(['error' => lang('Core.not_delete_perm_natif')], 401);
                } else {
                    return $this->getResponse(['success' => lang('Core.your_selected_records_have_been_deleted')], 200);
                }
        
        }
        return $this->respondNoContent();
       
    }

    
	 /**
     * Displays a setting of available.
     *
     * @return string
     */
    public function settings(): string
    {
        $this->viewData['lists'] = model(PageModel::class)->countAllResults();
		$this->viewData['active'] = 'settings';

        return $this->render($this->viewPrefix . $this->theme .'/\pages\settings\index', $this->viewData);
	}
	
	 /**
     * Store a newly created resource in storage.
     */
    public function saveSettings()
    {

        if ($consent =  $this->request->getPost('consent')) {

            (!isset($consent['requireConsent']))   ? $consent['requireConsent']   = 0 :  $consent['requireConsent']   = true;			

            foreach ($consent as $k => $v) {
                
                service('settings')->set('Pages.consent', $v, $k);
            }
		}

        // Success!
        Theme::set_message('success', lang('Core.save_data'), lang('Core.cool_success'));

        //echo '/' . CI_AREA_ADMIN . '/' . $this->category . '/' . $this->table; exit;
        return redirect()->to('/' . CI_AREA_ADMIN . '/' . $this->category . '/' . $this->table)->with('success', lang('Users.newWorkflowSuccess'));

    }
    
     /**
     * Store a newly created resource in storage.
     */
    public function loadBuilder(int $id){

        if ($this->request->isAJAX()) {

            $builder = model(PageModel::class)->getPageBuilder($id);
            if(!empty($builder)){
                return $this->getResponse(['success' => lang('Core.load_data')], 200, 
                [
                    'html'       => $builder->html,
                    'components' => $builder->components,
                    'assets'     => $builder->assets,
                    'css'        => $builder->css,
                    'styles'     => $builder->styles
                    ]);
            }

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeBuilder(int $id){

        if ($this->request->isAJAX()) {

            //$ids = $this->request->getRawInput('id');
            $response = (array) json_decode($this->request->getBody());
           // print_r( $response); exit;
            $builder = model(PageModel::class)->getPageBuilder($id);
            if(empty($builder)){

                $data['page_id']    = $id;
                $data['lang']       = service('request')->getLocale();
                $data['html']       = $response['gjs-html'];
                $data['components'] = $response['gjs-components'];
                $data['assets']     = $response['gjs-assets'];
                $data['css']        = $response['gjs-css'];
                $data['styles']     = $response['gjs-styles'];
                $data['created_at']    = date('Y-m-d H:i:s');

                if (!model(PageModel::class)->insertBuilder($data)) {
                    return $this->failure(400, 'No page save', true);
                }

            }else{

                $data['page_id']    = $id;
                $data['lang']       = service('request')->getLocale();
                $data['html']       = $response['gjs-html'];
                $data['components'] = $response['gjs-components'];
                $data['assets']     = $response['gjs-assets'];
                $data['css']        = $response['gjs-css'];
                $data['styles']     = $response['gjs-styles'];
                $data['updated_at']    = date('Y-m-d H:i:s');

                if (!model(PageModel::class)->updateBuilder($data, $builder->id)) {
                    return $this->failure(400, 'No page save', true);
                }

            }

        }
    }


    public function deleteComposerItem(){

        if ($this->request->isAJAX()) {
            //$ids = $this->request->getRawInput('id');
            $response = json_decode($this->request->getBody());

            $builder = model(ComposerModel::class)->getComposer($response->page_id);

            if(!empty($builder)){
                $builderTemp = $builder->getItems();
                foreach ($builderTemp as &$item){
                    //print_r($item);
                    unset($item[$response->key]);
                }
            }

            // print_r($builderTemp); 
            // exit;

            if (!model(ComposerModel::class)->saveComposerItems($builderTemp, $response->page_id)) {
                return $this->getResponse(['error' => lang('Core.error')], 500);
            } else {
                return $this->getResponse(['success' => lang('Core.delete_data')], 200);
            }

        }
    }

}

