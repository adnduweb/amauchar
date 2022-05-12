<?php

namespace Amauchar\Core\Controllers\Auth;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Events\Events;
use Amauchar\Core\Entities\User;
use CodeIgniter\Shield\Controllers\RegisterController as ShieldRegister;

class RegisterController extends ShieldRegister
{
    use ResponseTrait;

    protected $helpers = ['auth', 'setting', 'assets', 'form', 'alerts', 'themes'];

    protected $theme = 'Auth';

    /**
     * Displays the registration form.
     */
    public function registerView()
    {
        // Check if registration is allowed
        if (! setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }

        return view(config('Auth')->views['register']);
    }
 
     /**
     * Attempts to register the user.
     */
    public function registerActionAjax()
    {
        // Check if registration is allowed
        if (! setting('Auth.allowRegistration')) {
            $response = ['errors' => lang('Auth.registerDisabled')];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            //return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }

        $users = $this->getUserProvider();

        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

        if (! $this->validate($rules)) {
            $response = ['errors' => $this->validator->getErrors()];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            //return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(setting('Auth.validFields'), setting('Auth.personalFields'));
        $user              = $this->getUserEntity();

        $user->fill($this->request->getPost($allowedPostFields));

        if (! $users->save($user)) {
            $response = ['errors' => $users->errors()];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
           // return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // Get the updated user so we have the ID...
        $user = $users->find($users->getInsertID());

        // Store the email/password identity for this user.
        $user->createEmailIdentity($this->request->getPost(['email', 'password']));

        // Add to default group
        $users->addToDefaultGroup($user);

        // Extra On save lastname, fitsname, uuid
        $user->last_name = 'nc';
        $user->first_name = 'nc';
        $user->uuid = service('uuid')->uuid4()->toString();
        $users->save($user);

        //Save Address
        $user->createAdresseDefault();

        Events::trigger('didRegister', $user);

        //auth()->login($user);

        // If an action has been defined for login, start it up.
        $actionClass = setting('Auth.actions')['register'] ?? null;

        if (! empty($actionClass)) {
            session()->set('auth_action', $actionClass);

            return redirect()->to('auth/a/show');
        }

        alert('success', lang('Auth.registerSuccess', ['settings']));
        // Success!
        $response = [
            'error'    => null,
            'messages' => [
                'sucess' => lang('Auth.registerSuccess')
            ], 
            'redirect' => config('Auth')->registerRedirect()
        ];
        return $this->respond($response, 200);
    }

    /**
     * Returns the User provider
     *
     * @return mixed
     */
    protected function getUserProvider()
    {
        return model('UserModel'); // @phpstan-ignore-line
    }

    /**
     * Returns the Entity class that should be used
     *
     * @return \CodeIgniter\Shield\Entities\User
     */
    protected function getUserEntity()
    {
        return new User();
    }

    /**
     * Returns the rules that should be used for validation.
     *
     * @return string[]
     */
    protected function getValidationRules()
    {
        return [
            'username'         => 'required|alpha_numeric_space|min_length[3]|is_unique[users.username]',
            'email'            => 'required|valid_email|is_unique[auth_identities.secret]',
            'password'         => 'required|strong_password',
            'password_confirm' => 'required|matches[password]',
        ];
    }

}
