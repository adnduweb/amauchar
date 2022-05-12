<?php

namespace Amauchar\Core\Controllers\Auth;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;
use CodeIgniter\Shield\Controllers\MagicLinkController as ShieldMagicLinkController;
use CodeIgniter\Shield\Models\UserIdentityModel;

class MagicLinkController extends ShieldMagicLinkController
{
    use ResponseTrait;

    protected $helpers = ['auth', 'setting', 'assets', 'form', 'alerts',  'themes'];

    protected $theme = 'Auth';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Displays the view to enter their email address
     * so an email can be sent to them.
     */
    public function loginView(): string
    {

        return view(setting('Auth.views')['magic-link-login']);
    }

    /**
     * Receives the email from the user, creates the hash
     * to a user identity, and sends an email to the given
     * email address.
     *
     * @return RedirectResponse|string
     */
    public function loginActionAjax()
    {
        $email = $this->request->getPost('email');
        $user  = $this->provider->findByCredentials(['email' => $email]);

        if (empty($email) || $user === null) {
            $response = ['error'  => true,'message' => lang('Auth.invalidEmail')];
            return $this->respond($response, 500);
        }

        /** @var UserIdentityModel $identityModel */
        $identityModel = model(UserIdentityModel::class);

        // Delete any previous magic-link identities
        $identityModel->deleteIdentitiesByType($user->getAuthId(), 'magic-link');

        // Generate the code and save it as an identity
        helper('text');
        $token = random_string('crypto', 20);

        $identityModel->insert([
            'user_id' => $user->getAuthId(),
            'type'    => 'magic-link',
            'secret'  => $token,
            'expires' => Time::now()->addSeconds(setting('Auth.magicLinkLifetime'))->toDateTimeString(),
        ]);

        // Send the user an email with the code
        helper('email');
        $email = emailer();
        $email->setFrom(setting('Email.fromEmail'), setting('Email.fromName') ?? '')
            ->setTo($user->getAuthEmail())
            ->setSubject(lang('Auth.magicLinkSubject'))
            ->setMessage(view(setting('Auth.views')['magic-link-email'], ['token' => $token]))
            ->send();

            $response = [
                'error'    => null,
                'messages' => [
                    'sucess' => lang('Auth.forgotSuccess')
                ], 
            ];
            return $this->respond($response, 200);
    }

    //fabrice@adnduweb.com


     /**
     * Handles the GET request from the email
     */
    public function verifyOverride()
    {

        //http://localhost:8080/login/verify-magic-link?token=b1ea41b73331702d4182
        //echo 'fabrice'; exit;
        $token = $this->request->getGet('token');

        /** @var UserIdentityModel $identityModel */
        $identityModel = model(UserIdentityModel::class);

        $identity = $identityModel->getIdentityBySecret('magic-link', $token);

        // No token found?
        if ($identity === null) {
            alert('error', lang('Auth.magicTokenNotFound'));
            return redirect()->route('magic-link')->with('error', lang('Auth.magicTokenNotFound'));
        }

        // Delete the db entry so it cannot be used again.
        $identityModel->delete($identity->id);

        // Token expired?
        if (Time::now()->isAfter($identity->expires)) {
            alert('error', lang('Auth.magicLinkExpired'));
            return redirect()->route('magic-link')->with('error', lang('Auth.magicTokenNotFound'));
        }

        // Log the user in
        $auth = service('auth');
        $auth->loginById($identity->user_id);

        // Get our login redirect url
        return redirect()->to(config('Auth')->loginRedirect());
    }


    /**
     * Display the "What's happening/next" message to the user.
     *
     * @return string
     */
    protected function displayMessage(): string
    {
        return $this->render(setting('Auth.views')['magic-link-message']);
    }
}
