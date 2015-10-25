/**
 * Created by Thomas Müller on 24.10.2015.
 */

var m = Modernizr, c = '', reload = true;

for (var f in m) {
    if (!m.hasOwnProperty(f)) {
        continue;
    }

    if (f[0] === '_') {
        continue;
    }

    var t = typeof m[f];

    if (t === 'function'){
        continue;
    }

    c += (c ? '|' : '###Modernizr######EXTRA###=') + f + ':';

    if (t === 'object') {
        for (var s in m[f]) {
            if (!m[f].hasOwnProperty(s)) {
                continue;
            }

            if (typeof m[f][s] === 'boolean') {
                c += '/' + s + ':' + (m[f][s] ? '1' : '0');
            } else {
                c += '/' + s + ':' + m[f][s];
            }
        }
    } else if (t === 'boolean') {
        c += (m[f] ? '1' : '0');
    } else {
        c += m[f];
    }
}

try{
    document.cookie=c;

    if (reload) {
        document.location.reload();
    }
} catch (e) {
    // do nothing here
}
