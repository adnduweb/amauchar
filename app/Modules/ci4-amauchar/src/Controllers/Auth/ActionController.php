<?php

namespace Amauchar\Core\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Shield\Authentication\Actions\ActionInterface;

/**
 * Class ActionController
 *
 * A generic controller to handle Authentication Actions.
 */
class ActionController extends BaseController
{
    /**
     * @var ActionInterface|null
     */
    protected $action;

    protected $helpers = ['auth', 'setting', 'assets', 'form', 'alerts'];

    /**
     * Perform an initial check if we have a valid action or not.
     *
     * @param string $method
     * @param mixed  ...$params
     */
    public function _remap($method, ...$params)
    {
        // Grab our action instance if one has been set.
        $actionClass = session('auth_action');

        if (! empty($actionClass) && class_exists($actionClass)) {
            $this->action = new $actionClass();
        }
        // var_dump($this->action); exit;

        if (empty($this->action) || ! $this->action instanceof ActionInterface) {
            throw new PageNotFoundException();
        }

        return $this->{$method}(...$params);
    }

    /**
     * Shows the initial screen to the user to start the flow.
     * This might be asking for the user's email to reset a password,
     * or asking for a cell-number for a 2FA.
     *
     * @return mixed
     */
    public function show()
    {
        return $this->action->show();
    }

    /**
     * Processes the form that was displayed in the previous form.
     *
     * @return mixed
     */
    public function handleOverride()
    {

        $email = $this->request->getPost('email');
        $user  = auth()->user();

        if (empty($email) || $email !== $user->getEmail()) {
            alert('error', lang('Auth.invalidEmail'));
            return redirect()->route('auth-action-show')->with('error', lang('Auth.invalidEmail'));
        }

        /** @var UserIdentityModel $identityModel */
        $identityModel = model(UserIdentityModel::class);

        $identity = $identityModel->getIdentityByType($user->getAuthId(), 'email_2fa');

        if (empty($identity)) {
            alert('error', lang('Auth.need2FA'));
            return redirect()->route('auth-action-show')->with('error', lang('Auth.need2FA'));
        }

        // Send the user an email with the code
        helper('email');
        $email = emailer();
        $email->setFrom(setting('Email.fromEmail'), setting('Email.fromName') ?? '')
            ->setTo($user->getAuthEmail())
            ->setSubject(lang('Auth.email2FASubject'))
            ->setMessage(view(setting('Auth.views')['action_email_2fa_email'], ['code' => $identity->secret]))
            ->send();

        return view(setting('Auth.views')['action_email_2fa_verify']);

        //echo 'fggsdfgsdg'; exit;
        return $this->action->handle($this->request);
    }

    /**
     * This handles the response after the user takes action
     * in response to the show/handle flow. This might be
     * from clicking the 'confirm my email' action or
     * following entering a code sent in an SMS.
     *
     * @return mixed
     */
    public function verifyOverride()
    {
        $token    = $this->request->getPost('token');
        $user     = auth()->user();
        $identity = $user->getIdentity('email_2fa');

        // Token mismatch? Let them try again...
        if (empty($token) || $token !== $identity->secret) {
            $_SESSION['error'] = lang('Auth.invalid2FAToken');
            alert('error', lang('Auth.invalid2FAToken'));
            return view(setting('Auth.views')['action_email_2fa_verify']);
        }

        /** @var UserIdentityModel $identityModel */
        $identityModel = model(UserIdentityModel::class);

        // On success - remove the identity and clean up session
        $identityModel->deleteIdentitiesByType($user->getAuthId(), 'email_2fa');

        // Clean up our session
        session()->remove('auth_action');

        // Get our login redirect url
        return redirect()->to(config('Auth')->loginRedirect());
    }
}
