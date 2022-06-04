<?php

namespace Amauchar\Core\Controllers\Auth;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Events\Events;
use Amauchar\Core\Entities\User;
use Amauchar\Core\Models\UserModel;
use Amauchar\Core\Models\UserIdentityModel;
use CodeIgniter\Shield\Controllers\LoginController as ShieldLogin;
use CodeIgniter\HTTP\RedirectResponse;

class LoginController extends ShieldLogin
{
    use ResponseTrait;

    protected $helpers = ['auth', 'setting', 'assets', 'form',  'themes', 'alerts'];

    protected $theme = 'Auth';

    public $googleClient=NULL;

    public function __construct(){

        // echo 'faba';
        // var_dump(service('settings')->get('App.activeGoogle')); exit;
        if ( (service('settings')->get('App.activeGoogle') == true)) {
            $this->googleClient = new \Google_Client();
            $this->googleClient->setClientId(service('settings')->get('App.gclientID'));
            $this->googleClient->setClientSecret(service('settings')->get('App.gsecretID'));
            $this->googleClient->setRedirectUri(site_url(route_to('action.login.gauth')));
            $this->googleClient->setAccessType('online');
            $this->googleClient->addScope('email');
            $this->googleClient->addScope('profile');
        }
    }

    /**
     * Display the login view
     *
     * @return string|void
     */ 
    public function loginViewOverride() 
    {

        //echo session()->get('_ci_previous_url');exit;

       
        if (auth()->loggedIn()) {
            return redirect()->route('dashboard.index');
        }

        $this->viewData['boutGoogleClient'] = '#';
        if ( (setting('App.activeGoogle') == true)) {
            $this->viewData['boutGoogleClient'] = $this->googleClient->createAuthUrl();
        }


        return view(config('Auth')->views['login'], [
            'allowRemember' => setting('Auth.sessionConfig')['allowRemembering'],
            'boutGoogleClient' => $this->viewData['boutGoogleClient']
        ]);
    }

    /**
     * Attempts to log the user in.
     */
    public function loginActionAjax()
    {
        $request                 = service('request');
        $credentials             = $request->getPost(setting('Auth.validFields'));
        $credentials             = array_filter($credentials);
        $credentials['password'] = $request->getPost('password');
        $remember                = (bool) $request->getPost('remember');

        $validCreds = auth()->check($credentials); 

        if (! $validCreds->isOK()) {
            $response = [
                'errors' => [$validCreds->reason()],
                'message' => $validCreds->reason()
            ];
            return $this->respond($response, 500);
        }

        if (! $validCreds->extraInfo()->active)
        {
            Events::trigger('notActivatedLogin', $credentials);
            $response = [
                'errors' => [lang('Auth.notActivated')],
                'message' => lang('Auth.notActivated')
            ];
            return $this->respond($response, 500);
        }


        // Attempt to login
        $result = auth('session')->remember($remember)->attempt($credentials);
        if (! $result->isOK()) {
            unset($credentials['password'], $credentials['password_confirm']);
            Events::trigger('failedLogin', $credentials);

            $response = [
                'error'  => true,
                'errors' => [$result->reason()],
                'message' => ''
            ];
            return $this->respond($response, 500);
           // return redirect()->route('login')->withInput()->with('error', );
        }

        $user = $result->extraInfo();
       

        Events::trigger('didLogin', $user);

        // If an action has been defined for login, start it up.
        $actionClass = setting('Auth.actions')['login'] ?? null;
        if (! empty($actionClass)) {
            session()->set('auth_action', $actionClass);

            $response = [
                'error'    => null,
                'messages' => [
                    'sucess' => lang('Auth.loginSuccess')
                ], 
                'redirect' => site_url(route_to('auth-action-show'))
            ];
            return $this->respond($response, 200);

           // return redirect()->to(route_to('auth-action-show'));
        }
        $redirect = '';

        if(session()->get('redirect_url')){
            $redirect = session()->get('redirect_url');
        }
        else{
            $redirect = config('Auth')->loginRedirect();
        }

        $response = [
            'error'    => null,
            'messages' => [
                'sucess' => lang('Auth.loginSuccess')
            ], 
            'redirect' => $redirect
        ];
        return $this->respond($response, 200);
        //return redirect()->to(config('Auth')->logoutRedirect());
    }

    /**
     * Attempts to log the user in.
     *
     * @return Response|string
     */
    public function loginActionOverride()
    {
        /** @var IncomingRequest $request */
        $request = service('request');

        $credentials             = $request->getPost(setting('Auth.validFields'));
        $credentials             = array_filter($credentials);
        $credentials['password'] = $request->getPost('password');
        $remember                = (bool) $request->getPost('remember');

        $rules = [
             'email'           => 'required|valid_email',
             'password'         => 'required',
        ];

        if (! $this->validate($rules)) {
            $response = ['errors' => $this->validator->getErrors()];
            return redirect()->route('login')->withInput()->with('error',$this->validator->getErrors());
        }

        $validCreds = auth()->check($credentials); 

        if (! $validCreds->isOK()) {
            return redirect()->route('login')->withInput()->with('error',  lang('Auth.notActivated'));
        }

        if (! $validCreds->extraInfo()->active) {
            Events::trigger('notActivatedLogin', $credentials);
            return redirect()->route('login')->withInput()->with('error', $result->reason());
        }

        // Attempt to login
        $result = auth('session')->remember($remember)->attempt($credentials);
        if (! $result->isOK()) {
            return redirect()->route('login')->withInput()->with('error', $result->reason());
        }

        $user = $result->extraInfo();

        // If an action has been defined for login, start it up.
        $actionClass = setting('Auth.actions')['login'] ?? null;
        if (! empty($actionClass)) {
            return redirect()->to(route_to('auth-action-show'))->withCookies();
        }

        if(session()->get('redirect_url')){
            $redirect = session()->get('redirect_url');
        }
        else{
            $redirect = config('Auth')->loginRedirect();
        }

        return redirect()->to($redirect)->withCookies();
    }

    /** 
     * Logs the current user out.
     */
    public function logoutAction(): RedirectResponse
    {
        $user = auth()->user();

        auth()->logout();

        return redirect()->to(config('Auth')->logoutRedirect());
    }

    public function gauth()
    {
        // $session = session();
        //var_dump($this->googleClient); exit;

        $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getGet('code'));

        if (!isset($token['error']))
        {
            $this->googleClient->setAccessToken($token['access_token']);
            session()->set("AccessToken", $token['access_token']);

            $googleService = new \Google_Service_Oauth2($this->googleClient);
            $data = $googleService->userinfo->get();
            $currentDateTime = date("Y-m-d H:i:s");

            $userdata = array();
            if ($user = model(UserIdentityModel::class)->where('secret', $data['email'])->first())
            {

                if($user->active == '0'){
                    alert('error', lang('Auth.resourceNotFound', ['user']));
                    return redirect()->to(route_to('action.login'));
                }

                //User ALready Login and want to Login Again
                $userdata = ['verification_code' => $data['id'], 'first_name' => $data['given_name'], 'last_name' => $data['family_name'], 'email' => $data['email'], 'profile_pic' => $data['picture'], 'last_modified' => $currentDateTime];
                //$this->loginModel->updateGoogleUser($userdata, $data['id']);
                session()->set("idProvider", $userdata['verification_code']);
                session()->set("provider", 'google');
                session()->set(setting('Auth.sessionConfig')['field'], $user->id);
                Events::trigger('connectSucccesGoogle', $userdata);

            }
            else
            {
                // //new User want to Login
                $userdata = ['social_provider' => 'Google', 'status' => 'active', 'verification_code' => $data['id'], 'first_name' => $data['given_name'], 'last_name' => $data['family_name'], 'email' => $data['email'], 'profile_pic' => $data['picture'], 'created_at' => $currentDateTime];
                // $this->loginModel->createGoogleUser($userdata);
                alert('error', lang('Auth.resourceNotFound', ['user']));
                return redirect()->to(route_to('action.login'));
            }

            session()->set("logged_user", $userdata['verification_code']);
        }
        else
        {
            alert('error', lang('Auth.resourceNotFound', ['user']));
            return redirect()->to(route_to('action.login'));
        }

        $redirect = '';

        if(session()->get('redirect_url')){
            $redirect = session()->get('redirect_url');
        }
        else{
            $redirect = config('Auth')->loginRedirect();
        }

        //Successfull Login
        alert('success', lang('Auth.loginSuccess'));
        return redirect() ->to($redirect);
    }
}
