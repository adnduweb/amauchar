<?php

namespace Amauchar\Core\Controllers\Admin;

use Amauchar\Core\Controllers\Admin\AdminController;
use CodeIgniter\Events\Events;
use CodeIgniter\HTTP\Exceptions\HTTPException;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use Amauchar\Core\Libraries\Util;

class TranslateController extends AdminController
{

    use ResponseTrait;

    /**  @var string  */
    protected $viewPrefix = '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\translates\\';

    public $dirLang = [];

    public $filterDatabase = false;

    /**
     * Displays a list of available.
     *
     * @return string
     */
    public function index()
    {
       
        theme()->add_js('plugins/custom/formrepeater/formrepeater.bundle.js');

        helper(['array']);

        $this->searchFilelang('fr');

        $filesCore = array();
        $filesThemesFront = array();
        $charge  = array();

        foreach (glob(APPPATH . "Language/en/*.php") as $filename) {

            if (!preg_match('/^Front_/', basename($filename))) {
                $filesCore[] = basename($filename);
                $charge[strtolower(str_replace('.php', '', basename($filename)))] = include($filename);
            } else {
                $filesThemesFront[] = basename($filename);
                $charge[strtolower(str_replace('.php', '', basename($filename)))] = include($filename);
            }
        }

        $this->viewData['filesCore'] = $this->dirLang;
        $this->viewData['filesThemesFront'] = $filesThemesFront;

        echo $this->render($this->viewPrefix . 'index', $this->viewData);
    }

    public function getFile()
    {
        
       // if ($this->request->isAJAX()) { 
        helper(['array']);

        $lang = $this->request->getPost('lang');
        $fileCore = $this->request->getPost('fileCore');

        if(!empty($lang)){
            
            $this->searchFilelang($lang);
            $this->viewData['filesCore'] = $this->dirLang;

            if(!empty($fileCore)){
                $this->viewData['langue']           = include($fileCore);
                $this->viewData['file']             = $fileCore;
                $this->viewData['fileCoreSelected'] = $fileCore;
            }
            $this->viewData['lang']     = $lang ;
            

            $response = [
                'error'    => null,
                'messages' => [
                    'sucess' => lang('Core.resourcesSaved')
                ], 
                'fileCoreSelected' => $fileCore,
                'fileCore'         => $this->viewData['filesCore'],
                'viewLangue'       => ($fileCore) ? $this->render($this->viewPrefix . 'partials/viewLangue', $this->viewData) : null,
                'searchLangue'     => $this->render($this->viewPrefix . 'partials/searchLangue', $this->viewData)
            ];
            return $this->respond($response, 200);
        }
        $response = ['messages' => ['sucess' => lang('Core.noContent')]];
        return $this->respond($response, 204);

    }

    /**
     * Save file
     * 
     */
    public function savefile()
    {

        if ($this->request->isAJAX()) {

            helper(['array']);
            $lang          = $this->request->getPost('lang');
            $file          = $this->request->getPost('file');
            $traduction    = $this->request->getPost('traduction');
            $kt_traduction = $this->request->getPost('kt_traduction');

            if(!empty($kt_traduction[0]['texte'])){
                $new_trad = [];
                foreach($kt_traduction as $kt_trad){
                    $new_trad[$kt_trad['texte']] = $kt_trad['value'] ;
                }

                $traduction = array_merge($traduction, $new_trad);
            }

            if ($file) {

              
                try {
                    $this->saveAllLangFile($file, $lang, $traduction, false, true);
                    $response = [
                        'error'    => null,
                        'messages' => [
                            'sucess' => lang('Core.resourcesSaved')
                        ]
                    ];
                    return $this->respond($response, 200);

                } catch (\Exception $e) {
                    $response = ['errors' => lang('Core.resourcesFailed')];
                    return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
                }
            }
        }
    }

    /**
     * Delete texte in file
     * 
     */
    public function deleteTexte()
    {
        if ($this->request->isAJAX()) {

            helper(['array']);
            print_r(this->request->getPost()); exit;
            $response = json_decode($this->request->getBody());       
            $lang          = $this->request->getPost('lang');
            $file          = $this->request->getPost('file');
            $traduction    = $this->request->getPost('traduction');  


            if ($value = $response->value) {

                $newTraitement = $this->traitement($value);

                try {
                    save_all_lang_file($newTraitement['file'], $newTraitement['lang'], $newTraitement['trad'], false, true);
                    $response = [
                        'error'    => null,
                        'messages' => [
                            'sucess' => lang('Core.resourcesSaved')
                        ]
                    ];
                    return $this->respond($response, 200);

                } catch (\Exception $e) {
                    return $this->getResponse(['error' => lang('Core.error_saved_data')], 500);
                }
            }
        }
    }

    /**
     * Seach texte in files
     * 
     */
    public function searchTexte()
    {
        if ($this->request->isAJAX()) {

            helper(['array']);

            $lang     = $this->request->getPost('lang');
            $value    = $this->request->getPost('value');
            $search   = $this->request->getPost('search');

            if ($search == true) {

     
                    $this->viewData['searchTextLang'] = $this->searchTextLang($value, $lang);
                    // print_r($this->viewData['searchTextLang']);exit;

                    $response = [
                        'error'    => null,
                        'messages' => [
                            'sucess' => lang('Core.resourcesSaved')
                        ], 
                        'viewSearchDirect'     => $this->render($this->viewPrefix . 'partials/viewSearchDirect', $this->viewData)
                    ];
                    return $this->respond($response, 200);
            }
        }
    }

    /**
     * Save texte in file
     * 
     */
    public function saveTextfile()
    {
        if ($this->request->isAJAX()) {

             helper(['array']);
             //print_r($this->request->getPost()); exit;
             $lang          = $this->request->getPost('lang');
             $file          = $this->request->getPost('file');
             $traduction    = $this->request->getPost('traduction');      

            if (!empty($traduction) && is_array($traduction)) {

                $fileOrigin = include($file);
                $oldValue = $fileOrigin[array_key_first($traduction)];

                if (Util::replaceInfile($file, $oldValue, $traduction[array_key_first($traduction)])) {
                    $response = [
                        'error'    => null,
                        'messages' => [
                            'sucess' => lang('Core.resourcesSaved')
                        ]
                    ];
                    return $this->respond($response, 200);
                } else {
                    $response = ['errors' => lang('Core.resourcesFailed')];
                    return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
                }
            }
        }
    }


     protected function saveAllLangFile($filename = null, $language = 'en', $settings = null, $return = false, $allowNewValues = false) {
    
        if (empty($filename) || !is_array($settings)) {
            return false;
        }
        $path = $orig_path = $filename;

        // Load the file and loop through the lines
        if (!is_file($orig_path)) {
            return false;
        }


        // print_r($settings); 
        $contents = file_get_contents($orig_path);
        $contents = trim($contents) . "\n";

        if (!is_file($path)) {
            // Create the folder...
            $folder = basename($path) == 'Language' ? "{$path}/{$language}" : dirname($path);
            if (!is_dir($folder)) {
                mkdir($folder);
                $path = basename($path) == 'Language' ? "{$folder}/{$module}_lang.php" : $path;
            }
        }

        // Save the file.
        $replace = '';
        foreach ($settings as $name => $val) {
            if ($val != '') {
                $val = '\'' . addcslashes($val, '\'\\') . '\'';
            }
            if ($val != '') {
                $replace .= "\t";
                $replace .= '\'' . addcslashes($name, '\'\\') . '\'';
                $replace .= ' => ';
                $replace .= $val . ',' . "\n";
            }
        }

        $replace = "<?php\n\n return [\n" . $replace . "];";
        $replace = $replace . "\n\n" . '/* write : ' . date('d/m/Y H:i:s') . ' */';
        //print_r($replace); exit;

        // Make sure the file still has the php opening header in it...
        if (strpos($contents, '<?php') === false) {
            $contents = "<?php\n\n{$contents}";
        }

        if ($return) {
            return $contents;
        }

        helper('filesystem');
        if (write_file($path, $replace, "w+")) {
            return true;
        }

        return false;
    }

   protected function searchTextLang($query, $language = 'en')
    {
        //echo  $query; exit;
        if (empty($query)) {
            return false;
        }

        $this->searchFilelang($language);

       
        // exit;
        helper('string');
        $ret = array();
        $query = Util::stringCleanUrl($query);
        // Recherche du texte
        foreach ($this->dirLang as $k => $f) {


            $interface = $f['path'];
            $bundlename = $f['name'];
            
            $data = include($f['path']);

            $v = [];
            foreach ($data as $k => $d) {
                $value = $d;
                $match = strpos(strtolower($value), $query);
                if ($match !== false && $match >= 0) {
                    $v["info_lang"] = $language;
                    $v["info_key"] = $k;
                    $v["info_name"] = $value;
                    $v["info_interface"] = $interface;
                    $v["info_bundlename"] = $interface;
                    $newkey = substr($k, 0, 5) . "_" . md5($interface . $k);
                    $ret[$newkey] = $v;
                } else {
                    $match = strpos(strtolower($k), $query);
                    if ($match !== false && $match >= 0) {
                        $v["info_lang"] = $language;
                        $v["info_key"] = $k;
                        $v["info_name"] = $value;
                        $v["info_interface"] = $interface;
                        $v["info_bundlename"] = $interface;
                        $newkey = substr($k, 0, 5) . "_" . md5($interface . $k);
                        $ret[$newkey] = $v;
                    }
                }
            }
        }

        // print_r($ret);exit;
        // print_r($this->dirLang);exit;

        ksort($ret);
        return $ret;
    }


    public function searchFilelang(string $lang){

        foreach( service('autoloader')->getNamespace() as $k => $namespace ){
            foreach( config('language')->autoDiscover as $autoDiscover ){
                if($k == $autoDiscover){
                    foreach (service('locator')->listNamespaceFiles($k, '/Language/'.$lang.'/') as $file) {
                       
                        if (is_file($file) && pathinfo($file, PATHINFO_EXTENSION) == 'php') {
                            $pathinfo = (pathinfo($file));
                            if($pathinfo['filename'] != 'CLI'){
                                $this->dirLang[] = ['name' => $pathinfo['filename'], 'path' => $file];
                            }
                        }
                    }
                }
            }
        }
    }

    public function initPageHeaderToolbar()
    {
        parent::initPageHeaderToolbar();
        $this->pageHeaderToolbarBtn = [];
    }
}
