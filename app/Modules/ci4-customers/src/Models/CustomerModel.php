<?php

namespace Amauchar\Customers\Models;

use Amauchar\Core\Models\BaseModel;
use Amauchar\Core\Traits\AuditsTrait;
use Amauchar\Customers\Entities\Customer;
use Amauchar\Customers\Entities\CustomerAddress;
use Amauchar\Customers\Entities\CustomerContact;
use Faker;
use Faker\Generator;
use CodeIgniter\I18n\Time;
use InvalidArgumentException;


class CustomerModel extends BaseModel
{
    use AuditsTrait;

    protected $DBGroup          = 'default';
    protected $table            = 'customers';
    protected $primaryKey       = 'id';
    protected $uuidFields       = ['uuid'];
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Customer::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['uuid', 'user_id', 'media_id', 'customer_group_id', 'company', 'siret', 'ape', 'reference', 'firstname', 'lastname', 'email', 'birthday', 'optin', 'active'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = ['auditInsert', 'adresseInsert'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = ['auditUpdate'];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = ['auditDelete'];

    const ORDERABLE = [
        1 => 'firstname',
        2 => 'lastname'
    ];

    public static $orderable = ['firstname', 'lastname'];

            /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '')
    {
        $builder =  $this->db->table('customers')
        ->select('*');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('firstname', $search)
                ->orLike('lastname', $search)
            ->groupEnd();

        return $condition->where([
            'customers.deleted_at'  => null,
            'customers.deleted_at' => null,
        ]);
       
    }

    public function fake(): Customer
    {

        $faker = Faker\Factory::create('fr_FR');
            return new Customer((
                  [
                      'uuid'              => service('uuid')->uuid4()->toString(),
                      'user_id'           => auth()->user()->id,
                      'customer_group_id' => 1,
                      'company'           => $faker->company . '(fake)',
                      'siret'             => $faker->siret,
                      'ape'               => $faker->siret,
                      'firstname'         => $faker->firstName,
                      'lastname'          => $faker->lastName,
                      'email'             => $faker->email,
                      'birthday'          => '',
                      'optin'             => 1,
                      'active'            => 1,
                      'created_at'        => Time::createFromTimestamp($faker->unixTime()),
                      'updated_at'        => Time::now(),
                      'fake'              => 1
                  ])
              );
        

    }

    protected function adresseInsert(array $data){

        // Check if the requested item is already in our cache
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        if (isset($data['id'])) {
            if (strpos($data['data']['company'], "(fake)") !== false) {

                $faker = Faker\Factory::create('fr_FR');
                $customerAddress = new CustomerAddress();
                $post = [
                        'customer_id'  => $data['id'],
                        'lang'         => 'fr',
                        'country'      => 'FR',
                        'company'      => $faker->company . '(fake)',
                        'firstname'    => $faker->firstName,
                        'lastname'     => $faker->lastName,
                        'address1'     => $faker->address,
                        'address2'     => $faker->address,
                        'postcode'     => $faker->postcode,
                        'city'         => $faker->city,
                        'phone'        => $faker->phoneNumber,
                        'phone_mobile' => $faker->phoneNumber,
                        'active'       => 1,
                        'defaut'       => 1,
                        'created_at'   => Time::createFromTimestamp($faker->unixTime()),
                        'updated_at'   => Time::now(),
                    ];
                    
                    $customerAddress->fill($post);
                   // print_r($customerAddress); exit;
                    model(CustomerAddressModel::class)->save($customerAddress);

                    $customerContact = new CustomerContact();
                    $post = [
                            'customer_id'  => $data['id'],
                            'country'      => 'FR',
                            'company'      => $faker->company . '(fake)',
                            'firstname'    => $faker->firstName,
                            'lastname'     => $faker->lastName,
                            'email'        => $faker->email,
                            'phone'        => $faker->phoneNumber,
                            'phone_mobile' => $faker->phoneNumber,
                            'created_at'   => Time::createFromTimestamp($faker->unixTime()),
                            'updated_at'   => Time::now(),
                        ];
                        
                        $customerContact->fill($post);
                        //print_r($customerContact); exit;
                        model(\CustomerContactModel::class)->save($customerContact);
            

            }
        }

        //print_r($data); exit;
    }



}
