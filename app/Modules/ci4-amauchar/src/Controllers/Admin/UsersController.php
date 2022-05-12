<?php

namespace Amauchar\Core\Controllers\Admin;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Amauchar\Core\Controllers\Admin\AdminController;
use Amauchar\Core\Entities\User;
use Amauchar\Core\Models\UserModel;
use Amauchar\Core\Models\UserAdresseModel;
use Amauchar\Core\Models\SessionModel;
use Amauchar\Core\Models\AuditModel;
use Amauchar\Core\Libraries\Data;
use Amauchar\Core\Exceptions\UserAuthException;
use CodeIgniter\Events\Events;

/**
 * Class DashboardController
 *
 * A generic controller to handle Authentication Actions.
 */
class UsersController extends AdminController
{

    use ResponseTrait;

    /**  @var string  */
    protected $viewPrefix = '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\users\\';

    protected $helpers    = ['error'];

    /**  @var object  */
    public $tableModel = UserModel::class;

    public $filterDatabase = false;

    public $allow_export = true;

    protected $user;

    /**
     * Displays the form the login to the site.
     */
    public function index()
    {
        theme()->add_js('plugins/custom/datatables/datatables.bundle.js');
        return $this->render($this->viewPrefix . 'index', $this->viewData);
    }


     /**
     * Displays the form for a new item.
     *
     * @return string
     */
    public function create(): string
    {
        helper('tools');
       //parent::create();

        // Initialize form
        $this->viewData['form'] = new \Amauchar\Core\Entities\User();
        $groups = setting('AuthGroups.groups');
        asort($groups);
        $this->viewData['groups'] = $groups;

        return $this->render($this->viewPrefix . 'create', $this->viewData);
    }


    /**
     * Creates or saves the basic user details.
     *
     * @throws ReflectionException
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|void
     */
    public function save(?int $userId = null)
    {
        if (! auth()->user()->can('users.edit')) {
            $response = ['errors' => lang('Core.notAuthorized')];
            return $this->respond($response, ResponseInterface::HTTP_UNAUTHORIZED);
        }

        $users = new UserModel();
        /**
         * @var User
         */
        $user = $userId !== null
            ? $users->find($userId)
            : new User();

        /** @phpstan-ignore-next-line */
        if ($user === null) {
            $response = ['errors' => lang('Core.resourceNotFound', ['user'])];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }

        /**
         * Perform validation here so we can merge the
         * basic model validation rules with the meta info rules.
         *
         * @var array
         */
        $rules = config('Validation')->users;
        //$rules = array_merge($rules, $user->validationRules('meta'));

        if (! $this->validate($rules)) {
            $response = ['errors' => $this->validator->getErrors()];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }

        // Fill in basic details
        $user->fill($this->request->getPost());
        $user->uuid = service('uuid')->uuid4()->toString();

        // Try saving basic details
        try {
            if (! $users->save($user)) {
                log_message('error', 'User errors', $users->errors());

                $response = ['errors' => lang('Bonfire.unknownSaveError', ['user'])];
                return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            }
        } catch (DataException $e) {
            // Just log the message for now since it's
            // likely saying the user's data is all the same
            log_message('debug', 'SAVING USER: ' . $e->getMessage());
        }

        // We need an ID to on the entity to save groups.
        if ($user->id === null) {
            $user->id = $users->getInsertID();
        }

        // Check for an avatar to upload
        if ($file = $this->request->getFile('avatar')) {
            if ($file->isValid()) {
                $filename = $user->id . '_avatar.' . $file->getExtension();
                if ($file->move(ROOTPATH . 'public/uploads/avatars', $filename, true)) {
                    $users->update($user->id, ['avatar' => $filename]);
                }
            }
        }

        // Save the new user's email/password
        $password = $this->request->getPost('password');
        $identity = $user->getEmailIdentity();
        if ($identity === null) {
            helper('text');
            $user->createEmailIdentity([
                'email'    => $this->request->getPost('email'),
                'password' => ! empty($password) ? $password : random_string('alnum', 12),
            ]);
        }
        // Update existing user's email identity
        else {
            $identity->secret = $this->request->getPost('email');
            if ($password !== null) {
                $identity->secret2 = service('passwords')->hash($password);
            }
            if ($identity->hasChanged()) {
                model(UserIdentityModel::class)->save($identity);
            }
        }

        // Save the user's groups
        $user->syncGroups($this->request->getPost('groups') ?? []);

        $user->createAdresseDefault();

        // Save the user's meta fields
        //$user->syncMeta($this->request->getPost('meta') ?? []);

        // Success!
        // alert('success', lang('Auth.registerSuccess', ['settings']));
        $response = [
            'error'    => null,
            'messages' => [
                'sucess' => lang('Auth.resourceSaved', ['user'])
            ], 
            'redirect' => route_to('users.edit', $user->uuid)
        ];
        return $this->respond($response, 200);
    }


    /**
     * Shows details for one item.
     *
     * @param string $itemId
     *
     * @return string
     */
    public function edit(string $uuid)
    {
        helper(['form', 'date']);

        $this->id = $uuid;

        $this->getUserCurrentProvider();

        if ($this->object === null) {
            //http://localhost:8080/admin1117669688/system/users/edit/ea2915b6-2fa6-4414-aaab-305ccd05321c
            alert('error', lang('Auth.resourceNotFound', ['user']));
            return redirect()->to(route_to('dashboard.view'));
        }


        $this->getUserInformations();

        /** @var LoginModel $loginModel */
        $loginModel = model(LoginModel::class);
        $this->viewData['logins'] = $loginModel->where('email', $this->object->email)->orderBy('date', 'desc')->limit(10)->find();

        /** @var SessionModel $sessionModel */
        $sessionModel = model(SessionModel::class);
        $this->viewData['sessions'] = $sessionModel->where('user_id', $this->object->id)->orderBy('timestamp', 'desc')->limit(10)->find();

         /** @var AuditModel $auditModel */
        $auditModel = model(AuditModel::class);
        $this->viewData['audits'] = $auditModel->where('user_id', $this->object->id)->orderBy('created_at', 'desc')->limit(10)->find();
        //print_r($this->viewData['audits']); exit;

        $permissions = setting('AuthGroups.permissions');
        if (is_array($permissions)) {
            ksort($permissions);
        }
        $this->viewData['permissions'] = $permissions;

        //print_r($this->object); exit;


        return $this->render($this->viewPrefix . 'form', $this->viewData);
    }

     /**
     * Save item details Ajax.
     *
     * @param string $itemId
     *
     * @return RedirectResponse
     */
    public function update()
    {
        if ($this->request->isAJAX()) {

            $this->id = $this->request->getPost('uuid');
            $this->action = $this->request->getPost('action');

            $this->getUserCurrentProvider();

            switch ($this->action) {
                case 'edit_user':

                        $this->rules = [
                            'username'         => 'required|alpha_numeric_space|min_length[3]|is_unique[users.username,id,' . $this->object->id . ']',
                             'email'           => 'required|valid_email|is_unique[auth_identities.secret,secret,' . $this->request->getPost('email') . ']',
                        ];
            
                        if (!$this->validate($this->rules)) {
                            $response = ['errors' => $this->validator->getErrors()];
                            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
                        }

                        
                        // try to update the item
                        $requestPost = $this->request->getPost();
                        if (! model(UserModel::class)->update($this->object->id, $requestPost)) {
                            $response = ['errors' => model(UserModel::class)->errors()];
                            return $this->respond($response, ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
                        }
                       

                        // try to update the item
                        $address = $this->request->getPost('address');

                        $this->saveAdresse($address);
                        $this->getUserInformations();

                        // Success!
                        $response = [
                            'messages' => [
                                'sucess' => lang('Core.resourcesSaved')
                            ],
                            'address_id' =>  $this->viewData['adresseId'],  
                            'display_kt_user_view_details' => view('Amauchar\Core\backend\metronic\users\partials\_kt_user_view_details', [
                                'form' =>  $this->viewData['form'], 
                                'name' =>  $this->viewData['name'], 
                                'adresseDefault' => $this->viewData['adresseDefault'], 
                                'allCountry' => Data::getCountriesList()
                                ]
                            ),
                            'display_card_1' => view('Amauchar\Core\backend\metronic\users\partials\_card_1', [
                                'form' =>  $this->viewData['form'], 
                                'name' =>  $this->viewData['name'], 
                                'adresseDefault' => $this->viewData['adresseDefault'], 
                                'allCountry' => Data::getCountriesList()
                                ]
                            ),
                        ];
                        return $this->respond($response, ResponseInterface::HTTP_OK);

                    break;
                case 'edit_user_email':

                        $this->id = $this->request->getPost('uuid');

                        $this->rules = [
                            'email'    => 'required|valid_email|is_unique[auth_identities.secret,id,' . $this->request->getPost('id') . ']',
                        ];
            
                        if (!$this->validate($this->rules)) {
                            $response = ['errors' => $this->validator->getErrors()];
                            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
                        }
        
                        $this->getUserInformations();

                         // Success!
                        $response = [
                            'messages' => [
                                'sucess' => lang('Core.resourcesSaved')
                            ],
                            'display_kt_user_view_details' => view('Amauchar\Core\backend\metronic\users\partials\_kt_user_view_details', [
                                'form' =>  $this->viewData['form'],
                                'adresseDefault' => $this->viewData['adresseDefault'], 
                                'allCountry' => $this->viewData['allCountry'], 
                                ]
                            ),
                            'display_kt_table_users_profile' => view('Amauchar\Core\backend\metronic\users\partials\_kt_table_users_profile', [
                                'form' =>  $this->viewData['form'],
                                'adresseDefault' => $this->viewData['adresseDefault'], 
                                ]
                            )
                        ];
                        return $this->respond($response, ResponseInterface::HTTP_OK);     

                    break;
                case 'edit_user_phone':

                    $this->id = $this->request->getPost('uuid');

                    $this->rules = [
                        'address.phone'        => 'numeric|min_length[10]',
                        'address.phone_mobile' => 'numeric|min_length[10]',
                    ];
        
                    if (!$this->validate($this->rules)) {
                        $response = ['errors' => $this->validator->getErrors()];
                        return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
                    }


                    $address = $this->request->getPost('address');

                    $this->getUserInformations();
                    $this->saveAdresse($address);
                    

                    // Success!
                    $response = [
                        'messages' => [
                            'sucess' => lang('Core.resourcesSaved')
                        ],
                        'address_id' => $this->viewData['adresseId'],  
                        'display_kt_table_users_profile' => view('Amauchar\Core\backend\metronic\users\partials\_kt_table_users_profile', [
                            'form' =>  $this->viewData['form'],
                            'adresseDefault' => $this->viewData['adresseDefault'], 
                            ]
                        )
                    ];
                    return $this->respond($response, ResponseInterface::HTTP_OK);

                    break;
                case 'edit_user_password':

                        $this->id = $this->request->getPost('uuid');

                        $credentials             = $this->request->getPost(setting('Auth.validFields'));
                        $credentials             = array_filter($credentials);
                        $credentials['password'] = $this->request->getPost('current_password');

                        // print_r($credentials); exit;

                        $this->getUserInformations();

                        $result = auth('session')->attempt($credentials);
                        if (! $result->isOK()) {
                            $response = ['errors' => [lang('Core.badPassword')]];
                            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
                        }
                        
                        //Vérification du mot de passe
                        $this->rules = [
                            'password'     => 'required|strong_password',
                            'confirm_password' => 'required|matches[password]',
                        ];
            
                        if (!$this->validate($this->rules)) {
                            $response = ['errors' => $this->validator->getErrors()];
                            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
                        }

                        $identity = $this->object->getEmailIdentity();
                        $identity->secret = $this->object->email;
                        $identity->secret2 = service('passwords')->hash($this->request->getPost('password'));
                        if ($identity->hasChanged()) {
                            model(UserIdentityModel::class)->save($identity);
                        }

                          // Success!
                          $response = [
                            'messages' => [
                                'sucess' => lang('Core.resourcesSaved')
                            ],
                            'display_kt_user_view_details' => view('Amauchar\Core\backend\metronic\users\partials\_kt_user_view_details', [
                                'form' =>  $this->viewData['form'],
                                'adresseDefault' => $this->viewData['adresseDefault'], 
                                'allCountry' => $this->viewData['allCountry'], 
                                ]
                            )
                        ];
                        return $this->respond($response, ResponseInterface::HTTP_OK);  

                    break;
                case 'edit_user_group':

                    $this->id = $this->request->getPost('uuid');
                    $this->getUserInformations();
                    $this->object->syncGroups($this->request->getPost('groups') ?? []);
                        
                     // Success!
                     $response = [
                        'messages' => [
                            'sucess' => lang('Core.resourcesSaved')
                        ],
                        'display_kt_table_users_profile' => view('Amauchar\Core\backend\metronic\users\partials\_kt_table_users_profile', [
                            'form' =>  $this->viewData['form'],
                            'adresseDefault' => $this->viewData['adresseDefault'], 
                            ]
                        )
                    ];
                    return $this->respond($response, ResponseInterface::HTTP_OK);  

                    break;

                case 'edit_user_notification':

                    $connexionUnique = ($this->request->getPost('connexionUnique') ? 1 : 0);

                    $context = 'user:' . user_id();
                    service('settings')->set('App.connexionUnique', $connexionUnique, $context);

                     // Success!
                     $response = [
                        'messages' => [
                            'sucess' => lang('Core.resourcesSaved')
                        ]
                    ];
                    return $this->respond($response, ResponseInterface::HTTP_OK);  

                break;

                case 'edit_user_persmissions':
                    
                    $this->id = $this->request->getPost('uuid');

                    $this->getUserInformations();

                    $this->object->syncPermissions($this->request->getPost('permissions') ?? []);

                     // Success!
                     $response = [
                        'messages' => [
                            'sucess' => lang('Core.resourcesSaved')
                        ]
                    ];
                    return $this->respond($response, ResponseInterface::HTTP_OK);  

                break;

                case 'activation':

                    if($this->object->id == user_id()){
                        $response = ['errors' => lang('Core.notAuthorizedOwnAccount')];
                        return $this->respond($response, ResponseInterface::HTTP_UNAUTHORIZED);
                    }
                    
                    if($this->object->active == 0){
                        $this->object->activate();
                    }else{
                        $this->object->deactivate();
                    }
            
                    if(!model(UserModel::class)->save($this->object)){
                        return $this->failure(400, 'No user save', true);
                    }

                     // Success!
                     $response = [
                        'messages' => [
                            'sucess' => lang('Core.resourcesSaved')
                        ]
                    ];
                    return $this->respond($response, ResponseInterface::HTTP_OK);  

                break;
                

                default:
                return $this->respondNoContent();
            }


        }

        return $this->respondNoContent();
    }

    /**
     * Delete the specified user.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function delete()
    {

        $response = json_decode($this->request->getBody());

        

        if(!is_array($response->uuid))
            return false; 

        if (! auth()->user()->can('users.delete')) {
            $response = ['errors' => lang('Core.notAuthorized')];
            return $this->respond($response, ResponseInterface::HTTP_UNAUTHORIZED);
        }

        foreach ($response->uuid as $key => $uuid) {

            if (!service('uuid')->isValid($uuid)) {
                return $this->respond(['error' => lang('Core.resourceNotFound', ['user'])], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
            }
            $this->uuid = service('uuid')->fromString($uuid)->getBytes();

            $users = model(UserModel::class);
            /** @var User|null $user */
            $user = $users->where('uuid', $this->uuid)->first();

            if ($user === null) {
                $response = ['errors' => lang('Core.resourceNotFound', ['user'])];
                return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            }

            if($user->id == user_id()){
                $response = ['errors' => lang('Core.notAuthorizedOwnAccount')];
                return $this->respond($response, ResponseInterface::HTTP_UNAUTHORIZED);
            }

            if (! $users->delete($user->id)) {
                log_message('error', implode(' ', $users->errors()));

                $response = ['errors' => lang('Core.unknownError')];
                return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            }
        }

         // Success!
         $response = [
            'messages' => [
                'sucess' => lang('Core.resourceDeleted', ['user'])
            ]
        ];
        return $this->respond($response, ResponseInterface::HTTP_OK);  
       
    }

     /**
     * Save address
     *
     * @return Amauchar\Core\Entities\User
     */
    protected function saveAdresse($address){

       
        if(!empty($address['id'])){
            $address['updated_at']  = date('Y-m-d H:i:s');
            $this->viewData['adresseId'] = $address['id'];
            if (! model(UserAdresseModel::class)->update($address['id'], $address)) {
                return $this->respond(['error' => model(UserAdresseModel::class)->errors()], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $address['user_id']    = $this->object->id;
            $address['country'] = empty($address['country']) ? 74 : $address['country'];
            $address['created_at'] = date('Y-m-d H:i:s');

            if (! $this->viewData['adresseId'] = model(UserAdresseModel::class)->insert($address, true)) {
                return $this->respond(['error' => model(UserAdresseModel::class)->errors()], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

        
    }

     /**
     * Returns the Entity class that should be used
     *
     * @return Amauchar\Core\Entities\User
     */
    protected function getUserInformations()
    {
        $this->viewData['form'] = $this->object;
        $this->viewData['allCountry'] = Data::getCountriesList();
        $this->viewData['adresseDefault'] = model(UserAdresseModel::class)->where('user_id', $this->object->id)->where('default', 1)->first();
        $this->groups();
    }

     /**
     * Returns the Entity class that should be used
     *
     * @return Amauchar\Core\Entities\User
     */
    protected function groups(){
        $groups = setting('AuthGroups.groups');
        asort($groups);

        // Find the number of users in this group
        foreach ($groups as $alias => &$group) {
            $group['user_count'] = db_connect()
                ->table('auth_groups_users')
                ->where('group', $alias)
                ->countAllResults(true);
        }
        $this->viewData['groups'] = $groups;

        //print_r( $this->viewData['groups']); exit;
    }

    /**
     * Returns the User provider
     *
     * @return mixed
     */
    protected function getUserCurrentProvider()
    {
        //http://localhost:8080/admin1117669688/system/users/edit/ea2915b6-2fa6-4414-aaab-305ccd05321c
        if (service('uuid')->isValid($this->id)) {
            $this->id = service('uuid')->fromString($this->id)->getBytes();
            $this->object = model('UserModel')->where([model('UserModel')->uuidFields[0] => $this->id])->first();
            if(!empty($this->object)){
                $this->object->adresseDefault = model(UserAdresseModel::class)->where(['user_id' => '24'])->first();
            }
        }

    }

    /**
     * Returns the Entity class that should be used
     *
     * @return \CodeIgniter\Shield\Entities\User
     */
    protected function getUserEntity()
    {
        return new User();
    }

     /**
     * Set breadcrumbs array for the controller page.
     *
     * @param int|null $tab_id
     * @param array|null $tabs
     */
    public function initBreadcrumbs(){

        parent::initBreadcrumbs();
        
        if(service('router')->methodName() == 'edit'){
            $this->getUserCurrentProvider();
            $addBreadcrumb[] = array(
                'title' => ($this->object) ? $this->object->getFullName() : null,
                'path' => null,
                'active' => false
            );
            
            $this->breadcrumbs = array_merge($this->breadcrumbs, $addBreadcrumb);
        }
    }

    /**
     * Displays the form the settings user to the site.
     */
    public function settings()
    {

        $rememberOptions = [
            '1 hour'   => 1 * HOUR,
            '4 hours'  => 4 * HOUR,
            '8 hours'  => 8 * HOUR,
            '25 hours' => 24 * HOUR,
            '1 week'   => 1 * WEEK,
            '2 weeks'  => 2 * WEEK,
            '3 weeks'  => 3 * WEEK,
            '1 month'  => 1 * MONTH,
            '2 months' => 2 * MONTH,
            '6 months' => 6 * MONTH,
            '1 year'   => 12 * MONTH,
        ];

        $this->viewData['rememberOptions'] = $rememberOptions;
        $this->viewData['defaultGroup']    = setting('AuthGroups.defaultGroup');
        $this->viewData['groups']          = setting('AuthGroups.groups');

        return $this->render($this->viewPrefix . 'settings', $this->viewData);
    }

     /**
     * Saves the general settings
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function updateSettings()
    {
        $rules = [
            'minimumPasswordLength' => 'required|integer|greater_than[6]',
            'defaultGroup'          => 'required|string',
        ];

        if (! $this->validate($rules)) {
            $response = [
                'errors' => $this->validator->getErrors()            
            ];
            return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
        }

        setting('Auth.allowRegistration', (bool) $this->request->getPost('allowRegistration'));
        setting('Auth.minimumPasswordLength', (int) $this->request->getPost('minimumPasswordLength'));
        setting('Auth.passwordValidators', $this->request->getPost('validators'));
        setting('AuthGroups.defaultGroup', $this->request->getPost('defaultGroup'));

        // Actions
        $actions             = setting('Auth.actions');
        $actions['login']    = $this->request->getPost('email2FA') ?? false;
        $actions['register'] = $this->request->getPost('emailActivation') ?? false;
        setting('Auth.actions', $actions);
        setting('Auth.allowMagicLinkLogin', (bool) $this->request->getPost('allowMagicLinkLogin'));
        

        // Remember Me
        $sessionConfig                     = setting('Auth.sessionConfig');
        $sessionConfig['allowRemembering'] = $this->request->getPost('allowRemember') ?? false;
        $sessionConfig['rememberLength']   = $this->request->getPost('rememberLength');
        setting('Auth.sessionConfig', $sessionConfig);

        // Avatars
        setting('Users.useGravatar', $this->request->getPost('useGravatar') ?? false);
        setting('Users.gravatarDefault', $this->request->getPost('gravatarDefault'));
        setting('Users.avatarNameBasis', $this->request->getPost('avatarNameBasis'));

        $response = [
            'error'    => null,
            'messages' => [
                'sucess' => lang('Core.resourcesSaved')
            ]
        ];
        return $this->respond($response, 200);

    }

       /**
     * Displays the form for a new item.
     *
     * @return string
     */
    public function enTantQue(): string
    {
        helper('tools');

        $this->viewData['form'] = new User();
        return $this->render($this->viewPrefix . 'entantque', $this->viewData);
    }

    /**
     * Creates a item from the new form data.
     *
     * @return CodeIgniter\Http\Response
     */
    public function confirmEnTantQue(): ResponseInterface
    {

        $response = json_decode($this->request->getBody());

       
        $user_uuid = service('uuid')->fromString($response->uuid)->getBytes();
        if(!$this->obj = model(UserModel::class)->where('uuid', $user_uuid)->first()){
            throw PageNotFoundException::forPageNotFound();
        }

        if($response->uuid == service('session')->get('entantque')){
            service('session')->remove('entantque');
        }else{
            if(service('session')->get('entantque')){
                $response = [
                    'errors' => lang('Core.alreadyConnected')           
                ];
                return $this->respond($response, ResponseInterface::HTTP_FORBIDDEN);
            }
            $data = [
                'entantque' => auth()->user()->uuid,
                'logged_in' => $this->obj->id,
                'username' => $this->obj->last_name,
                'email' => $this->obj->secret,
                'permissions' => $this->obj->groupsList(),
            ];
            service('session')->set($data);
        }

      
        // service('authentication')->updateCompte($this->obj);

        $response = [
            'error'    => null,
            'messages' => [
                'sucess' => lang('Core.noContent')
            ]
        ];
        return $this->respond($response, 204);
    }

    public function listUser(){

        $search = $this->request->getGet('s');
        $list = $this->convertBinToUuid(model('UserModel')->getResource($search)->orderBy('last_name', 'ASC')->get()->getResultObject());

        $response = [
            'display_kt_search_users_element' => view($this->viewPrefix . 'partials\_search_users', ['list_users' => $list] ), 
            'count' => count($list),
            'list' => $list
        ];
        return $this->respond($response, 200);
    }

    public function returnCompteUser(string $uuid){

        $user_uuid = service('uuid')->fromString($uuid)->getBytes();
        if(!$this->obj = model(UserModel::class)->where('uuid', $user_uuid)->first()){
            throw PageNotFoundException::forPageNotFound();
        }

        service('session')->remove('entantque');
        $data = [
            'logged_in' => $this->obj->id,
            'username' => $this->obj->last_name,
            'email' => $this->obj->secret,
            'permissions' => $this->obj->groupsList(),
        ];
        service('session')->set($data);

        alert('success', lang('Core.resourcesSaved'));
        return redirect()->back();
    }

    public function verifMdp(){
        $request = json_decode($this->request->getBody());

        $rules = [
            'mdp' => 'required'
        ];

        if (! $this->validate($rules)) {
            $response = ['errors' => $this->validator->getErrors()];
            return $this->respond($response, ResponseInterface::HTTP_UNPROCESSABLE_ENTITY);
        }

         $validCreds = auth()->check(['email' => auth()->user()->getEmail(), 'password' => $request->mdp]); 

        if (! $validCreds->isOK()) {
            $response = [
                'errors' => $validCreds->reason(),
                'message' => $validCreds->reason()
            ];
            return $this->respond($response, ResponseInterface::HTTP_UNPROCESSABLE_ENTITY);
        }

        if(isset($request->session)){
             session()->set($request->session . '_'. $request->uuid , true);
        }
        $response = ['messages' => ['sucess' => lang('Core.resourcesSaved')],  'ok' => true];
        return $this->respond($response, ResponseInterface::HTTP_OK);
    }

}