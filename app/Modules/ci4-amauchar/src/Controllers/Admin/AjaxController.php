<?php

namespace Amauchar\Core\Controllers\Admin;

use CodeIgniter\HTTP\RedirectResponse;
use Amauchar\Core\Controllers\Admin\AdminController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;

class AjaxController extends AdminController
{
    use ResponseTrait;


    /**
     * Displays a list of available.
     *
     * @return string
     */
    public function sendMailAccountManager()
    {
        if ($this->request->isAJAX()) {

            $response = json_decode($this->request->getBody());        
            
            if (empty($response->dataPost)) {
                $response = ['errors' => lang('Core.selectAtLeastOne')];
                return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            }
            if(service('mail')->sendAdmin(
                'fabrice@adnduweb.com', 
                lang('Core.'. $response->type), 
                $response, 
                view('Amauchar\Core\emails\backend\sendMailAccountManager', ['response' => $response])
            ) == true){
                $response = ['success' => lang('Core.resourcesSaved')];
                return $this->respond($response, ResponseInterface::HTTP_OK);
            }

        }
    }



}
