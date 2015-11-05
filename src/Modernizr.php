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
    const KEY = 'Modernizr';

    /**
     * the detected features
     *
     * @var array
     */
    private static $data = array();

    /**
     * returns the data
     *
     * @param string $key
     *
     * @return array|null
     */
    public static function getData($key = self::KEY)
    {
        if (!empty(self::$data)) {
            return self::$data;
        }

        if (PHP_SESSION_ACTIVE === session_status() && isset($_SESSION[$key])) {
            self::$data = $_SESSION[$key];

            return self::$data;
        }

        if (isset($_COOKIE) && isset($_COOKIE[$key])) {
            self::$data = self::ang($_COOKIE[$key]);

            if (isset($_SESSION)) {
                $_SESSION[$key] = self::$data;
            }

            return self::$data;
        }

        return null;
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
        $js .= self::buildConvertJs(self::KEY, '', true);

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

        $sourceDirectory = __DIR__ . '/web/tests/';

        $iterator = new \RecursiveDirectoryIterator($sourceDirectory);

        foreach (new \RecursiveIteratorIterator($iterator) as $file) {
            /** @var $file \SplFileInfo */
            if (!$file->isFile() || $file->getExtension() !== 'js') {
                continue;
            }

            $js .= file_get_contents($file->getPathname());
        }

        return $js;
    }

    /**
     * builds the javascript code to write the detection result into a cookie
     *
     * @param string $key
     * @param string $cookieExtra
     * @param bool   $reload
     *
     * @return string
     */
    public static function buildConvertJs($key, $cookieExtra = '', $reload = true)
    {
        return str_replace(
            array('###Modernizr###', '###EXTRA###', 'reload = true'),
            array($key, $cookieExtra, ($reload ? 'reload = true' : 'reload = false')),
            file_get_contents(__DIR__ . '/web/convert.js')
        );
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
