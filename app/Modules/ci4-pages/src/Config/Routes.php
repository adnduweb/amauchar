<?php

if (empty(config('Pages')->routeFiles)){
	return;
}
 
$optionsApi = [
    'filter'    => 'session',
    'namespace' => '\Amauchar\Pages\Controllers\Api',
];

$routes->group('api/v1', $optionsApi, function ($routes) {
    $routes->match(['post', 'get'], 'pages/saveauto', 'Ressources::saveAuto', ['as' => 'api-pages.saveauto', 'priority' => 1]);
});


$options = [
    'filter'    => 'session',
    'namespace' => '\Amauchar\Pages\Controllers\Admin',
];


/**
 * --------------------------------------------------------------------------------------
 * Route Backend
 * --------------------------------------------------------------------------------------
 */

$routes->group(ADMIN_AREA, $options, function ($routes) {

    $routes->get('menus/(:num)', 'MenusController::renderView/$1', ['as' => 'menu-index']);
    $routes->post('menus/(:num)', 'MenusController::save/$1', ['as' => 'menu-item-save']);
    $routes->get('menus/delete/(:num)', 'MenusController::deleteItem/$1', ['as' => 'menu-delete']);
    $routes->post('menus/(:num)/sort-menu', 'MenusController::sortMenu/$1', ['as' => 'menu-sort-ajax']);

    $routes->get('pages', 'PagesController::index', ['as' => 'pages.index']);
    $routes->get('pages/datatable', 'PagesController::ajaxDatatable', ['as' => 'pages.listajax']);

    $routes->get('pages/edit/(:num)', 'PagesController::edit/$1', ['as' => 'page.edit']);
    $routes->post('pages/edit/(:num)', 'PagesController::update/$1', ['as' => 'pages.update']);
    $routes->post('update-ajax', 'PagesController::updateAjax', ['as' => 'page.update-ajax']);
    $routes->get("pages/create", "PagesController::new", ['as' => 'page.new']);
    $routes->post("pages/create", "PagesController::create", ['as' => 'page.create']);
    $routes->delete('pages/delete', 'PagesController::delete', ['as' => 'page.delete']);
    $routes->post('pages/activate', 'PagesController::updatePage', ['as' => 'page.activate']);

    $routes->get('pages/settings', 'PagesController::settings/$1', ['as' => 'page.settings']);
    $routes->post('pages/settings', 'PagesController::saveSettings');

    $routes->get('pages/edit/(:num)/composer/', 'PagesComposerController::index/$1', ['as' => 'page.composer.index']);
    $routes->post('pages/edit/(:num)/composer', 'PagesComposerController::update/$1', ['as' => 'page.composer.update']);
    $routes->post('pages/composer-delete-item', 'PagesComposerController::deleteComposerItem', ['as' => 'page.delete.composer']);


    
    

});

if(!in_array(ADMIN_AREA, service('request')->getUri()->getSegments())){
    $routes->get('maintenance', '\Amauchar\Pages\Controllers\Front\OfflineController::index', ['as' => 'site-adw-offline']);
    $routes->get('/', '\Amauchar\Pages\Controllers\Front\PagesController::index', ['as' => 'pages.list']);
    $routes->get('(:any)/', '\Amauchar\Pages\Controllers\Front\PagesController::item');
    $routes->post('(:any)/', '\Amauchar\Pages\Controllers\Front\PagesController::store');

}

