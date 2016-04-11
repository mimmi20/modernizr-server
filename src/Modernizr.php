<?php

namespace ModernizrServer;

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
    private static $data = [];

    /**
     * returns the data
     *
     * @param string $key
     * @param string $cookieExtra
     *
     * @return array|null
     */
    public static function getData($key = self::KEY, $cookieExtra = '')
    {
        if (!empty(self::$data)) {
            return self::$data;
        }

        $key .= $cookieExtra;

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

        return;
    }

    /**
     * builds the complete javascript code to output modernizr.js, new checkes and
     * to write the detection result into the session
     *
     * @param string $cookieExtra
     *
     * @return string
     */
    public static function buildJsCode($cookieExtra = '')
    {
        $js  = self::buildJs();
        $js .= self::buildConvertJs(self::KEY, $cookieExtra, true);

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
            ['###Modernizr###', '###EXTRA###', 'reload = true'],
            [$key, $cookieExtra, ($reload ? 'reload = true' : 'reload = false')],
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

                foreach (explode('/', substr($value, 1)) as $subFeature) {
                    list($subName, $subValue) = explode(':', $subFeature, 2);

                    if ('t' === $subValue) {
                        $valueObject->$subName = true;
                    } elseif ('f' === $subValue) {
                        $valueObject->$subName = false;
                    } else {
                        $valueObject->$subName = $subValue;
                    }
                }

                $data->$name = $valueObject;
            } elseif ('t' === $value) {
                $data->$name = true;
            } elseif ('f' === $value) {
                $data->$name = false;
            } else {
                $data->$name = $value;
            }
        }

        return $data;
    }
}
