<?php

namespace Amauchar\Customers\Controllers\Admin;

use Amauchar\Core\Controllers\Admin\AdminController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Events\Events;
use Amauchar\Customers\Entities\Customer;
use Amauchar\Customers\Models\CustomerModel;
use Amauchar\Customers\Models\CustomerGroupModel;
use Amauchar\Customers\Models\CustomerAddressModel;
use Amauchar\Customers\Models\CustomerContactModel;
use Amauchar\Customers\Models\CustomerNoteModel;
use CodeIgniter\API\ResponseTrait;
use Amauchar\Core\Libraries\Util;
use Amauchar\Core\Traits\ExportTrait;

class CustomersController extends AdminController
{

    use ResponseTrait;
    use ExportTrait;

    /**  @var string  */
    protected $viewPrefix = '\Amauchar\Customers\Views\backend\\'.ADMIN_THEME.'\customers\\';

    /**  @var object  */
    public $tableModel = CustomerModel::class;

    public $dirLang = [];

    public $filterDatabase = false;

    /**
     * Displays a list of available.
     *
     * @return string
     */
    public function index()
    {
        theme()->add_js('plugins/custom/datatables/datatables.bundle.js');
        $this->viewData['customerCount'] = model(CustomerModel::class)->countAllResults();
        $this->viewData['active'] = 'customers';
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
     * Displays the form for a new item.
     *
     * @return string
     */
    public function new()
    {
        helper('tools'); 

        // Initialize form
        $this->viewData['formItem'] = new Customer();
        $this->viewData['groups'] = model(CustomerGroupModel::class)->findAll();
        $this->viewData['active'] = 'customers';
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
        $customers = new CustomerModel();
        $this->rules = [
            'customer_group_id' => 'required',
            'email'             => 'required|valid_email|is_unique[customers.email]',
            'company'           => 'required|string|is_unique[customers.company]',
        ];
        if (!$this->validate($this->rules)) {
            alert('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }


        // Try to create the item
        $obj = $this->request->getPost();
        $obj['uuid'] = service('uuid')->uuid4()->toString();
        $obj['user_id'] = user_id();
        $obj['active'] = 1 ;
        if (! $objId = model(CustomerModel::class)->insert($obj, true)) {
            $response = ['errors' => model(CustomerModel::class)->errors()];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }
    
          // Success!
          alert('success', lang('Core.resourcesSaved'));
          return redirect()->to(route_to('customer.edit',  $obj['uuid']));

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
        helper(['tools']);
        theme()->add_js('plugins/custom/datatables/datatables.bundle.js');

        $this->id = $id;
        $this->getCustomerCurrentProvider();

        if ($this->object === null) {
            // alert('error', lang('Auth.resourceNotFound', ['customer']));
            return redirect()->to(route_to('dashboard.index'))->with('error', lang('Auth.resourceNotFound', ['customer']));
        }


        $this->viewData['title_detail'] =  $this->object->company;
        $this->viewData['formItem'] = $this->object;
        $this->viewData['active'] = 'customers';
        $this->viewData['groups'] = model(CustomerGroupModel::class)->findAll();
        $this->viewData['adresses'] = model(CustomerAddressModel::class)->findAll();
        $this->viewData['formItemAddresseDefaut'] = model(CustomerAddressModel::class)->getAddressDefault($this->object->id);

        return $this->render($this->viewPrefix .'form', $this->viewData);

    }

   /**
     * Update item details.
     *
     * @param string $itemId
     *
     * @return RedirectResponse
     */
    public function update( string $id)
    {

        $this->id = $id;
        $this->getCustomerCurrentProvider();

        // validate
        $customers = new CustomerModel();
        $this->rules = [
            'customer_group_id' => 'required',
            'email'             => 'required|valid_email|is_unique[customers.email,uuid,'. service('uuid')->fromString($this->request->getPost('uuid'))->getBytes().']',
            'company'           => 'required|string|is_unique[customers.company,uuid,'. service('uuid')->fromString($this->request->getPost('uuid'))->getBytes().']',
        ];
        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Try to create the item
        $requestPost = $this->request->getPost();
        if (! model(CustomerModel::class)->update($this->object->id, $requestPost)) {
            return redirect()->back()->withInput()->with('error', model(CustomerModel::class)->errors());
        }

         // Success!
         alert('success', lang('Core.resourcesSaved'));
        return redirect()->to(route_to('customer.edit', $id));

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


    /**
     * Returns the Media provider
     *
     * @return mixed
     */
    protected function getCustomerCurrentProvider()
    { 
        if (service('uuid')->isValid($this->id)) {
            $this->id = service('uuid')->fromString($this->id)->getBytes();
            $this->object = model('CustomerModel')->where([model('CustomerModel')->uuidFields[0] => $this->id])->first();
            if(!empty($this->object)){
                $this->object->adresses = model(CustomerAddressModel::class)->where(['customer_id' => $this->object->id])->findAll();
            }
        }
    }

     /**
     * Store a newly created resource in storage.
     */
    public function settings()
    {

        if($this->request->getMethod() == "post"){

            $rules = [
                'delayNew' => 'required'
            ];

            if (! $this->validate($rules)) {
                  return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            //Create type customer
            foreach(\Amauchar\Core\Libraries\Data::getCustomerGroups() as $customer){
                if(! model(CustomerGroupModel::class)->find($customer['id'])){
                    model(CustomerGroupModel::class)->insert($customer);
                }
            }


            setting('Customer.delayNew', $this->request->getPost('delayNew'));


            if ($format =  $this->request->getPost('fakeCustomer')) {

                model(CustomerModel::class)->emptyTable();
                model(CustomerAddressModel::class)->emptyTable();

                helper('test');
                for ($i = 0; $i < 50; $i++) {
                    $customer = fake(CustomerModel::class);
                }

            }

            if ($format =  $this->request->getPost('deleteAllCustomer')) {

                model(CustomerModel::class)->emptyTable();
                model(CustomerAddressModel::class)->emptyTable();
                model(CustomerContactModel::class)->emptyTable();
                model(CustomerNoteModel::class)->emptyTable();

            }
            
            // Success!
            return redirect()->to(route_to('customers.settings'))->with('success', lang('Core.resourcesSaved'));
        }
        
        $this->viewData['customerCount'] = model(CustomerModel::class)->countAllResults();
        $this->viewData['active'] = 'settings';

        return $this->render($this->viewPrefix .'index_settings', $this->viewData);

    }
    
    

    public function updateCustomer(){

        if ($this->request->isAJAX()) {

            $request = (object)$this->request->getPost();
            //print_r($request); exit;  
            switch ($request->action) {
                case 'activation':
                    
                    $this->id = service('uuid')->fromString($request->uuid)->getBytes();
                    $this->customer = model(CustomerModel::class)->where(['uuid' => $this->id])->first();
  
                    if(!$this->customer)
                    return false;

                    if( $this->customer->active == 0){
                        $this->customer->activate();
                    }else{
                        $this->customer->deactivate();
                    }

                    if(!model(CustomerModel::class)->save($this->customer)){
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

}

