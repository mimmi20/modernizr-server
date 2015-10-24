/**
 * Created by Thomas Müller on 24.10.2015.
 */

var m = Modernizr, c = {};

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

    if (t == 'object') {
        c[f] = {};

        for (var s in m[f]) {
            if (!m[f].hasOwnProperty(s)) {
                continue;
            }

            c[f][s] = (m[f][s] ? '1' : '0');
        }
    } else {
        c[f] = (m[f] ? '1' : '0');
    }
}

alert(JSON.stringify(c));/*try{document.cookie= c.toString();document.location.reload();}catch(e){}/**/
