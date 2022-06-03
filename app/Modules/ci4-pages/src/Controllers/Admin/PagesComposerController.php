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

class PagesComposerController extends AdminController
{

    use ResponseTrait;


    /**  @var string  */
    protected $viewPrefix = '\Amauchar\Pages\Views\backend\\'.ADMIN_THEME.'\composer\\';

    /**  @var object  */
    public $tableModel = ComposerModel::class;

    public $dirLang = [];

    public $filterDatabase = false;

    public $selectLangues = true;


    /**
     * Displays a list of available.
     *
     * @return string
     */
    public function index(string $id): string
    {
        $this->viewData['itemCount'] = model(PageModel::class)->countAllResults();
        $this->viewData['active'] = 'composer';

        $this->id = $id;
        $this->getPageCurrentProvider();

        $this->viewData['title_detail'] =  $this->object->name;
        $this->viewData['formItem'] = $this->object;
        $this->viewData['medias'] = model(MediaModel::class)->where('id !=1')->findAll();
        $composer = model(ComposerModel::class)->where(['page_id' => $this->object->id, 'lang' => service('request')->getLocale()])->first();
        $this->viewData['composer'] = (!empty($composer)) ? $composer : new Composer() ;
        //$this->viewData['widgets'] = service('widget')->getAll($this->viewData['composer']);
        //print_r($this->viewData['composer']->getItems()); exit;

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
     * Update item details.
     *
     * @param string $itemId
     *
     * @return RedirectResponse
     */
    public function update( string $id): RedirectResponse
    {
        //print_r($this->request->getPost()); exit;
//
        helper('string');
        $page = $this->request->getPost();

        if(isset($page['builder'])){
            // Builder
            if (! $menuId = model(ComposerModel::class)->saveComposer($page, true)) {
                alert('error', model(ComposerModel::class)->errors(), lang('Core.warning_error'));
                return redirect()->back()->withInput();
            }
        } 

         // Success!
        alert('success', lang('Core.resourcesSaved'));
        return redirect()->to(route_to('page.composer.index', $page['id']));

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
    public function storeComposer(int $id){

       // if ($this->request->isAJAX()) {

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

        //}
    }


    public function deleteComposerItem(){

        if ($this->request->isAJAX()) {
            //$ids = $this->request->getRawInput('id');
            $response = json_decode($this->request->getBody());

            $builder = model(ComposerModel::class)->getComposer($response->page_id);

            if(!empty($builder)){
                $builderTemp = $builder->getItems();
                foreach ($builderTemp as $k => &$item){
                    //print_r($item);
                    unset($builderTemp[$response->key]);
                }
            }

            // print_r($builderTemp); 
            // exit;

            if (!model(ComposerModel::class)->saveComposerItems($builderTemp, $response->page_id)) {
                $response = ['errors' => model(ComposerModel::class)->errors()];
                return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            } else {
                $response = ['messages' => ['success' => lang('Core.resourcesDeleted')]];
                return $this->respondDeleted($response, ResponseInterface::HTTP_OK);  
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

}

