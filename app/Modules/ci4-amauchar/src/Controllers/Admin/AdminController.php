<?php

namespace Amauchar\Core\Controllers\Admin;

use Amauchar\Core\Libraries\language;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class AdminController extends BaseController
{

    public $theme_admin = 'basic';

    public static $isBackend = true;

    /** @var string */
    protected $display;

     /** @var integer  */
     protected $id;

      /** @var string  */
    protected $action;

    /**  @var object  */
    public $enity = null;

    /**  @var object  */
    public $tableModel = null;

    /** @var ObjectModel Instantiation of the class associated with the AdminController */
    protected $object;

    /** @var string **/
    protected $controllerName;

    /** @var array */
    protected $viewData = [];

    public $filterDatabase = true;

    public $allow_export = true;

    /** @var bool */
    public $allow_import = true;

    /** @var array */
    public $type_export = ['excel', 'pdf', 'csv'];

    public $pageTitleDefault;

    public $pageHeaderToolbarBtn;

    public $breadcrumbs;

    protected $errors = [];

    /**
     * Are we currently in the admin area?
     *
     * @var bool
     */
    public $inAdmin = false;


    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        $this->helpers = array_merge($this->helpers, ['auth', 'assets', 'setting', 'themes', 'form', 'array', 'alerts']);

        parent::initController($request, $response, $logger);

        // start benchmarking
        service('timer')->start('admin_controller');

        $this->theme = service('settings')->get('App.themebo');
        $language = new language();
        $this->viewData['supportedLocales']  = $language->supportedLocales();
        setlocale(LC_TIME, service('request')->getLocale() . '_' .  service('request')->getLocale());
        $this->namespace = service('router')->controllerName();
        $handle = explode('\\', $this->namespace);
        $this->controller = end($handle);
        $this->name = strtolower(str_replace('Controller', '', $this->controller));
        $this->uri_edit_segment = dot_array_search('edit', array_flip(service('uri')->getSegments()));
        $this->id = (empty($this->uri_edit_segment)) ? null : (service('uri')->getSegment($this->uri_edit_segment +2));
        $this->tableModel = (!is_null($this->tableModel)) ? new $this->tableModel : null;
        if (!is_null($this->tableModel)) {
            $this->identifier = $this->tableModel->primaryKey;
        }
        $this->saveInAdmin();
        $this->init();

        service('timer')->stop('admin_controller');
    }

    public function init()
    {

        $this->initPageHeaderToolbar();
        $this->initBreadcrumbs();

        $data = [
            'maintenance_mode' => service('settings')->get('App.core', 'maintenance'),
            'controller' => $this->controller,
            'name' => $this->name,
            'display' => $this->display,
            'debug_mode' => env('CI_ENVIRONMENT'),
            'lite_display' => ( theme()->getOption('layout', 'header/display') === true && theme()->getOption('layout', 'footer/display') === true) ? false : true,
            'show_page_header_toolbar' => theme()->getOption('layout', 'header/display'),
            'pageTitleDefault' => ($this->pageTitleDefault) ? $this->pageTitleDefault : lang('Core.titre'),
            'pageHeaderToolbarBtn' => $this->pageHeaderToolbarBtn,
            'filterDatabase' => $this->filterDatabase,
            'allow_export' => $this->allow_export,
            'allow_import' => $this->allow_import,
            'type_export' => $this->type_export,
            'breadcrumbs' => $this->breadcrumbs,

        ];

        $this->viewData = array_merge($data, $this->viewData);

        $this->addJsDf(); // Display param js
    }

    protected function addJsDf()
    {

        $this->viewData['addJsDef'] =  [
            'base_url'       => site_url(),
            'current_url'    => current_url(),
            'baseController' => site_url(route_to($this->name . '.index')),
            'uri'            => $this->request->uri->getPath(),
            'basePath'       => '\/',
            'segementAdmin'  => env('ADMIN_AREA'),
            'startUrl'       => '\/' . env('ADMIN_AREA'),
            'lang_iso'       => service('settings')->get('App.languagebo'),
            'crsftoken'      => csrf_token(),
            'csrfHash'       => csrf_hash(),
            'env'            => ENVIRONMENT,
            'SP_VERSION'     => config('Core')->version
        ];

        if ($this->inAdmin) {

            $this->viewData['addJsDef']['user_uuid']           = auth()->user()->uuid;
            $this->viewData['addJsDef']['activer_multilangue'] = service('settings')->get('App.languagebo');
            $this->viewData['addJsDef']['system']              = json_encode(['sendMailAccountManager' => site_url(route_to('send.mail.account.manager')), 'controller' => $this->controller,  'ajax' => site_url(route_to('admin.ajax.index'))]);
        }
    }


     /**
     * Set breadcrumbs array for the controller page.
     *
     * @param int|null $tab_id
     * @param array|null $tabs
     */
    public function initBreadcrumbs(){
        $this->breadcrumbs = bootstrap()->getBreadcrumb();
        //print_r( $this->breadcrumbs); exit;
    }



    public function initPageHeaderToolbar()
    {
        if (theme()->getOption('toolbar', 'display') === true){
            $this->initToolbarTitle();
        }

        $this->display = service('router')->methodName();
        switch ($this->display) {
            case 'index':   
                $this->pageTitleDefault = lang('Core.List: %s', [$this->name]);
                    $this->pageHeaderToolbarBtn['create'] = [
                        'color' => 'primary',
                        'href'  => site_url(route_to(singular($this->name) . '.create')),
                        'svg'   => theme()->getSVG("icons/duotune/arrows/arr087.svg", "svg-icon svg-icon-5 m-0"),
                        'desc'  => lang('Core.addItem')
                    ];

                break;
            case 'update':
                break;
            case 'edit':
                     $this->pageHeaderToolbarBtn['back'] = [
                        'color' => 'secondary',
                        'href'  => site_url(route_to($this->name . '.index')),
                        'svg'   => theme()->getSVG("icons/duotone/Navigation/Arrow-from-right.svg", "svg-icon-5 svg-icon-gray-500 me-1"),
                        'desc'  => lang('Core.backToList'),
                     ];
                     $this->pageHeaderToolbarBtn['create'] = [
                        'color' => 'primary',
                        'href'  => site_url(route_to(singular($this->name) . '.create')),
                        'svg'   => theme()->getSVG("icons/duotune/arrows/arr087.svg", "svg-icon svg-icon-5 m-0"),
                        'desc'  => lang('Core.addItem'),
                    ];
            
                break;
            case 'create':
            break;
            case 'new':
                    $this->pageHeaderToolbarBtn['back'] = [
                        'color' => 'secondary',
                        'href'  => site_url(route_to($this->name . '.index')),
                        'svg'   => theme()->getSVG("icons/duotone/Navigation/Arrow-from-right.svg", "svg-icon-5 svg-icon-gray-500 me-1"),
                        'desc'  => lang('Core.backToList'),
                    ];
                    $this->pageHeaderToolbarBtn['create'] = [
                        'color' => 'primary',
                        'href'  => site_url(route_to(singular($this->name) . '.create')),
                        'svg'   => theme()->getSVG("icons/duotune/arrows/arr087.svg", "svg-icon svg-icon-5 m-0"),
                        'desc'  => lang('Core.addItem'),
                    ];

                break;
                default:
                     if(!is_null($this->tableModel)){
                        $this->toolbar_btn['new'] = [
                            'color' => 'dark',
                            'svg'   => service('theme')->getSVG("icons/duotone/Communication/Contact1.svg", "svg-icon-5 svg-icon-gray-500 me-1"),
                            'href' => 'javascript:;',
                            'desc' => lang('Core.Help'),
                        ];
                    }
        }

        //print_r($this->pageHeaderToolbarBtn); exit;
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


     /**
     * Checks to see if we're in the admin area
     * by analyzing the current url and the ADMIN_AREA constant.
     */
    private function saveInAdmin()
    {
        $url = current_url();

        $path = parse_url($url, PHP_URL_PATH);

        $this->inAdmin = strpos($path, ADMIN_AREA) !== false;
    }

    protected function convertBinToUuid(array $data){

        if(isset($this->tableModel->uuidFields) && !empty($this->tableModel->uuidFields) ){

            // Must use the set() method to ensure to set the correct escape flag
            $i = 0;
            foreach ($data as &$val)
            {
                // Convert UUID fields if needed
                if ($val->uuid && in_array('uuid', $this->tableModel->uuidFields) && $this->tableModel->uuidUseBytes === true){
                    $val->uuid = service('uuid')->fromBytes($val->uuid)->toString();
                }
               
                $i++;
            }
        }

        return $data;

    }

      /**
	 * Handles failures.
	 * https://www.twilio.com/blog/create-secured-restful-api-codeigniter-php REST API
	 * @param int $code
	 * @param string $message
	 * @param boolean|null $isAjax
	 */
	protected function failure(int $code, string $message, bool $isAjax = null)
	{
		log_message('debug', $message);

		if ($isAjax ?? service('request')->isAJAX())
		{

            $response = [
                'status'   => $code,
                'error'    => true,
                'messages' => [
                    'error' => $message
                ],
                csrf_token() => csrf_hash()
            ];

			return $this->response->setStatusCode($code)->setJSON($response);
		}

		return redirect()->back()->with('error', $message);
    }

}