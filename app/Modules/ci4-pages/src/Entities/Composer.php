<?php 

namespace Adnduweb\Pages\Entities;

use CodeIgniter\Entity\Entity;
use Adnduweb\Ci4Medias\Models\MediaModel;

class Composer extends Entity
{
    protected $datamap = [];
    /**
     * Define properties that are automatically converted to Time instances.
     */
    protected $dates = ['updated_at'];
    /**
     * Array of field names and the type of value to cast them as
     * when they are accessed.
     */
    protected $casts = [];

  
    public function getItems(){
        if(isset($this->attributes['id_page_composer'])){
            return unserialize($this->attributes['items']);
        }
        return $this->attributes['items'] ?? [];
    }

    public function getItemByInstance( string $instance){
       foreach($this->getItems() as $k => $component){
            if($instance == array_key_first($component)){
                return $component;
            } 
       }
    }

    public function getItemModuleByInstance( string $instance){
        foreach($this->getItems() as $k => $component){
             if($instance == array_key_first($component)){
                 return ['key' =>  $k, 'component' => $component];
             } 
        }
        return ['key' =>  null, 'component' => null];
     }

    public function getItemBykey( string $key){
        if(isset($this->getItems()[$key])){
            return $this->getItems()[$key][array_key_first($this->getItems()[$key])];
        }
     }

     public function getMediaBykey($key){

        $instance = $this->getItemBykey($key);
        //print_r($instance); exit;
        if(!empty($instance)){
            //if(array_key_first($instance) == 'image'){

                $media = model(MediaModel::class)->find(1);
                
                if(!empty($instance[service('request')->getLocale()]['media_id'])){ 

                    $mediaNew = model(MediaModel::class)->find($instance[service('request')->getLocale()]['media_id']);
                    if(!empty($mediaNew)){
                        $mediaNew->getUrlMedia('medium');
                        $media = $mediaNew;
                    }
                }

                return ['settings' => $instance[service('request')->getLocale()], 'media' => $media];
           // } 
        }else{
            return ['settings' => null, 'media' => model(MediaModel::class)->find(1)];
        }
       
    }

    public function getMedia($key){

        $instance = $this->getItemBykey($key);
        if(!empty($instance)){
            // print_r($instance); exit;
            // if(array_key_first($instance) == 'image'){
               
                $media = model(MediaModel::class)->find(1);

                if(!empty($instance[service('request')->getLocale()]['media_id'])){  
                    $mediaNew = model(MediaModel::class)->find($instance[service('request')->getLocale()]['media_id']);
                    if(!empty($mediaNew)){
                        $mediaNew->getUrlMedia('medium');
                        $media = $mediaNew;
                    }
                }
                return $media;

          //  } 
        }
       
    }
}
