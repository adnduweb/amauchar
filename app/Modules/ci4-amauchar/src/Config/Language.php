<?php 

namespace Amauchar\Core\Config;

use CodeIgniter\Config\BaseConfig;

class Language extends BaseConfig
{

    public $autoDiscover = [
        'Amauchar\Core'
    ];

    public $supportedLocales = [
        'fr' => [
            'name' => 'Core.french',
            'iso_code' => 'fr',
            'flag' => '/flags/france.svg',
        ],
        'en' => [
            'name' => 'Core.english',
            'iso_code' => 'en',
            'flag' => '/flags/united-states.svg',
        ]
    ];
    
	
}
