<?php

if (empty(config('Vassorts')->routeFiles)){
	return;
}
 
$options = [
    'filter'    => 'session',
    'namespace' => '\Amauchar\Customers\Controllers\Admin',
];


$routes->group(ADMIN_AREA,  $options, function ($routes) {

    // Créations
    $routes->group('clients', function ($routes) {

        $routes->get('/', 'CustomersController::index', ['as' => 'customers.index']);
        $routes->get('datatable', 'CustomersController::ajaxDatatable', ['as' => 'customers.listajax']);

        $routes->get('edit/(:any)/addresses', 'CustomersAddressController::index/$1', ['as' => 'customers.address.index']);
        $routes->get('edit/(:any)/datatable-address', 'CustomersAddressController::ajaxDatatableAddress/$1', ['as' => 'customers.address.listajax']);
        $routes->get('edit/(:any)/contacts', 'CustomersContactsController::index/$1', ['as' => 'customers.contacts.index']);
        $routes->get('edit/(:any)/datatable-contacts', 'CustomersContactsController::ajaxDatatableContact/$1', ['as' => 'customers.contact.listajax']);
        $routes->get('edit/(:any)/notes', 'CustomersNotesController::index/$1', ['as' => 'customers.notes.index']);
        $routes->get('edit/(:any)/datatable-notes', 'CustomersNotesController::ajaxDatatableContact/$1', ['as' => 'customers.notes.listajax']);
        $routes->get('edit/(:any)/datatable-notes', 'CustomersNotesController::ajaxDatatableContact/$1', ['as' => 'customers.notes.listajax']);
        $routes->match(['get', 'post'],'edit/(:any)/notes/edit/(:any)', 'CustomersNotesController::editNote/$1/$2', ['as' => 'customers.notes.edit']);

        

        $routes->get('edit/(:any)', 'CustomersController::edit/$1', ['as' => 'customer.edit']);
        $routes->post('edit/(:any)', 'CustomersController::update/$1', ['as' => 'customer.update']);
        $routes->get("create", "CustomersController::new", ['as' => 'customer.new']);
        $routes->post('create', 'CustomersController::create', ['as' => 'customer.create']);
        $routes->delete('delete', 'CustomersController::delete', ['as' => 'customer.delete']);
        $routes->post('export', 'CustomersController::export', ['as' => 'customer.export.ajax']);
        $routes->get('export/(:any)', 'CustomersController::export/$1', ['as' => 'customer.export']);
        $routes->post('import', 'CustomersController::import', ['as' => 'customer.import-ajax']);
        $routes->get('get-import', 'CustomersController::getImport', ['as' => 'customer.import']);
        $routes->post('update-customer', 'CustomersController::updateCustomer', ['as' => 'customer.customer.update']);
        $routes->match(['get', 'post'], 'settings', 'CustomersController::settings', ['as' => 'customers.settings']);
       
        $routes->post('view-address', 'CustomersAddressController::viewAddress', ['as' => 'customer.address.view']);
        $routes->post('edit-address', 'CustomersAddressController::editAddressAjax', ['as' => 'customer.address.edit.ajax']); 
        $routes->delete('delete-address', 'CustomersAddressController::delete', ['as' => 'customer.address.delete']);
        $routes->post('update-address', 'CustomersAddressController::update', ['as' => 'customer.address.update']);

        $routes->post('view-contact', 'CustomersContactsController::viewContact', ['as' => 'customer.contact.view']);
        $routes->post('edit-contact', 'CustomersContactsController::editContactAjax', ['as' => 'customer.contact.edit.ajax']); 
        $routes->delete('delete-contact', 'CustomersContactsController::delete', ['as' => 'customer.contact.delete']);
        $routes->post('update-contact', 'CustomersContactsController::update', ['as' => 'customer.contact.update']);

        $routes->post('view-note', 'CustomersNotesController::viewNote', ['as' => 'customer.note.view']);
        $routes->post('edit-note', 'CustomersNotesController::editNoteAjax', ['as' => 'customer.note.edit.ajax']); 
        $routes->delete('delete-note', 'CustomersNotesController::delete', ['as' => 'customer.note.delete']);
        $routes->post('update-note', 'CustomersNotesController::update', ['as' => 'customer.note.update']);
        $routes->post('customer-note/read-contenu', 'CustomersNotesController::readContenu', ['as' => 'customer.note.read.contenu']);
        
        
        
    });
    

});