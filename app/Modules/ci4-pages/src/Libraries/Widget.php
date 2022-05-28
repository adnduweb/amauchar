<?php 
namespace Adnduweb\Pages\Libraries;

use Adnduweb\Pages\Entities\Composer;

class Widget
{

    public $instanceWidget = [];

    public $is_widget;

    public $view;

    public function __construct(){
		
	}

	public function getAll(Composer $composer )
    {
       //print_r(service('module')->listPathModule()); exit;

       $i = 0;
       foreach (service('module')->listPathModule() as $module){

            list($one, $two) = explode('-', $module->handle);

            if($module->is_natif == false){

                if(property_exists(config(ucfirst($two)), 'widget')){
                    if(config(ucfirst($two))->widget == true){
                        $model      = 'Adnduweb\Ci4'.plural(ucfirst($two)).'\Models\\' . singular(ucfirst($two)) . 'Model';
                        $models = new $model();
                        $this->instanceWidget[$i] = $module;
                        $this->instanceWidget[$i]->moduleComposer = singular($two);
                        $this->instanceWidget[$i]->compHolder = '<div data-table="comp-'.  md5($two . '-01') . '" class="comp js-draggable draggable"  draggable="true" ondragstart="onDragStart(event);" ondragend="onDragEnd(event);">
                        ['.plural(ucfirst($two)).' component]
                        </div>';
                        $instanceStore = $composer->getItemModuleByInstance(singular($two));
                         $this->view = '';
                        if(!is_null($instanceStore['key'])){
                            foreach($instanceStore['component'] as $k => $instanceComp){
                                $this->view .= view($module->class . '\\Views\backend\themes\\' . service('settings')->get('App.theme_bo', 'name')  . '\widgets', ['items' => $models->getAll(), 'composer' => $composer,  'k' => $instanceStore['key'], 'instanceComp' => $instanceComp]);
                            }
                        }
                        $this->instanceWidget[$i]->viewStore = $this->view;
                        $this->instanceWidget[$i]->viewOriginal = view($module->class . '\\Views\backend\themes\\' . service('settings')->get('App.theme_bo', 'name')  . '\widgets', ['items' => $models->getAll()]);
                    }
                }
            }
            $i++;
       }

       return $this->instanceWidget;
       // print_r( $this->instanceWidget); exit;
	}

}
