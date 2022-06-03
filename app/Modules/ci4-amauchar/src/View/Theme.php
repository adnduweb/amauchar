<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Amauchar\Core\View;

use Amauchar\Core\Libraries\Util;

/**
 * Class Theme
 *
 * Provides utility commands to work with themes.
 */
class Theme
{


    protected static $version = '1.7.0';
    /**
     * Are we currently in the admin area?
     *
     * @var bool
     */
    public static $inAdmin = false;

    /**
     * @var string
     */
    protected static $defaultTheme = 'metronic';

    /**
     * @var string
     */
    protected static $currentTheme;

    /**
     * @var string
     */
    protected static $config;

    /**
     * Holds theme info retrieved
     *
     * @var array
     */
    protected static $themeInfo;

        /**
     * Demo name
     *
     * @var string
    */
    public static $demo = 'demo1';

    public static $htmlAttributes;

    public static $htmlClasses;

    public static $cssVariables;

    /** @var string*/
    public static $custom = 'app.js';

    /** @var array*/
    protected static $scripts = array('external' => array(), 'inline' => array(), 'module' => array(), 'controller' => array(), 'vueJs' => array());

    /** @var array*/
    protected static $styles = array('css' => array(), 'module' => array(), 'controller' => array());

    /** @var bool*/
    private static $debug = true;

    public function __construct(){
        $this->saveInAdmin();

       // if(self::$inAdmin){
            self::$config = config('AdminTheme');
       // }
    }

    /**
     * Sets the active theme.
     */
    public static function setTheme(string $theme)
    {
        static::$currentTheme = $theme;
    }

    /**
     * Returns the path to the specified theme folder.
     * If no theme is provided, will use the current theme.
     */
    public static function path(?string $theme = null): string
    {
        if (empty($theme)) {
            $theme = static::current();
        }

        // Ensure we've pulled the theme info
        if (empty(static::$themeInfo)) {
            static::$themeInfo = self::available();
        }

        //print_r(static::$themeInfo); exit;

        foreach (static::$themeInfo as $info) {
            if ($info['name'] === $theme) {
                return $info['path'];
            }
        }

        return '';
    }

    /**
     * Returns the name of the active theme.
     *
     * @return string
     */
    public static function current()
    {
        return ! empty(static::$currentTheme)
            ? static::$currentTheme
            : static::$defaultTheme;
    }

    /**
     * Returns an array of all available themes
     * and the paths to their directories.
     */
    public static function available(): array
    {
        $themes = [];
        helper('filesystem');

        foreach (config('Themes')->collections as $collection) {
            $info = get_dir_file_info($collection, true);

            if (! count($info)) {
                continue;
            }

            foreach ($info as $name => $row) {
                $themes[] = [
                    'name'          => $name,
                    'path'          => $row['relative_path'] . $name . '/',
                    'hasComponents' => is_dir($row['relative_path'] . $name . '/Components'),
                ];
            }
        }
        //print_r($themes); exit;

        return $themes;
    }
    /**
     * 
     * METRONIC 
     * 
     */

    public static function includeFonts($value='') {

        if (self::$config->assets['fonts']['google']) {
            $fonts = self::$config->assets['fonts']['google'];
            echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=' . implode('|', $fonts) . '"/>';
        }
    }

    public static function addHtmlAttribute($scope, $name, $value) {
        self::$htmlAttributes[$scope][$name] = $value;
    }

    public static function addHtmlAttributes($scope, $attributes) {
        foreach ($attributes as $key => $value) {
            self::$htmlAttributes[$scope][$key] = $value;
        }
    }

    public static function addHtmlClass($scope, $class) {
        self::$htmlClasses[$scope][] = $class;
    }

    public static function addCssVariable($scope, $name, $value) {
        self::$cssVariables[$scope][$name] = $value;
    }

    public static function printHtmlAttributes($scope) {
        $Attributes = array();

        if (isset(self::$htmlAttributes[$scope]) && !empty(self::$htmlAttributes[$scope])) {
            echo  Util::getHtmlAttributes(self::$htmlAttributes[$scope]);
        }

        echo '';
    }

    public static function printHtmlClasses($scope, $full = true) {
        if (isset(self::$htmlClasses[$scope]) && !empty(self::$htmlClasses[$scope])) {
            $classes = implode(' ', self::$htmlClasses[$scope]);

            if ($full) {
                echo  Util::getHtmlClass(self::$htmlClasses[$scope]);
            } else {
                echo  Util::getHtmlClass(self::$htmlClasses[$scope], false);
            }
        } else {
            echo '';
        }
    }

    public static function printCssVariables($scope) {
        $Attributes = array();

        if (isset(self::$cssVariables[$scope]) && !empty(self::$cssVariables[$scope])) {
            echo  Util::getCssVariables(self::$cssVariables[$scope]);
        }
    }

    /**
     * Get the option's value from config
     *
     * @param $scope
     * @param  false  $path
     * @param  null  $default
     *
     * @return mixed|string
     */
    public static function getOption($scope, $path = false, $default = null)
    {

        if (!self::hasOption($scope, $path)) {
            return $default;
        }

        $result = array();

        if (!isset(self::$config->{$scope})) {
            return null;
        }

        if ($path === false) {
            $result = self::$config->{$scope};
        } else {
            $result = Util::getArrayValue(self::$config->{$scope}, $path);
        }

        // check if its a callback
        if (is_callable($result) && !is_string($result)) {
            $result = call_user_func($result);
        }

        return $result;
    }

    public static function setOption($scope, $path, $value) {
        if (isset(self::$config->{$scope})) {
            return Util::setArrayValue(self::$config->{$scope}, $path, $value);
        } else {
            return false;
        }
    }

    public static function hasOption($scope, $path = false) {
        if (isset(self::$config->{$scope})) {
            if ($path === false) {
                return isset(self::$config->{$scope});
            } else {
                return Util::hasArrayValue(self::$config->{$scope}, $path);
            }
        } else {
            return false;
        }
    }

     /**
     * Get current demo
     *
     * @return string
     */
    public static function getDemo()
    {
        //return service('request')->getGet('demo');
        return self::$demo;
    }


     /**
     * Check dark mode
     *
     * @return mixed|string
     */
    public static function isDarkMode()
    {
        $context = 'user:' . user_id();
        if (setting('App.modeDark', $context) == 1) {
            return 'dark';
        }
    }

    /**
     * Get current skin
     *
     * @return mixed|string
     */
    public static function getCurrentMode()
    {
        helper('auth');
        if (auth()->loggedIn()) {
            $context = 'user:' . user_id();
            if(service('settings')->get('App.modeDark', $context) == 1){
                return 'dark';
            }
        }

        return 'light';
    }

    /**
     * Check if current theme has dark mode
     *
     * @return bool
     */
    public static function isDarkModeEnabled()
    {
        return (bool) self::getOption('layout', 'main/dark-mode-enabled');
    }

     /**
     * Get media path
     *
     * @return string
     */
    public static function getMediaUrlPath()
    {
        if(self::$inAdmin){
            return config('Amauchar')->views['backend'] . '/' . setting('App.themebo').'/assets/media/'; 
        }
      
    }


    /**
     * Get media Url
     *
     * @return string
     */
    public static function getMediaUrl(string $scope)
    {
       // if(self::$inAdmin){
            $racine = str_replace(ROOTPATH . 'public', '', config('Amauchar')->views['backend']);
            return base_url($racine  . '/' . setting('App.themebo').'/assets/media/'. $scope);
      //  }
      
    }

     /**
     * Checks to see if we're in the admin area
     * by analyzing the current url and the ADMIN_AREA constant.
     */
    private function saveInAdmin()
    {
        $url = current_url();

        $path = parse_url($url, PHP_URL_PATH);

        self::$inAdmin = strpos($path, ADMIN_AREA) !== false;
    }

    public static function getPageKey() {
        $el = (array)explode('/', self::getPagePath());

        return end($el);
    }

    public static function getPagePath() {
        return current_url();
    }

    public static function getSVG($path, $class = '', $svgClass = '', $javascript = false) {
        $path = str_replace('\\', '/', trim($path));
        $full_path = $path;
        if ( ! file_exists($path)) {
            $full_path = self::getMediaUrlPath().$path;

            //print_r($full_path); exit;

            if ( ! is_string($full_path)) {
                return '';
            }

            if ( ! file_exists($full_path)) {
                return "<!--SVG file not found: $path-->\n";
            }
        }

        $svg_content = @file_get_contents($full_path);
        if(!$svg_content){
            return '';
        }

        $dom = new \DOMDocument();
        $dom->loadXML($svg_content);

        // remove unwanted comments
        $xpath = new \DOMXPath($dom);
        foreach ($xpath->query('//comment()') as $comment) {
            $comment->parentNode->removeChild($comment);
        }

        // add class to svg
        if ( ! empty($svgClass)) {
            foreach ($dom->getElementsByTagName('svg') as $element) {
                $element->setAttribute('class', $svgClass);
            }
        }

        // remove unwanted tags
        $title = $dom->getElementsByTagName('title');
        if ($title['length']) {
            $dom->documentElement->removeChild($title[0]);
        }
        $desc = $dom->getElementsByTagName('desc');
        if ($desc['length']) {
            $dom->documentElement->removeChild($desc[0]);
        }
        $defs = $dom->getElementsByTagName('defs');
        if ($defs['length']) {
            $dom->documentElement->removeChild($defs[0]);
        }

        // remove unwanted id attribute in g tag
        $g = $dom->getElementsByTagName('g');
        foreach ($g as $el) {
            $el->removeAttribute('id');
        }
        $mask = $dom->getElementsByTagName('mask');
        foreach ($mask as $el) {
            $el->removeAttribute('id');
        }
        $rect = $dom->getElementsByTagName('rect');
        foreach ($rect as $el) {
            $el->removeAttribute('id');
        }
        $xpath = $dom->getElementsByTagName('path');
        foreach ($xpath as $el) {
            $el->removeAttribute('id');
        }
        $circle = $dom->getElementsByTagName('circle');
        foreach ($circle as $el) {
            $el->removeAttribute('id');
        }
        $use = $dom->getElementsByTagName('use');
        foreach ($use as $el) {
            $el->removeAttribute('id');
        }
        $polygon = $dom->getElementsByTagName('polygon');
        foreach ($polygon as $el) {
            $el->removeAttribute('id');
        }
        $ellipse = $dom->getElementsByTagName('ellipse');
        foreach ($ellipse as $el) {
            $el->removeAttribute('id');
        }

        $string = $dom->saveXML($dom->documentElement);

        // remove empty lines
        $string = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);

        $cls = array('svg-icon');

        if ( ! empty($class)) {
            $cls = array_merge($cls, explode(' ', $class));
        }

        $asd = explode('/media/', $path);
        if (isset($asd[1])) {
            $path = 'assets/media/'.$asd[1];
        }

        $output  = "<!--begin::Svg Icon | path: $path-->\n";
        $output .= '<span class="'.implode(' ', $cls).'">'.$string.'</span>';
        $output .= "\n<!--end::Svg Icon-->";

        if($javascript == true){
            $search = array(
                '/(\n|^)(\x20+|\t)/',
                '/(\n|^)\/\/(.*?)(\n|$)/',
                '/\n/',
                '/\<\!--.*?-->/',
                '/(\x20+|\t)/', # Delete multispace (Without \n)
                '/\>\s+\</', # strip whitespaces between tags
                '/(\"|\')\s+\>/', # strip whitespaces between quotation ("') and end tags
                '/=\s+(\"|\')/'); # strip whitespaces between = "'
            
               $replace = array(
                "\n",
                "\n",
                " ",
                "",
                " ",
                "><",
                "$1>",
                "=$1");
                $html = preg_replace($search,$replace,$output);
                return $html;
        }


        return $output;
    }

    public static function getVersion(){
        return self::$version;
    }

    public static function add_js($script = null, $type = 'external', $prepend = false, $vueJs = false)
    {
        $themeCurrent = setting('App.themebo');

        if (is_array($script) && count($script)) {
           
            foreach ($script as &$scrip) {
                //Dectect url
                $retour = strstr($scrip, '://', true);
                if (!$retour) {
                    $scrip = '/backend/themes/' . $themeCurrent . '/assets/' . $scrip;
                }
            }
        } else {
            $retour = strstr($script, '://', true);
            //print_r($script); exit;
            if (!$retour) {
                $script = '/backend/themes/' . $themeCurrent . '/assets/' . $script;
            }
        }


        if (empty($script)) {
            return;
        }
        if (is_string($script)) {
            $script = array(
                $script
            );
        }
        $scriptsToAdd = array();
        if (is_array($script) && count($script)) {
            foreach ($script as $s) {
                if (!in_array($s, self::$scripts[$type])) {
                    $scriptsToAdd[] = $s;
                }
            }
        }
        if ($prepend) {
            self::$scripts[$type] = array_merge($scriptsToAdd, self::$scripts[$type]);
        } else {
            self::$scripts[$type] = array_merge(self::$scripts[$type], $scriptsToAdd);
        }

    }

    public static function external_js($extJs = null, $list = false, $addExtension = true, $bypassGlobals = false, $bypassInheritance = false)
    {

        $return             = '';
        $scripts            = array();
        $renderSingleScript = false;
        if (empty($extJs)) {
            $scripts = self::$scripts['external'];
        } elseif (is_string($extJs)) {
            $scripts[]          = $extJs;
            $renderSingleScript = true;
        } elseif (is_array($extJs)) {
            $scripts = $extJs;
        }


        if (is_array($scripts)) {
            foreach ($scripts as $script) {
                $return .= self::buildScriptElement($script, 'text/javascript') . "\n";
            }
        }

       // print_r($return); exit;

        return trim($return, ', ');
    }

    public static function add_module_js($module = '', $file = '')
    {
        if (empty($file)) {
            return;
        }
        if (is_string($file)) {
            $file = array(
                $file
            );
        }
        if (is_array($file) && count($file)) {
            foreach ($file as $s) {
                self::$scripts['module'][] = array(
                    'module' => $module,
                    'file' => $s
                );
            }
        }
    }

    public static function inline_js()
    {
        if (empty(self::$scripts['inline'])) {
            return;
        }
        $content = self::$ci->config->item('assets.js_opener') . "\n";
        $content .= implode("\n", self::$scripts['inline']);
        $content .= "\n" . self::$ci->config->item('assets.js_closer');
        return self::buildScriptElement('', 'text/javascript', $content);
    }

    public static function module_js($list = false, $cached = false)
    {
        if (empty(self::$scripts['module']) || !is_array(self::$scripts['module'])) {
            return '';
        }
        $scripts = self::find_files(self::$scripts['module'], 'js');
        $src     = self::combine_js($scripts, 'module') . ($cached ? '' : '?_dt=' . time());
        if ($list) {
            return '"' . $src . '"';
        }
        return self::buildScriptElement($src, 'text/javascript') . "\n";
    }


    public static function js($script = null, $type = 'external')
    {

        if (!empty($script)) {
            if (is_string($script) && $type == 'external') {
                return self::external_js($script);
            }
            self::add_js($script, $type);
        }
 

        $output = '<!-- Local JS files -->' . PHP_EOL;
       
        $output .= self::external_js();
        $output .= self::module_js();
        $output .= self::inline_js();
        return $output;
    }

    protected static function buildScriptElement($src = '', $type = '', $content = '')
    {

        if (!file_exists(env('DOCUMENT_ROOT') . $src) && !strstr($src, '://', true)) {
            return '<div class="red-not-script" style="position: absolute; z-index: 99999;background: #c32d00; width: 100%; color: #fff;  padding: 10px;"> le lien n\'existe pas : ' . $src . '</div>';
        }
        if (empty($src) && empty($content)) {
            return '';
        }
        $return = '<script';
        if (!empty($type)) {
            $return .= ' type="' . htmlspecialchars($type, ENT_QUOTES) . '"';
        }
        if (!empty($src) && !strstr($src, '://', true)) {
            $return .= ' src="' . htmlspecialchars(base_url($src), ENT_QUOTES) . '?v=' . filemtime(env('DOCUMENT_ROOT') . $src) . '"';
        }
        if (!empty($src) && strstr($src, '://', true)) {
            $return .= ' src="' . htmlspecialchars($src, ENT_QUOTES) . '"';
        }
        $return .= '>';
        if (!empty($content)) {
            $return .= "\n{$content}\n";
        }
        return "{$return}</script>";
    }

    
    public static function css($style = null, $media = 'screen', $bypassInheritance = false, $bypassModule = false)
    {
        $request = \Config\Services::request();
        $nameUri = (implode('_', $request->uri->getSegments()));

        /** Cache */
        if (env('assets.minifyCSS') == true) {
            if (file_exists(ROOTPATH.'public/backend/themes/'.setting('App.themebo').'/assets/css/min/app_'.md5($nameUri).'.css')) {
                return self::buildStyleLink(['href' => '/backend/themes/'.setting('App.themebo').'/assets/css/min/app_'.md5($nameUri).'.css','media' => 'screen']);
            }
        }
        if ($media == '1') {
            $media = 'screen';
        }
        $styles = array();
        if (empty($style)) {
            // $styles = self::$styles['css'];
            $styles = array_merge(self::$styles['css'], self::$styles['module'], self::$styles['controller']);
        } elseif (is_array($style)) {
            $styles = array_merge($style, self::$styles['css']);
        } else {
            $styles[] = array(
                'file' => $style,
                'media' => $media
            );
        }
        
        if (!file_exists(ROOTPATH.'public/backend/themes/'.setting('App.themebo').'/assets/css/custom.css')) {
            $file = fopen(ROOTPATH.'public/backend/themes/'.setting('App.themebo').'/assets/css/custom.css', "w");
            echo fwrite($file, "/********** custom css *********/");
            fclose($file);
            $custom[] = array(
                'file' => '/backend/themes/'.setting('App.themebo').'/assets/css/custom.css',
                'media' => $media
            );
            $styles = array_merge($styles, $custom);
        } else {
            $custom[] = array(
                'file' => '/backend/themes/'.setting('App.themebo').'/assets/css/custom.css',
                'media' => $media
            );
            $styles = array_merge($styles, $custom);
        }
        $return = '';
       
        if (env('assets.minifyCSS') == true) {
            if (!is_dir(ROOTPATH.'public/backend/themes/'.setting('App.themebo').'/assets/css/min')) {
                try {
                    mkdir(ROOTPATH.'public/backend/themes/'.setting('App.themebo').'/assets/css/min', 0755);
                } catch (\Exception $e) {
                    die($e->getMessage());
                }
            }
            $minifier = new Minify\CSS();
            if (is_array($styles)) {
                foreach ($styles as $style) {
                    $minifier->add(ROOTPATH.'public/'.$style['file']);
                }
            }
            $minifier->minify(ROOTPATH.'public/backend/themes/'.setting('App.themebo').'/assets/css/min/app_'.md5($nameUri).'.css');
            $return .= self::buildStyleLink(['href' => '/backend/themes/'.setting('App.themebo').'/assets/css/min/app_'.md5($nameUri).'.css','media' => 'screen']);
        } else {
            foreach ($styles as $styleToAdd) {
                if (is_array($styleToAdd)) {
                    $attr          = array(
                        'href' => $styleToAdd['file']
                    );
                    $attr['media'] = empty($styleToAdd['media']) ? $media : $styleToAdd['media'];
                } elseif (is_string($styleToAdd)) {
                    $attr = array(
                        'href' => $styleToAdd,
                        'media' => $media
                    );
                } else {
                    continue;
                }
                if (substr($attr['href'], -4) != '.css') {
                    $attr['href'] .= '.css';
                }
                $return .= self::buildStyleLink($attr);
            }
            return $return;
        }
    }

    public static function add_css($style = null, $media = 'screen', $prepend = false)
    {
        if (empty($style)) {
            return;
        }
        if ($media == '1') {
            $media = 'screen';
        }
        if (is_string($style)) {
            $style = array(
                $style
            );
        }
        $stylesToAdd = array();
        if (is_array($style)) {
            foreach ($style as $file) {
                $stylesToAdd[] = array(
                    'file' => '/backend/themes/' . setting('App.themebo') . '/assets/' . $file,
                    'media' => $media
                );
            }
        }

        if ($prepend) {
            self::$styles['css'] = array_merge($stylesToAdd, self::$styles['css']);
        } else {
            self::$styles['css'] = array_merge(self::$styles['css'], $stylesToAdd);
        }
    }

    protected static function buildStyleLink(array $style)
    {
        $default    = array(
            'rel' => 'stylesheet',
            'type' => 'text/css',
            'href' => '',
            'media' => 'all'
        );
        $styleToAdd = array_merge($default, $style);
        $final      = '<link';
        foreach ($default as $key => $value) {
            $final .= " {$key}='" . htmlspecialchars($styleToAdd[$key], ENT_QUOTES) . "'";
        }
        $style =  "{$final} />";
        echo $style  . "\n";
    }

}
