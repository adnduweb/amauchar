<?php

namespace Amauchar\Customers\Controllers\Admin;

use Amauchar\Core\Controllers\Admin\AdminController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Events\Events;
use Amauchar\Customers\Entities\Customer;
use Amauchar\Customers\Models\CustomerModel;
use Amauchar\Core\Models\BlocNoteTypeModel;
use Amauchar\Customers\Models\CustomerNoteModel;
use Amauchar\Customers\Models\CustomerAddressModel;
use CodeIgniter\API\ResponseTrait;
use Amauchar\Core\Libraries\Util;
use Amauchar\Core\Traits\ExportTrait;
use Michelf\Markdown;

class CustomersNotesController extends AdminController
{

    use ResponseTrait;
    use ExportTrait;

    /**  @var string  */
    protected $viewPrefix = '\Amauchar\Customers\Views\backend\\'.ADMIN_THEME.'\notes\\';

    /**  @var object  */
    public $tableModel = CustomerNoteModel::class;

    public $dirLang = [];

    public $filterDatabase = false;

    /**
     * Displays a list of available.
     *
     * @return string
     */
    public function index(string $uuid)
    {
        $this->id = $uuid;
        $this->getCustomerNoteCurrentProvider();
        
        theme()->add_js('plugins/custom/datatables/datatables.bundle.js');
        $this->viewData['NoteCount'] = model(CustomerNoteModel::class)->countAllResults();
        $this->viewData['blocsType'] = model(BlocNoteTypeModel::class)->findAll();
        $this->viewData['active'] = 'notes';
        $this->viewData['formItem'] = $this->objectCustomer;
        $this->viewData['formItemAddresseDefaut'] = model(CustomerAddressModel::class)->getAddressDefault($this->objectCustomer->id);
        return $this->render($this->viewPrefix . 'index', $this->viewData);
    }


    /**
     * Returns the Media provider
     *
     * @return mixed
     */
    protected function getCustomerNoteCurrentProvider()
    { 
        if (service('uuid')->isValid($this->id)) {
            $this->id = service('uuid')->fromString($this->id)->getBytes();
            $this->objectCustomer = model('CustomerModel')->where([model('CustomerModel')->uuidFields[0] => $this->id])->first();
            if(!empty($this->objectCustomer)){
                $this->objectCustomer->notes = model(CustomerNoteModel::class)->where(['customer_id' => $this->objectCustomer->id])->findAll();
            }
        }
    }

     /**
     * Returns the Media provider
     *
     * @return mixed
     */
    protected function getNoteCurrentProvider()
    { 
        if (service('uuid')->isValid($this->id)) {
            $this->id = service('uuid')->fromString($this->id)->getBytes();
            $this->object = model(CustomerNoteModel::class)->where([model(CustomerNoteModel::class)->uuidFields[0] => $this->id])->first();
        }
    }
        
    /**
     * Function datatable.
     *
     * @return CodeIgniter\Http\Response
     */
    public function ajaxDatatableContact( string $uuid ): ResponseInterface
    {
        if ($this->request->isAJAX()) {

            $this->id = $uuid;
            $this->getCustomerNoteCurrentProvider();
           

            $start = $this->request->getVar('start');
            $length = $this->request->getVar('length');
            $search = $this->request->getVar('search[value]');
            $order = model(CustomerNoteModel::class)::ORDERABLE[$this->request->getVar('order[0][column]')];
            $dir = $this->request->getVar('order[0][dir]');

            $data = $this->convertBinToUuid($this->tableModel->getResource($search, $this->objectCustomer->id)->orderBy($order, $dir)->limit($length, $start)->get()->getResultObject());

           return $this
            ->response
            ->setStatusCode(200)
            ->setJSON([
                'draw'            => $this->request->getVar('draw'),
                'recordsTotal'    => model(CustomerNoteModel::class)->getResource('', $this->objectCustomer->id)->countAllResults(),
                'recordsFiltered' => model(CustomerNoteModel::class)->getResource($search, $this->objectCustomer->id)->countAllResults(),
                //'data'            => $this->convertBinToUuid($this->tableModel->getResource($search)->orderBy($order, $dir)->limit($length, $start)->get()->getResultObject()), 
                'data'            => $data, 
                '_token'           => csrf_hash()
            ]);

        }

        return $this->respond(['success' => lang('Core.noContent')], ResponseInterface::HTTP_NO_CONTENT);
    }

    /**
     * Shows details for one item.
     *
     * @param string $itemId
     *
     * @return string
     */
    public function editNote(string $uuid_customer, string $uuid_note)
    {
        helper(['tools']);
       
        $this->id = $uuid_note;
        $this->getNoteCurrentProvider();

        if (service('uuid')->isValid($uuid_customer)) {
            $this->id = service('uuid')->fromString($uuid_customer)->getBytes();
            $this->objectCustomer = model('CustomerModel')->where([model('CustomerModel')->uuidFields[0] => $this->id])->first();
        }

        //print_r(route_to('customers.notes.edit', $this->objectCustomer->uuid, $this->object->uuid)); exit;


        if ($this->object === null) {
            return redirect()->to(route_to('dashboard.index'))->with('error', lang('Auth.resourceNotFound', ['customer']));
        }

        if($this->request->getMethod() == "post"){

            $rules = [
                'titre' => 'required'
            ];

            if (! $this->validate($rules)) {
                  return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            $request = $this->request->getPost();

            if (! model(CustomerNoteModel::class)->save($request)) {
                $response = ['errors' => model(CustomerNoteModel::class)->errors()];
                return $this->respond($response, ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
            }

            // Success!
            return redirect()->to(route_to('customers.notes.edit', $this->objectCustomer->uuid, $this->object->uuid))->with('success', lang('Core.resourcesSaved'));
        }


        $this->viewData['title_detail'] =  $this->object->titre;
        $this->viewData['formItem'] = $this->objectCustomer;
        $this->viewData['formNote'] = $this->object;
        $this->viewData['active'] = 'notes';
        $this->viewData['formItemAddresseDefaut'] = model(CustomerAddressModel::class)->getAddressDefault($this->objectCustomer->id);
        $this->viewData['blocsType'] = model(BlocNoteTypeModel::class)->findAll();

        return $this->render($this->viewPrefix .'form', $this->viewData);

    }

    // public function editNoteAjax(){

    //     // on verfie que c'est bien ca propose adresse
    //     $request = $this->request->getPost();

    //     $rules = [
    //         'note.blocnote_type_id' => 'required',
    //         'note.titre'            => 'required'
    //     ];

    //     //print_r($request); exit;

    //     if (! $this->validate($rules)) {
    //         $response = ['errors' => $this->validator->getErrors()];
    //         return $this->respond($response, ResponseInterface::HTTP_UNPROCESSABLE_ENTITY);
    //     }

    //     $this->id = $request['note']['customer_id'];
    //     $this->getCustomerNoteCurrentProvider();
    //     $request['note']['customer_id'] = $this->object->id;
    //     if(empty($request['note']['uuid'])){
    //         $request['note']['uuid'] = service('uuid')->uuid4()->toString();
    //     }else{
    //         $this->id = service('uuid')->fromString($request['note']['uuid'])->getBytes();
    //         $this->note = model(CustomerNoteModel::class)->where([model(CustomerNoteModel::class)->uuidFields[0] => $this->id])->first();
    //         if(empty($this->note)){
    //             $response = ['message' => lang('Core.noNoteExist')];
    //             return $this->respond($response, ResponseInterface::HTTP_NOT_FOUND);
    //         }
    //         $request['note']['id'] = $this->note->id;
    //     }
       

    //     if (! model(CustomerNoteModel::class)->save($request['note'])) {
    //         $response = ['errors' => model(CustomerNoteModel::class)->errors()];
    //         return $this->respond($response, ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
    //     }

        
    //     // Success!
    //     $response = [ 'messages' => ['success' => lang('Core.resourcesSaved')]];
    //     return $this->respond($response, ResponseInterface::HTTP_OK);
    // }

    public function viewNote(){

        $request = json_decode($this->request->getBody());

        $this->id = service('uuid')->fromString($request->uuid)->getBytes();
        $this->note = model(CustomerNoteModel::class)->where([model(CustomerNoteModel::class)->uuidFields[0] => $this->id])->first();

       // Success!
       $response = [
            'messages' => [
                'sucess' => lang('Core.resourcesSaved')
            ],
            'noteItem' => $this->note,
            'modalNote' => view('Amauchar\Customers\backend\metronic\notes\_modals\add_note', [
                'noteItem' => $this->note,
                'display' => 'add_note',
                'name' => $this->name
                ]
            )
        ];
        return $this->respond($response, ResponseInterface::HTTP_OK);
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
                    $this->tableModel->delete($blocnote->id);
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


    public function update(){

        if ($this->request->isAJAX()) {

            $request = (object)$this->request->getPost();
            //print_r($request); exit;  
            switch ($request->action) {
                case 'activation':

                    $this->adresse = model(CustomerNoteModel::class)->where(['id' => $request->id])->first();

                    if( $this->adresse->active == 0){
                        $this->adresse->activate();
                    }else{
                        $this->adresse->deactivate();
                    }

                    if(!model(CustomerNoteModel::class)->save( $this->adresse)){
                        return $this->failure(400, 'No user save', true);
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

    public function readContenu(){
        
        $request = $this->request->getPost();
        //print_r($request); exit;
        $this->id = $request['uuid'];

        if (service('uuid')->isValid($this->id)) {
            $this->id = service('uuid')->fromString($this->id)->getBytes();
            $this->object = model(CustomerNoteModel::class)->where([model(CustomerNoteModel::class)->uuidFields[0] => $this->id])->first();
        }

        $response = ['messages' => ['sucess' => lang('Core.resourcesSaved')],  'contenu' =>  Markdown::defaultTransform($this->object->contenu)];
        return $this->respond($response, ResponseInterface::HTTP_OK);

    }

}

