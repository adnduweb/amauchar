<?php 

namespace Amauchar\Customers\Entities;

use CodeIgniter\Entity\Entity;

class CustomerGroup extends Entity
{
    protected $datamap = [];
    /**
     * Define properties that are automatically converted to Time instances.
     */
    protected $dates = [];
    /**
     * Array of field names and the type of value to cast them as
     * when they are accessed.
     */
    protected $casts = [];

    public function getID(){
        return isset($this->attributes['id']) ? ucfirst($this->attributes['id']) : '';
    }

    public function getName(){
        return isset($this->attributes['name']) ? ucfirst($this->attributes['name']) : '';
    }

    public function getFullName(){
        return isset($this->attributes['name']) ? ucfirst($this->attributes['name']) : '';
    }

}