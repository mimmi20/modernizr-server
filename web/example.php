<?php
chdir(dirname(__DIR__));

$autoloadPaths = array(
    'vendor/autoload.php',
    '../../autoload.php',
);

$foundVendorAutoload = false;
foreach ($autoloadPaths as $path) {
    if (file_exists($path)) {
        require $path;
        $foundVendorAutoload = true;
        break;
    }
}

if (!$foundVendorAutoload) {
    throw new Exception('Could not find autoload path in any of the searched locations');
}

use Modernizr\Modernizr;

if (null === Modernizr::getData()) {
    print "<html><head><script type='text/javascript'>";
    print Modernizr::buildJsCode() . "</script></head><body></body></html>";
    exit;
}

print 'The server knows:';
foreach (Modernizr::getData() as $feature => $value) {
    print "<br/> $feature: ";
    print_r($value);
}
