<?php

namespace Amauchar\Core\Controllers\Admin;

use CodeIgniter\HTTP\RedirectResponse;
use Amauchar\Core\Controllers\Admin\AdminController;
use Amauchar\Core\Entities\BlocNote;
use Amauchar\Core\Models\BlocNoteModel;
use Amauchar\Core\Entities\BlocNoteType;
use Amauchar\Core\Models\BlocNoteTypeModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use Amauchar\Core\Libraries\Encrypt;
use Amauchar\Core\Libraries\Util;
use Michelf\Markdown;

class BlocsNotesController extends AdminController
{
    use ResponseTrait;

    /**  @var string  */
    protected $viewPrefix = '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\blocnotes\\';

    /**  @var object  */
    public $tableModel = BlocNoteModel::class;

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
            $start = $this->request->getVar('start');
            $length = $this->request->getVar('length');
            $search = $this->request->getVar('search[value]');
            $order = $this->tableModel::ORDERABLE[$this->request->getVar('order[0][column]')];
            $dir = $this->request->getVar('order[0][dir]');

            $data = $this->convertBinToUuid($this->tableModel->getResource($search)->orderBy($order, $dir)->limit($length, $start)->get()->getResultObject());

            $this->encrypter = new Encrypt();
            $i = 0;
            foreach($data as &$infos){
                $infos->contenu_read = Util::secret($this->encrypter->decrypt($infos->contenu));
            }
            //print_r($data ); exit;
           return $this
            ->response
            ->setStatusCode(200)
            ->setJSON([
                'draw'            => $this->request->getVar('draw'),
                'recordsTotal'    => $this->tableModel->getResource()->countAllResults(),
                'recordsFiltered' => $this->tableModel->getResource($search)->countAllResults(),
                //'data'            => $this->convertBinToUuid($this->tableModel->getResource($search)->orderBy($order, $dir)->limit($length, $start)->get()->getResultObject()), 
                'data'            => $data, 
                '_token'           => csrf_hash()
            ]);

        }

        return $this->respond(['success' => lang('Core.noContent')], ResponseInterface::HTTP_NO_CONTENT);
    }


    public function readContenu(){
        
        $request = $this->request->getPost();
        //print_r($request); exit;
        $this->id = $request['uuid'];

        $this->getBlocsNoteCurrentProvider();
        $this->encrypter = new Encrypt();
        $response = ['messages' => ['sucess' => lang('Core.resourcesSaved')],  'contenu' =>  Markdown::defaultTransform($this->encrypter->decrypt($this->object->contenu))];
        return $this->respond($response, ResponseInterface::HTTP_OK);

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
        $this->viewData['form'] = new BlocNote();
        $this->viewData['blocsType'] = model(BlocNoteTypeModel::class)->findAll();

        return $this->render($this->viewPrefix . 'form', $this->viewData);
    }

    /**
     * Creates a item from the new form data.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function create()
    {
        // validate
        $designations = new BlocNoteModel();
        
        $this->rules = [
            'titre'              => 'required'
        ];

        if (!$this->validate($this->rules)) {
            alert('error',  $this->validator->getErrors());
			return redirect()->back()->withInput()->with('error', lang('Auth.resourcesFailed'));
        }

        // Try to create the item
        $blocnote = $this->request->getPost();
        $this->encrypter = new Encrypt();
        $blocnote['contenu'] = $this->encrypter->encrypt($blocnote['contenu']);
        $blocnote['uuid'] = service('uuid')->uuid4()->toString();
        $blocnote['user_id'] = Auth()->user()->id;
        // print_r($blocnote); exit;
        //$blocnote['handle'] = Util::stringCleanUrl($blocnote['name']);
        if (! $blocnoteId = model(BlocNoteModel::class)->insert($blocnote, true)) {
            alert('error',  model(BlocNoteModel::class)->errors());
			return redirect()->back()->withInput()->with('error', model(BlocNoteModel::class)->errors());
        }

        if(service('settings')->get('App.forceUnlockMdp', 'user:' . Auth()->user()->id) == false){
            session()->set('verif_blocnote_'. $blocnote['uuid'] , true);
        }
       

         // Success!
         alert('success', lang('Core.resourcesSaved'));
         return redirect()->to(route_to('blocsnotes.edit', $blocnote['uuid']));

    }
 
    /**
     * Shows details for one item.
     *
     * @param string $itemId
     *
     * @return string
     */
    public function edit(string $uuid)
    {

        if(service('settings')->get('App.forceUnlockMdp', 'user:' . Auth()->user()->id) == false){
            // On reagrde s'il y a une vérification
            if(!session()->get('verif_blocnote_'. $uuid)){
                return redirect()->to(route_to('blocsnotes.verif') .'?verif_blocnote=' . $uuid) ;
            }
        }

        helper(['form', 'date']);

        $this->id = $uuid;

        $this->getBlocsNoteCurrentProvider();

        if ($this->object === null) {
            //http://localhost:8080/admin1117669688/system/users/edit/ea2915b6-2fa6-4414-aaab-305ccd05321c
            alert('error', lang('Auth.resourceNotFound', ['user']));
            return redirect()->to(route_to('dashboard.view'));
        }
        $this->encrypter = new Encrypt();
        $this->object->contenu = $this->encrypter->decrypt($this->object->contenu); 
        $this->viewData['form'] = $this->object;
        $this->viewData['blocsType'] = model(BlocNoteTypeModel::class)->findAll();

       return $this->render($this->viewPrefix . 'form', $this->viewData);
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
        $designations = new BlocNoteModel();
        $this->rules = [
            'titre'              => 'required'
        ];
        if (!$this->validate($this->rules)) {
            alert('error',  $this->validator->getErrors());
			return redirect()->back()->withInput()->with('error', lang('Auth.resourcesFailed'));
        }

        $this->id = $this->request->getPost('uuid');
        $this->getBlocsNoteCurrentProvider();

        // Try to create the item
        $blocnote = $this->request->getPost();
        $this->encrypter = new Encrypt();
        $blocnote['contenu'] = $this->encrypter->encrypt($blocnote['contenu']);
        $blocnote['id_blocnote'] = $this->object->id_blocnote;
        //print_r($blocnote); exit;
        //$blocnote['handle'] = Util::stringCleanUrl($blocnote['name']);
        if (! model(BlocNoteModel::class)->save($blocnote)) {
            alert('error',  model(BlocNoteModel::class)->errors());
			return redirect()->back()->withInput()->with('error', model(BlocNoteModel::class)->errors());
        }

         // Success!
         alert('success', lang('Core.resourcesSaved'));
         return redirect()->to(route_to('blocsnotes.edit', $this->object->uuid));
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

            if(!is_array($response->uuid))
                return false; 

                $exist = false;
                foreach ($response->uuid as $key => $uuid) {
                    $this->uuid = service('uuid')->fromString($uuid)->getBytes();
                    $blocnote =  $this->tableModel->where('uuid', $this->uuid)->first();
                    $this->tableModel->delete($blocnote->id_blocnote);
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
    protected function getBlocsNoteCurrentProvider()
    {
         if (service('uuid')->isValid($this->id)) {
            $this->id = service('uuid')->fromString($this->id)->getBytes();
            $this->object = model('BlocNoteModel')->where([model('BlocNoteModel')->uuidFields[0] => $this->id])->first();
        }

    }


     /**
     * Returns the User provider
     *
     * @return mixed
     */
    public function updateUUid()
    {

        $this->object = model('BlocNoteModel')->findAll();

        foreach($this->object as &$object){
            $object->uuid  = service('uuid')->uuid4()->toString();
            model('BlocNoteModel')->save($object);
        }

        print_r($this->object); exit;

    }

    public function verif(){

        // On reagrde s'il y a une vérification
        $uuid = $this->request->getGet('verif_blocnote');
        if(!empty($uuid)){
            if(session()->get('verif_blocnote_'. $uuid)){
                return redirect()->to(route_to('blocsnotes.edit', $uuid)) ;
            }
        }else{
            return redirect()->to(route_to('blocsnotes.index')) ;
        }

        return $this->render('\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\auth\verification_password', $this->viewData);
    }

    public function verifPost(){
       
    }

}
