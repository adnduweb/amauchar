<?php

/**
 * This file is part of Amauchar.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Amauchar\Core\View;

use CodeIgniter\View\View;
use RuntimeException;

/**
 * Trait Themeable
 *
 * Provides simple theme functionality to controllers.
 */
trait Themeable
{
    /**
     * The folder the theme is stored in (within /themes)
     *
     * @var string
     */
    protected $theme = 'metronic';

    /**
     * @var View
     */
    protected $renderer;

    protected function render(string $view, array $data = [], ?array $options = null)
    {

        $this->response->noCache();
        // Prevent some security threats, per Kevin
        // Turn on IE8-IE9 XSS prevention tools
        $this->response->setHeader('X-XSS-Protection', '1; mode=block');
        // Don't allow any pages to be framed - Defends against CSRF
        $this->response->setHeader('X-Frame-Options', 'DENY');
        // prevent mime based attacks
        $this->response->setHeader('X-Content-Type-Options', 'nosniff');


        $renderer = $this->getRenderer();

        return $renderer->setData($data)
            ->render($view, $options, true);
    }

    /**
     * Gets a renderer instance pointing to the appropriate
     * theme folder.
     *
     * Note: This should only be called right before use so that
     * the controller has a chance to dynamically update the
     * theme being used.
     *
     * @return mixed|View|null
     */
    protected function getRenderer()
    {
        if ($this->renderer !== null) {
            return $this->renderer;
        }

        if(static::$isBackend == true){
            Theme::setTheme($this->theme); 
            $path = Theme::path();

        }else{
            // Theme::setTheme($this->theme);
            Theme::setTheme($this->theme);
            $path = \Amauchar\Core\Libraries\Theme::path($this->theme);
        }

        if (! is_dir($path)) {
            throw new RuntimeException("`{$this->theme}` is not a valid theme folder.");
        }

        $this->renderer = single_service('renderer', $path);

        return $this->renderer;
    }
}
