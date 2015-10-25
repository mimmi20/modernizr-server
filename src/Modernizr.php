<?php

namespace Modernizr;

class Modernizr
{
    /**
     * the location of the modernizr.js file
     * @var string
     */
    private static $modernizr_js = '../modernizr.js/modernizr.js';

    /**
     * the used session key
     * @var string
     */
    private static $key = 'Modernizr';

    /**
     * the detected features
     *
     * @var array
     */
    private static $data = array();

    /**
     * initializes the class and the data
     */
    public static function init()
    {
        $key = self::$key;

        if (PHP_SESSION_ACTIVE === session_status() && isset($_SESSION[$key])) {
            self::$data = $_SESSION[$key];

            return;
        }

        if (isset($_COOKIE) && isset($_COOKIE[$key])) {
            self::$data = self::ang($_COOKIE[$key]);

            if (isset($_SESSION)) {
                $_SESSION[$key] = self::$data;
            }

            return;
        }
    }

    /**
     * returns the data
     *
     * @return array|null
     */
    public static function getData()
    {
        if (empty(self::$data)) {
            return null;
        }

        return self::$data;
    }

    /**
     * builds the complete javascript code to output modernizr.js, new checkes and
     * to write the detection result into the session
     *
     * @return string
     */
    public static function buildJsCode()
    {
        $js  = self::buildJs();
        $js .= file_get_contents('src/web/convert.js');

        return $js;
    }

    /**
     * builds the javascript code to output modernizr.js and new checkes
     *
     * @return string
     */
    public static function buildJs()
    {
        $js  = file_get_contents(__DIR__ . '/' . self::$modernizr_js);
        $js .= file_get_contents('src/web/tests.js');

        return $js;
    }

    /**
     * extracts the feature data from the cookie
     *
     * @param string $cookie
     *
     * @return \stdClass
     */
    private static function ang($cookie)
    {
        $data = new \stdClass();

        foreach (explode('|', $cookie) as $feature) {
            list($name, $value) = explode(':', $feature, 2);

            if ($value[0] === '/') {
                $valueObject = new \stdClass();

                foreach (explode('/', substr($value, 1)) as $sub_feature) {
                    list($subName, $subValue) = explode(':', $sub_feature, 2);

                    $valueObject->$subName = $subValue;
                }
                $data->$name = $valueObject;
            } else {
                $data->$name = $value;
            }
        }

        return $data;
    }
}
