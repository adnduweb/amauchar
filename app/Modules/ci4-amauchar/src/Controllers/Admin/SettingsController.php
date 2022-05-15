<?php

namespace Amauchar\Core\Controllers\Admin;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Amauchar\Core\Controllers\Admin\AdminController;
use DateTimeZone;

/**
 * Class DashboardController
 *
 * A generic controller to handle Authentication Actions.
 */
class SettingsController extends AdminController
{

    use ResponseTrait;

    protected $viewPrefix = '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\settings\\';

    protected $helpers    = ['error'];

    /**
     * Displays the form the login to the site.
     */
    public function index()
    {

        $timezoneAreas = [];

        foreach (timezone_identifiers_list() as $timezone) {
            if (strpos($timezone, '/') === false) {
                $timezoneAreas[] = $timezone;

                continue;
            }

            [$area, $zone] = explode('/', $timezone);
            if (! in_array($area, $timezoneAreas, true)) {
                $timezoneAreas[] = $area;
            }
        }

        $currentTZ     = setting('App.timezone');
        $currentTZArea = strpos($currentTZ, '/') === false
            ? $currentTZ
            : substr($currentTZ, 0, strpos($currentTZ, '/'));


        $rememberOptions = [
            '1 hour'   => 1 * HOUR,
            '4 hours'  => 4 * HOUR,
            '8 hours'  => 8 * HOUR,
            '25 hours' => 24 * HOUR,
            '1 week'   => 1 * WEEK,
            '2 weeks'  => 2 * WEEK,
            '3 weeks'  => 3 * WEEK,
            '1 month'  => 1 * MONTH,
            '2 months' => 2 * MONTH,
            '6 months' => 6 * MONTH,
            '1 year'   => 12 * MONTH,
        ];

        $this->viewData['getThemesAdmin']  = $this->getThemesAdmin();
        $this->viewData['getThemesFront']  = $this->getThemesFront();
        $this->viewData['languages']       = Config('Language')->supportedLocales;
        $this->viewData['timezones']       = $timezoneAreas;
        $this->viewData['currentTZArea']   = $currentTZArea;
        $this->viewData['timezoneOptions'] = $this->getTimezones($currentTZArea);
        $this->viewData['dateFormat']      = setting('App.dateFormat') ?: 'M j, Y';
        $this->viewData['timeFormat']      = setting('App.timeFormat') ?: 'g:i A';
        $this->viewData['rememberOptions'] = $rememberOptions;
        $this->viewData['defaultGroup']    = setting('AuthGroups.defaultGroup');
        $this->viewData['groups']          = setting('AuthGroups.groups');

        echo $this->render($this->viewPrefix . 'index', $this->viewData);
    }

     /**
     * Saves the general settings
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function update()
    {

        $rules = [
            'nameApp'   => 'required|string',
            'timezone'   => 'required|string',
            'dateFormat' => 'required|string',
            'timeFormat' => 'required|string',
        ];

        if (! $this->validate($rules)) {
            $response = [
                'errors' => $this->validator->getErrors()            
            ];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }

        setting('App.nameApp', $this->request->getPost('nameApp', FILTER_SANITIZE_STRING));
        setting('App.nameShortApp', $this->request->getPost('nameShortApp', FILTER_SANITIZE_STRING));
        setting('App.descApp', $this->request->getPost('descApp'));
        setting('App.languagebo', $this->request->getPost('languagebo') === 'fr');
        setting('App.addSignature', $this->request->getPost('addSignature') === '1');
        setting('App.modeMaintenance', $this->request->getPost('modeMaintenance') === '1');
        setting('App.modeEvironnement', $this->request->getPost('modeEvironnement'));
        setting('App.appTimezone', $this->request->getPost('timezone'));

        setting('App.dateFormat', $this->request->getPost('dateFormat'));
        setting('App.timeFormat', $this->request->getPost('timeFormat'));

        $response = [
            'error'    => null,
            'messages' => [
                'sucess' => lang('Core.resourcesSaved')
            ]
        ];
        return $this->respond($response, 200);

    }

    public function getThemesAdmin()
    {
        $dirTheme = [];
        foreach (glob(ROOTPATH . '/public/backend/themes/*', GLOB_ONLYDIR) as $dir) {
            $dirTheme[] = basename($dir);
        }
        return $dirTheme;
    }

    public function getThemesFront()
    {
        $dirTheme = [];
        if(empty($dirTheme)){
            foreach (glob(ROOTPATH . '/public/frontend/themes/*', GLOB_ONLYDIR) as $dir) {
                $dirTheme[] = basename($dir);
            }
        }

        return $dirTheme;
    }

     /**
     * AJAX method to list available timezones within
     * a single timezone area  (AMERICA, AFRICA, etc)
     */
    public function getTimezones(?string $area = null): string
    {
        $area = $area === null
            ? $this->request->getVar('timezoneArea')
            : $area;
        $ids = [
            'Africa'     => DateTimeZone::AFRICA,
            'America'    => DateTimeZone::AMERICA,
            'Antarctica' => DateTimeZone::ANTARCTICA,
            'Arctic'     => DateTimeZone::ARCTIC,
            'Asia'       => DateTimeZone::ASIA,
            'Atlantic'   => DateTimeZone::ATLANTIC,
            'Australia'  => DateTimeZone::AUSTRALIA,
            'Europe'     => DateTimeZone::EUROPE,
            'Indian'     => DateTimeZone::INDIAN,
            'Pacific'    => DateTimeZone::PACIFIC,
        ];

        $options = [];

        if ($area === 'UTC') {
            $options[] = ['UTC' => 'UTC'];
        } else {
            //echo $ids[$area]; 
            //print_r(timezone_identifiers_list($ids[$area]));exit;
            foreach (timezone_identifiers_list($ids[$area]) as $timezone) {
                $formattedTimezone  = str_replace('_', ' ', $timezone);
                $formattedTimezone  = str_replace($area . '/', '', $formattedTimezone);
                $options[$timezone] = $formattedTimezone;
            }
        }

        return view($this->viewPrefix . 'partials\_timezones', [
            'options'    => $options,
            'selectedTZ' => setting('App.timezone'),
        ]);
    }

     /**
     * Update item details.
     *
     * @param string $itemId
     *
     * @return Mixed
     */
    public function updateUser()
    {
        if($this->request->getGet('asideToogle') == true){
            $context = 'user:' . user_id();
            $mode = (service('settings')->get('App.asideToogle', $context) == 1) ? 0 : 1;
            service('settings')->set('App.asideToogle', $mode, $context ); 
        }

        if($this->request->getGet('darkModeEnabled') == true){
            $context = 'user:' . user_id();
            $mode = ($this->request->getGet('darkModeEnabled') == 'true') ? 0 : 1;
            service('settings')->set('App.modeDark', $mode, $context ); 
        }

        if($this->request->getGet('changeLanguageBO') == true){
            $lang = $this->request->getGet('changeLanguageBO');
            $context = 'user:' . user_id();
            service('settings')->set('App.languagebo', $lang, $context ); 
        }

        
        return redirect()->back();

    }

    /**
     * Display the Email settings page.
     *
     * @return string
     */
    public function emailIndex()
    {
        $tabs = [
            'mail'     => 1,
            'sendmail' => 2,
            'smtp'     => 3,
        ];

        $this->viewData['config']    = config('Email');
        $this->viewData['activeTab'] = $tabs[setting('Email.protocol') ?? 'smtp'];

        echo $this->render($this->viewPrefix . 'email', $this->viewData);

    }

     /**
     * Saves the email settings to the config file, where it
     * is automatically saved by our dynamic configuration system.
     */
    public function saveEmail()
    {
        $rules = [
            'fromName'      => 'required|string|min_length[2]',
            'fromEmail'     => 'required|valid_email',
            'protocol'      => 'required|in_list[mail,sendmail,smtp]',
            'mailPath'      => 'permit_empty|string',
            'SMTPHost'      => 'permit_empty|string',
            'SMTPPort'      => 'permit_empty|in_list[25,587,465,2525,other]',
            'SMTPPortOther' => 'permit_empty|string',
            'SMTPUser'      => 'permit_empty|string',
            'SMTPPass'      => 'permit_empty|string',
            'SMTPCrypto'    => 'permit_empty|in_list[ssl,tls]',
            'SMTPTimeout'   => 'permit_empty|integer|greater_than_equal_to[0]',
            'SMTPKeepAlive' => 'permit_empty|in_list[0,1]',
        ];

        if (! $this->validate($rules)) {
            $response = [
                'errors' => $this->validator->getErrors()            
            ];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }

        $port = $this->request->getPost('SMTPPort') === 'other'
            ? $this->request->getPost('SMTPPortOther')
            : $this->request->getPost('SMTPPort');

        setting('Email.fromName', $this->request->getPost('fromName'));
        setting('Email.fromEmail', $this->request->getPost('fromEmail'));
        setting('Email.protocol', $this->request->getPost('protocol'));
        setting('Email.mailPath', $this->request->getPost('mailPath'));
        setting('Email.SMTPHost', $this->request->getPost('SMTPHost'));
        setting('Email.SMTPPort', $port);
        setting('Email.SMTPUser', $this->request->getPost('SMTPUser'));
        setting('Email.SMTPPass', $this->request->getPost('SMTPPass'));
        setting('Email.SMTPCrypto', $this->request->getPost('SMTPCrypto'));
        setting('Email.SMTPTimeout', $this->request->getPost('SMTPTimeout'));
        setting('Email.SMTPKeepAlive', $this->request->getPost('SMTPKeepAlive'));

        $response = [
            'error'    => null,
            'messages' => [
                'sucess' => lang('Core.resourcesSaved')
            ]
        ];
        return $this->respond($response, 200);
    }

    public function initPageHeaderToolbar()
    {
            parent::initPageHeaderToolbar();
            $this->pageHeaderToolbarBtn = [];
    }

    

      /**
     * Display the Consent settings page.
     *
     * @return string
     */
    public function consentIndex()
    {
        $this->viewData['consents'] = setting('Consent.consents');
        return $this->render($this->viewPrefix . 'consent', $this->viewData);
    }

    /**
     * Saves the consent settings to the config file, where it
     * is automatically saved by our dynamic configuration system.
     */
    public function saveConsent()
    {
        $rules = [
            'requireConsent'  => 'required',
            'consentLength'   => 'required_with[requireConsent]|string',
            'policyUrl'       => 'required_with[requireConsent]|string',
            'consentMessage'  => 'required_with[requireConsent]|string',
            'consents.*.name' => 'required_with[requireConsent]|string',
            'consents.*.desc' => 'required_with[requireConsent]|string',
        ];

        if (! $this->validate($rules)) {
            $response = [
                'errors' => $this->validator->getErrors()            
            ];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }

        setting('Consent.requireConsent', $this->request->getPost('requireConsent'));
        setting('Consent.consentLength', $this->request->getPost('consentLength'));
        setting('Consent.policyUrl', $this->request->getPost('policyUrl'));
        setting('Consent.consentMessage', $this->request->getPost('consentMessage'));
        setting('Consent.consents', $this->request->getPost('consents'));

        $response = [
            'error'    => null,
            'messages' => [
                'sucess' => lang('Core.resourcesSaved')
            ]
        ];
        return $this->respond($response, 200);
    }

    public function userCurrent(){

        if($this->request->getMethod() == "post"){

            $context = 'user:' . user_id();


            service('settings')->set('App.forceUnlockMdp', $this->request->getPost('forceUnlockMdp') === '1', $context ); 
            service('settings')->set('App.lockLoginIp', $this->request->getPost('lockLoginIp') === '1', $context ); 
            $adresseIpUnlock = $this->request->getPost('adresseIpUnlock');
            if($adresseIpUnlock){
                if(!preg_match("/;/i", $adresseIpUnlock)) {
                    $response = ['errors' => lang('Core.notConforme')];
                    return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
                }

                $adresseIpUnlock = explode(';', $this->request->getPost('adresseIpUnlock'));
                service('settings')->set('App.adresseIpUnlock', $adresseIpUnlock, $context ); 
                
            }

           
    
            $response = [
                'error'    => null,
                'messages' => [
                    'sucess' => lang('Core.resourcesSaved')
                ]
            ];
            return $this->respond($response, 200);
        }

        $permissions = setting('AuthGroups.permissions');
        if (is_array($permissions)) {
            ksort($permissions);
        }
        $this->viewData['permissions'] = $permissions;
        // Retrieve all access tokens as an array of AccessToken instances.
        $this->viewData['tokens'] = Auth()->user()->accessTokens();
        return $this->render($this->viewPrefix . 'index_user', $this->viewData);
    }
}
