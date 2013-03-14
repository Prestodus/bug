<?php

defined('START')||die(header("HTTP/1.1 403 Forbidden"));

// ------

function define_multi($a) {
    
    foreach($a AS $k => $v) define($k, $v);
    
} // Defines all constants

// ------

define_multi(array(
    "DB_PATH" =>        "localhost",                   // Insert the database path. If you are uncertain, it probably is localhost
    "DB_USER" =>        "root",                        // Insert the database username
    "DB_PASSWORD" =>    "",                        // Insert the database password
    "DB_DATABASE" =>    "framework",               // Insert the database name
    "DB_PREFIX" =>      "bug_"                       // Insert the prefix that should be used for the database tables
));

define("CFG_INSTALLED", "true");

?>