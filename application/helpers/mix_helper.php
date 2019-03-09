<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('mix')) {
    function mix($path, $manifestDirectory = '')
    {
        static $manifest;
        $rootPath = $_SERVER['DOCUMENT_ROOT'];
       
        if (! $manifest) {
            if (! file_exists($manifestPath = ($rootPath .'/mix-manifest.json') )) {
                throw new Exception('The Mix manifest does not exist.');
            }
            $manifest = json_decode(file_get_contents($manifestPath), true);
        }


        if (! array_key_exists($path, $manifest)) {
            throw new Exception(
                "Unable to locate Mix file: {$path}. Please check your ".
                'webpack.mix.js output paths and try again.'
            );
        }
        return file_exists($manifestDirectory.'/hot')
                    ? "http://localhost:8080{$manifest[$path]}"
                    :  $manifestDirectory.$manifest[$path];
    }
}

if (!function_exists('css')) {
    function css($path)
    {
        $tpl = '<link rel="stylesheet" href="'.mix($path).'">';
        return $tpl;
    }
}

if (!function_exists('js')) {
    function js($path)
    {
        $tpl = '<script src="'.mix($path).'"></script>';
        return $tpl;
    }
}
