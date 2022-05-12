<?php

namespace Amauchar\Core\Libraries;


class Language
{
    /**
     * 
     */
    protected $listFormat = [];

     /**
     * 
     */
    protected $languageId;    

    /**
     * @var Model
     */
    protected $languageModel;

    /**
     * 
     */
    protected $langueCurrent = '';

    /**
     * 
     */
    protected $AllLangue = '';

     /**
     * 
     */
    protected static $langueSupported = [];


    /**
     * 
     */
    public function __construct(){

        $this->langueCurrent = service('settings')->get('App.languagebo', 'user:' . user_id());
        service('request')->setLocale($this->langueCurrent);

    }

    public static function listFormat() {
    }

    public static function getFormat($format = null) {
    }

    public static function switch($lang = null) {
        
        if (!$lang) die('Provide language code from language list');

        // Create session if not created
        //if (session_status() == PHP_SESSION_NONE) session_start();

        $list = self::list();
        foreach ($list as $key => $value) {
            if ( strtolower($value['code']) == strtolower($lang) ) {
                session()->set('lang', $lang);
                return session()->get('lang');
            }
        }
        die('There is no such language inside language list. Check all languages - \'LanguageSwitcher::list()\'');
    }

  
    public function supportedLocales() {
        //$allLanguage = $this->languageModel->where('active', 1)->findAll();
        $allLanguage = Config('Language')->supportedLocales;

        if(!$allLanguage){
            throw CoreException::LanguageNotExist();
        }

        foreach($allLanguage as $lang){
            // self::$langueSupported[] = $lang['iso_code'];
            self::$langueSupported[$lang['iso_code']] = $lang;
        }

       return  self::$langueSupported;
    }

 
    public function getArrayLanguesSupported($iso = true)
    {
        //$setting_supportedLocales = json_decode(service('settings')->setting_supportedLocales);
        $setting_supportedLocales = ['1|fr', '2|en'];
        $tabs = [];
        $i =0;
         foreach ($setting_supportedLocales as $k => $v) {
            $langExplode = explode('|', $v);
            if($iso == true){
                $tabs[$langExplode[1]] = $langExplode[0];
            }else{
                $tabs[$langExplode[0]] = $langExplode[1];
            }
            $i++;
        }
        return $tabs;
    }


    public function redirect()
    {   $session = session();
        $locale = $this->request->getLocale();
        $session->remove('lang');
        $session->set('lang',$locale);
        $url = base_url();
        return redirect()->to($url);     
    }

    //--------------------------------------------------------------------
    // Model Setters
    //--------------------------------------------------------------------

    /**
     * Sets the model 
     *
     * @param \Adnduweb\Ci4Core\Model $model
     *
     * @return $this
     */
    public function setLanguageModel(Model $model)
    {
        $this->languageModel = $model;

        return $this;
    }

}