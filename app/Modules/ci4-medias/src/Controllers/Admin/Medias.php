<?php

namespace Amauchar\Medias\Controllers\Admin;

use CodeIgniter\Events\Events;

use CodeIgniter\HTTP\RedirectResponse;
use Amauchar\Core\Controllers\Admin\AdminController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;

use Amauchar\Medias\Config\Files as MediasConfig;
use Amauchar\Medias\Exceptions\MediasException;
use Amauchar\Medias\Entities\Media;
use Amauchar\Medias\Models\MediaModel;
use Amauchar\Medias\Models\MediaLangModel;
use Throwable;

class Medias extends AdminController
{

	use ResponseTrait;

	/** Files config.
     * @var FilesConfig
     */
    protected $media;
 
    /**  @var string  */
    protected $viewPrefix = '\Amauchar\Medias\Views\backend\\'.ADMIN_THEME.'\\';

    /**  @var string  */
    public $category  = '';

    /**  @var object  */
    public $tableModel = MediaModel::class;

    /**  @var string  */
    public $identifier_name = 'name'; 

    /** @var bool */
	public $filterDatabase = false;
	
	protected $helpers = ['medias', 'html', 'text'];

	 /**
     * Overriding data for views.
     *
     * @var array
     */
    protected $data = [];

	
	/**
     * Validation for Preferences.
     *
     * @var array<string,string>
     */
    protected $preferenceRules = [
        'sort'    => 'in_list[filename,localname,clientname,type,size,created_at,updated_at,deleted_at]',
        'order'   => 'in_list[asc,desc]',
        'format'  => 'in_list[cards,list,select]',
        'perPage' => 'is_natural_no_zero',
    ];


	/**
     * Preloads the configuration and model.
     * Parameters are mostly for testing purposes.
     */
    public function __construct(?MediaConfig $config = null, ?MediaModel $model = null)
    {
        $this->config = $config ?? config('Medias');
		$this->model  = $model ?? model(MediaModel::class); // @phpstan-ignore-line
		$this->config->getPath();		
    }


    public function index() : string
    {
       return true;
	}
	
	//--------------------------------------------------------------------

	/**
	 * Charge Params JS
	 */
	protected function addJsDf(){
		parent::addJsDf();
		$this->viewData['addJsDef']['Medias'] = service('media')->addParamsJs();
	}

	/**
	 * Handles the final display of files based on $data.
	 *
	 * @return string
	 */
	public function display(): string
	{
		// Apply any defaults for missing metadata
		$this->setDefaults();

		theme()->add_js('plugins/custom/datatables/datatables.bundle.js');

		// Get the Files
		if (!isset($this->viewData['medias'])) {
			// Apply a target user
			if ($this->viewData['userId']) {
				$this->model->whereUser($this->viewData['userId']);
			}

			// Apply any requested search filters
			if ($this->viewData['search']) {
				$this->model->like('filename', $this->viewData['search']);
			}

			// Sort and order
			$this->model->orderBy($this->viewData['sort'], $this->viewData['order']);

			// Paginate non-select formats
			if ($this->viewData['format'] !== 'select') {
				$this->setData([
					// 'medias' => $this->model->paginate($this->viewData['perPage'], 'default', $this->viewData['page']),
					'medias' => model(MediaModel::class)->getMedias(true, $this->viewData['perPage'], 'default', $this->viewData['page']),
					'pager' => $this->model->pager,
				], true);
			} else {
				$this->setData([
					// 'medias' => $this->model->findAll()
					'medias' => $this->model->getMedias(false),
				], true);
			}
		}

		//print_r($this->viewData['medias']); exit;
		$this->viewData['active'] = 'medias';

		// AJAX calls skip the wrapping
		if ($this->viewData['ajax']) {
			// return view('Amauchar\Medias\Views\Formats\\' . $this->viewData['format'], $this->viewData);
			return $this->render($this->viewPrefix .'Formats\\' . $this->viewData['format'], $this->viewData);
		}

		return $this->render($this->viewPrefix . 'index', $this->viewData);
	}

	//--------------------------------------------------------------------

	/**
	 * Lists of files; if global listing is not permitted then
	 * falls back to user().
	 *
	 * @return RedirectResponse|string
	 */
	public function list(){

		if(setting('Medias.formatThumbnail') == ''){
			return redirect()->to(route_to('medias.settings'));
		}

		return $this->display();
	}


	//--------------------------------------------------------------------

	/**
	 * Display the Dropzone uploader.
	 *
	 * @return ResponseInterface|string
	 */
	public function new()
	{
		// Check for create permission
		if (!$this->model->mayCreate()) {
			return $this->failure(403, lang('Permits.notPermitted'));
		}

		return view($this->viewPrefix .'new');
	}


	 /**
     * Shows details for one item.
     *
     * @param string $itemId
     *
     * @return string
     */
    public function edit(string $uuid): string
    {
		
		theme()->add_css('plugins/custom/cropper/cropper.bundle.css');
		theme()->add_js('plugins/custom/datatables/datatables.bundle.js');
		theme()->add_js('plugins/custom/cropper/cropper.bundle.js');

		$this->id = $uuid;
		$this->getMediaCurrentProvider();


        $this->viewData['title_detail'] =  $this->object->lang->titre;
		$this->viewData['form'] = $this->object;
		$this->viewData['formlang'] = $this->object->lang;
		$this->viewData['form']->custom = $this->infosCustomImage($this->object);	
		
		//print_r($this->object->getAllDimensions(false));exit;

        return $this->render($this->viewPrefix .'form', $this->viewData);

	}
	
	 /**
     * Function datatable.
     *
     * @return CodeIgniter\Http\Response
     */
    public function ajaxDatatableDimensions(): ResponseInterface
    {
        if ($this->request->isAJAX()) {
            $start = $this->request->getVar('start');
            $length = $this->request->getVar('length');
            $search = $this->request->getVar('search[value]');
            $order = $this->tableModel::ORDERABLE[$this->request->getVar('order[0][column]')];
			$dir = $this->request->getVar('order[0][dir]');
			$uuid = $this->request->getVar('uuid');
			$media = model(MediaModel::class)->getMediaByUUID($uuid);

           return $this
            ->response
            ->setStatusCode(200)
            ->setJSON([
                'draw'            => $this->request->getVar('draw'),
                'recordsTotal'    => 100,
                'recordsFiltered' => count($media->getAllDimensions(false)),
                'data'            => $media->getAllDimensions(false),
                'token'           => csrf_hash()
            ]);

        }

        return $this->getResponse(['success' => lang('Core.no_content')], 204);
    }


	   /**
     * Update item details.
     *
     * @param string $itemId
     *
     * @return RedirectResponse
     */
    public function update( string $id): RedirectResponse
    {

        helper('string');
        // validate
        $this->rules = [
            'lang.'.service('request')->getLocale() . '.titre'         => 'required',
        ];

        if (!$this->validate($this->rules)) {
			alert('error', $this->validator->getErrors());
			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // try to update the item
		$media = $this->request->getPost();
		$media['updated_at'] = date('Y-m-H:i:s');
        if (!model(MediaModel::class)->save($media, true)) {
			alert('error',  model(MediaModel::class)->errors());
			return redirect()->back()->withInput()->with('error', model(MediaModel::class)->errors());
		}
		$lang = $media['lang'][service('request')->getLocale()];
		$lang['id_media_lang'] = $media['id_media_lang'];

		if (!model(MediaLangModel::class)->save($lang, true)) {
			alert('error',  model(MediaLangModel::class)->errors());
			return redirect()->back()->withInput()->with('error', model(MediaLangModel::class)->errors());
        }

		 // Success!
		 alert('success',  lang('Core.resourcesSaved'));
		return redirect()->back()->withInput()->with('success', lang('Core.resourcesSaved'));

	}
	
	/**
	 * Receives uploads from Dropzone.
	 *
	 * @return ResponseInterface|string
	 */
	public function upload()
	{
		// Verify upload succeeded
		$upload = $this->request->getFile('file');

		$this->rules = [ 
			'file' => 'uploaded[file]|mime_in[file,image/jpg,image/jpeg,image/gif,image/png,text/plain,text/csv,application/vnd.ms-excel,application/pdf,application/msword,application/msword]'
        ];

		// In the controller
		if (!$this->validate($this->rules)) {
			$response = ['errors' => $this->validator->getErrors()];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }

		if (empty($upload)) {
			$response = ['errors' => lang('Medias.noFile')];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
		}
		if (!$upload->isValid()) {
			$response = ['errors' => $upload->getErrorString() . '(' . $upload->getError() . ')'];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
		}

		// Check for chunks
		if ($this->request->getPost('dzChunkIndex') !== null) {
			// Gather chunk info
			$chunkIndex  = $this->request->getPost('dzChunkIndex');
			$totalChunks = $this->request->getPost('dzTotalChunkCount');
			$uuid        = $this->request->getPost('dzUuid');

			// Check for chunk directory
            $chunkDir = WRITEPATH . 'uploads/' . $uuid;
            if (! is_dir($chunkDir) && ! mkdir($chunkDir, 0775, true)) {
                return $this->failure(400, lang('Files.chunkDirFail', [$chunkDir]));
            }


			// Move the file
            try {
                $upload->move($chunkDir, $chunkIndex . '.' . $upload->getExtension());
            } catch (HTTPException $e) {
				log_message('error', $e->getMessage());

				$response = ['errors' => $e->getMessage()];
            	return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            }

			 // Check for more chunks
			 if ($chunkIndex < $totalChunks - 1) {
                session_write_close();

                return '';
            }

			// Get chunks from target directory
            helper('filesystem');
            $chunks = get_filenames($chunkDir, true);
            if (empty($chunks)) {
                throw FilesException::forNoChunks($chunkDir);
            }

            // Merge the chunks
            try {
                $path = merge_file_chunks(...$chunks);
            } catch (Throwable $e) {
                log_message('error', $e->getMessage());

                $response = ['errors' => $e->getMessage()];
            	return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            }

            log_message('debug', 'Merged ' . count($chunks) . ' chunks to ' . $path);
		}

		// Get additional post data to pass to model
		$data         		= $this->request->getPost();
		$data['filename']   = $data['filename'] ?? $upload->getClientName();
		$data['clientname'] = $data['clientname'] ?? $upload->getClientName();
		$data['uuid']       = $uuid;

		// Accept the file
		$file = $this->model->createFromPath($path ?? $upload->getRealPath(), $data);
		
		// Trigger the Event with the new File
        Events::trigger('upload', $file);

		if ($this->request->isAJAX()) {
			$response = ['messages' => ['success' => lang('Core.resourcesSaved')]];
			return $this->respond($response, ResponseInterface::HTTP_OK);
		}
		alert('success', lang('Core.resourcesSaved'));
		return redirect()->back()->with('success', lang('Core.resourcesSaved', [$file->clientname]));
	}

	/**
	 * Merges all chunks in a target directory into a single file, returns the file path.
	 *
	 * @return string
	 *
	 * @throws MediasException
	 */
	protected function mergeChunks($dir): string
	{
		helper('filesystem');
		helper('text');

		// Get chunks from target directory
		$chunks = get_filenames($dir, true);
		if (empty($chunks)) {
			throw MediasException::forNoChunks($dir);
		}

		// Create the temp file
		$tmpfile = tempnam(sys_get_temp_dir(), random_string());
		log_message('debug', 'Merging ' . count($chunks) . ' chunks to ' . $tmpfile);

		// Open temp file for writing
		$output = @fopen($tmpfile, 'ab');
		if (!$output) {
			throw MediasException::forNewFileFail($tmpfile);
		}

		// Write each chunk to the temp file
		foreach ($chunks as $file) {
			$input = @fopen($file, 'rb');
			if (!$input) {
				throw MediasException::forWriteFileFail($tmpfile);
			}

			// Buffered merge of chunk
			while ($buffer = fread($input, 4096)) {
				fwrite($output, $buffer);
			}

			fclose($input);
		}

		// close output handle
		fclose($output);

		return $tmpfile;
	}

	/**
	 * Processes Export requests.
	 *
	 * @param string         $slug   The slug to match to Exports attribute
	 * @param string|integer $fileId
	 *
	 * @return ResponseInterface
	 */
	public function export(string $slug, $fileId): ResponseInterface
	{
		// Match the export handler
		$handler = handlers('Exports')->where(['slug' => $slug])->first();
		if (empty($handler)) {
			alert('warning', 'No handler found for ' . $slug);
			return redirect()->back();
		}

		// Load the file
		$file = $this->model->find($fileId);
		if (empty($file)) {
			alert('warning', lang('Medias.noFile'));
			return redirect()->back();
		}

		// Pass to the handler
		$export   = new $handler($file->object);
		$response = $export->setFilename($file->filename)->process();

		// If the handler returned a response then we're done
		if ($response instanceof ResponseInterface) {
			return $response;
		}

		return redirect()->back();
	}

	/**
	 * Outputs a file thumbnail directly as image data.
	 *
	 * @param string|integer $fileId
	 *
	 * @return ResponseInterface
	 */
	public function thumbnail($fileId): ResponseInterface
	{
		if ($file = $this->model->find($fileId)) {
			$path = $file->getThumbnail();
		} else {
			$path = File::locateDefaultThumbnail();
		}

		return $this->response->setHeader('Content-type', 'image/jpeg')->setBody(file_get_contents($path));
	}

	//--------------------------------------------------------------------

	/**
	 * Handles failures.
	 *
	 * @param int $code
	 * @param string $message
	 * @param boolean|null $isAjax
	 *
	 * @return ResponseInterface|RedirectResponse
	 */
	protected function failure(int $code, string $message, bool $isAjax = null): ResponseInterface
	{
		log_message('debug', $message);

		if ($isAjax ?? $this->request->isAJAX()) {
			return $this->response
				->setStatusCode($code)
				->setJSON(['error' => $message]);
		}

		return redirect()->back()->with('error', $message);
	}

	/**
	 * Sets a value in $this->viewData, overwrites optional.
	 *
	 * @param array<string, mixed> $data
	 * @param boolean $overwrite
	 *
	 * @return $this
	 */
	protected function setData(array $data, bool $overwrite = false): self
	{
		if ($overwrite) {
			$this->viewData = array_merge($this->viewData, $data);
		} else {
			$this->viewData = array_merge($data, $this->viewData);
		}

		return $this;
	}

	/**
	 * Merges in the default metadata.
	 *
	 * @return $this
	 */
	protected function setDefaults(): self
	{

		$this->setData([
            'source'   => '',
            'layout'   => 'medias',
            'medias'    => null,
            'selected' => explode(',', $this->request->getVar('selected') ?? ''),
            'userId'   => null,
            'userName' => '',
            'ajax'     => $this->request->isAJAX(),
            'search'   => $this->request->getVar('search'),
            'page'     => $this->request->getVar('page'),
            'pager'    => null,
            'access'   => 'manage',
            'exports'  => $this->getExports(),
            //'bulks'    => handlers()->where(['bulk' => 1])->findAll(),
        ]);

		// Add preferences
		$this->setPreferences();

		foreach (['Medias.sort', 'Medias.order', 'Medias.format', 'Pager.perPage'] as $preference) {
			[,$field] = explode('.', $preference);
			$this->setData([$field => setting($preference)]);
		}

		return $this;
		
	}

	    /**
     * Filters, validates, and sets preferences based on input values.
     *
     * @return $this
     */
    protected function setPreferences(): self
    {
        // Filter input on allowed fields
        $validation = service('validation');

        foreach ($this->preferenceRules as $field => $rule) {
            if (null !== $value = $this->request->getVar($field)) {
                if ($validation->check($value, $rule)) {
                    // Special case for perPage
                    $preference = $field === 'perPage'
                        ? 'Pager.' . $field
                        : 'Medias.' . $field;

                    preference($preference, $value);
                }
            }
        }

        return $this;
    }

	/**
	 * Gets Export handlers indexed by the extension they support.
	 *
	 * @return array<string, array>
	 */
	protected function getExports(): array
	{
		// $exports = [];
		// foreach (handlers('Exports')->findAll() as $class) {
		// 	$attributes = handlers()->getAttributes($class);

		// 	// Add the class name for easy access later
		// 	$attributes['class'] = $class;

		// 	foreach (explode(',', $attributes['extensions']) as $extension) {
		// 		$exports[$extension][] = $attributes;
		// 	}
		// }

		// return $exports;
		return [];
	}

	/** ****************************************************************
	 * 
	 * AJOUT ADN DU WEB
	 * 
	 * ****************************************************************/

	public function getManagerEdition()
	{
		if ($value = $this->request->getPost('value')) {
			$this->uuid = $this->uuid->fromString($value['uuid'])->getBytes();
			$this->viewData['media'] = $this->tableModel->where([$this->tableModel->uuidFields[0] => $this->uuid])->first();
			$this->infosCustomImage($this->viewData['media']);

			$html = view($this->viewPrefix .'imageManagerEdition', $this->viewData);
			return $this->respond(['status' => true, 'type' => 'success', 'html' => $html], 200);
		}
	}

	public function saveManagerEdition()
	{
		if ($value = $this->request->getPost('value')) {
			parse_str($value, $output);

			//print_r($output); exit;

			$image = new Media($this->tableModel->where($this->tableModel->primaryKey, $output['id_media'])->get()->getRowArray());

			if (!empty($output['lang'][1]['titre'])) {

				foreach ($output['lang'] as $lang) {

					if (!$image->savelang($output['lang'], $output['id_media'])) {
						throw DataException::forProblemSaving($this->tableModel->errors(true));
					}
				}
			}

			$response = ['success' => ['code' => 200, 'message' => lang('Core.success_update')], 'error' => false, csrf_token() => csrf_hash()];
			// print_r($response); exit;
			return $this->respond($response,  200);
		}
	}

	public function dataImageManager()
	{

		$this->setDefaults();

		// Paginate non-select formats
		if ($this->viewData['format'] !== 'select') {
			$this->setData([
				'files' => $this->model->paginate($this->viewData['perPage'], 'default', $this->viewData['page']),
				'pager' => $this->model->pager,
			], true);
		} else {
			$this->setData([
				'files' => $this->model->findAll()
			], true);
		}

		$array = [
			'source' => $this->viewData['source'],
			'format' => $this->viewData['format'],
			'files' => $this->viewData['files'],
			'access' => 'display',
			'exports' => $this->getExports(),
			'pager' => $this->viewData['pager'],
			'perPage' => $this->viewData['perPage']
		];

		return $array;
	}


	protected function infosCustomImage($image)
	{
		if (!empty($image)) {
			$customFiles = glob(config('Medias')->getPath() . 'custom/' . stristr($image->localname, '.', true) . '*');
			$image->custom = [];
			if (!empty($customFiles)) {

				$i = 0;
				foreach ($customFiles as $file) {
					$newFile = str_replace(config('Medias')->getPath() . 'custom/', '', $file);
					$pathinfo  = pathinfo($newFile);
					if (!empty($pathinfo)) {
						$custom[$pathinfo['filename']] = $newFile;
						$i++;
					}
				}
				$image->custom = $custom;
			}
			
		}
		return $image->custom;
	}

	public function getDisplayImageManager()
	{
		$html = view($this->viewPrefix .'Forms\files', $this->dataImageManager());
		$response = ['success' => ['code' => 200, 'message' => lang('Medias.deleteSuccess')], 'error' => false, 'html' => $html, csrf_token() => csrf_hash()];
		return $this->respond($response,  200);
	}


		/**
	 * Deletes a file.
	 *
	 * @param string $fileId
	 *
	 * @return ResponseInterface
	 */
	public function removeFile(...$params)
	{

		// Load post data
		$request = json_decode($this->request->getBody());

	
		if (empty($request) || !is_array($request->uuid)) {
			$response = ['errors' => [lang('Core.resourcesFailed') .  ' : ' . print_r($request, true)]];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
		}

		if (!is_array($request->uuid)) {
			$request = [$request->uuid];
		}

		$i = 0;
		foreach($request->uuid as $uuid){

			$media = model(MediaModel::class)->getMediaByUUID($uuid);

			if(!$media){
				$response = ['errors' => [lang('Core.resourcesFailed')]];
            	return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
			}

			//image par default
			if($media->id == 1){
				$response = ['errors' => lang('Core.notAuthorized') .  ' : ' . print_r($request, true)];
            	return $this->respond($response, ResponseInterface::HTTP_UNAUTHORIZED);
			}

			if (model(MediaModel::class)->delete($media->id)) {
				@unlink(config('Medias')->getPath() . 'thumbnails/' . $media->localname);
				@unlink(config('Medias')->getPath() . 'small/' . $media->localname);
				@unlink(config('Medias')->getPath() . 'medium/' . $media->localname);
				@unlink(config('Medias')->getPath() . 'large/' . $media->localname);
				@unlink(config('Medias')->getPath() . 'original/' . $media->localname);

				$custom = [];
				$customFiles = glob(config('Medias')->getPath() . 'custom/' . $media->localname . '*');
	
				if (!empty($customFiles)) {
					$i = 0;
					foreach ($customFiles as $custom) {
	
						@unlink($custom);
					}
				} 
				
			}else{
				$response = ['errors' => lang('Core.resourcesFailed') .  ' : ' . print_r(model(MediaModel::class)->errors(), true)];
            	return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
			}

			$i++;
		}

		if ($this->request->isAJAX()) {
			$response = ['messages' => ['sucess' => lang('Core.resourcesSaved')]];
			if(isset($request->imageEditionManager)){
				$this->getAllMedias($request->type);
				$response['medias']    = $this->viewData['medias'];
				$response['listMedia'] =$this->viewData['listMedia'];
			}
			return $this->respond($response, 200);
		}


        alert('success', lang('Core.resourcesDeleted'));
        return redirect()->back();
	}

	/**
	 * Deletes a file custom.
	 *
	 * @param string $fileId
	 *
	 * @return ResponseInterface
	 */
	public function removeFileCustom(...$params)
	{
		// Load post data
		$response = json_decode($this->request->getBody());
	
		if (empty($response) || !is_array($response->uuid)) {
			$response = ['errors' => lang('Core.resourcesFailed')];
			return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
		}

		if (!is_array($response->uuid)) {
			$response = [$response->uuid];
		}

		$i = 0;
		foreach($response->filename as $filename){

				$customFiles = glob(config('Medias')->getPath() . 'custom/' . $filename . '*');

				if (!empty($customFiles)) {
					$h = 0;
					foreach ($customFiles as $custom) {
						@unlink($custom);
					}
					$h = 0;
				}
		

			$i++;
		}

		if ($this->request->isAJAX()) {
			$response = ['messages' => ['success' => lang('Core.resourcesDeleted')]];
			return $this->respond($response, ResponseInterface::HTTP_OK);
		}

		Theme::set_message('success', lang('Medias.deleteSuccess'), lang('Core.cool_success'));
		return redirect()->back();
	}

	// /**
	//  * Deletes a file.
	//  *
	//  * @param string $fileId
	//  *
	//  * @return ResponseInterface
	//  */
	public function removeAll()
	{
		helper('file');

		// delete Files
		$map = directory_map(config('Medias')->getPath(), FALSE, TRUE);

		foreach ($map as $k => $v) {

			if (is_array($v)) {
				foreach ($v as $file) {
					delete_files(Config('Medias')->getPath() . $k);
				}
			}
		}

		// delete Files TEMP
		$mapTemp = directory_map(WRITEPATH . 'uploads/', FALSE, TRUE);


		foreach ($mapTemp as $k => $v) {

			if (is_array($v)) {
				foreach ($v as $file) {
					delete_files(WRITEPATH . 'uploads/' . $k);
				}
			}

			//rrmdir(WRITEPATH . 'uploads');
			delete_directory(WRITEPATH . 'uploads');
		}

		// Recreate the uploads folder
		if (!is_dir(WRITEPATH . 'uploads/') && !@mkdir(WRITEPATH . 'uploads/', 0775, true)) {
			throw MediasException::forDirFail(WRITEPATH . 'uploads/');
		}

		if ($this->model->deleteAll()) {

			Theme::set_message('success', lang('Medias.deleteSuccess'), lang('Core.cool_success'));
			return $this->_redirect('');
		}


		Theme::set_message('danger', implode('. ', $this->model->errors()), lang('Core.warning_error'));
		return $this->_redirect('');
	}

	 /**
     * Rename file
     * 
     * @return RedirectResponse
     *  : ResponseInterface
     */
    public function rename()
    {

        if ($this->request->isAJAX()) {

            $response = json_decode($this->request->getBody());
           	
			$media = model(MediaModel::class)->getMediaByUUID($response->uuid);
			$media->titre = $response->titre;
			$media->updated_at = date('Y-m-d H:i:s');

			$error = [];
			if (!model(MediaModel::class)->save($media)) {
				$response = ['errors' => model(MediaModel::class)->errors()];
				return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
			}

			$response = ['messages' => ['success' => lang('Core.resourcesSaved')]];
			return $this->respond($response, 200);
            
        }

	}
	
	 /**
     * Displays a setting of available.
     *
     * @return string
     */
    public function settings(): string
    {

		$this->setDefaults();

		// Get the Files
		if (!isset($this->viewData['medias'])) {
			// Apply a target user
			if ($this->viewData['userId']) {
				$this->model->whereUser($this->viewData['userId']);
			}

			// Apply any requested search filters
			if ($this->viewData['search']) {
				$this->model->like('filename', $this->viewData['search']);
			}

			// Sort and order
			$this->model->orderBy($this->viewData['sort'], $this->viewData['order']);

			// Paginate non-select formats
			if ($this->viewData['format'] !== 'select') {
				$this->setData([
					// 'medias' => $this->model->paginate($this->viewData['perPage'], 'default', $this->viewData['page']),
					'medias' => model(MediaModel::class)->getMedias(true, $this->viewData['perPage'], 'default', $this->viewData['page']),
					'pager' => $this->model->pager,
				], true);
			} else {
				$this->setData([
					// 'medias' => $this->model->findAll()
					'medias' => $this->model->getMedias(false),
				], true);
			}
		}

		$this->viewData['active'] = 'settings';


        return $this->render($this->viewPrefix .'settings\index', $this->viewData);
	}
	
	 /**
     * Store a newly created resource in storage.
     */
    public function saveSettings()
    {


        $rules = [
			'acceptedFiles' => 'required',
            'formatThumbnail'   => 'required|regex_match[/^[0-9]|[0-9]$/]',
            'formatSmall'   => 'required|regex_match[/^[0-9]|[0-9]$/]',
            'formatMedium' => 'required|regex_match[/^[0-9]|[0-9]$/]',
			'formatLarge' => 'required|regex_match[/^[0-9]|[0-9]$/]'
        ];

        if (! $this->validate($rules)) {
			alert('error', lang('Core.resourcesFailed'));
			return redirect()->back()->withInput()->with('error', lang('Auth.resourcesFailed'));
        }


        //print_r($this->request->getPost());exit;
        if ($format =  $this->request->getPost('format')) {

			(!isset($format['watermark']))   ? $format['watermark']   = 0 :  $format['watermark']   = true;

            foreach ($format as $k => $v) {
                
                service('settings')->set('Medias.format', $v, $k); 
            }
		}

		setting('Medias.acceptedFiles', $this->request->getPost('acceptedFiles'));
		setting('Medias.formatThumbnail', $this->request->getPost('formatThumbnail'));
        setting('Medias.formatSmall', $this->request->getPost('formatSmall'));
        setting('Medias.formatMedium', $this->request->getPost('formatMedium'));
        setting('Medias.formatLarge', $this->request->getPost('formatLarge'));
		setting('Medias.formatTextWatermark', $this->request->getPost('formatTextWatermark'));
		setting('Medias.formatWatermark', $this->request->getPost('formatWatermark') === '0');


		if ($format =  $this->request->getPost('delete_files')) {

			$this->rmDir('thumbnails');
			$this->rmDir('small');
			$this->rmDir('medium');
			$this->rmDir('large');
			$this->rmDir('original');

			model(MediaModel::class)->emptyTable();
		}

		// On créer l'image par default
		if(!model(MediaModel::class)->find(1)){

			list($thumbnailWidth, $thumbnailHeight) = explode('|', setting('Medias.formatThumbnail'));
			list($smallWidth, $smallHeight) = explode('|', setting('Medias.formatSmall'));
			list($mediumWidth, $mediumHeight) = explode('|', setting('Medias.formatMedium'));
			list($largeWidth, $largeHeight) = explode('|', setting('Medias.formatLarge'));

			try
			{
				\Config\Services::image()->withFile(APPPATH . 'Modules/ci4-medias/src/default.jpg')->save(WRITEPATH . 'medias/original/default.jpg');
				\Config\Services::image()->withFile(APPPATH . 'Modules/ci4-medias/src/default.jpg')->fit($thumbnailWidth, $thumbnailHeight, 'center')->save(WRITEPATH . 'medias/thumbnails/default.jpg');
				\Config\Services::image()->withFile(APPPATH . 'Modules/ci4-medias/src/default.jpg')->fit($smallWidth, $smallHeight, 'center')->save(WRITEPATH . 'medias/small/default.jpg');
				\Config\Services::image()->withFile(APPPATH . 'Modules/ci4-medias/src/default.jpg')->fit($mediumWidth, $mediumHeight, 'center')->save(WRITEPATH . 'medias/medium/default.jpg');
				\Config\Services::image()->withFile(APPPATH . 'Modules/ci4-medias/src/default.jpg')->fit($largeWidth, $largeHeight, 'center')->save(WRITEPATH . 'medias/large/default.jpg');

				model(MediaModel::class)->createImageDefault();
			}
			catch (ImageException $e)
			{
				return false;
			}

		}	
		
        // Success!
		alert('success', lang('Core.resourcesSaved'));
		return redirect()->to(route_to('medias.settings'))->with('success', lang('Core.resourcesSaved'));

	}
	
	public function rmDir(string $dir){
		// match any file
		$files = glob(config('Medias')->getPath() . $dir . '/*');
		foreach($files as $file){
			if(is_file($file))
				unlink($file);
		}
		rmdir(config('Medias')->getPath() . $dir);
		config('Medias')->getPath();
	}

	public function getCropTemplate(){

		if ($this->request->isAJAX()) {

			$response = json_decode($this->request->getBody());
			$media = model(MediaModel::class)->getMediaByUUID($response->uuid);

			if (!$media) {
				return $this->getResponse(['error' => lang('Medias.noFile')], 400);
			}
	
			$this->viewData['dir_image_original'] =  config('Medias')->getPath() . 'original/';
			$this->viewData['uuid'] = $media->getUUID();
			$this->viewData['field'] = (isset($value['field'])) ? $value['field'] : false;
			$this->viewData['mine'] = $media->getType();
			$this->viewData['extension'] = $media->getExtension();
			$this->viewData['image'] = $media->localname;
			$this->viewData['crop_width'] = (isset($value['crop_width'])) ? $value['crop_width'] : false;
			$this->viewData['crop_height'] = (isset($value['crop_height'])) ? $value['crop_height'] : false;
			$this->viewData['only'] = (isset($value['only'])) ? $value['only'] : false;
			$this->viewData['input'] = '';
			$this->viewData['media'] = $media;

			$html = view($this->viewPrefix .'cropImage', $this->viewData);
			//echo 'fghdfh'; exit;
			//return $this->respond(['status' => true, 'type' => 'success', 'path' => site_url('public/uploads/' . $newName)], 200);
			$return = [
				'status' => true,
				'type' => 'success',
				'crop' => true,
				'cropImage' => $html,
				'path' => $this->viewData['media']->getThumbnail()
			];
			return $this->response->setJSON($return);
		}
	}


	public function cropFile()
	{

		$response = (object) $this->request->getVar();

		$media = model(MediaModel::class)->getMediaByUUID($response->uuid);


		if (!$media) {
			$response = ['error' => ['code' => 400, 'message' => lang('Medias.noFile')], 'success' => false, csrf_token() => csrf_hash()];
			return $this->respond($response, 400);
		}


		$file = $this->request->getFile('croppedImage');

		if ($file->isValid() && !$file->hasMoved()) {
			// On enregistre l'image que l 'on vient de créer
			list($width, $height, $type, $attr) =  getimagesize($file->getPathName());
			$path_parts = pathinfo($media->getPath('original'));
			$name = $path_parts['filename'] . '-' . $width . 'x' . $height . '.' . $path_parts['extension'];

			if (!$file->move(config('Medias')->getPath() . 'custom/', $name)) {
				return $this->respond(['status' => false, 'type' => 'warning', 'message' => $file->getErrorString() . '(' . $file->getError() . ')']);
			}

			$mediaCustomEdition = [];
			if ($this->request->getPost('imageCustomEdition') == true) {
				$this->infosCustomImage($media);
				$mediaCustomEdition = view($this->viewPrefix .'imageCustom', $this->viewData);
			}

			$response =
				[
					 'messages' => [
						'sucess' => lang('Core.resourcesSaved')
					], 
					'error' => false,
					csrf_token() => csrf_hash(),
					'field'              => $this->request->getPost('field'),
					'only'               => $this->request->getPost('only'),
					'input'              => $this->request->getPost('input'),
					'imageCustomEdition' => $mediaCustomEdition,
					'idMedia'            => $media->getID(),
					'name'               => $name,
					'filename'           => img_data(config('Medias')->getPath() . 'custom/' . $name),
					'format'             => $width . 'x' . $height,
					//'widgetOption'       => json_encode(['media' => [$this->tableModel->primaryKey => $media->getID(), 'filename' => img_data(config('Medias')->getPath() . 'custom/' . $name), 'format' => $name]]),
					'pathThumbnail'      => $media->getThumbnail(),
					'path'               => $media->getOriginal()
				];


			return $this->respond($response,  200);
		}
	}

	protected function getAllMedias(string $type){
		$this->viewData['medias']    = model(MediaModel::class)->getMedias(false, false, false, false, $type);
		$this->viewData['listMedia'] = view($this->viewPrefix .'partials\list_media_card', ['medias' => $this->viewData['medias']]);
	}


	/**
	 * getImageManager
	 */
	public function getImageManager(){

		if ($this->request->isAJAX()) {
			$response = json_decode($this->request->getBody());
			//var_dump($response); exit;

			$this->getAllMedias($response->type);
			
			$response = [
				'messages' => [
					'sucess' => lang('Core.resourcesSaved')
				], 
				'medias'    => $this->viewData['medias'],
				'listMedia' => $this->viewData['listMedia']
			];
			return $this->respond($response, ResponseInterface::HTTP_OK);
		}

	}

	public function getUploadFinal(){

		if ($this->request->isAJAX()) {
			$response = json_decode($this->request->getBody());
			$this->getAllMedias($response->type);
			
			$response = [
				'messages' => [
					'sucess' => lang('Core.resourcesSaved')
				], 
				'listMedia' => view($this->viewPrefix .'partials\list_media_card', ['medias' => $this->viewData['medias']])
			];
			return $this->respond($response, ResponseInterface::HTTP_OK);
		}
	}
	
 	/**
     * Returns the Media provider
     *
     * @return mixed
     */
    protected function getMediaCurrentProvider()
    {
        //http://localhost:8080/admin1117669688/system/users/edit/ea2915b6-2fa6-4414-aaab-305ccd05321c
        if (service('uuid')->isValid($this->id)) {
            $this->id = service('uuid')->fromString($this->id)->getBytes();
			$this->object = model('MediaModel')->where([model('MediaModel')->uuidFields[0] => $this->id])->first();
			$this->object->lang = $this->object->getMedialang();
        }
	}
	
	public function getEditionImage(){

		$response = json_decode($this->request->getBody());
		$this->id = $response->uuid;
		$this->getMediaCurrentProvider();
		$response = [
			'messages' => [
				'sucess' => lang('Core.resourcesSaved')
			], 
			'editionMediaManager' => view($this->viewPrefix .'imageManagerEdition', ['media' => $this->object, 'mediaLang' => $this->object->lang, 'supportedLocales' => $this->viewData['supportedLocales']])
		];
		return $this->respond($response, ResponseInterface::HTTP_OK);
	}

	public function saveEditionImage(){

		$response = $this->request->getPost();
		//print_r($response); exit;
		$this->id = $response['uuid_media'];
		$this->getMediaCurrentProvider();

		$lang = [];
		
		foreach($response['lang'] as $k => $v){
			$lang[$k] = $v; 
			$lang[$k]['lang'] = $k;
			$lang[$k]['media_id'] = $this->object->id;
			
		}	
		//$lang['media_id'] = $this->object->id;
		//$lang['id_media_lang'] = $response['id_media_lang'];
		//print_r($lang); exit;
		foreach($lang as $k => $s){
			if (!model(MediaLangModel::class)->updatelang($s)) {
				$response = ['errors' => model(MediaLangModel::class)->errors()];
				return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
			}
		}
		
		$response = [
			'messages' => [
				'sucess' => lang('Core.resourcesSaved')
			], 
			'editionMediaManager' => view($this->viewPrefix .'imageManagerEdition', ['media' => $this->object, 'mediaLang' => $this->object->lang, 'supportedLocales' => $this->viewData['supportedLocales']])
		];
		return $this->respond($response, ResponseInterface::HTTP_OK);
	}

	public function initPageHeaderToolbar()
    {
			parent::initPageHeaderToolbar();
			
			if( 'settings' == service('router')->methodName()){
				$this->pageTitleDefault = ucfirst(lang('Medias.settingseMedias'));
			}
           
    }
	
}
