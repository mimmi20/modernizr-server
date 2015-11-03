/*
 * Including the extra core, extended, and per request tests from base Detector for use in the demo.
 */

// JSON support
Modernizr.addTest('json', !!window.JSON && !!JSON.parse);

// Overflowscrolling (iOS) support
Modernizr.addTest('overflowscrolling', function () {
    return Modernizr.testAllProps('overflowScrolling');
});
