<?php 

namespace Amauchar\Pages\Entities;

use CodeIgniter\Entity\Entity;
use Adnduweb\Pages\Models\ComposerModel;
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

    protected $attributes = [
        'id_page_composer' => null,
        'page_id'          => null,   // Represents a username
        'lang'             => null,
        'lang'             => null,
        'items'            => null,
        'created_at'       => null,
        'updated_at'       => null,
    ];


  
     /**
     * Creates a new Adresse for this user
     */
    public function getLangAll()
    {
        $temp = [];
        if(!empty( $this->attributes['id_page_composer'])){
            $langAll = model(ComposerModel::class)->where(['id_page_composer' => $this->attributes['id_page_composer']])->findAll();
          
            if(!empty($langAll)){
                foreach($langAll as $lang){
                    $temp[$lang->lang] = $lang;
                }
            }
        }else{
            $language = new language();
            $supportedLocales = $language->supportedLocales();

            if(!empty($supportedLocales)){
                foreach($supportedLocales as $k => $v) {
                    $temp[$k] = new ComposerModel();
                }
            }                    
        }
        return $temp;
    }

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
