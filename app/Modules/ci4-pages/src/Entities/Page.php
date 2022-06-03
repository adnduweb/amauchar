<?php 

namespace Amauchar\Pages\Entities;

use CodeIgniter\Entity\Entity;
use Amauchar\Pages\Models\PageModel;
use Amauchar\Pages\Models\PageLangModel;
use Amauchar\Medias\Models\MediaModel;
use Amauchar\Pages\Entities\PageLang;
use Amauchar\Core\Libraries\Language;


class Page extends Entity
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

    public function getID(){
        return isset($this->attributes['id']) ? ucfirst($this->attributes['id']) : '';
    }

    public function getName(){
        return isset($this->attributes['name']) ? ucfirst($this->attributes['name']) : '';
    }

    public function getFullName(){
        return isset($this->attributes['name']) ? ucfirst($this->attributes['name']) : '';
    }

    public function getHomePage(){
        return ($this->attributes['id'] == '1') ? true : false;;
    }

    public function getTitle(){
        return isset($this->attributes['name']) ? ucfirst($this->attributes['name']) : '';
    }

    public function getDescription(){
        return  isset($this->attributes['description']) ? $this->attributes['description'] : '';
    }

    public function getDateUpdatedTime(){
        return str_replace(' ', 'T', $this->attributes['updated_at']) . '+00:00';
    }

    public function getActive(){
        return isset($this->attributes['active']) ? $this->attributes['active'] : '';
    }   

    public function getDisplayTitle(){
        return isset($this->attributes['display_title']) && $this->attributes['display_title'] == 1 ? 1 : 0;
    }   
    
    public function getSlug(){
        return isset($this->attributes['slug']) ? $this->attributes['slug'] : '';
    } 
    
    public function getTemplate(){
        return isset($this->attributes['template']) ? $this->attributes['template'] : '';
    } 

    public function getMetaTitle(){
        return isset($this->attributes['meta_title']) ? $this->attributes['meta_title'] : '';
    } 

    public function getMetaDescription(){
        return isset($this->attributes['meta_description']) ? $this->attributes['meta_description'] : '';
    } 

    public function getRobots(){
        return isset($this->attributes['robots']) ? $this->attributes['robots'] : '';
    } 

    public function getMeta( string $meta){
        return isset($this->attributes[$meta]) ? $this->attributes[$meta] : '';
    } 

    public function getMetaOgType(){
        return isset($this->attributes['og_type']) ? $this->attributes['og_type'] : '';
    } 

    public function getMetaOgTitle(){
        return isset($this->attributes['og_title']) ? $this->attributes['og_title'] : '';
    } 

    public function getMetaOgDescription(){
        return isset($this->attributes['og_description']) ? $this->attributes['og_description'] : '';
    } 

    public function getMetaTwitterType(){
        return isset($this->attributes['twitter_type']) ? $this->attributes['twitter_type'] : '';
    } 

    public function getMetaTwitterTitle(){
        return isset($this->attributes['twitter_title']) ? $this->attributes['twitter_title'] : '';
    } 

    public function getMetaTwitterDescription(){
        return isset($this->attributes['twitter_description']) ? $this->attributes['twitter_description'] : '';
    } 
  

    public function getPageBuilder(){
       if(isset($this->attributes['id'])){
            return $this->attributes['page_builder'] = model(PageModel::class)->getPageBuilder($this->attributes['id']);
       }
    } 

     /**
     * Creates a new Adresse for this user
     */
    public function getPagelangCurrent()
    {
        if(!empty( $this->attributes['id'])){
            return model(PageLangModel::class)->where(['page_id' => $this->attributes['id'],'lang' => service('request')->getLocale()])->first();
        }else{
            return new PageLang();
        }
    }

     /**
     * Creates a new Adresse for this user
     */
    public function getPagelangAll()
    {
        $temp = [];
        if(!empty( $this->attributes['id'])){
            $langAll = model(PageLangModel::class)->where(['page_id' => $this->attributes['id']])->findAll();
          
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
                    $temp[$k] = new PageLang();
                }
            }                    
        }
        return $temp;
    }
    

     /**
     * Activate user.
     *
     * @return $this
     */
    public function activate()
    {
        $this->attributes['active'] = 1;

        return $this;
    }

    /**
     * Unactivate user.
     *
     * @return $this
     */
    public function deactivate()
    {
        $this->attributes['active'] = 0;

        return $this;
    }

    public function getUrlMedia(string $dir){

        $media =  'https://via.placeholder.com/300';
        if(!empty($this->attributes['media_id'])){
            $this->attributes['medias'] = model(MediaModel::class)->find($this->attributes['media_id']);
            if(!empty($this->attributes['medias'])){
                $media = $this->attributes['medias']->getUrlMedia('medium');
            }
         
        }

        return $media;
       
    }

    public function getMedia(){

        $this->attributes['medias'] = model(MediaModel::class)->find(1);
        if(!empty($this->attributes['media_id'])){
            $medias = model(MediaModel::class)->find($this->attributes['media_id']);
            if(!empty($medias)){               
                $this->attributes['medias'] = $medias;
                $this->attributes['medias']->getUrlMedia('medium');
            }
        }

        return $this->attributes['medias'];
    }

}
