<?php

namespace Amauchar\Pages\Controllers\Admin;

use Amauchar\Core\Controllers\Admin\AdminController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Events\Events;
use Amauchar\Pages\Entities\Page;
use Amauchar\Pages\Entities\PageLang;
use Amauchar\Pages\Models\PageModel;
use Amauchar\Pages\Entities\Composer;
use Amauchar\Pages\Models\ComposerModel;
use Amauchar\Medias\Models\MediaModel;
use CodeIgniter\API\ResponseTrait;
use Amauchar\Core\Libraries\Util;
use Amauchar\Core\Traits\ExportTrait;

class PagesController extends AdminController
{

    use ResponseTrait;
    use ExportTrait;

    /**  @var string  */
    protected $viewPrefix = '\Amauchar\Pages\Views\backend\\'.ADMIN_THEME.'\pages\\';

    /**  @var object  */
    public $tableModel = PageModel::class;

    public $dirLang = [];

    public $filterDatabase = false;


    /**
     * Displays a list of available.
     *
     * @return string
     */
    public function index(): string
    {
        theme()->add_js('plugins/custom/datatables/datatables.bundle.js');
        $this->viewData['itemCount'] = model(PageModel::class)->countAllResults();
        $this->viewData['active'] = 'medias';

        return $this->render($this->viewPrefix . 'index', $this->viewData);
    }
    
    /**
	 * Charge Params JS
	 */
	protected function addJsDf(){
		parent::addJsDf();
		$this->viewData['addJsDef']['Medias'] = service('media')->addParamsJs();
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
    
        helper(['tools']);
        $this->viewData['selectLangues'] = true;
        $this->id = $id;
        $this->getPageCurrentProvider();

        $this->viewData['title_detail'] =  $this->object->name;
        $this->viewData['formItem'] = $this->object;
        $this->viewData['itemCount'] = model(PageModel::class)->countAllResults();
        $this->viewData['active'] = 'pages';
        $this->viewData['medias'] = model(MediaModel::class)->where('id !=1')->findAll();
        $composer = model(ComposerModel::class)->where('page_id', $this->object->id)->first();
        $this->viewData['composer'] = (!empty($composer)) ? $composer : new Composer() ;
        // $this->viewData['widgets'] = service('widget')->getAll($this->viewData['composer']);
        

        //print_r($this->object); exit;
         //print_r($this->viewData['widgets']); exit;
         //print_r($this->viewData['composer']->getItems());exit;

        if($this->request->getGet('builderpage')){
            return $this->render($this->viewPrefix . $this->theme . '/\pages\editor', $this->viewData);
        }else{
            return $this->render($this->viewPrefix . 'form', $this->viewData);
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

        $this->viewData['selectLangues'] = true;

        // Initialize form
        $this->viewData['formItem'] = new Page();
        $this->viewData['formItem']->lang = new PageLang();
        $this->viewData['itemCount'] = model(PageModel::class)->countAllResults();
        $this->viewData['groups'] = model(PageModel::class)->findAll();
        $this->viewData['active'] = 'pages';
        return $this->render($this->viewPrefix . 'form', $this->viewData);
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
            alert('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        // Try to create the item
        $page = $this->request->getPost();
        $page['active'] = isset($page['active']) ? $page['active'] : 0;
        $page['display_title'] = isset($page['display_title']) ? $page['display_title'] : 0;
        $page['handle'] = Util::stringCleanUrl($page['lang'][service('request')->getLocale()]['name']);
        if (! $objId = model(PageModel::class)->insert($page, true)) {
            $response = ['errors' => model(PageModel::class)->errors()];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }

        // Success!
        alert('success', lang('Core.resourcesSaved'));
        return redirect()->to(route_to('page.edit',  $objId));

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
            alert('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }


        // try to update the item
        $page = $this->request->getPost();
        $page['active'] = isset($page['active']) ? $page['active'] : 0;
        $page['display_title'] = isset($page['display_title']) ? $page['display_title'] : 0;
        if (! $objId = model(PageModel::class)->save($page, true)) {
            $response = ['errors' => model(PageModel::class)->errors()];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }

         // Success!
        alert('success', lang('Core.resourcesSaved'));
        return redirect()->to(route_to('page.edit', $id));

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
                    $response = ['errors' => [lang('Core.notDeletePermNatif')]];
                    return $this->respond($response, ResponseInterface::HTTP_BAD_REQUEST);  
                } else {
                    $response = ['messages' => ['sucess' => lang('Core.resourcesDeleted')]];
                    return $this->respondDeleted($response, ResponseInterface::HTTP_OK);  
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

     /**
     * Returns the Media provider
     *
     * @return mixed
     */
    protected function getPageCurrentProvider()
    {
        $this->object = model('PageModel')->where([model('PageModel')->primaryKey => $this->id])->first();
        if($this->object){
            $this->object->lang =  $this->object->getPagelangCurrent();
            $this->object->langAll =  $this->object->getPagelangAll();
        }
       
            
    }

    public function updatePage(){

        if ($this->request->isAJAX()) {

            $request = (object)$this->request->getPost();
            //print_r($request); exit;  
            switch ($request->action) {
                case 'activation':
                    
                    $this->page = model(PageModel::class)->where(['id' => $request->id])->first();
  
                    if(!$this->page)
                    return false;

                    if( $this->page->active == 0){
                        $this->page->activate();
                    }else{
                        $this->page->deactivate();
                    }

                    if(!model(PageModel::class)->save($this->page)){
                        return $this->failure(400, 'No page save', true);
                    }

                    // Success!
                    $response = ['messages' => ['sucess' => lang('Core.resourcesSaved')]];
                    return $this->respond($response, ResponseInterface::HTTP_OK);  
                break;
                default:
                    return $this->respondNoContent();
            }
        }
    }

}

