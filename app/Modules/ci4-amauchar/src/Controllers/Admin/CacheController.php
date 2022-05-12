<?php

namespace Amauchar\Core\Controllers\Admin;

use CodeIgniter\HTTP\RedirectResponse;
use Amauchar\Core\Controllers\Admin\AdminController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;

class CacheController extends AdminController
{
    use ResponseTrait;


    /**
     * Displays a list of available.
     *
     * @return RedirectResponse
     */
    public function clearCache(): RedirectResponse
    {

        $type = $this->request->getGet('type');

        if (empty($type))
                return false;

            switch ($type) {
                case 'script':

                    foreach (glob(ROOTPATH . "public/backend/themes/".service('settings')->get('App.theme_bo', 'name')."/cache/asj_*") as $filename) {
                        @unlink($filename);
                    }

                    foreach (glob(ROOTPATH . "public/backend/themes/".service('settings')->get('App.theme_fo', 'name')."/cache/asj_*") as $filename) {
                        @unlink($filename);
                    }
                    
                    foreach (glob(WRITEPATH . "cache/asj_*") as $filename) {
                        @unlink($filename);
                    }

                    Theme::set_message('success', lang('Core.cache_vide'), lang('Core.cool_success'));
                    return redirect()->back();

                    break;
                case 'ci4':

                    command('cache:clear');

                    alert('success', lang('Core.resourcesSaved', ['cache']));
                    return redirect()->back();

                    break;
            }
    }

}
