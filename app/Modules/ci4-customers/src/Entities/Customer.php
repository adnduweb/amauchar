<?php 

namespace Amauchar\Customers\Entities;

use Amauchar\Core\Entities\UUid;
use Amauchar\Medias\Models\MediaModel;
use Amauchar\Medias\Entities\Media;

class Customer extends UUid
{
    protected $datamap = [];

    protected $uuids = ['uuid'];
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

     /**
     * Activate customer.
     *
     * @return $this
     */
    public function activate()
    {
        $this->attributes['active'] = 1;
        return $this;
    }

    /**
     * Unactivate customer.
     *
     * @return $this
     */
    public function deactivate()
    {
        $this->attributes['active'] = 0;
        return $this;
    }

    public function getFullName(){
        return isset($this->attributes['name']) ? ucfirst($this->attributes['name']) : '';
    }

    public function getName(){
        $lastname = isset($this->attributes['lastname']) ? ucfirst($this->attributes['lastname']) : '';
        $firstname = isset($this->attributes['firstname']) ? ucfirst($this->attributes['firstname']) : '';
        return $firstname .  ' ' . $lastname === null;
    }
    
    public function getDescription(){
        return isset($this->attributes['description']) ? ucfirst($this->attributes['description']) : '';
    }

    public function getReference(){
        return isset($this->attributes['reference']) ? ucfirst($this->attributes['reference']) : '';
    }

    public function getUrlMedia(string $dir){

        $media =  'https://via.placeholder.com/300';
        if(!empty($this->attributes['media_id'])){
            $this->attributes['medias'] = model(MediaModel::class)->find($this->attributes['media_id']);
           $media = $this->attributes['medias']->getUrlMedia('medium');
        }

        return $media;
       
    }

    public function getMedia(){

        $this->attributes['medias'] = model(MediaModel::class)->find(1);
        if(!empty($this->attributes['media_id'])){
            $this->attributes['medias'] = model(MediaModel::class)->find($this->attributes['media_id']);
            $this->attributes['medias']->getUrlMedia('medium');
        }

        return $this->attributes['medias'];
       
    }
    
    

}
