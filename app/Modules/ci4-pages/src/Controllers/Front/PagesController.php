<?php

namespace Amauchar\Pages\Controllers\Front;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Amauchar\Pages\Entities\Page;
use Amauchar\Pages\Models\PageModel;
use Amauchar\Pages\Entities\Composer;
use Amauchar\Pages\Models\ComposerModel;
use Amauchar\Pages\Models\FormContactModel;
use Amauchar\Pages\Libraries\Theme;

class PagesController extends  \Amauchar\Pages\Controllers\BaseFrontController
{

     /**  @var string  */
     protected $table = "pages";

     /**  @var string  */
     protected $className = "Page";
 
     /**  @var string  */
     public $path = "\Adnduweb\Ci4Pages";
 
     /**  @var string  */
     protected $viewPrefix = 'Amauchar\Pages\Views\frontend\themes\\';
 
     /**  @var string  */
     public $category  = '';
 
     /**  @var object  */
     public $tableModel = PageModel::class;
     

    /**
     * Displays a Homepage.
     *
     * @return string
     */
    public function index(): string
	{
        
        Theme::add_css(['plugins/owlcarousel/assets/owl.carousel.min.css', 'plugins/owlcarousel/assets/owl.theme.default.min.css']);
        Theme::add_js(['plugins/owlcarousel/assets/owl.carousel.js']);
		$this->viewData['page'] = $this->tableModel->getPageHome(1);

		$this->viewData['meta_title']  = $this->viewData['page']->meta_title;
        $this->viewData['meta_description']  =  $this->viewData['page']->meta_description;
        
        $codeurAvis = file_get_contents(WRITEPATH.'uploads/codeur_avis.json');
		$codeurAvis = json_decode($codeurAvis);	  
        $this->viewData['codeurAvis'] = $codeurAvis->ratings;

        return $this->render($this->viewPrefix . $this->theme . '/\home', $this->viewData);
	}


	 /**
     * Displays a list page of available.
     *
     * @return string
     */
    public function item(): string
	{
        helper('form');
        if (! $page = cache('page-' . $this->request->uri->getPath())) {
               
            $this->viewData['page'] = $this->tableModel->getPage($this->request->uri->getPath());
            if(empty($this->viewData['page'])){
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
            $composer = model(ComposerModel::class)->where('page_id', $this->viewData['page']->id)->first();
            $this->viewData['composer'] = (!empty($composer)) ? $composer : new Composer() ;
            //print_r($this->viewData['composer']);exit;

           
            
            $this->viewData['meta_title']  = $this->viewData['page']->meta_title;
            $this->viewData['meta_description']  =  $this->viewData['page']->meta_description;

            $file = APPPATH . 'Modules/ci4-pages/src/Views/frontend/themes/'.$this->theme.'/' . $this->viewData['page']->getSlug() . '.php';

            cache()->save('page-' . $this->request->uri->getPath(), $this->viewData, 60000000);
            $page = $this->viewData;
        }

        //print_r($page); exit;

        if (file_exists(APPPATH . 'Modules/ci4-pages/src/Views/frontend/themes/'.$this->theme.'/' .$page['page']->getSlug() . '.php')) {
            return $this->render($this->viewPrefix . $this->theme . '/' . $page['page']->getSlug(), $page);
        }else{
            return $this->render($this->viewPrefix . $this->theme . '/\page', $page);
        }
       
    }

     /**
     * Store Form
     *
     * @return string
     */
    public function store()
	{

        if($this->request->getMethod() == 'post'){

            $input = $this->validate([
                'firstname'  => 'required|min_length[3]',
                'lastname'   => 'required|min_length[3]',
                'email'      => 'required|valid_email',
                'phone'      => 'required|numeric|max_length[10]',
                'entreprise' => 'required',
                'fonction'   => 'required',
                'ou'         => 'required',
                'projet'     => 'required',
            ]);

           $formModel = new FormContactModel();

            if (!$input) {
                //print_r($this->validator); exit;
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            } else {
                $data =  [
                    'firstname'  => $this->request->getVar('firstname'),
                    'lastname'   => $this->request->getVar('lastname'),
                    'email'      => $this->request->getVar('email'),
                    'phone'      => $this->request->getVar('phone'),
                    'entreprise' => $this->request->getVar('entreprise'),
                    'fonction'   => $this->request->getVar('fonction'),
                    'ou'         => $this->request->getVar('ou'),
                    'projet'     => $this->request->getVar('projet'),
                ];
            
                if(!$formModel->save($data)){
                    
                    return redirect()->back()->withInput()->with('error', $formModel->errors());
                }      
    
                return redirect()->back()->with('success', 'Votre formualire a été envoyé avec succés');
            }

        }
    }
}


/*
    https://www.positronx.io/codeigniter-form-validation-tutorial-with-example/
*/