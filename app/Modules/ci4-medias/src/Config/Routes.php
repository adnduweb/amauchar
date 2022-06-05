<?php

if (empty(config('Medias')->routeFiles)){
	return;
}
 
$options = [
    'filter'    => 'sessionAuth',
    'namespace' => '\Amauchar\Medias\Controllers\Admin',
];

// Routes to Files controller
$routes->group(ADMIN_AREA . '/medias', $options, function ($routes)
{
	$routes->get('/', 'Medias::list', ['as' => 'medias.index']);// OK
	$routes->get('datatable', 'Medias::ajaxDatatable', ['as' => 'medias-listajax']);// OK
	$routes->get('datatable-dimensions', 'Medias::ajaxDatatableDimensions', ['as' => 'medias.listajax.dimensions']);// OK
	

	$routes->get('edit/(:any)', 'Medias::edit/$1', ['as' => 'medias.edit']);// OK
    $routes->post('edit/(:any)', 'Medias::update/$1', ['as' => 'medias.update']);// OK

	$routes->post('upload', 'Medias::upload', ['as' => 'media.upload']);

	$routes->post('rename', 'Medias::rename', ['as' => 'medias.rename']);// OK

	$routes->delete('remove-file', 'Medias::removeFile', ['as' => 'medias.remove.file']); // OK
	$routes->delete('remove-file-custom', 'Medias::removeFileCustom', ['as' => 'medias.remove.file.custom']);

	$routes->get('settings', 'Medias::settings/$1', ['as' => 'medias.settings']);// OK
	$routes->post('settings', 'Medias::saveSettings', ['as' => 'medias.settings.post']);// OK

	$routes->post('manager-crop', 'Medias::getCropTemplate', ['as' => 'medias.crop.template']); //OK
	$routes->post('cropFile', 'Medias::cropFile', ['as' => 'medias.crop.store']); //OK
	$routes->add('get-image-manager', 'Medias::getImageManager', ['as' => 'medias.image-manager']);
	$routes->add('get-upload-final', 'Medias::getUploadFinal', ['as' => 'media.upload.final']);
	$routes->post('media-edition-image', 'Medias::getEditionImage', ['as' => 'media.edition.image']);// OK
	$routes->post('media-edition-image-save', 'Medias::saveEditionImage', ['as' => 'media.edition.image.save']);// OK
	

});


$routes->get('medias/(:segment)/(:segment)', static function ($folder, $filename) {

    $path = WRITEPATH . 'medias/' .$folder.'/'. $filename;
	$file = new \CodeIgniter\Files\File($path);

    if (!$file) {
		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
	}

	$media = file_get_contents($file->getPathName());

     // choose the right mime type
	 $mimeType = $file->getMimeType();

	 return service('response')
		 ->setStatusCode(200)
		 ->setContentType($mimeType)
		 ->setBody($media)
		 ->send();
});
