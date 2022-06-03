<?php

/**
 * This file is part of Amauchar.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Amauchar\Pages\Commands;

use Amauchar\Core\Entities\Page;
use Amauchar\Core\Models\PageModel;
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
    protected $name = 'adn:install-page';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Handles pages installation of Amauchar.';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'adn:install-page';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];


    protected $url = 'url';


    /**
     * Actually execute a command.
     */
    public function run(array $params)
    {
        helper('filesystem');

        $this->createPage();
       
        CLI::newLine();
    }

  

    private function createPage()
    {
        CLI::write('Create initial pages', 'yellow');


        foreach (Data::getPages() as $row) {
            $pageRow = db_connect()->table('pages')->where('id', $row['id'])->get()->getRow();
            $lang = $row['lang'];
            unset($row['lang']);

            if (empty($pageRow)) {
                // No company type - add the row
                db_connect()->table('pages')->insert($row);
                // var_dump( db_connect()->table('pages')->insert($pageRow)); exit;
            }

            $pageRowlang = db_connect()->table('pages_langs')->where('page_id', $lang['page_id'])->get()->getRow();

            if (empty($pageRowlang)) {
                // No company type - add the row
                db_connect()->table('pages_langs')->insert($lang);
            }
        }

        CLI::write('Done.', 'green');
    }


}
