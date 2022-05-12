<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Amauchar\Core\Libraries\Menus;

/**
 * Represents an individual item in a menu.
 *
 * @property string $altText
 * @property string $faIcon
 * @property string $icon
 * @property string $iconUrl
 * @property string $title
 * @property string $url
 * @property int    $weight
 */
class MenuItem
{
    use HasMenuIcons;

    /**
     * @var string|null
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $url;

    /**
     * @var string|null
     */
    protected $active;

     /**
     * @var string|null
     */
    protected $group;

     /**
     * @var string|null
     */
    protected $children = [];

    /**
     * @var string|null
     */
    protected $altText;

     /**
     * @var string|null
     */
    protected $namedRoute;

    /**
     * The 'weight' used for sorting.
     *
     * @var int|null
     */
    protected $weight;

    /**
     * The permission to check to see if the
     * user can view the menu item or not.
     *
     * @var string
     */
    protected $permission;

    public function __construct(?array $data = null)
    {
        if (! is_array($data)) {
            return;
        }

        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->{$method}($value);
            }
            //print_r($this->{$method}($value)); 
        }

       // exit;
    }

    /**
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return $this
     */
    public function setUrl(string $url)
    {
        $this->url = strpos($url, '://') !== false
            ? $url
            : '/' . ltrim($url, '/ ');

        return $this;
    }

    /**
     * Sets the URL via reverse routing, so can
     * use named routes to set the URL by.
     *
     * @return $this
     */
    public function setNamedRoute(string $name)
    {
        $this->url = route_to($name);

        return $this;
    }

    /**
     * @return $this
     */
    public function setAltText(string $text)
    {
        $this->altText = $text;

        return $this;
    }

    /**
     * Sets the "weight" of the menu item.
     * The large the value, the later in the menu
     * it will appear.
     *
     * @return $this
     */
    public function setWeight(int $weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Sets the permission required to see this menu item.
     *
     * @return $this
     */
    public function setPermission(string $permission)
    {
        $this->permission = $permission;

        return $this;
    }

     /**
     * Sets the permission required to see this menu item.
     *
     * @return $this
     */
    public function setGroup(string $group)
    {
        $this->group = $group;

        return $this;
    }

      /**
     * @return $this
     */
    public function setchildren($children)
    {
        foreach( $children as $child ){
            $this->children[] = new MenuItem($child);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function url()
    {
        return $this->url;
    }


     /**
     * @return string
     */
    public function active()
    {
        $show_hover = false;
        $uri = service('uri')->getSegments();
        list($racine, $name) = explode('.', $this->title);
        if(in_array(strtolower($name), service('uri')->getSegments())){
            $show_hover = 'show hover';
        }
        return $show_hover;
    }


    /**
     * @return string
     */
    public function group()
    {
        
        return $this->group;
    }

    /**
     * @return array
     */
    public function children()
    {
        return $this->children;
    }


    /**
     * @return string
     */
    public function altText()
    {
        return $this->altText;
    }

    /**
     * @return int
     */
    public function weight()
    {
        return $this->weight ?? 0;
    }

     /**
     * @return int
     */
    public function namedRoute()
    {
        return $this->namedRoute;
    }

    /**
     * Can the active user see this menu item?
     */
    public function userCanSee(): bool
    {
        // No permission set means anyone can view.
        if (empty($this->permission)) {
            return true;
        }

        helper('auth');

        return auth()->user()->can($this->permission);
    }

    public function __get(string $key)
    {
        if (method_exists($this, $key)) {
            return $this->{$key}();
        }
    }
}
