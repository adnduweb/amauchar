<?php

namespace Amauchar\Pages\Controllers\Api;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use Amauchar\Pages\Entities\Page;
use Amauchar\Pages\Models\PageModel;
use Amauchar\Pages\Entities\Composer;
use Amauchar\Pages\Models\ComposerModel;
 
class Ressources extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function saveAuto()
    {
       
        $data = $this->request->getPost();

        if(!empty($data['lang'][service('request')->getLocale()]['name'])){
            //echo 'fdgsfdgsdfg'; exit;
            helper('string');
    
            // try to update the item
            $page = $this->request->getPost();
            $page['active'] = isset($page['active']) ? $page['active'] : 0;
            $page['display_title'] = isset($page['display_title']) ? $page['display_title'] : 0;
            if (!model(PageModel::class)->save($page, true)) {
                return $this->failNotFound(PageModel::class)->errors();
            }
    
            // Builder
            if (!model(ComposerModel::class)->saveComposer($page, true)) {
                return $this->failNotFound(ComposerModel::class)->errors();
            }
    
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data updated'
                ]
            ];

            cache()->delete('page-'.$data['lang'][service('request')->getLocale()]['slug']);

            return $this->respond($response);
        }

    }
}