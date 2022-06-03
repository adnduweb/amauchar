<?php

namespace Amauchar\Pages\Controllers;

//use CodeIgniter\Controller;
//use \Adnduweb\Ci4Core\Traits\Themeable;
use \Amauchar\Pages\Libraries\Theme;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


abstract class BaseFrontController extends \App\Controllers\BaseController
{

    public $theme_front = 'default';

    public static $isBackend = false;
  
    /**
     * https://includebeer.com/en/blog/creating-a-multilingual-website-with-codeigniter-4-part-1
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
    protected $helpers = [];
    
    /** @var string|object */
    protected $tableModel = null;  

    /** @var ObjectModel Instantiation of the class associated with the AdminController */
    protected $object;

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
       
		// Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->theme = $this->theme_front;

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
        // E.g.: $this->session = \Config\Services::session();

        $this->helpers = array_merge($this->helpers, ['url', 'form', 'lang', 'string']);
        helper('\Amauchar\Core\Helpers\themes');
        helper('\Amauchar\Core\Helpers\assets');
        helper('front');
 
        $this->session   = service('session'); // Check Backtrace
        $this->encrypter = service('encrypter');

        $this->route      = (isset(service('router')->getMatchedRoute()[0]) ? service('router')->getMatchedRoute()[0] : null);
        $this->controller = service('router')->controllerName();
        $this->_method    = service('router')->methodName();
        $this->_module    = ($this->_method && strpos( $this->route , $this->_method) !== false ? preg_replace('/\/' . $this->_method . '$/', null,  $this->route ) :  $this->route );
        $this->tableModel = (!is_null($this->tableModel)) ? new $this->tableModel : null;
        
        setlocale(LC_TIME, service('request')->getLocale() . '_' .  service('request')->getLocale());

        $fullname = (!is_null($this->object)) ? ' : ' . $this->object->getFullName() : '';  

         // Display theme information
         $this->viewData['html']        = detectBrowser(true);
         $this->viewData['theme_front'] = $this->theme;
         $this->viewData['meta_title']  = lang('Front.site de démo');
         $this->viewData['controller']  = $this->controller;
         $this->viewData['locale'] = $request->getLocale();
         $this->viewData['supportedLocales'] = $request->config->supportedLocales;

         $this->viewData['mainMenu'] = (string) new \Amauchar\Pages\Libraries\MainMenu(); 
        

        $this->controller   = $this;

        return $this;
    }
    

      /**
     * Load class object using identifier in $_GET (if possible)
     * otherwise return an empty object, or die.
     *
     * @param bool $opt Return an empty object if load fail
     *
     * @return ObjectModel|false
     */
    protected function loadObject($opt = false)
    {

        if (!isset($this->className) || empty($this->className)) {
            return true;
        }

        if (!empty($this->id)) {

            
            //print_r(service('request')->getGet()); exit;
            if ($this->uuid->isValid($this->id)) {
                $this->id = $this->uuid->fromString($this->id)->getBytes();
            } else {
                $this->id = (int) $this->id;
            }

            // Check if uuid exist
            if (isset($this->tableModel->uuidFields)) {

                // Initialize form
                $this->object = $this->tableModel->where([$this->tableModel->uuidFields[0] => $this->id])->first();
            } else {

                // Initialize form
                $this->object = $this->tableModel->where([$this->tableModel->primaryKey => $this->id])->first();
            }

            //print_r($this->object); exit;

            if (Validate::isLoadedObject($this->object)) {
                return $this->object;
            }

            if ($this->silent == true) {
                return false;
            }else{
                $this->errors[] = lang('Core.The object cannot be loaded (or found)');
            }
                
            
        }
        else {
            $this->errors[] = lang('Core.The object cannot be loaded (the identifier is missing or invalid)');
            return false;
        }

    }
}
