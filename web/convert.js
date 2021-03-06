/**
 * Created by Thomas Müller on 24.10.2015.
 */

"use strict";

var m = Modernizr, c = '', reload = true, cx, f;

function convert(variable) {
  var c, cx = {}, t = typeof variable;

  if (t === 'object') {
    c = {};

    for (var s in variable) {
      if (!variable.hasOwnProperty(s)) {
        c[s] = 'u';
      } else {
        c[s] = convert(variable[s]);
      }
    }
  } else if (t === 'boolean') {
    c = (variable ? 't' : 'f');
  } else if (variable === null) {
    c = 'n';
  } else if (variable === '') {
    c = 'e';
  } else if (variable === 'probably') {
    c = 'p';
  } else if (variable === 'maybe') {
    c = 'm';
  } else {
    c = variable;
  }

  return c;
}

f = '$property';
if (m.hasOwnProperty(f)) {
  c = convert(m[f]);
} else {
  c = 'u'
}
cx[f] = c;

try {
    if (reload) {
        document.location.reload();
    }
} catch (e) {
    // do nothing here
}

/*
var x = {
  "adownload": "t",
  "ambientlight": "f",
  "appearance": "t",
  "applicationcache": "t",
  "atob-btoa": "t",
  "atobbtoa": "t",
  "audio": {"m4a": "m", "mp3": "p", "ogg": "p", "opus": "p", "wav": "p"},
  "audioloop": "t",
  "backdropfilter": "f",
  "backgroundblendmode": "t",
  "backgroundcliptext": "t",
  "backgroundsize": "t",
  "battery-api": "f",
  "batteryapi": "f",
  "bdi": "t",
  "beacon": "t",
  "bgpositionshorthand": "t",
  "bgpositionxy": "t",
  "bgrepeatround": "t",
  "bgrepeatspace": "t",
  "bgsizecover": "t",
  "blob-constructor": "t",
  "blobconstructor": "t",
  "bloburls": "t",
  "borderimage": "t",
  "borderradius": "t",
  "boxshadow": "t",
  "boxsizing": "t",
  "canvas": "t",
  "canvasblending": "t",
  "canvastext": "t",
  "canvaswinding": "t",
  "capture": "f",
  "checked": "t",
  "classlist": "t",
  "contains": "f",
  "contenteditable": "t",
  "contextmenu": "f",
  "cookies": "t",
  "core-desktop": "t",
  "core-mobile": "f",
  "core-tablet": "f",
  "cors": "t",
  "createelement-attrs": "f",
  "createelementattrs": "f",
  "crypto": "t",
  "cssall": "t",
  "cssanimations": "t",
  "csscalc": "t",
  "csschunit": "t",
  "csscolumns": {
    "breakafter": "t",
    "breakbefore": "t",
    "breakinside": "t",
    "fill": "f",
    "gap": "t",
    "rule": "t",
    "rulecolor": "t",
    "rulestyle": "t",
    "rulewidth": "t",
    "span": "t",
    "width": "t"
  },
  "cssescape": "t",
  "cssexunit": "t",
  "cssfilters": "t",
  "cssgradients": "t",
  "cssinvalid": "t",
  "cssmask": "t",
  "csspointerevents": "t",
  "csspositionsticky": "f",
  "csspseudoanimations": "t",
  "csspseudotransitions": "t",
  "cssreflections": "t",
  "cssremunit": "t",
  "cssresize": "t",
  "cssscrollbar": "t",
  "csstransforms": "t",
  "csstransforms3d": "t",
  "csstransitions": "t",
  "cssvalid": "t",
  "cssvhunit": "t",
  "cssvmaxunit": "t",
  "cssvminunit": "t",
  "cssvwunit": "t",
  "cubicbezierrange": "t",
  "customevent": "t",
  "customprotocolhandler": "t",
  "dart": "f",
  "datachannel": "t",
  "datalistelem": "t",
  "dataset": "t",
  "dataview": "t",
  "details": "t",
  "devicemotion": "t",
  "deviceorientation": "t",
  "display-runin": "f",
  "display-table": "t",
  "displayrunin": "f",
  "displaytable": "t",
  "documentfragment": "t",
  "ellipsis": "t",
  "emoji": "t",
  "es5": "t",
  "es5array": "t",
  "es5date": "t",
  "es5function": "t",
  "es5object": "t",
  "es5string": "t",
  "es5syntax": "t",
  "es5undefined": "t",
  "es6array": "f",
  "es6collections": "t",
  "es6math": "t",
  "es6number": "t",
  "es6object": "t",
  "es6string": "f",
  "eventlistener": "t",
  "eventsource": "t",
  "extended-emoji": "f",
  "fetch": "t",
  "fileinput": "t",
  "fileinputdirectory": "t",
  "filereader": "t",
  "filesystem": "t",
  "flash": "f",
  "flexbox": "t",
  "flexboxlegacy": "t",
  "flexboxtweener": "f",
  "flexwrap": "t",
  "fontface": "t",
  "forcetouch": "f",
  "formattribute": "t",
  "formvalidation": "t",
  "framed": "f",
  "fullscreen": "t",
  "gamepads": "t",
  "generatedcontent": "t",
  "generators": "t",
  "geolocation": "t",
  "getrandomvalues": "t",
  "getusermedia": "t",
  "hairline": "f",
  "hashchange": "t",
  "hidden": "t",
  "hiddenscroll": "f",
  "history": "t",
  "hsla": "t",
  "htmlimports": "t",
  "ie8compat": "f",
  "imgcrossorigin": "t",
  "indexeddb": {"deletedatabase": "t"},
  "inlinesvg": "t",
  "input": {
    "autocomplete": "t",
    "autofocus": "t",
    "list": "t",
    "max": "t",
    "min": "t",
    "multiple": "t",
    "pattern": "t",
    "placeholder": "t",
    "required": "t",
    "step": "t"
  },
  "input-formaction": "t",
  "input-formenctype": "t",
  "input-formtarget": "f",
  "inputformaction": "t",
  "inputformenctype": "t",
  "inputformmethod": "t",
  "inputformtarget": "f",
  "inputsearchevent": "t",
  "inputtypes": {
    "color": "t",
    "date": "t",
    "datetime": "f",
    "datetime-local": "t",
    "email": "t",
    "month": "t",
    "number": "t",
    "range": "t",
    "search": "t",
    "tel": "t",
    "time": "t",
    "url": "t",
    "week": "t"
  },
  "intl": "t",
  "json": "t",
  "lastchild": "t",
  "ligatures": "t",
  "localizednumber": "f",
  "localstorage": "t",
  "lowbandwidth": "f",
  "lowbattery": "f",
  "matchmedia": "t",
  "mathml": "f",
  "mediaqueries": "t",
  "meter": "t",
  "microdata": "f",
  "multiplebgs": "t",
  "mutationobserver": "t",
  "notification": "t",
  "nthchild": "t",
  "object-fit": "t",
  "objectfit": "t",
  "olreversed": "t",
  "oninput": "t",
  "opacity": "t",
  "outputelem": "t",
  "overflowscrolling": "f",
  "pagevisibility": "t",
  "peerconnection": "t",
  "performance": "t",
  "picture": "t",
  "placeholder": "t",
  "pointerevents": "f",
  "pointerlock": "t",
  "postmessage": "t",
  "pr-screenattributes": {"colorDepth": 24, "windowHeight": 324, "windowWidth": 1366},
  "preserve3d": "t",
  "progressbar": "t",
  "promises": "t",
  "proximity": "f",
  "ps-cookies": "t",
  "ps-hirescapable": "f",
  "ps-ie8compat": "f",
  "ps-lowbandwidth": "f",
  "ps-lowbattery": "f",
  "ps-max-cookiedata-length": 4142,
  "ps-unicode": "t",
  "ps-webgl": "t",
  "queryselector": "t",
  "quotamanagement": "t",
  "raf": "t",
  "regions": "f",
  "requestanimationframe": "t",
  "requestautocomplete": "f",
  "rgba": "t",
  "ruby": "t",
  "sandbox": "t",
  "scriptasync": "t",
  "scriptdefer": "t",
  "scrollsnappoints": "f",
  "seamless": "f",
  "serviceworker": "t",
  "sessionstorage": "t",
  "shapes": "t",
  "sharedworkers": "t",
  "siblinggeneral": "f",
  "sizes": "t",
  "smil": "t",
  "speechrecognition": "t",
  "speechsynthesis": "t",
  "srcdoc": "t",
  "srcset": "t",
  "strictmode": "t",
  "stylescoped": "f",
  "subpixelfont": "f",
  "supports": "t",
  "svg": "t",
  "svgasimg": "t",
  "svgclippaths": "t",
  "svgfilters": "t",
  "svgforeignobject": "t",
  "target": "t",
  "template": "t",
  "templatestrings": "t",
  "textalignlast": "t",
  "textareamaxlength": "t",
  "textshadow": "t",
  "texttrackapi": "t",
  "time": "f",
  "todataurljpeg": "t",
  "todataurlpng": "t",
  "todataurlwebp": "t",
  "touchevents": "f",
  "track": "t",
  "transferables": "t",
  "typedarrays": "t",
  "unicode": "t",
  "unicoderange": "t",
  "unknownelements": "t",
  "urlparser": "t",
  "userdata": "f",
  "userselect": "t",
  "vibrate": "t",
  "video": {"h264": "p", "hls": "e", "ogg": "p", "vp9": "p", "webm": "p"},
  "videoloop": "t",
  "videopreload": "t",
  "vml": "f",
  "webanimations": "t",
  "webaudio": "t",
  "webgl": "t",
  "webglextensions": {
    "ANGLE_instanced_arrays": "t",
    "EXT_blend_minmax": "t",
    "EXT_frag_depth": "t",
    "EXT_sRGB": "t",
    "EXT_shader_texture_lod": "t",
    "EXT_texture_filter_anisotropic": "t",
    "OES_element_index_uint": "t",
    "OES_standard_derivatives": "t",
    "OES_texture_float": "t",
    "OES_texture_float_linear": "t",
    "OES_texture_half_float": "t",
    "OES_texture_half_float_linear": "t",
    "OES_vertex_array_object": "t",
    "WEBGL_compressed_texture_etc1": "t",
    "WEBGL_compressed_texture_s3tc": "t",
    "WEBGL_debug_renderer_info": "t",
    "WEBGL_debug_shaders": "t",
    "WEBGL_depth_texture": "t",
    "WEBGL_draw_buffers": "t",
    "WEBGL_lose_context": "t",
    "WEBKIT_EXT_texture_filter_anisotropic": "t",
    "WEBKIT_WEBGL_compressed_texture_s3tc": "t",
    "WEBKIT_WEBGL_depth_texture": "t",
    "WEBKIT_WEBGL_lose_context": "t"
  },
  "webintents": "f",
  "websockets": "t",
  "websocketsbinary": "t",
  "websqldatabase": "t",
  "webworkers": "t",
  "willchange": "t",
  "wrapflow": "f",
  "xdomainrequest": "f",
  "xhr2": "t",
  "xhrresponsetype": "t",
  "xhrresponsetypearraybuffer": "t",
  "xhrresponsetypeblob": "t",
  "xhrresponsetypedocument": "t",
  "xhrresponsetypejson": "t",
  "xhrresponsetypetext": "t"
};
/**/
