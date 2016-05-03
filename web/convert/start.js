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
