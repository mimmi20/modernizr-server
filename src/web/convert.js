/**
 * Created by Thomas Müller on 24.10.2015.
 */

"use strict";

var m = Modernizr, c = '', reload = true, cx;

for (var f in m) {
    if (!m.hasOwnProperty(f)) {
        continue;
    }

    if (f[0] === '_') {
        continue;
    }

    var t = typeof m[f];

    if (t === 'function') {
        continue;
    }

    c += (c ? '|' : '###Modernizr######EXTRA###=') + f + ':';

    if (t === 'object') {
        for (var s in m[f]) {
            if (!m[f].hasOwnProperty(s)) {
                continue;
            }

            if (typeof m[f][s] === 'boolean') {
                c += '/' + s + ':' + (m[f][s] ? 'true' : 'false');
            } else {
                c += '/' + s + ':' + m[f][s];
            }
        }
    } else if (t === 'boolean') {
        c += (m[f] ? 'true' : 'false');
    } else {
        c += m[f];
    }

    cx = c + '; path=/';

    document.cookie = cx;
}

c += '; path=/';

try {
    document.cookie = c;

    if (reload) {
        document.location.reload();
    }
} catch (e) {
    // do nothing here
}
