<?php namespace Amauchar\Core\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Shield\Entities\UserIdentity;
use CodeIgniter\Shield\Models\UserIdentityModel;
use CodeIgniter\Shield\Authentication\Authenticators\Session;

/**
 * Session Authentication Filter.
 *
 * Email/Password-based authentication for web applications.
 */
class SessionAuthOverride implements FilterInterface
{


    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param array|null $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        helper(['auth', 'setting']);

        $current = (string)current_url(true)->setHost('')->setScheme('')->stripQuery('token');

         /** @var Session $authenticator */
         $authenticator = auth('session')->getAuthenticator();
         if ($authenticator->loggedIn()) {
             if (setting('Auth.recordActiveDate')) {
                 $authenticator->recordActiveDate();
             }

            if(setting('Medias.formatThumbnail') == ''){
                if (!in_array((string)$current, [route_to('medias.settings')])){
                    return redirect()->to(route_to('medias.settings'));
                }
            }
 
             return;
         }



         if (!$authenticator->loggedIn()) {
            if (!in_array((string)$current, [route_to('action.logout')])){
                session()->set('redirect_url', current_url());
                session()->set('previous_page', service('request')->uri->getPath()); //ADN
            }
            return redirect()->route('login');
        }
 
         if ($authenticator->isPending()) {
             return redirect()->route('auth-action-show')
                 ->with('error', $authenticator->getPendingMessage());
         }
 
         return redirect()->route('login');

        // /** @var UserIdentityModel $identityModel */
        // $identityModel = model(UserIdentityModel::class);

        // // If user is in middle of an action flow
        // // ensure they must finish it first.
        // $identities = $identityModel->getIdentitiesByTypes(
        //     auth('session')->id(),
        //     ['email_2fa', 'email_activate']
        // );

        // foreach ($identities as $identity) {
        //     if (! $identity instanceof UserIdentity) {
        //         continue;
        //     }

        //     $action = setting('Auth.actions')[$identity->name];

        //     if ($action) {
        //         session()->set('auth_action', $action);

        //         return redirect()->route('auth-action-show')->with('error', $identity->extra);
        //     }
        // }
    }

    /**
     * We don't have anything to do here.
     *
     * @param Response|ResponseInterface $response
     * @param array|null                 $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
