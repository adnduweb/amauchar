<?php

if (empty(config('Pages')->routeFiles)){
	return;
}
 
$optionsApi = [
    'filter'    => 'auth',
    'namespace' => '\Adnduweb\Pages\Controllers\Api',
];

$routes->group('api/v1', $optionsApi, function ($routes) {
    $routes->match(['post', 'get'], 'pages/saveauto', 'Ressources::saveAuto', ['as' => 'api-pages-saveauto', 'priority' => 1]);
});


$options = [
    'filter'    => 'login',
    'namespace' => '\Adnduweb\Pages\Controllers\Admin',
];


/**
 * --------------------------------------------------------------------------------------
 * Route Backend
 * --------------------------------------------------------------------------------------
 */

$routes->group(CI_AREA_ADMIN, $options, function ($routes) {

    $routes->get('menus/(:num)', 'MenusController::renderView/$1', ['as' => 'menu-index']);
    $routes->post('menus/(:num)', 'MenusController::save/$1', ['as' => 'menu-item-save']);
    $routes->get('menus/delete/(:num)', 'MenusController::deleteItem/$1', ['as' => 'menu-delete']);
    $routes->post('menus/(:num)/sort-menu', 'MenusController::sortMenu/$1', ['as' => 'menu-sort-ajax']);

    $routes->get('pages', 'PagesController::index', ['as' => 'pages']);
    $routes->get('pages/datatable', 'PagesController::ajaxDatatable', ['as' => 'pages-listajax']);

    $routes->get('pages/edit/(:num)', 'PagesController::edit/$2', ['as' => 'page-edit']);
    $routes->post('pages/edit/(:num)', 'PagesController::update/$1', ['as' => 'pages-update']);
    $routes->post('update-ajax', 'PagesController::updateAjax', ['as' => 'page-update-ajax']);
    $routes->get("pages/create", "PagesController::new", ['as' => 'page-new']);
    $routes->post("pages/create", "PagesController::create", ['as' => 'page-create']);
    $routes->delete('pages/delete', 'PagesController::delete', ['as' => 'page-delete']);

    $routes->get('pages/settings', 'PagesController::settings/$1', ['as' => 'page-settings']);
    $routes->post('pages/settings', 'PagesController::saveSettings');

    $routes->get('pages/builder/(:any)', 'PagesController::loadBuilder/$1', ['as' => 'page-builder-load']);
    $routes->post('pages/builder/(:any)', 'PagesController::storeBuilder/$1', ['as' => 'page-builder-store']);

    $routes->post('pages/composer-delete-item', 'PagesController::deleteComposerItem', ['as' => 'page-delete-composer']);

    
    

});

if(!in_array(CI_AREA_ADMIN, service('request')->getUri()->getSegments())){
    $routes->get('maintenance', '\Adnduweb\Pages\Controllers\Front\OfflineController::index', ['as' => 'site-adw-offline']);
    $routes->get('/', '\Adnduweb\Pages\Controllers\Front\PagesController::index', ['as' => 'pages-list']);
    $routes->get('(:any)/', '\Adnduweb\Pages\Controllers\Front\PagesController::item');
    $routes->post('(:any)/', '\Adnduweb\Pages\Controllers\Front\PagesController::store');

}

