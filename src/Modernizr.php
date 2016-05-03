<?php

namespace ModernizrServer;

class Modernizr
{
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

    private static $properties = [
        'input'                      => [
            'autocomplete' => 't',
            'autofocus'    => 't',
            'list'         => 't',
            'placeholder'  => 't',
            'max'          => 't',
            'min'          => 't',
            'multiple'     => 't',
            'pattern'      => 't',
            'required'     => 't',
            'step'         => 't'
        ],
        'inputtypes'                 => [
            'search'         => 't',
            'tel'            => 't',
            'url'            => 't',
            'email'          => 't',
            'datetime'       => 'f',
            'date'           => 't',
            'month'          => 't',
            'week'           => 't',
            'time'           => 't',
            'datetime-local' => 't',
            'number'         => 't',
            'range'          => 't',
            'color'          => 't'
        ],
        'htmlimports'                => 't',
        'applicationcache'           => 't',
        'blobconstructor'            => 't',
        'blob-constructor'           => 't',
        'backgroundcliptext'         => 't',
        'contextmenu'                => 'f',
        'cookies'                    => 't',
        'cors'                       => 't',
        'customprotocolhandler'      => 't',
        'customevent'                => 't',
        'dataview'                   => 't',
        'eventlistener'              => 't',
        'geolocation'                => 't',
        'history'                    => 't',
        'ie8compat'                  => 'f',
        'json'                       => 't',
        'notification'               => 't',
        'postmessage'                => 't',
        'queryselector'              => 't',
        'serviceworker'              => 't',
        'svg'                        => 't',
        'templatestrings'            => 't',
        'typedarrays'                => 't',
        'websockets'                 => 't',
        'xdomainrequest'             => 'f',
        'webaudio'                   => 't',
        'cssall'                     => 't',
        'willchange'                 => 't',
        'classlist'                  => 't',
        'documentfragment'           => 't',
        'cssescape'                  => 't',
        'supports'                   => 't',
        'target'                     => 't',
        'microdata'                  => 'f',
        'mutationobserver'           => 't',
        'picture'                    => 't',
        'es5array'                   => 't',
        'es5date'                    => 't',
        'es5function'                => 't',
        'es5object'                  => 't',
        'strictmode'                 => 't',
        'es5string'                  => 't',
        'es5syntax'                  => 't',
        'es5undefined'               => 't',
        'es5'                        => 't',
        'es6array'                   => 'f',
        'es6collections'             => 't',
        'generators'                 => 't',
        'es6math'                    => 't',
        'es6number'                  => 't',
        'es6object'                  => 't',
        'promises'                   => 't',
        'es6string'                  => 'f',
        'filereader'                 => 't',
        'devicemotion'               => 't',
        'deviceorientation'          => 't',
        'beacon'                     => 't',
        'lowbandwidth'               => 'f',
        'fetch'                      => 't',
        'eventsource'                => 't',
        'xhrresponsetype'            => 't',
        'xhr2'                       => 't',
        'speechsynthesis'            => 't',
        'localstorage'               => 't',
        'websqldatabase'             => 't',
        'sessionstorage'             => 't',
        'svgfilters'                 => 't',
        'urlparser'                  => 't',
        'websocketsbinary'           => 't',
        'atobbtoa'                   => 't',
        'atob-btoa'                  => 't',
        'framed'                     => 'f',
        'sharedworkers'              => 't',
        'webworkers'                 => 't',
        'contains'                   => 'f',
        'audio'                      => ['ogg' => 'p', 'mp3' => 'p', 'opus' => 'p', 'wav' => 'p', 'm4a' => 'm'],
        'canvas'                     => 't',
        'canvastext'                 => 't',
        'contenteditable'            => 't',
        'emoji'                      => 't',
        'olreversed'                 => 't',
        'userdata'                   => 'f',
        'video'                      => ['ogg' => 'p', 'h264' => 'p', 'webm' => 'p', 'vp9' => 'p', 'hls' => 'e'],
        'vml'                        => 'f',
        'webanimations'              => 't',
        'webgl'                      => 't',
        'adownload'                  => 't',
        'audioloop'                  => 't',
        'canvasblending'             => 't',
        'todataurljpeg'              => 't',
        'todataurlpng'               => 't',
        'todataurlwebp'              => 't',
        'canvaswinding'              => 't',
        'bgpositionshorthand'        => 't',
        'multiplebgs'                => 't',
        'csspointerevents'           => 't',
        'regions'                    => 'f',
        'cssremunit'                 => 't',
        'rgba'                       => 't',
        'createelementattrs'         => 'f',
        'createelement-attrs'        => 'f',
        'dataset'                    => 't',
        'hidden'                     => 't',
        'bdi'                        => 't',
        'outputelem'                 => 't',
        'progressbar'                => 't',
        'meter'                      => 't',
        'ruby'                       => 't',
        'template'                   => 't',
        'texttrackapi'               => 't',
        'track'                      => 't',
        'time'                       => 'f',
        'unknownelements'            => 't',
        'capture'                    => 'f',
        'fileinput'                  => 't',
        'formattribute'              => 't',
        'placeholder'                => 't',
        'sandbox'                    => 't',
        'seamless'                   => 'f',
        'srcdoc'                     => 't',
        'imgcrossorigin'             => 't',
        'srcset'                     => 't',
        'inputformaction'            => 't',
        'input-formaction'           => 't',
        'inputformmethod'            => 't',
        'inputformenctype'           => 't',
        'input-formenctype'          => 't',
        'inputformtarget'            => 'f',
        'input-formtarget'           => 'f',
        'scriptasync'                => 't',
        'scriptdefer'                => 't',
        'stylescoped'                => 'f',
        'inlinesvg'                  => 't',
        'textareamaxlength'          => 't',
        'videoloop'                  => 't',
        'videopreload'               => 't',
        'webglextensions'            => [
            'ANGLE_instanced_arrays'                => 't',
            'EXT_blend_minmax'                      => 't',
            'EXT_frag_depth'                        => 't',
            'EXT_shader_texture_lod'                => 't',
            'EXT_sRGB'                              => 't',
            'EXT_texture_filter_anisotropic'        => 't',
            'WEBKIT_EXT_texture_filter_anisotropic' => 't',
            'OES_element_index_uint'                => 't',
            'OES_standard_derivatives'              => 't',
            'OES_texture_float'                     => 't',
            'OES_texture_float_linear'              => 't',
            'OES_texture_half_float'                => 't',
            'OES_texture_half_float_linear'         => 't',
            'OES_vertex_array_object'               => 't',
            'WEBGL_compressed_texture_etc1'         => 't',
            'WEBGL_compressed_texture_s3tc'         => 't',
            'WEBKIT_WEBGL_compressed_texture_s3tc'  => 't',
            'WEBGL_debug_renderer_info'             => 't',
            'WEBGL_debug_shaders'                   => 't',
            'WEBGL_depth_texture'                   => 't',
            'WEBKIT_WEBGL_depth_texture'            => 't',
            'WEBGL_draw_buffers'                    => 't',
            'WEBGL_lose_context'                    => 't',
            'WEBKIT_WEBGL_lose_context'             => 't'
        ],
        'ambientlight'               => 'f',
        'hashchange'                 => 't',
        'inputsearchevent'           => 't',
        'datalistelem'               => 't',
        'csscalc'                    => 't',
        'cubicbezierrange'           => 't',
        'cssgradients'               => 't',
        'opacity'                    => 't',
        'csspositionsticky'          => 'f',
        'csschunit'                  => 't',
        'cssexunit'                  => 't',
        'hsla'                       => 't',
        'xhrresponsetypeblob'        => 't',
        'xhrresponsetypearraybuffer' => 't',
        'xhrresponsetypedocument'    => 't',
        'xhrresponsetypejson'        => 't',
        'xhrresponsetypetext'        => 't',
        'svgclippaths'               => 't',
        'smil'                       => 't',
        'svgforeignobject'           => 't',
        'flash'                      => 'f',
        'proximity'                  => 'f',
        'sizes'                      => 't',
        'svgasimg'                   => 't',
        'hiddenscroll'               => 'f',
        'mathml'                     => 'f',
        'touchevents'                => 'f',
        'unicoderange'               => 't',
        'unicode'                    => 't',
        'checked'                    => 't',
        'displaytable'               => 't',
        'display-table'              => 't',
        'fontface'                   => 't',
        'generatedcontent'           => 't',
        'hairline'                   => 'f',
        'cssinvalid'                 => 't',
        'lastchild'                  => 't',
        'nthchild'                   => 't',
        'cssscrollbar'               => 't',
        'siblinggeneral'             => 'f',
        'subpixelfont'               => 'f',
        'cssvalid'                   => 't',
        'cssvhunit'                  => 't',
        'cssvmaxunit'                => 't',
        'cssvminunit'                => 't',
        'cssvwunit'                  => 't',
        'details'                    => 't',
        'oninput'                    => 't',
        'formvalidation'             => 't',
        'localizednumber'            => 'f',
        'mediaqueries'               => 't',
        'pointerevents'              => 'f',
        'fileinputdirectory'         => 't',
        'textshadow'                 => 't',
        'batteryapi'                 => 'f',
        'battery-api'                => 'f',
        'crypto'                     => 't',
        'dart'                       => 'f',
        'forcetouch'                 => 'f',
        'fullscreen'                 => 't',
        'gamepads'                   => 't',
        'indexeddb'                  => ['deletedatabase' => 't'],
        'intl'                       => 't',
        'pagevisibility'             => 't',
        'performance'                => 't',
        'pointerlock'                => 't',
        'quotamanagement'            => 't',
        'requestanimationframe'      => 't',
        'raf'                        => 't',
        'vibrate'                    => 't',
        'webintents'                 => 'f',
        'lowbattery'                 => 'f',
        'getrandomvalues'            => 't',
        'backgroundblendmode'        => 't',
        'objectfit'                  => 't',
        'object-fit'                 => 't',
        'wrapflow'                   => 'f',
        'filesystem'                 => 't',
        'requestautocomplete'        => 'f',
        'speechrecognition'          => 't',
        'bloburls'                   => 't',
        'transferables'              => 't',
        'getusermedia'               => 't',
        'peerconnection'             => 't',
        'datachannel'                => 't',
        'matchmedia'                 => 't',
        'ligatures'                  => 't',
        'cssanimations'              => 't',
        'csspseudoanimations'        => 't',
        'appearance'                 => 't',
        'backdropfilter'             => 'f',
        'bgrepeatround'              => 't',
        'bgrepeatspace'              => 't',
        'bgpositionxy'               => 't',
        'backgroundsize'             => 't',
        'bgsizecover'                => 't',
        'borderimage'                => 't',
        'borderradius'               => 't',
        'boxsizing'                  => 't',
        'boxshadow'                  => 't',
        'csscolumns'                 => [
            'width'       => 't',
            'span'        => 't',
            'fill'        => 'f',
            'gap'         => 't',
            'rule'        => 't',
            'rulecolor'   => 't',
            'rulestyle'   => 't',
            'rulewidth'   => 't',
            'breakbefore' => 't',
            'breakafter'  => 't',
            'breakinside' => 't'
        ],
        'displayrunin'               => 'f',
        'display-runin'              => 'f',
        'ellipsis'                   => 't',
        'cssfilters'                 => 't',
        'flexbox'                    => 't',
        'flexboxlegacy'              => 't',
        'flexboxtweener'             => 'f',
        'flexwrap'                   => 't',
        'cssmask'                    => 't',
        'overflowscrolling'          => 'f',
        'cssreflections'             => 't',
        'cssresize'                  => 't',
        'scrollsnappoints'           => 'f',
        'shapes'                     => 't',
        'textalignlast'              => 't',
        'csstransforms'              => 't',
        'csstransforms3d'            => 't',
        'preserve3d'                 => 't',
        'csstransitions'             => 't',
        'csspseudotransitions'       => 't',
        'userselect'                 => 't',
        'ps-lowbattery'              => 'f',
        'core-desktop'               => 't',
        'core-mobile'                => 'f',
        'core-tablet'                => 'f',
        'ps-cookies'                 => 't',
        'ps-hirescapable'            => 'f',
        'extended-emoji'             => 'f',
        'ps-ie8compat'               => 'f',
        'ps-max-cookiedata-length'   => 16430,
        'ps-lowbandwidth'            => 'f',
        'pr-screenattributes'        => ['windowHeight' => 324, 'windowWidth' => 1366, 'colorDepth' => 24],
        'ps-unicode'                 => 't',
        'ps-webgl'                   => 't'
    ];

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

        return null;
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
        $js = '';

        foreach (self::collectJsFiles() as $file) {
            $js .= file_get_contents(__DIR__ . '/../web' . $file);
        }

        return $js;
    }

    public static function collectJsFiles()
    {
        $files = ['/modernizr-custom-3.3.1.js'];

        $sourceDirectory = __DIR__ . '/../web/tests/';

        $iterator = new \RecursiveDirectoryIterator($sourceDirectory);

        foreach (new \RecursiveIteratorIterator($iterator) as $file) {
            /** @var $file \SplFileInfo */
            if (!$file->isFile() || $file->getExtension() !== 'js') {
                continue;
            }

            $files[] = '/tests/' . $file->getFilename();
        }

        return $files;
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
        $content = file_get_contents(__DIR__ . '/../web/convert/start.js');

        foreach (array_keys(self::$properties) as $property) {
            $content .= str_replace('$property', $property, file_get_contents(__DIR__ . '/../web/convert/base.js'));
        }

        $content .= file_get_contents(__DIR__ . '/../web/convert/end.js');

        return $content;
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
            $featureParts = explode(':', $feature, 2);
            $name         = $featureParts[0];
            $value        = (isset($featureParts[1]) ? $featureParts[1] : null);

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
