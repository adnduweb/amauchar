<?php

namespace Adnduweb\Pages\Entities;

use CodeIgniter\Entity;

class Menu extends Entity
{
    protected $datamap = [];
    /**
     * Define properties that are automatically converted to Time instances.
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    /**
     * Array of field names and the type of value to cast them as
     * when they are accessed.
     */
    protected $casts = [];


    public function getID()
    {
        return isset($this->attributes['menu_id']) ? $this->attributes['menu_id'] : '';
    }
    public function getIDParent()
    {
        return isset($this->attributes['id_parent']) ? $this->attributes['id_parent'] : '';
    }

    public function getSlug()
    {
        return $this->attributes['slug'] ?? null;
    }

    public function getName()
    {
        return isset($this->attributes['active']) ? ucfirst($this->attributes['name']) : '';
    }

    public function getMainId()
    {
        return isset($this->attributes['menu_main_id']) ? $this->attributes['menu_main_id'] : '';
    }

    public function getIDLang()
    {
        return isset($this->attributes['id_menu_lang']) ? $this->attributes['id_menu_lang'] : '';
    }

    public function getActive()
    {
        return isset($this->attributes['active']) ? $this->attributes['active'] : '';
    }   

    public function getChildren() {

        if(isset($this->attributes['id_menu'])){
            $this->attributes['childs'] =  model(MenuModel::class)->join('menus_langs', 'menus.id_menu = menus_langs.menu_id')->where('active', '1')->where('lang', service('request')->getLocale())->where('id_parent', $this->attributes['id_menu'])->findAll();
        }
        return $this;
    }
}