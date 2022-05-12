<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Amauchar\Core\Controllers\Admin;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Amauchar\Core\Controllers\Admin\AdminController;
use Amauchar\Core\Exceptions\GuideException;
use Amauchar\Core\Libraries\GuideCollection;

class GuidesController extends AdminController
{
    protected $viewPrefix = '\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\guides\\';
    protected $helpers    = ['toc'];

    /**
     * Displays the available collections of documentation
     * that the current user has access to.
     *
     * If only one collection is available, will redirect
     * the user to that one.
     */
    public function viewCollections()
    {
        $user = auth()->user();

        $collections = [];

        foreach (setting('Guides.collections') as $alias => $info) {
            if (isset($info['permission']) && ! $user->can($info['permission'])) {
                continue;
            }

            $collections[$alias] = $info;
        }

        if (count($collections) === 1) {
            return redirect()->route('view-guide-collection', [key($collections)]);
        }
    
        $this->viewData['collections'] = $collections;
        return $this->render($this->viewPrefix . 'list', $this->viewData);
    }

    /**
     * Displays the TOC for a single collection of guides.
     */
    public function viewCollection(string $alias)
    {
        try {
            $collection = $this->loadCollection($alias);
            $this->viewData['collection'] = $collection;
            $this->viewData['pageTitleDefault'] = 'Guide : ' . ucfirst($alias) ;

            return $this->render($this->viewPrefix . 'index', $this->viewData);
        } catch (GuideException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Displays a single page of a TOC.
     */
    public function viewSingle(string $collectionAlias, string $pageAlias)
    {
        /** check if $collectionAlias contain "-"
         * if true split to retrieve the subfolder
         * if false, not contain subfolders
         */
        $folders = explode('-', $collectionAlias);
        $is_file = count($folders) === 1;
        if (! $is_file) {
            $alias = '';

            for ($x = 1; $x < count($folders); $x++) {
                $alias .= $folders[$x] . '/';
            }
            $pageAlias = $alias . $pageAlias;
        }

        try {
            $this->viewData['collection'] = $this->loadCollection($collectionAlias);
            $this->viewData['page']       = $this->viewData['collection']->loadPage($pageAlias);
            $this->viewData['pageTitleDefault'] =  esc($this->viewData['collection']->title());

            return $this->render($this->viewPrefix . 'single', $this->viewData);
        } catch (GuideException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Loads and validates the given collection.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|GuideCollection
     */
    protected function loadCollection(string $alias)
    {
        //If route contain "-"
        $alias = explode('-', $alias)[0];

        $settings = config('Guides')->collections;

        if (! isset($settings[$alias])) {
            throw GuideException::forCollectionNotFound();
        }

        $settings = $settings[$alias];

        $user = auth()->user();

        if (isset($settings['permission']) && ! $user->can($settings['permission'])) {
            throw GuideException::forNotAuthorized();
        }

        $collection = new GuideCollection($alias, $settings);

        if (! $collection->isValid()) {
            throw GuideException::forInvalidCollection();
        }

        return $collection;
    }

    public function initPageHeaderToolbar()
    {
        if(service('router')->methodName() == 'viewSingle' ){
            $this->pageHeaderToolbarBtn['back'] = [
                'color' => 'secondary',
                'href'  => site_url(route_to('guides')),
                'svg'   => theme()->getSVG("icons/duotone/Navigation/Arrow-from-right.svg", "svg-icon-5 svg-icon-gray-500 me-1"),
                'desc'  => lang('Core.BackToList'),
             ];
        }
    }
}
