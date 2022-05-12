<?php

namespace Amauchar\Core\Controllers\Admin;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Amauchar\Core\Controllers\Admin\AdminController;
use Amauchar\Core\Entities\Company;
use Amauchar\Core\Models\CompanyModel;
use Amauchar\Core\Libraries\Data;
use CodeIgniter\Events\Events;

/**
 * Class DashboardController
 *
 * A generic controller to handle Authentication Actions.
 */
class CompaniesController extends AdminController
{

    use ResponseTrait;

    /**  @var string  */
    protected $viewPrefix = '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\company\\';

    protected $helpers    = ['error'];

    /**  @var object  */
    public $tableModel = CompanyModel::class;

    public $filterDatabase = false;

    public $allow_export = true;

    protected $user;

    /**
     * Displays the form the login to the site.
     */
    public function index()
    {
        theme()->add_js('plugins/custom/datatables/datatables.bundle.js');
        return $this->render($this->viewPrefix . 'index', $this->viewData);
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
        helper(['form', 'date']);

        $this->id = $uuid;

        $this->getCompanyCurrentProvider();


        return $this->render($this->viewPrefix . 'form', $this->viewData);
    }

      /**
     * Saves the general settings
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function update()
    {
        $this->id = $this->request->getPost('uuid');

        $this->getCompanyCurrentProvider();

        $rules = [
            'company_type_id' => 'required',
            'raison_social'   => 'required|is_unique[companies.raison_social,uuid,'. service('uuid')->fromString($this->request->getPost('uuid'))->getBytes().']',
            'email'           => 'required|string',
            'country'         => 'required|string',
           // 'phone'           => 'required|phoneValidation[phone]|is_unique[companies.phone]',
           'phone_mobile' => 'mobileValidation[phone]',
           'phone'        => 'required|phoneValidation[phone]',
           'siret'        => 'required|is_siret[siret]',
        ];

       // print_r($rules); exit;

        if (! $this->validate($rules)) {
            $response = [
                'errors' => $this->validator->getErrors()            
            ];
            //print_r( $response);exit;
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }

        $request = $this->request->getPost();
        $request['is_ttc'] = ($this->request->getPost('is_ttc') === '1');
        //print_r($request); exit;

        if (! model(CompanyModel::class)->save($request)) {
            $response = ['errors' => model(CompanyModel::class)->errors()];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }

        
        $response = ['messages' => ['sucess' => lang('Core.resourcesSaved')]];
        return $this->respond($response, ResponseInterface::HTTP_OK);

    }



    /**
     * Returns the Company provider
     *
     * @return mixed
     */
    protected function getCompanyCurrentProvider()
    {
        if (service('uuid')->isValid($this->id)) {
            $this->id = service('uuid')->fromString($this->id)->getBytes();
            $this->object = model('CompanyModel')->where([model('CompanyModel')->uuidFields[0] => $this->id])->first();

            if ($this->object === null) {
                alert('error', lang('Auth.resourceNotFound', ['company']));
                return redirect()->to(route_to('companies.index'));
            }

            $this->viewData['form'] = $this->object;
        }
    }
}