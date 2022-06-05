<?php

namespace Amauchar\Core\Config;

use CodeIgniter\Config\BaseConfig;

class AuthGroups extends BaseConfig
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'user';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * The available authentication systems, listed
     * with alias and class name. These can be referenced
     * by alias in the auth helper:
     *      auth('api')->attempt($credentials);
     */
    public array $groups = [
        'superadmin' => [
            'title'       => 'Super Admin',
            'description' => 'Complete control of the site.',
        ],
        'admin' => [
            'title'       => 'Admin',
            'description' => 'Day to day administrators of the site.',
        ],
        'developer' => [
            'title'       => 'Developer',
            'description' => 'Site programmers.',
        ],
        'user' => [
            'title'       => 'User',
            'description' => 'General users of the site. Often customers.',
        ],
        'beta' => [
            'title'       => 'Beta User',
            'description' => 'Has access to beta-level features.',
        ],
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system. Each system is defined
     * where the key is the
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'admin.access'        => 'Can access the sites admin area',
        'admin.account'       => 'Can access the account admin area',
        'admin.tools'         => 'Can access the tools admin area',
        'admin.settings'      => 'Can access the main site settings',
        'groups.edit'         => 'Can edit user groups',
        'groups.settings'     => 'Can edit existing user groups',
        'users.list'          => 'Can view a list of users in the system',
        'users.manage-admins' => 'Can manage other admins',
        'users.view'          => 'Can view user details',
        'users.create'        => 'Can create new non-admin users',
        'users.edit'          => 'Can edit existing non-admin users',
        'users.delete'        => 'Can delete existing non-admin users',
        'users.settings'      => 'Can manage User settings in admin area',
        'beta.access'         => 'Can access beta-level features',
        'site.viewOffline'    => 'Can the site even when in "offline" mode',
        'guides.view'         => 'Can view the list of available guides',
        'guides.bonfire'      => 'Can view the Bonfire Development Guides',
        'guides.application'  => 'Can view the application guides.',
        'widgets.settings'    => 'Can view the settings for site Widgets',
        'consent.settings'    => 'Can view the settings for the Consent module',
        'recycler.view'       => 'Can view the Recycler area',
        'logs.view'           => 'Can view the logs',
        'logs.create'         => 'Can create the logs',
        'logs.edit'           => 'Can edit the logs',
        'logs.delete'         => 'Can delete the logs',
        'customers.access' => 'Can view the customers',
        'customers.create' => 'Can create the customers',
        'customers.edit' => 'Can edit the customers',
        'customers.delete' => 'Can delete the customers',
       
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     */
    public array $matrix = [
        'superadmin' => [
            'admin.*',
            'groups.*',
            'users.*',
            'beta.*',
            'guides.*',
            'widgets.*',
            'consent.*',
            'recycler.*',
            'logs.*',
            'customers.*'
        ],
        'admin' => [
            'admin.access',
            'users.list',
            'users.create',
            'users.edit',
            'users.delete',
            'users.settings',
            'groups.settings',
            'beta.access',
            'guides.application',
            'widgets.*',
            'consent.*',
            'guides.*',
        ],
        'developer' => [
            'admin.access',
            'admin.settings',
            'users.list',
            'users.create',
            'users.edit',
            'users.settings',
            'groups.settings',
            'beta.*',
            'site.viewOffline',
            'guides.*',
            'widgets.*',
            'consent.*',
            'recycler.*',
        ],
        'user' => [],
        'beta' => [
            'beta.access',
        ],
    ];
}
