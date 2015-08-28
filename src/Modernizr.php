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
     * builds the javascript code
     *
     * @return string
     */
    public static function buildJsCode()
    {
        $js  = file_get_contents(__DIR__ . '/' . self::$modernizr_js);
        $js .= file_get_contents('web/tests.demo.js');
        $js .= "var m=Modernizr,c='';"
            . "for(var f in m){if(f[0]=='_'){continue;}"
            . "var t=typeof m[f];if(t=='function'){continue;}c+=(c?'|':'"
            . self::$key . "=')+f+':';if(t=='object'){for(var s in m[f]){"
            . "c+='/'+s+':'+(m[f][s]?'1':'0');}}else{c+=m[f]?'1':'0';}}"
            . "c+=';path=/';try{document.cookie=c;document.location.reload();}catch(e){}";

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
