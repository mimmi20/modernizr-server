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
        'adownload'                  => 'ad',
        'ambientlight'               => 'al',
        'appearance'                 => 'ap',
        'applicationcache'           => 'apc',
        'atob-btoa'                  => 'atb',
        'atobbtoa'                   => 'atb-',
        'audio'                      => ['m4a' => 'm4', 'mp3' => 'm3', 'ogg' => 'o', 'opus' => 'p', 'wav' => 'w'],
        'audioloop'                  => 'alo',
        'backdropfilter'             => 'bdf',
        'backgroundblendmode'        => 'bgbm',
        'backgroundcliptext'         => 'bgct',
        'backgroundsize'             => 'bgs',
        'battery-api'                => 'ba-',
        'batteryapi'                 => 'ba',
        'bdi'                        => 'bdi',
        'beacon'                     => 'bea',
        'bgpositionshorthand'        => 'bgps',
        'bgpositionxy'               => 'bgpx',
        'bgrepeatround'              => 'bgrr',
        'bgrepeatspace'              => 'bgrs',
        'bgsizecover'                => 'bgs',
        'blob-constructor'           => 'bco-',
        'blobconstructor'            => 'bco',
        'bloburls'                   => 'bu',
        'borderimage'                => 'boi',
        'borderradius'               => 'bor',
        'boxshadow'                  => 'bs',
        'boxsizing'                  => 'bsi',
        'canvas'                     => 'ca',
        'canvasblending'             => 'cab',
        'canvastext'                 => 'cat',
        'canvaswinding'              => 'caw',
        'capture'                    => 'cap',
        'checked'                    => 'che',
        'classlist'                  => 'cl',
        'contains'                   => 'co',
        'contenteditable'            => 'coe',
        'contextmenu'                => 'com',
        'cookies'                    => 'coo',
        'core-desktop'               => 'c-d',
        'core-mobile'                => 'c-m',
        'core-tablet'                => 'c-t',
        'cors'                       => 'cor',
        'createelement-attrs'        => 'cea-',
        'createelementattrs'         => 'cea',
        'crypto'                     => 'cry',
        'cssall'                     => 'csa',
        'cssanimations'              => 'can',
        'csscalc'                    => 'cca',
        'csschunit'                  => 'ccu',
        'csscolumns'                 => [
            'breakafter'  => 'ba',
            'breakbefore' => 'bb',
            'breakinside' => 'bi',
            'fill'        => 'f',
            'gap'         => 'g',
            'rule'        => 'r',
            'rulecolor'   => 'rc',
            'rulestyle'   => 'rs',
            'rulewidth'   => 'rw',
            'span'        => 's',
            'width'       => 'w'
        ],
        'cssescape'                  => 'cse',
        'cssexunit'                  => 'csx',
        'cssfilters'                 => 'csf',
        'cssgradients'               => 'csg',
        'cssinvalid'                 => 'csi',
        'cssmask'                    => 'csm',
        'csspointerevents'           => 'cspe',
        'csspositionsticky'          => 'csps',
        'csspseudoanimations'        => 'cspa',
        'csspseudotransitions'       => 'cspt',
        'cssreflections'             => 'csr',
        'cssremunit'                 => 'csn',
        'cssresize'                  => 'csz',
        'cssscrollbar'               => 'csc',
        'csstransforms'              => 'cst',
        'csstransforms3d'            => 'cs3',
        'csstransitions'             => 'csx',
        'cssvalid'                   => 'csv',
        'cssvhunit'                  => 'csh',
        'cssvmaxunit'                => 'csu',
        'cssvminunit'                => 'csj',
        'cssvwunit'                  => 'csw',
        'cubicbezierrange'           => 'cbr',
        'customevent'                => 'ce',
        'customprotocolhandler'      => 'cph',
        'dart'                       => 'd',
        'datachannel'                => 'dc',
        'datalistelem'               => 'dl',
        'dataset'                    => 'ds',
        'dataview'                   => 'dv',
        'details'                    => 'de',
        'devicemotion'               => 'dm',
        'deviceorientation'          => 'do',
        'display-runin'              => 'dr-',
        'display-table'              => 'dt-',
        'displayrunin'               => 'dr',
        'displaytable'               => 'dt',
        'documentfragment'           => 'df',
        'ellipsis'                   => 'eli',
        'emoji'                      => 'emo',
        'es5'                        => 'e5',
        'es5array'                   => 'e5a',
        'es5date'                    => 'e5d',
        'es5function'                => 'e5f',
        'es5object'                  => 'e5o',
        'es5string'                  => 'e5s',
        'es5syntax'                  => 'e5y',
        'es5undefined'               => 'e5u',
        'es6array'                   => 'e6a',
        'es6collections'             => 'e6c',
        'es6math'                    => 'e6m',
        'es6number'                  => 'e6n',
        'es6object'                  => 'e6o',
        'es6string'                  => 'e6s',
        'eventlistener'              => 'evl',
        'eventsource'                => 'es',
        'extended-emoji'             => 'exe',
        'fetch'                      => 'fe',
        'fileinput'                  => 'fi',
        'fileinputdirectory'         => 'fid',
        'filereader'                 => 'fr',
        'filesystem'                 => 'fs',
        'flash'                      => 'fl',
        'flexbox'                    => 'fb',
        'flexboxlegacy'              => 'fbl',
        'flexboxtweener'             => 'fbt',
        'flexwrap'                   => 'fw',
        'fontface'                   => 'ff',
        'forcetouch'                 => 'ft',
        'formattribute'              => 'fa',
        'formvalidation'             => 'fv',
        'framed'                     => 'fd',
        'fullscreen'                 => 'fus',
        'gamepads'                   => 'gp',
        'generatedcontent'           => 'gd',
        'generators'                 => 'gen',
        'geolocation'                => 'gl',
        'getrandomvalues'            => 'grv',
        'getusermedia'               => 'gum',
        'hairline'                   => 'hl',
        'hashchange'                 => 'hs',
        'hidden'                     => 'hid',
        'hiddenscroll'               => 'hids',
        'history'                    => 'his',
        'hsla'                       => 'hsl',
        'htmlimports'                => 'hi',
        'ie8compat'                  => 'ie8',
        'imgcrossorigin'             => 'ico',
        'indexeddb'                  => ['deletedatabase' => 'dd'],
        'inlinesvg'                  => 'isv',
        'input'                      => [
            'autocomplete' => 'ac',
            'autofocus'    => 'af',
            'list'         => 'l',
            'max'          => 'm',
            'min'          => 'i',
            'multiple'     => 'mu',
            'pattern'      => 'p',
            'placeholder'  => 'ph',
            'required'     => 'req',
            'step'         => 's'
        ],
        'input-formaction'           => 'ifa-',
        'input-formenctype'          => 'ife-',
        'input-formtarget'           => 'ift-',
        'inputformaction'            => 'ifa',
        'inputformenctype'           => 'ife',
        'inputformmethod'            => 'ifm',
        'inputformtarget'            => 'ift',
        'inputsearchevent'           => 'ifs',
        'inputtypes'                 => [
            'color'          => 'c',
            'date'           => 'd',
            'datetime'       => 'dt',
            'datetime-local' => 'dtl',
            'email'          => 'e',
            'month'          => 'm',
            'number'         => 'n',
            'range'          => 'r',
            'search'         => 's',
            'tel'            => 'tel',
            'time'           => 't',
            'url'            => 'u',
            'week'           => 'w'
        ],
        'intl'                       => 'int',
        'json'                       => 'jso',
        'lastchild'                  => 'lc',
        'ligatures'                  => 'li',
        'localizednumber'            => 'ln',
        'localstorage'               => 'ls',
        'lowbandwidth'               => 'lbw',
        'lowbattery'                 => 'lb',
        'matchmedia'                 => 'mm',
        'mathml'                     => 'ma',
        'mediaqueries'               => 'mq',
        'meter'                      => 'me',
        'microdata'                  => 'md',
        'multiplebgs'                => 'mub',
        'mutationobserver'           => 'muo',
        'notification'               => 'not',
        'nthchild'                   => 'nth',
        'object-fit'                 => 'obf-',
        'objectfit'                  => 'obf',
        'olreversed'                 => 'olr',
        'oninput'                    => 'oi',
        'opacity'                    => 'opa',
        'outputelem'                 => 'oel',
        'overflowscrolling'          => 'ofs',
        'pagevisibility'             => 'pav',
        'peerconnection'             => 'pec',
        'performance'                => 'per',
        'picture'                    => 'pic',
        'placeholder'                => 'ph',
        'pointerevents'              => 'pe',
        'pointerlock'                => 'pl',
        'postmessage'                => 'pm',
        'pr-screenattributes'        => ['colorDepth' => 'd', 'windowHeight' => 'h', 'windowWidth' => 'w'],
        'preserve3d'                 => 'pr3',
        'progressbar'                => 'prb',
        'promises'                   => 'pro',
        'proximity'                  => 'prx',
        'ps-cookies'                 => 'pco',
        'ps-hirescapable'            => 'phs',
        'ps-ie8compat'               => 'pie',
        'ps-lowbandwidth'            => 'plbw',
        'ps-lowbattery'              => 'plb',
        'ps-max-cookiedata-length'   => 'mcd',
        'ps-unicode'                 => 'uni',
        'ps-webgl'                   => 'wg',
        'queryselector'              => 'qs',
        'quotamanagement'            => 'qm',
        'raf'                        => 'ra',
        'regions'                    => 're',
        'requestanimationframe'      => 'raf',
        'requestautocomplete'        => 'ra',
        'rgba'                       => 'rgb',
        'ruby'                       => 'rub',
        'sandbox'                    => 'sb',
        'scriptasync'                => 'asy',
        'scriptdefer'                => 'sdf',
        'scrollsnappoints'           => 'ssp',
        'seamless'                   => 'sl',
        'serviceworker'              => 'sw',
        'sessionstorage'             => 'ss',
        'shapes'                     => 'sh',
        'sharedworkers'              => 'shw',
        'siblinggeneral'             => 'sg',
        'sizes'                      => 'sii',
        'smil'                       => 'smi',
        'speechrecognition'          => 'spr',
        'speechsynthesis'            => 'sps',
        'srcdoc'                     => 'srd',
        'srcset'                     => 'srs',
        'strictmode'                 => 'sm',
        'stylescoped'                => 'sc',
        'subpixelfont'               => 'spf',
        'supports'                   => 'sup',
        'svg'                        => 'svg',
        'svgasimg'                   => 'svi',
        'svgclippaths'               => 'svp',
        'svgfilters'                 => 'svf',
        'svgforeignobject'           => 'svo',
        'target'                     => 'tar',
        'template'                   => 'tem',
        'templatestrings'            => 'tes',
        'textalignlast'              => 'tal',
        'textareamaxlength'          => 'tml',
        'textshadow'                 => 'tsh',
        'texttrackapi'               => 'tra',
        'time'                       => 'tim',
        'todataurljpeg'              => 'tduj',
        'todataurlpng'               => 'tdup',
        'todataurlwebp'              => 'tduw',
        'touchevents'                => 'te',
        'track'                      => 'tr',
        'transferables'              => 'tf',
        'typedarrays'                => 'ta',
        'unicode'                    => 'uni',
        'unicoderange'               => 'unr',
        'unknownelements'            => 'une',
        'urlparser'                  => 'up',
        'userdata'                   => 'ud',
        'userselect'                 => 'us',
        'vibrate'                    => 'vi',
        'video'                      => ['h264' => 'h2', 'hls' => 'hl', 'ogg' => 'o', 'vp9' => 'v', 'webm' => 'w'],
        'videoloop'                  => 'vl',
        'videopreload'               => 'vr',
        'vml'                        => 'vml',
        'webanimations'              => 'wan',
        'webaudio'                   => 'wa',
        'webgl'                      => 'wg',
        'webglextensions'            => [
            'ANGLE_instanced_arrays'                => 'aia',
            'EXT_blend_minmax'                      => 'exbm',
            'EXT_frag_depth'                        => 'exfd',
            'EXT_sRGB'                              => 'exrg',
            'EXT_shader_texture_lod'                => 'exsh',
            'EXT_texture_filter_anisotropic'        => 'extf',
            'OES_element_index_uint'                => 'oeei',
            'OES_standard_derivatives'              => 'oesd',
            'OES_texture_float'                     => 'oetf',
            'OES_texture_float_linear'              => 'oetl',
            'OES_texture_half_float'                => 'oehf',
            'OES_texture_half_float_linear'         => 'oefl',
            'OES_vertex_array_object'               => 'oeva',
            'WEBGL_compressed_texture_etc1'         => 'wgt1',
            'WEBGL_compressed_texture_s3tc'         => 'wgt3',
            'WEBGL_debug_renderer_info'             => 'wgri',
            'WEBGL_debug_shaders'                   => 'wgds',
            'WEBGL_depth_texture'                   => 'wgdt',
            'WEBGL_draw_buffers'                    => 'wgdb',
            'WEBGL_lose_context'                    => 'wglc',
            'WEBKIT_EXT_texture_filter_anisotropic' => 'wktf',
            'WEBKIT_WEBGL_compressed_texture_s3tc'  => 'wkct',
            'WEBKIT_WEBGL_depth_texture'            => 'wkdt',
            'WEBKIT_WEBGL_lose_context'             => 'wklc'
        ],
        'webintents'                 => 'wi',
        'websockets'                 => 'ws',
        'websocketsbinary'           => 'wsb',
        'websqldatabase'             => 'wsq',
        'webworkers'                 => 'ww',
        'willchange'                 => 'wc',
        'wrapflow'                   => 'wf',
        'xdomainrequest'             => 'xdr',
        'xhr2'                       => 'xhr',
        'xhrresponsetype'            => 'xhrt',
        'xhrresponsetypearraybuffer' => 'xhra',
        'xhrresponsetypeblob'        => 'xhrb',
        'xhrresponsetypedocument'    => 'xhrd',
        'xhrresponsetypejson'        => 'xhrj',
        'xhrresponsetypetext'        => 'xhrt'
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
        $content = file_get_contents(__DIR__ . '/../web/convert/start.js.tmp');

        ksort(self::$properties);

        foreach (array_keys(self::$properties) as $i => $property) {
            if (is_array(self::$properties[$property])) {
                $content .= str_replace(
                    ['$propertykey', '$property'],
                    [$property, $property],
                    file_get_contents(__DIR__ . '/../web/convert/base-group-start.js.tmp')
                );

                ksort(self::$properties[$property]);

                foreach (array_keys(self::$properties[$property]) as $j => $subproperty) {
                    $content .= str_replace(
                        ['$property', '$subpropertykey', '$subproperty'],
                        [$property, self::$properties[$property][$subproperty], $subproperty],
                        file_get_contents(__DIR__ . '/../web/convert/base-groupbase.js.tmp')
                    );



                    if ($j < count(self::$properties[$property]) - 1) {
                        $content .= ',';
                    }

                    $content .= "\n";
                }

                $content .= str_replace(
                    '$property',
                    $property,
                    file_get_contents(__DIR__ . '/../web/convert/base-group-end.js.tmp')
                );
            } else {
                $content .= str_replace(
                    ['$propertykey', '$property'],
                    [self::$properties[$property], $property],
                    file_get_contents(__DIR__ . '/../web/convert/base-single.js.tmp')
                );
            }

            if ($i < count(self::$properties) - 1) {
                $content .= ',';
            }

            $content .= "\n";
        }

        $content .= file_get_contents(__DIR__ . '/../web/convert/end.js.tmp');

        return str_replace(
            ['###Modernizr###', '###EXTRA###', 'reload = false'],
            [$key, $cookieExtra, ($reload ? 'reload = true' : 'reload = false')],
            $content
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
        $data     = new \stdClass();
        $features = json_decode($cookie);

        var_dump($cookie, $features);exit;

        return $data;
    }
}
