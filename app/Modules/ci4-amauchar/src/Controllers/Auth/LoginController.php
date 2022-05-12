<?php

namespace Amauchar\Core\Controllers\Auth;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Events\Events;
use CodeIgniter\Shield\Controllers\LoginController as ShieldLogin;
use CodeIgniter\HTTP\RedirectResponse;

class LoginController extends ShieldLogin
{
    use ResponseTrait;

    protected $helpers = ['auth', 'setting', 'assets', 'form',  'themes'];

    protected $theme = 'Auth';

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


        return view(config('Auth')->views['login'], [
            'allowRemember' => setting('Auth.sessionConfig')['allowRemembering'],
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
     * Logs the current user out.
     */
    public function logoutAction(): RedirectResponse
    {
        $user = auth()->user();

        auth()->logout();

        return redirect()->to(config('Auth')->logoutRedirect());
    }
}
