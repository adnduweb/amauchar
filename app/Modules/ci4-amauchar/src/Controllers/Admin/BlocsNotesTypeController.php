<?php

namespace Amauchar\Core\Controllers\Admin;

use CodeIgniter\HTTP\RedirectResponse;
use Amauchar\Core\Controllers\Admin\AdminController;
use Amauchar\Core\Entities\BlocNoteType;
use Amauchar\Core\Models\BlocNoteTypeModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use Amauchar\Core\Libraries\Encrypt;
use Amauchar\Core\Libraries\Util;
use Michelf\Markdown;

class BlocsNotesTypeController extends AdminController
{
    use ResponseTrait;

    /**  @var string  */
    protected $viewPrefix = '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\blocnotes\\';

    /**  @var object  */
    public $tableModel = BlocNoteTypeModel::class;

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
       return $this->render($this->viewPrefix . 'type/index', $this->viewData);
   }
   //blocsnotestype

    /**
    * Function datatable.
    *
    * @return CodeIgniter\Http\Response
    */
   public function ajaxDatatable(): ResponseInterface
   {
       if ($this->request->isAJAX()) {
           $start = $this->request->getVar('start');
           $length = $this->request->getVar('length');
           $search = $this->request->getVar('search[value]');
           $order = model(BlocNoteTypeModel::class)::ORDERABLE[$this->request->getVar('order[0][column]')];
           $dir = $this->request->getVar('order[0][dir]');

           $data = $this->convertBinToUuid(model(BlocNoteTypeModel::class)->getResource($search)->orderBy($order, $dir)->limit($length, $start)->get()->getResultObject());

          return $this
           ->response
           ->setStatusCode(200)
           ->setJSON([
               'draw'            => $this->request->getVar('draw'),
               'recordsTotal'    => model(BlocNoteTypeModel::class)->getResource()->countAllResults(),
               'recordsFiltered' => model(BlocNoteTypeModel::class)->getResource($search)->countAllResults(),
               //'data'            => $this->convertBinToUuid($this->tableModel->getResource($search)->orderBy($order, $dir)->limit($length, $start)->get()->getResultObject()), 
               'data'            => $data, 
               '_token'           => csrf_hash()
           ]);

       }

       return $this->respond(['success' => lang('Core.noContent')], ResponseInterface::HTTP_NO_CONTENT);
   }

    /**
     * Displays the form for a new item.
     *
     * @return string
     */
    public function new(): string
    {
        helper('tools');

        // Initialize form
        $this->viewData['form'] = new BlocNoteType();

        return $this->render($this->viewPrefix . 'type/form', $this->viewData);
    }

    /**
     * Creates a item from the new form data.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function create()
    {
        // validate
        $designations = new BlocNoteTypeModel();
        
        $this->rules = [
            'titre'              => 'required'
        ];

        if ($this->request->isAJAX()) {
          
            if (!$this->validate($this->rules)) {
                $response = ['errors' => $this->validator->getErrors()];
                return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            }

            // Try to create the item
            $blocnoteType =  json_decode($this->request->getBody());
            if (! $blocnoteTypeId = model(BlocNoteTypeModel::class)->insert($blocnoteType, true)) {
                $response = ['errors' => model(BlocNoteTypeModel::class)->errors()];
                return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            }
            $response = ['messages' => ['success' => lang('Core.resourcesSaved')], 'list' =>  model(BlocNoteTypeModel::class)->findAll()];
            return $this->respond($response, ResponseInterface::HTTP_OK);
           
        }
        

        if (!$this->validate($this->rules)) {
			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Try to create the item
        $blocnoteType = $this->request->getPost();
        // print_r($blocnoteType); exit;
        //$blocnoteType['handle'] = Util::stringCleanUrl($blocnoteType['name']);
        if (! $blocnoteTypeId = model(BlocNoteTypeModel::class)->insert($blocnoteType, true)) {
			return redirect()->back()->withInput()->with('error', model(BlocNoteTypeModel::class)->errors());
        }

         // Success!
         alert('success', lang('Core.resourcesSaved'));
         return redirect()->to(route_to('blocsnotestypes.edit', $blocnoteTypeId));

    }


        /**
     * Shows details for one item.
     *
     * @param string $itemId
     *
     * @return string
     */
    public function edit(string $id)
    {
        helper(['form', 'date']);

        $this->id = $id;

        $this->getBlocsNoteTypeCurrentProvider();

        if ($this->object === null) {
            //http://localhost:8080/admin1117669688/system/users/edit/ea2915b6-2fa6-4414-aaab-305ccd05321c
            alert('error', lang('Auth.resourceNotFound', ['user']));
            return redirect()->to(route_to('dashboard.view'));
        }
        $this->encrypter = new Encrypt();
        $this->object->contenu = $this->encrypter->decrypt($this->object->contenu); 
        $this->viewData['form'] = $this->object;

       return $this->render($this->viewPrefix . 'type/form', $this->viewData);
    }


           /**
     * Update item details.
     *
     * @param string $itemId
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function update(): RedirectResponse
    {
        // validate
        $designations = new BlocNoteTypeModel();
        $this->rules = [
            'titre'              => 'required'
        ];
        if (!$this->validate($this->rules)) {
			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        $this->id = $this->request->getPost('id_type_blocnote');
       //print_r($this->request->getPost()); exit;
        $this->getBlocsNoteTypeCurrentProvider();

        // Try to create the item
        $blocnote = $this->request->getPost();

        if (! model(BlocNoteTypeModel::class)->save($blocnote)) {
			return redirect()->back()->withInput()->with('error', model(BlocNoteTypeModel::class)->errors());
        }

         // Success!
         alert('success', lang('Core.resourcesSaved'));
         return redirect()->to(route_to('blocsnotestypes.edit', $this->object->id_type_blocnote));
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

        if ($this->request->isAJAX()) {

            $response = json_decode($this->request->getBody());

            if(!is_array($response->id_type_blocnote))
                return false; 

                $exist = false;
                foreach ($response->id_type_blocnote as $key => $id) {

                    if($this->tableModel->getNbreBlocs($id) > 0){
                        $exist = true;
                        break;
                    }

                    $blocnote =  $this->tableModel->where('id_type_blocnote', $id)->first();
                    $this->tableModel->delete($blocnote->id_type_blocnote);
                }

                if ($exist == true) {
                    $response = ['errors' => lang('Core.notAuthorized')];
                    return $this->respond($response, ResponseInterface::HTTP_UNAUTHORIZED);
                } else {
                    $response = ['messages' => ['success' => lang('Core.resourceDeleted', ['designation'])]];
                    return $this->respondDeleted($response, ResponseInterface::HTTP_OK);  
                }
        
        }
        return $this->respondNoContent();
       
    }

     /**
     * Returns the User provider
     *
     * @return mixed
     */
    protected function getBlocsNoteTypeCurrentProvider()
    {
        $this->object = model('BlocNoteTypeModel')->where([model('BlocNoteTypeModel')->primaryKey => $this->id])->first();
    }

}
