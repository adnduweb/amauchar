<?php

/*
 | --------------------------------------------------------------------
 | Login Hidden
 | --------------------------------------------------------------------
 |
 | Defines the base path of the URL where Amauchar's admin area can be
 | found. By default, this is 'admin', which means that the admin area
 | would be found at http://localhost:8080/admin
 */
defined('ADMIN_AREA') || define('ADMIN_AREA', getenv('ADMIN_AREA'));

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | Defines the base path of the URL where Amauchar's admin area can be
 | found. By default, this is 'admin', which means that the admin area
 | would be found at http://localhost:8080/admin
 */
defined('ADMIN_THEME') || define('ADMIN_THEME', 'metronic');

/**
 * This file is part of Amauchar.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

$routes->get('site-offline', static function () {
    echo view('errors/html/offline.php');
});



$options = [
    'filter'    => 'sessionAuth',
    'namespace' => '\Amauchar\Core\Controllers\Admin',
];


// Amauchar Admin routes
$routes->group(ADMIN_AREA, $options, static function ($routes) {
    $routes->get('logout', '\Amauchar\Core\Controllers\Auth\LoginController::logoutAction', ['as' => 'action.logout']);
    $routes->get('dashboard', 'DashboardController::indexView', ['as' => 'dashboard.index']);
    $routes->addRedirect('/', 'dashboard.index');
 

     //****************************************************
     // -- SYSTEM
     // *************************************************
     $routes->group('account', function ($routes) {

        $routes->get('users', 'UsersController::index', ['as' => 'users.index']);
        $routes->get('users/datatable', 'UsersController::ajaxDatatable', ['as' => 'users.datatable']);
        $routes->get('users/create', 'UsersController::create', ['as' => 'user.create']);
        $routes->post('users/save', 'UsersController::save', ['as' => 'user.save']);
        $routes->get('users/edit/(:any)', 'UsersController::edit/$1', ['as' => 'users.edit']);
        $routes->post('users/update', 'UsersController::update', ['filter' => 'cors', 'as' => 'users.update']);
        $routes->get('update-user', 'SettingsController::updateUser', ['as' => 'settings.update.user']);
        $routes->delete('users/delete', 'UsersController::delete', ['as' => 'user.delete']);
        $routes->get("users/en-tant-que", "UsersController::enTantQue", ['as' => 'users.entantque']);
        $routes->get("users/list-user", "UsersController::listUser", ['as' => 'users.list.ajax']);
        $routes->post('users/en-tant-que', 'UsersController::confirmEnTantQue', ['as' => 'users.entantque.comfirm']);
        $routes->get('users/return-compte-principale/(:any)', 'UsersController::returnCompteUser/$1', ['as' => 'user.return.compte']);
        $routes->post('users/verif-mdp', 'UsersController::verifMdp', ['as' => 'users.verif.mdp']);

        $routes->get('companies', 'CompaniesController::index', ['as' => 'companies.index']);
        $routes->get('companies/datatable', 'CompaniesController::ajaxDatatable', ['as' => 'companies.listajax']);
        $routes->get('companies/edit/(:any)', 'CompaniesController::edit/$1', ['as' => 'companies.edit']);
        $routes->post('companies/update', 'CompaniesController::update', ['filter' => 'cors', 'as' => 'companies.update']);
        
        

        $routes->get('groups', 'GroupsController::index', ['as' => 'groups.index']);
        $routes->get('groups/datatable', 'GroupsController::ajaxDatatable', ['as' => 'groups.listajax']);
        $routes->get('groups/show/(:any)', 'GroupsController::show/$1', ['as' => 'group.edit']);
        $routes->post('groups/save', 'GroupsController::saveGroup', ['as' => 'groups.save']);
        $routes->post('groups/savePermissions', 'GroupsController::savePermissions',  ['as' => 'group.save.permissions']);

        $routes->get('permissions', 'PermissionsController::index', ['as' => 'permissions.index']);

       

    });

    //cache
    $routes->get('system/cache', 'CacheController::clearCache',  ['as' => 'cache.index']);

    $routes->get('settings/general', 'SettingsController::index',  ['as' => 'settings.index']);
    $routes->get('settings/getTimezones', 'SettingsController::getTimezones',  ['as' => 'settings.timezones']);
    $routes->post('settings/general', 'SettingsController::update',  ['as' => 'settings.update']);
    $routes->get('settings/users', 'UsersController::settings',  ['as' => 'users.settings']);
    $routes->post('settings/users', 'UsersController::updateSettings',  ['as' => 'users.settings.update']);
    $routes->get('settings/email', 'SettingsController::emailIndex',  ['as' => 'settings.email']);
    $routes->post('settings/email', 'SettingsController::saveEmail',  ['as' => 'settings.email.save']);
    $routes->get('settings/consent', 'SettingsController::consentIndex',  ['as' => 'settings.consent']);
    $routes->post('settings/consent', 'SettingsController::saveConsent',  ['as' => 'settings.consent.save']);
    $routes->get('settings', 'SettingsController::userCurrent',  ['as' => 'settings.user.current']);
    $routes->post('settings', 'SettingsController::userCurrent',  ['as' => 'settings.user.current']);
    

         // Logs
    $routes->group('tools', function ($routes) {

        $routes->get('logs', 'LogsController::index', ['as' => 'logs.index']);
        $routes->get('logs/datatable', 'LogsController::ajaxDatatable', ['as' => 'logs.listajax']);
        $routes->delete('delete', 'LogsController::delete', ['as' => 'log.delete']);

        $routes->get('logs/traffics', 'LogsController::indexTraffics', ['as' => 'logs.list-traffics']);
        $routes->get('logs/datatable-traffics', 'LogsController::ajaxDatatableTraffics', ['as' => 'logs.traffics-listajax']);
        
        $routes->get('logs/connexions', 'LogsController::indexConnexions', ['as' => 'logs.list.connexions']);
        $routes->get('logs/connexions/datatable-connexions', 'LogsController::ajaxDatatableConnexions', ['as' => 'logs.connexions.listajax']);

        $routes->get('logs/files', 'LogsController::indexFiles', ['as' => 'logs.list.files']);
        $routes->get('logs/files/(:any)', 'LogsController::viewsFiles/$1', ['as' => 'logs.views.files']);

        $routes->get('informations', 'InformationsController::index', ['as' => 'informations.index']);
        $routes->get('informations/php-info', 'InformationsController::phpInfo', ['as' => 'informations.php-info']);

        
        // Translate
        $routes->group('translates', function ($routes) {

            $routes->get('/', 'TranslateController::index', ['as' => 'translates.index']);
            $routes->post('getfile', 'TranslateController::getFile', ['as' => 'translate.getfile']);
            $routes->post('savefile', 'TranslateController::saveFile', ['as' => 'translate.savefile']);
            $routes->post('deleteTexte', 'TranslateController::deleteTexte', ['as' => 'translate.deletetexte']);
            $routes->post('searchTexte', 'TranslateController::searchTexte', ['as' => 'translate.searchtexte']);
            $routes->post('saveTextfile', 'TranslateController::saveTextfile', ['as' => 'translate.savetextfile']);
        });

        $routes->get('bloc-note', 'BlocsNotesController::index', ['as' => 'blocsnotes.index']);
        $routes->get('bloc-note/datatable', 'BlocsNotesController::ajaxDatatable', ['as' => 'blocsnotes.listajax']);
        $routes->post('bloc-noters/read-contenu', 'BlocsNotesController::readContenu', ['as' => 'blocsnotes.read.contenu']);
        $routes->get('bloc-note/update-uuid', 'BlocsNotesController::updateUUid', ['as' => 'blocsnotes.update.uuid']);
        $routes->get('bloc-note/edit/(:any)', 'BlocsNotesController::edit/$1', ['as' => 'blocsnotes.edit']);
        $routes->post('bloc-note/update', 'BlocsNotesController::update', ['as' => 'blocsnotes.update']);
        $routes->get("bloc-note/create", "BlocsNotesController::new", ['as' => 'blocsnote.create']);
        $routes->post('bloc-note/create', 'BlocsNotesController::create', ['as' => 'blocsnotes.save']);
        $routes->delete('bloc-note/delete', 'BlocsNotesController::delete', ['as' => 'blocsnote.delete']);
        $routes->get("bloc-note/verif", "BlocsNotesController::verif", ['as' => 'blocsnotes.verif']);
        

        $routes->get('bloc-note/type', 'BlocsNotesTypeController::index', ['as' => 'blocsnotestype.index']);
        $routes->get('bloc-note/type/datatable', 'BlocsNotesTypeController::ajaxDatatable', ['as' => 'blocsnotestypes.listajax.type']);
        $routes->get("bloc-note/type/create", "BlocsNotesTypeController::new", ['as' => 'blocsnotestype.create']);
        $routes->post('bloc-note/type/create', 'BlocsNotesTypeController::create', ['as' => 'blocsnotestypes.save']);
        $routes->get('bloc-note/type/edit/(:any)', 'BlocsNotesTypeController::edit/$1', ['as' => 'blocsnotestypes.edit']);
        $routes->post('bloc-note/type/update', 'BlocsNotesTypeController::update', ['as' => 'blocsnotestype.update']);
        $routes->delete('bloc-note/type/delete', 'BlocsNotesTypeController::delete', ['as' => 'blocsnotestype.delete']);
        

    });

    //AJAX
    $routes->group('ajax', function ($routes) {
        $routes->post('/', 'AjaxController::index', ['as' => 'admin.ajax.index']);
        $routes->post('send-mail-account-manager', 'AjaxController::sendMailAccountManager', ['as' => 'send.mail.account.manager']);
        
    });


    $routes->get('guides', 'GuidesController::viewCollections', ['as' => 'guides']);
    $routes->get('guides/(:segment)', 'GuidesController::viewCollection/$1', ['as' => 'view-guide-collection']);
    $routes->get('guides/(:segment)/(:any)', 'GuidesController::viewSingle/$1/$2', ['as' => 'view-guide']);

});

//service('auth')->routes($routes);

$routes->get('login', '\Amauchar\Core\Controllers\Auth\LoginController::loginViewOverride', ['as' => 'action.login']);
$routes->post('login', '\Amauchar\Core\Controllers\Auth\LoginController::loginActionAjax');
$routes->get('login/gauth', '\Amauchar\Core\Controllers\Auth\LoginController::gauth', ['as' => 'action.login.gauth']);
$routes->get('sign-up', '\Amauchar\Core\Controllers\Auth\RegisterController::registerView', ['as' => 'action.register']);
$routes->post('sign-up', '\Amauchar\Core\Controllers\Auth\RegisterController::registerActionAjax');
$routes->get('login/magic-link', '\Amauchar\Core\Controllers\Auth\MagicLinkController::loginView', ['as' => 'magic-link']);
$routes->post('login/magic-link', '\Amauchar\Core\Controllers\Auth\MagicLinkController::loginActionAjax', ['as' => 'magic.link.post']);
$routes->get('login/verify-magic-link', '\Amauchar\Core\Controllers\Auth\MagicLinkController::verifyOverride', ['as' => 'verify.magic.link']);
$routes->get('auth/a/show', '\Amauchar\Core\Controllers\Auth\ActionController::show', ['as' => 'auth-action-show']);
$routes->post('auth/a/handle', '\Amauchar\Core\Controllers\Auth\ActionController::handleOverride', ['as' => 'auth.action.handle']);
$routes->post('auth/a/verify', '\Amauchar\Core\Controllers\Auth\ActionController::verifyOverride', ['as' => 'auth.action.verify']);
