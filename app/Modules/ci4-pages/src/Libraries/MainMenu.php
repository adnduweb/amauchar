<?php

namespace Adnduweb\Pages\Libraries;
use \Adnduweb\Pages\Models\MenuModel;
use Spatie\Menu\Link;


class MainMenu extends \Adnduweb\Pages\Libraries\Menu
{
	public $menu;
	public function __toString(): string
	{
		if (! $builder = cache('adw-menus-front')) {

			$mainMenu = model(MenuModel::class)->getMainMenu();

			// print_r(self::getRecursive($mainMenu, 0)); exit;
			//print_r($mainMenu); exit;
			$this->builder->addClass('main-nav');
			if(!empty($mainMenu)){
				foreach($mainMenu as $menu){
					//print_r($menu->getChildren()); 
					//$this->builder->link(site_url( $menu->getSlug()), $menu->getName())->addClass('float-right');
					$this->menu = $menu->getChildren();

					if(!empty($this->menu->childs)){

						//$this->builder->add(Link::to(site_url( $menu->getSlug() . '/'),  $menu->getName())->addParentClass( 'item_'. $menu->getID()));

						//$this->builder->submenu('<a href="'.site_url('/contact').'">Services</a>', $this->builder->new()->addClass('submenu')->link('/about', 'About')->link('/contact', 'Contact'));
						$this->builder->submenu('<a href="#">'.$menu->getName().'</a>', $this->test());

					}else{
						$this->builder->add(Link::to(site_url( $menu->getSlug() . '/'),  $menu->getName())->addParentClass( 'item_'. $menu->getID()));
					}
				}
			}

			//exit;

			return $this->builder->render();
		}

		cache()->save('adw-menus-front', $builder);

		

		// return $this->builder
		// 	->addClass('main-nav')
		// 	->link(site_url('/'), 'Home')
		// 	->link(site_url('/about'), 'About')
		// 	->html('<hr>')
		// 	->link(site_url('/contact'), 'Contact')
		// 	->submenu('<a href="'.site_url('/contact').'">Services</a>', $this->builder->new()
		// 		->addClass('submenu')
		// 		->link('/about', 'About')
		// 		->link('/contact', 'Contact')
		// 	)
		// 	->render();
	}

	public function test(){
		//print_r($this->menu->childs); exit;
		$submenu = $this->builder->new()->addClass('submenu');
		foreach($this->menu->childs as $menuchild){
			$submenu->link($menuchild->getSlug(), $menuchild->getName());
		}

		return $submenu;
		//print_r($this->builder);exit;
		//return $this->builder->new()->addClass('submenu')->link('/about', 'About')->link('/contact', 'Contact');
	}

	// protected function getRecursive($source, $parent) {
	// 	$result = [];
	// 	foreach ($source as $row) {
	// 		if ($parent == $row->id_parent) {
	// 			$result[] = [
	// 						'id' => $row->id_menu,
	// 						'name' => $row->name,
	// 						'childs' => self::getRecursive($source, $row->id_menu)
	// 					];
	// 				}
	// 		}
	// 		return $result;
	// }
}