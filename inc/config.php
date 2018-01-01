<?php

/*
 * Db configs.
 */
// define('HOST', 'localhost');     // mysql14.ilait.se
// define('PORT', 3306);
// define('DATABASE', 'db_test');        // dgc117767
// define('USERNAME', 'root');     // udmygc362030
// define('PASSWORD', 'r00t');          // 3nkeLT?
// define('CHARSET', 'utf8');

define('HOST', 'mysql14.ilait.se');     // mysql14.ilait.se
define('PORT', 3306);
define('DATABASE', 'dgc117767');        // dgc117767
define('USERNAME', 'udmygc362030');     // udmygc362030
define('PASSWORD', '3nkeLT?');          // 3nkeLT?
define('CHARSET', 'utf8');

/*
 * Upload configs.
 */
define('UPLOAD_DIR', 'uploads');
define('UPLOAD_MAX_FILE_SIZE', 10485760); // 10MB.
define('UPLOAD_ALLOWED_MIME_TYPES', [
    'image/jpeg',
    'image/png',
    'image/gif',
]);

/*
 * Css vendor prefixes.
 * 
 * @link https://developer.mozilla.org/en-US/docs/Glossary/Vendor_Prefix Vendor Prefix.
 */
define('CSS_VENDOR_PREFIXES', [
    '-webkit-', // Chrome, Safari, newer versions of Opera, almost all iOS browsers;
    '-moz-', // Firefox.
    '-o-', // Old, pre-WebKit, versions of Opera.
    '-ms-', // Internet Explorer and Microsoft Edge.
    '', // General for all browsers.
]);

// Minimal animation-delay of the slider, in seconds.
define('CSS_SLIDER_MINIMAL_ANIMATION_DELAY', 1.5);
