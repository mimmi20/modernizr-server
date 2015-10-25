/**
 * Created by Thomas Müller on 24.10.2015.
 */

var m = Modernizr, c = '';

for (var f in m) {
    if (!m.hasOwnProperty(f)) {
        continue;
    }

    if (f[0] == '_') {
        continue;
    }

    var t = typeof m[f];

    if (t == 'function'){
        continue;
    }

    c += (c ? '|' : 'Modernizr=') + f + ':';

    if (t == 'object') {
        for (var s in m[f]) {
            if (!m[f].hasOwnProperty(s)) {
                continue;
            }

            c += '/' + s + ':' + (m[f][s] ? '1' : '0');
        }
    } else {
        c += (m[f] ? '1' : '0');
    }
}

try{
    document.cookie=c; document.location.reload();
} catch (e) {
    // do nothing here
}
