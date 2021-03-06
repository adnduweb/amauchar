<?php

use Amauchar\Core\Libraries\Util;
/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */
if (! defined('asset_link')) {
    /**
     * Generates the URL to serve an asset to the client
     *
     * @param string $type css, js
     */
    function asset_link(string $location, string $type): string
    {

        $url = asset_racine($location, $type);
            
        if (theme()->isDarkModeEnabled()) {
            
            $darkPath = str_replace('.bundle', '.'.theme()->getCurrentMode().'.bundle', $location);
            if (file_exists(ROOTPATH . 'public/' . $darkPath)) {
               $url = base_url($darkPath);
            }
        }

        // echo $url; exit;
        $path_parts = pathinfo($url );
        $identifier = Util::stringCleanUrl($path_parts['filename']);
   
        

        $tag = '';

        switch ($type) {
            case 'css':
                $tag = "<link id='{$identifier}-css' href='{$url}' rel='stylesheet' />" . "\n";
                break;
            case 'js':
                $tag = "<script id='{$identifier}-js' src='{$url}'></script>" . "\n";
        }

        return $tag;
    }
}

if (! defined('asset_racine')) {
    function asset_racine(string $location, string $type): string
    {
        $config   = config('Assets');
        $location = trim($location, ' /');

        // Add a cache-busting fingerprint to the filename
        $segments = explode('/', $location);
        $filename = array_pop($segments);
        $ext      = substr($filename, strrpos($filename, '.'));

        if (empty($filename) || empty($ext) || $filename === $ext || empty($segments)) {
            throw new \RuntimeException('You must provide a valid filename and extension to the asset() helper.');
        }
 
        // VERSION cache-busting
        $fingerprint = '';
        if ($config->bustingType === 'version') {

            $tempSegments = $segments;
            array_shift($tempSegments);
            $path = rtrim($config->folders[current($segments)], ' /') . '/' . implode(
                '/',
                $tempSegments
            ) . '/' . $filename;

            $file   = new \CodeIgniter\Files\File($path, true);
            $filename = $filename . '?v=' . $file->getMTime();

        }
        
        // FILE cache-busting
        if ($config->bustingType === 'file') {
            $tempSegments = $segments;
            array_shift($tempSegments);
            // echo current($segments);
            // echo print_r($config->folders) ; exit;
            $path = rtrim($config->folders[current($segments)], ' /') . '/' . implode(
                '/',
                $tempSegments
            ) . '/' . $filename;

            //echo $path; exit;
            $fingerprint = filemtime($path);

            if ($fingerprint === false) {
                throw new \RuntimeException('Unable to get modification time of asset file: ' . $filename);
            }

            $filename = str_replace($ext, '.' . $fingerprint . $ext, $filename);
        }

        
        

        // Stitch the location back together
        $segments[] = $filename;
        $location   = implode('/', $segments);

        return base_url($location);
    }
}

if (! defined('asset_link_array')) {
    /**
     * Generates the URL to serve an asset to the client
     *
     * @param string $type css, js
     */
    function asset_link_array(string $location, string $type): array
    {

        $url = asset_racine($location, $type);
            
        if (theme()->isDarkModeEnabled()) {
            
            $darkPath = str_replace('.bundle', '.'.theme()->getCurrentMode().'.bundle', $location);
            if (file_exists(ROOTPATH . 'public/' . $darkPath)) {
               $url = base_url($darkPath);
            }
        }

        $path_parts = pathinfo($url );
        $identifier = Util::stringCleanUrl($path_parts['filename']);

        $tag = '';

        switch ($type) {
            case 'css':
                $tag = ['name' => str_replace('dark', '',$identifier) . '-css', 'href' => $url];
                break;
            case 'js':
                $tag = ['name' => $identifier . '-ks', 'href' => $url];
        }

        return $tag;
    }
}
