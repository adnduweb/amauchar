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

class Menu
{
    /**
     * Holds all items/collections that appear
     * at top level in this menu.
     *
     * @var array
     */
    protected $items = [];

    /**
     * Holds all items/collections that appear
     * at top level in this menu.
     *
     * @var array
     */
    protected $sections = [];

    /**
     * Returns all items/collections in the menu.
     *
     * @return array
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * Adds a new item
     *
     * @return $this
     */
    public function addItem(MenuItem $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Adds a new item
     *
     * @return $this
     */
    public function addGroup($item)
    {
        $i = 0;
        foreach( $item as $ite ){
            $this->items[$i] = new MenuItem($ite);
            if(isset( $ite->children) && is_array($children)){
                foreach( $ite->children as $child ){
                    $this->items[$i]->children[] = new MenuItem($child);
                }
            }
            $i++;
        }

        return $this;
    }

    

    /**
     * Creates a new collection with default values for
     * everything except the `name` and `title`, which are
     * required parameters.
     */
    public function createCollection(string $name, string $title): MenuCollection
    {
        $collection = new MenuCollection();
        $collection->setName($name)
            ->setTitle($title);

        $this->items[] = $collection;

        return $collection;
    }

    /**
     * Creates a new collection, if one with $name doesn't exist,
     * and adds the items to the collection.
     *
     * @return MenuCollection|mixed
     */
    public function collect(string $name, array $items)
    {
        $collection = $this->collection($name);

        if ($collection === null) {
            $collection = new MenuCollection();
            $collection->setName($name)->setTitle(ucfirst($name));

            $this->items[] = $collection;
        }

        $collection->addItems($items);

        return $collection;
    }

    /**
     * Locates a collection by name.
     *
     * @return mixed
     */
    public function collection(string $name)
    {
        // print_r($this->items); exit;
        $i = 0;
        foreach ($this->items as $item) {
            if ($item instanceof MenuCollection && $item->name() === $name) {

                if(isset( $item->children) && is_array($children)){
                    foreach( $item->children as $child ){
                        $this->items[$i]->children[] = new MenuItem($child);
                    }
                }

                return $item;
            }
            $i++;
        }
    }

    /**
     * Returns an array of all collections stored, if any.
     */
    public function collections(): array
    {
        $collections = [];

        foreach ($this->items as $item) {
            if ($item instanceof MenuCollection) {
                $collections[] = $item;
            }
        }

        return $collections;
    }
}
