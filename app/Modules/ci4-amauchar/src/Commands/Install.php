<?php

/**
 * This file is part of Amauchar.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Amauchar\Core\Commands;

use Amauchar\Core\Entities\User;
use Amauchar\Core\Models\UserModel;
use Amauchar\Core\Libraries\Data;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Install extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'Amauchar';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'adn:install';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Handles initial installation of Amauchar.';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'adn:install';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];


    protected $url = 'url';

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [
        '--continue' => 'Execute the second install step.',
        '--create-company' => 'Create a company with type data.',
    ];

    /**
     * Actually execute a command.
     */
    public function run(array $params)
    {
        helper('filesystem');

        $this->admin = 'admin' .rand();

        if (! CLI::getOption('continue') && !CLI::getOption('create-company')) {

                // On vérifie le sytème et les droit écriture
            $this->checkApp();

            $this->ensureEnvFile();
            $this->setAppUrl();
            $this->setSession();
            $this->setCookie();
            $this->setEncryptionKey();
            $this->setDatabase();
           

            CLI::newLine();
            CLI::write('If you need to create your database, you may run:', 'yellow');
            CLI::write("\tphp spark db:create <database name>", 'green');
            CLI::newLine();
            CLI::write('To migrate and create the initial user, please run: ', 'yellow');
            CLI::write("\tphp spark adn:install --continue", 'green');
        } elseif (CLI::getOption('continue')) {
            $this->migrate();
            $this->setSettings();
            $this->addModule();
            $this->createCompany();
            $this->createUser();
        } elseif (CLI::getOption('create-company')) {
            $this->migrate();
            $this->setSettings();
             $this->addModule();
            $this->createCompany();
        }

        CLI::newLine();
    }

    /**
     * Copies the env file, if .env does not exist
     */
    private function ensureEnvFile()
    {
        CLI::print('Creating .env file...', 'yellow');

        if (file_exists(ROOTPATH . '.env')) {
            CLI::print('Exists', 'green');

            return;
        }

        if (! file_exists(ROOTPATH . 'env')) {
            CLI::error('The original `env` file is not found.');

            exit();
        }

        // Create the .env file
        if (! copy(ROOTPATH . 'env', ROOTPATH . '.env')) {
            CLI::error('Error copying the env file');
        }

        CLI::print('Done', 'green');

        CLI::write('Setting initial environment', 'yellow');

        // Set to development environment
        $this->updateEnvFile('# CI_ENVIRONMENT = production', 'CI_ENVIRONMENT = development');
    }

    private function setAppUrl()
    {
        CLI::newLine();
        $this->url = CLI::prompt('What URL are you running Amauchar under locally?');

        if (strpos($this->url, 'http://') === false && strpos($this->url, 'https://') === false) {
            $this->url = 'http://' . $this->url;
        }

        $this->updateEnvFile("# app.baseURL = ''", "app.baseURL = '{$this->url}'");
        $this->updateEnvFile("# ADMIN_AREA = ''", "ADMIN_AREA = '".$this->admin."'");
        $this->updateEnvFile("# app.defaultLocale = 'fr'", "app.defaultLocale = 'fr'");
        $this->updateEnvFile("# app.indexPage = ''", "app.indexPage = ''");
        
       
    }

    private function setDatabase()
    {
        $host   = CLI::prompt('Database host:', 'localhost');
        $name   = CLI::prompt('Database name:', 'Amauchar');
        $user   = CLI::prompt('Database username:', 'root');
        $pass   = CLI::prompt('Database password:', 'root');
        $driver = CLI::prompt('Database driver:', ['MySQLi', 'Postgre', 'SQLite3']);
        $prefix = CLI::prompt('Table prefix:');

        $this->updateEnvFile('# database.default.hostname = localhost', "database.default.hostname = {$host}");
        $this->updateEnvFile('# database.default.database = ci4', "database.default.database = {$name}");
        $this->updateEnvFile('# database.default.username = root', "database.default.username = {$user}");
        $this->updateEnvFile('# database.default.password = root', "database.default.password = {$pass}");
        $this->updateEnvFile('# database.default.DBDriver = MySQLi', "database.default.DBDriver = {$driver}");
        $this->updateEnvFile('# database.default.DBPrefix =', "database.default.DBPrefix = {$prefix}");
    }

    private function setSettings(){
        service('settings')->set('App.nameApp', 'ADN du Web');
        service('settings')->set('App.nameShortApp', "ADW");
        service('settings')->set('App.descApp', 'La meilleur application du monde');
        service('settings')->set('App.languagebo', 'fr');
        service('settings')->set('App.themebo', 'metronic');
        service('settings')->set('App.themefo', 'default');
        service('settings')->set('App.dateFormat', 'd/m/Y');
        service('settings')->set('App.timeFormat', 'H:i');
        service('settings')->set('App.timezoneArea', 'Europe');
        service('settings')->set('App.timezone', 'Europe/Paris');
    }

    private function setEncryptionKey()
    {
        # generate a key using the out-of-the-box defaults for the Encryption library
        CLI::write('Generating encryption key', 'yellow');
        $key = bin2hex(\CodeIgniter\Encryption\Encryption::createKey());
        $this->updateEnvFile('# encryption.key =', "encryption.key = hex2bin:{$key}");
        $this->updateEnvFile('# encryption.driver = OpenSSL', "encryption.driver = OpenSSL");
        $this->updateEnvFile('# encryption.blockSize = 16', "encryption.key = 16");
        $this->updateEnvFile('# encryption.digest = SHA512', "encryption.digest = SHA512");
        CLI::write('Encryption key saved to .env file', 'green');
        CLI::newLine();
    }

    private function setSession(){

        CLI::write('Generating session', 'yellow');
        $key = bin2hex(\CodeIgniter\Encryption\Encryption::createKey());
        $this->updateEnvFile("# app.sessionDriver = 'CodeIgniter\Session\Handlers\FileHandler'", "app.sessionDriver = 'Amauchar\Core\Session\Handlers\DatabaseHandler'");
        $this->updateEnvFile("# app.sessionCookieName = 'ci_session'", "app.sessionCookieName = 'adn_".rand()."'");
        $this->updateEnvFile("# app.sessionExpiration = 7200", "app.sessionExpiration = 86400");
        $this->updateEnvFile("# app.sessionSavePath = null", "app.sessionSavePath = 'sessions'");
        $this->updateEnvFile("# app.sessionMatchIP = false", "app.sessionMatchIP = true");
        $this->updateEnvFile("# app.sessionTimeToUpdate = 300", "app.sessionTimeToUpdate = 300");
        $this->updateEnvFile("# app.sessionRegenerateDestroy = false", "app.sessionRegenerateDestroy = true");
        CLI::write('Session saved to .env file', 'green');
        CLI::newLine();
    }

    private function setCookie(){
        CLI::write('Generating Cookie', 'yellow');
        $this->updateEnvFile("# security.csrfProtection = 'cookie'", "security.csrfProtection = 'cookie'");
        $this->updateEnvFile("# security.tokenRandomize = false", "security.tokenRandomize = false");
        $this->updateEnvFile("# security.tokenName = 'csrf_token_name'", "security.tokenName = 'csrf_token_name'");
        $this->updateEnvFile("# security.headerName = 'X-CSRF-TOKEN'", "security.headerName = 'X-CSRF-TOKEN'");
        $this->updateEnvFile("# security.cookieName = 'csrf_cookie_name'", "security.cookieName = 'adn_".rand()."'");
        $this->updateEnvFile("# security.expires = 7200", "security.expires = 7200");
        $this->updateEnvFile("# security.regenerate = true", "security.regenerate = false");
        $this->updateEnvFile("# security.redirect = true", "security.redirect = true");
        $this->updateEnvFile("# security.samesite = 'Lax'", "security.samesite = 'Lax'");
        CLI::write('Cookie saved to .env file', 'green');
        CLI::newLine();

    }


    private function migrate()
    {
        command('migrate --all');
        CLI::newLine();
    }

    private function addModule(){

        CLI::write('Create initial module', 'yellow');

        foreach (Data::getAddModuleCore() as $row) {
            $moduleRow = db_connect()->table('modules')->where('name', $row['name'])->get()->getRow();

            if (empty($moduleRow)) {
                // No company type - add the row
                db_connect()->table('modules')->insert($row);
            }
        }
        
        CLI::write('Done module.', 'green');
    }

    private function createUser()
    {
        CLI::write('Create initial user', 'yellow');

        $email     = CLI::prompt('Email?');
        $firstName = CLI::prompt('First name?');
        $lastName  = CLI::prompt('Last name?');
        $username  = CLI::prompt('Username?');
        $password  = CLI::prompt('Password?');

        $users = model(UserModel::class);

        $user = new User([
            'uuid'       => service('uuid')->uuid4()->toString(),
            'first_name' => $firstName,
            'last_name'  => $lastName,
            'username'   => $username,
            'active'   => 1,
        ]);
        $users->save($user);

        $user = $users->where('username', $username)->first();
        $user->createEmailIdentity([
            'email'    => $email,
            'password' => $password,
        ]);

        //Save Address
        $user->createAdresseDefault();

        $user->addGroup('superadmin');
        service('settings')->set('App.adminUrl', env('ADMIN_AREA'));
        CLI::write('Done. You can now login as a superadmin : '. env('app.baseURL') . env('ADMIN_AREA'), 'green');
    }


    private function createCompany()
    {
        CLI::write('Create initial company', 'yellow');


        foreach (Data::getCompagniesType() as $row) {
            $companyRow = db_connect()->table('companies_type')->where('nom_court', $row['nom_court'])->get()->getRow();

            if (empty($companyRow)) {
                // No company type - add the row
                db_connect()->table('companies_type')->insert($row);
            }
        }

        $CompanyModel = model(\Amauchar\Core\Models\CompanyModel::class);
        foreach (Data::getCompagnies() as $row) {
            $companyRow = $CompanyModel->where('raison_social', $row['raison_social'])->first();
            if (empty($companyRow)) {
                // No company - add the row
                $CompanyModel->insert($row);
            }

            $companyRow = db_connect()->table('companies_langs')->where('company_id', $row['lang']['company_id'])->get()->getRow();

            if (empty($companyRow)) {
                // No company type - add the row
                db_connect()->table('companies_langs')->insert($row['lang']);
            }
            
        }


        $companies = model(CompanyModel::class);

        CLI::write('Done.', 'green');
    }


    public function checkApp()
    {
        CLI::write('PHP Version: ' . CLI::color(phpversion(), 'yellow'));
        CLI::write('CI Version: ' . CLI::color(\CodeIgniter\CodeIgniter::CI_VERSION, 'yellow'));
        CLI::write('APPPATH: ' . CLI::color(APPPATH, 'yellow'));
        CLI::write('SYSTEMPATH: ' . CLI::color(SYSTEMPATH, 'yellow'));
        CLI::write('ROOTPATH: ' . CLI::color(ROOTPATH, 'yellow'));
        CLI::write('Included files: ' . CLI::color(count(get_included_files()), 'yellow'));

        if (!is_writable(ROOTPATH . 'writable/cache/'))
            CLI::write(CLI::color('cache not writable: ', 'red') .  ROOTPATH . 'writable/cache/');
        else
            CLI::write(CLI::color('cache writable: ', 'yellow') .  ROOTPATH . 'writable/cache/');

        if (!is_writable(ROOTPATH . 'writable/logs/'))
            CLI::write(CLI::color('Logs not writable: ', 'red') .  ROOTPATH . 'writable/logs/');
        else
            CLI::write(CLI::color('Logs writable: ', 'yellow') .  ROOTPATH . 'writable/logs/');

        if (!is_writable(ROOTPATH . 'writable/uploads/'))
            CLI::write(CLI::color('Uploads not writable: ', 'red') .  ROOTPATH . 'writable/uploads/');
        else
            CLI::write(CLI::color('Uploads writable: ', 'yellow') .  ROOTPATH . 'writable/uploads/');

        try {
            if (
                phpversion() >= '7.2' &&
                extension_loaded('intl') &&
                extension_loaded('curl') &&
                extension_loaded('json') &&
                extension_loaded('mbstring') &&
                extension_loaded('mysqlnd') &&
                extension_loaded('xml')
            ) {
                //silent
            }
        } catch (\Exception $e) {
            CLI::write('Erreur avec une extension php : ' . CLI::color($e->getMessage(), 'red'));
            exit;
        }

        $continue = CLI::prompt('Voulez vous continuer?', ['y', 'n']);
        if ($continue == 'n') {
            CLI::error('Au revoir');
            exit;
        }
    }


    /**
     * Replaces text within the .env file.
     */
    private function updateEnvFile(string $find, string $replace)
    {
        $env = file_get_contents(ROOTPATH . '.env');
        $env = str_replace($find, $replace, $env);
        write_file(ROOTPATH . '.env', $env);
    }
}
