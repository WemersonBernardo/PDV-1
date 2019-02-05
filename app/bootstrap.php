<?php
/**
 * Created by PhpStorm.
 * User: Bruno Prates
 * Date: 03/02/2019
 * Time: 17:35
 */

if (!function_exists('autoload')) {
    /* Autoloader do PHP - fonte: https://www.php-fig.org/psr/psr-0/ */
    function autoload($className)
    {
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        // Return for public folder
        $fileName = dirname(__FILE__) . DIRECTORY_SEPARATOR . $fileName;
        //var_dump($fileName);

        require $fileName;
    }

    spl_autoload_register('autoload');
}