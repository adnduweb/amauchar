<?php

namespace Amauchar\Core\Config;

use CodeIgniter\Shield\Config\Auth as ShieldAuth;

class Auth extends ShieldAuth
{
    /**
     * ////////////////////////////////////////////////////////////////////
     * AUTHENTICATION
     * ////////////////////////////////////////////////////////////////////
     */
    public array $views = [
        'login'                       => '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\auth\login',
        'register'                    => '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\auth\sign-up',
        'forgotPassword'              => '\CodeIgniter\Shield\Views\forgot_password',
        'resetPassword'               => '\CodeIgniter\Shield\Views\reset_password',
        'layout'                      => '\CodeIgniter\Shield\Views\layout',
        'action_email_2fa'            => '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\auth\email_2fa_show',
        'action_email_2fa_verify'     => '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\auth\email_2fa_verify',
        'action_email_2fa_email'      => '\CodeIgniter\Shield\Views\email_2fa_email',
        'action_email_activate_email' => '\CodeIgniter\Shield\Views\email_activate_email',
        'action_email_activate_show'  => '\CodeIgniter\Shield\Views\email_activate_show',
        'magic-link-login'            => '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\auth\magic_link_form',
        'magic-link-message'          => '\CodeIgniter\Shield\Views\magic_link_message',
        'magic-link-email'            => '\CodeIgniter\Shield\Views\magic_link_email',
    ];

     /**
     * --------------------------------------------------------------------
     * Redirect urLs
     * --------------------------------------------------------------------
     * The default URL that a user will be redirected to after
     * various auth actions. If you need more flexibility you
     * should extend the appropriate controller and overrider the
     * `getRedirect()` methods to apply any logic you may need.
     */
    public array $redirects = [
        'register' => '/login',
        'login'    => '/' . ADMIN_AREA . '/dashboard',
        'logout'   => '/login',
    ];

     /**
     * --------------------------------------------------------------------
     * User Provider
     * --------------------------------------------------------------------
     * The name of the class that handles user persistence.
     * By default, this is the included UserModel, which
     * works with any of the database engines supported by CodeIgniter.
     * You can change it as long as they adhere to the
     * CodeIgniter\Shield\Models\UserModel.
     *
     * @var class-string<\CodeIgniter\Shield\Models\UserModel>
     */
    public string $userProvider = 'Amauchar\Core\Models\UserModel';

}

