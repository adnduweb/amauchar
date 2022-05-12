<?php 

namespace Config;

use CodeIgniter\Config\BaseConfig;

class OrmExtension extends BaseConfig {
    public static $modelNamespace = ['App\Models\\', 'Amauchar\Core\Models\\'];
    public static $entityNamespace = ['App\Entities\\', 'Amauchar\Core\Entities\\'];

    /*
     * Provide Namespace for Xamarin models folder
     */
    public $xamarinModelsNamespace          = 'App.Models';
    public $xamarinBaseModelNamespace       = 'App.Models';
}
