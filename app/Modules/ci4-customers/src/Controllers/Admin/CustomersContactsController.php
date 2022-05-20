<?php

namespace Amauchar\Customers\Controllers\Admin;

use Amauchar\Core\Controllers\Admin\AdminController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Events\Events;
use Amauchar\Customers\Entities\Customer;
use Amauchar\Customers\Models\CustomerModel;
use Amauchar\Customers\Models\CustomerGroupModel;
use Amauchar\Customers\Models\CustomerContactModel;
use Amauchar\Customers\Models\CustomerAddressModel;
use CodeIgniter\API\ResponseTrait;
use Amauchar\Core\Libraries\Util;
use Amauchar\Core\Traits\ExportTrait;

class CustomersContactsController extends AdminController
{

    use ResponseTrait;
    use ExportTrait;

    /**  @var string  */
    protected $viewPrefix = '\Amauchar\Customers\Views\backend\\'.ADMIN_THEME.'\contacts\\';

    /**  @var object  */
    public $tableModel = CustomerContactModel::class;

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
        $this->getCustomerContactCurrentProvider();
        
        theme()->add_js('plugins/custom/datatables/datatables.bundle.js');
        $this->viewData['contactCount'] = model(CustomerContactModel::class)->countAllResults();
        $this->viewData['active'] = 'contacts';
        $this->viewData['formItem'] = $this->object;
        $this->viewData['formItemAddresseDefaut'] = model(CustomerAddressModel::class)->getAddressDefault($this->object->id);
        return $this->render($this->viewPrefix . 'index', $this->viewData);
    }


    /**
     * Returns the Media provider
     *
     * @return mixed
     */
    protected function getCustomerContactCurrentProvider()
    { 
        if (service('uuid')->isValid($this->id)) {
            $this->id = service('uuid')->fromString($this->id)->getBytes();
            $this->object = model('CustomerModel')->where([model('CustomerModel')->uuidFields[0] => $this->id])->first();
            if(!empty($this->object)){
                $this->object->contacts = model(CustomerContactModel::class)->where(['customer_id' => $this->object->id])->findAll();
            }
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
            $this->getCustomerContactCurrentProvider();

            $start = $this->request->getVar('start');
            $length = $this->request->getVar('length');
            $search = $this->request->getVar('search[value]');
            $order = model(CustomerContactModel::class)::ORDERABLE[$this->request->getVar('order[0][column]')];
            $dir = $this->request->getVar('order[0][dir]');

            $data =  model(CustomerContactModel::class)->getResource($search, $this->object->id)->orderBy($order, $dir)->limit($length, $start)->get()->getResultObject();

           return $this
            ->response
            ->setStatusCode(200)
            ->setJSON([
                'draw'            => $this->request->getVar('draw'),
                'recordsTotal'    => model(CustomerContactModel::class)->getResource('', $this->object->id)->countAllResults(),
                'recordsFiltered' => model(CustomerContactModel::class)->getResource($search, $this->object->id)->countAllResults(),
                //'data'            => $this->convertBinToUuid($this->tableModel->getResource($search)->orderBy($order, $dir)->limit($length, $start)->get()->getResultObject()), 
                'data'            => $data, 
                '_token'           => csrf_hash()
            ]);

        }

        return $this->respond(['success' => lang('Core.noContent')], ResponseInterface::HTTP_NO_CONTENT);
    }

    public function editContactAjax(){

        // on verfie que c'est bien ca propose adresse
        $request = $this->request->getPost();

        $rules = [
            'contact.company'      => 'required',
            'contact.lastname'     => 'required',
            'contact.firstname'    => 'required',
            'contact.email'        => 'required',
            'contact.phone'        => 'phoneValidation[phone]',
            'contact.phone_mobile' => 'phoneValidation[phone]',
        ];

        //print_r($request); exit;

        if (! $this->validate($rules)) {
            $response = ['errors' => $this->validator->getErrors()];
            return $this->respond($response, ResponseInterface::HTTP_UNPROCESSABLE_ENTITY);
        }

        $this->id = $request['contact']['customer_id'];
        $this->getCustomerContactCurrentProvider();
        $request['contact']['customer_id'] = $this->object->id;
        $request['contact']['lang'] = service('request')->getLocale();

        if (! model(CustomerContactModel::class)->save($request['contact'])) {
            $response = ['errors' => model(CustomerContactModel::class)->errors()];
            return $this->respond($response, ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        
        // Success!
        $response = [
            'messages' => [
                'success' => lang('Core.resourcesSaved')
            ],
            // 'display_kt_user_view_details' => view('Amauchar\Core\backend\metronic\users\partials\_kt_user_view_details', [
            //     'form' =>  $this->viewData['form'], 
            //     'name' =>  $this->viewData['name'], 
            //     'adresseDefault' => $this->viewData['adresseDefault'], 
            //     'allCountry' => Data::getCountriesList()
            //     ]
            // ),
        ];
        return $this->respond($response, ResponseInterface::HTTP_OK);
        print_r($request);
    }

    public function viewContact(){

        $response = json_decode($this->request->getBody());
        $this->contact = model(CustomerContactModel::class)->where([model(CustomerContactModel::class)->primaryKey => $response->id])->first();

       // Success!
       $response = [
            'messages' => [
                'sucess' => lang('Core.resourcesSaved')
            ],
            'contactItem' => $this->contact,
            'modalContact' => view('Amauchar\Customers\backend\metronic\contacts\_modals\add_contact', [
                'contactItem' => $this->contact,
                'display' => 'add_contact',
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
            if(!is_array($response->id))
                return false; 

                $error = false;
                foreach ($response->id as $key => $id) {

                   if(! $this->tableModel->delete(['id' => $id])){
                        $error = true;
                        break;
                   }
                }

               
                if ($error == true) {
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

                    $this->adresse = model(CustomerContactModel::class)->where(['id' => $request->id])->first();

                    if( $this->adresse->active == 0){
                        $this->adresse->activate();
                    }else{
                        $this->adresse->deactivate();
                    }

                    if(!model(CustomerContactModel::class)->save( $this->adresse)){
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

    public function initPageHeaderToolbar()
    {
            parent::initPageHeaderToolbar();
            $this->pageHeaderToolbarBtn = [];
    }

}

