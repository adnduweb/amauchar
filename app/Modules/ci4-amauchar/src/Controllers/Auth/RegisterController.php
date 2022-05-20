<?php

namespace Amauchar\Core\Controllers\Auth;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Config\Factories;
use CodeIgniter\Events\Events;
use Amauchar\Core\Entities\User;
use Amauchar\Core\Models\UserModel;
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

        Events::trigger('register', $user);

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        $authenticator->login($user);

        // Extra On save lastname, fitsname, uuid
        $user->last_name = 'nc';
        $user->first_name = 'nc';
        $user->uuid = service('uuid')->uuid4()->toString();
        $users->save($user);

        //Save Address
        $user->createAdresseDefault();

        //auth()->login($user);

       // If an action has been defined for login, start it up.
       $actionClass = setting('Auth.actions')['register'] ?? null;
       if (! empty($actionClass)) {
           $this->startUpAction($actionClass, $user);

           return redirect()->to('auth/a/show');
       }

       // Set the user active
       $authenticator->activateUser($user);

       // a successful login
       Events::trigger('login', $user);

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
     * @param class-string<ActionInterface> $actionClass
     */
    private function startUpAction(string $actionClass, User $user)
    {
        // @TODO I want to move this logic to Authenticators\Session,
        //      and create register() method in Authenticators\Session.

        $action = Factories::actions($actionClass); // @phpstan-ignore-line

        if (method_exists($action, 'afterRegister')) {
            $action->afterRegister($user);
        }

        session()->set('auth_action', $actionClass);
    }

    /**
     * Returns the User provider
     */
    protected function getUserProvider(): UserModel
    {
        $provider = model(setting('Auth.userProvider'));

        assert($provider instanceof UserModel, 'Config Auth.userProvider is not a valid UserProvider.');

        return $provider;
    }

    /**
     * Returns the Entity class that should be used
     */
    protected function getUserEntity(): User
    {
        return new User();
    }

    /**
     * Returns the rules that should be used for validation.
     *
     * @return string[]
     */
    protected function getValidationRules(): array
    {
        return [
            'username'         => 'required|alpha_numeric_space|min_length[3]|is_unique[users.username]',
            'email'            => 'required|valid_email|is_unique[auth_identities.secret]',
            'password'         => 'required|strong_password',
            'password_confirm' => 'required|matches[password]',
        ];
    }

}
