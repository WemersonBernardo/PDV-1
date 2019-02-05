<?php
/**
 * Created by PhpStorm.
 * User: Bruno Prates
 * Date: 03/02/2019
 * Time: 16:47
 */

namespace Helpers;

/* Classe responsável pelo singleton da aplicação */
class Registry
{
    private static $container = [];

    public static function existe($key) {
        return isset(self::$container[$key]);
    }

    public static function getValue ($key, $default = "") {

        if (self::existe($key)) {
            return self::$container[$key];
        }
        return $default;
    }

    public static function setValue ($key, &$value = "")
    {
        self::$container[$key] = $value;
    }
}