<?php

defined('START')||die(header("HTTP/1.1 403 Forbidden"));

// ------

function define_multi($a) {
    
    foreach($a AS $k => $v) define($k, $v);
    
} // Defines all constants

// ------

define_multi(array(
    "DB_PATH" =>        "{DB_PATH}",                   // Insert the database path. If you are uncertain, it probably is localhost
    "DB_USER" =>        "{DB_USER}",                        // Insert the database username
    "DB_PASSWORD" =>    "{DB_PASS}",                        // Insert the database password
    "DB_DATABASE" =>    "{DB_NAME}",               // Insert the database name
    "DB_PREFIX" =>      "{DB_PREF}"                       // Insert the prefix that should be used for the database tables
));

define("CFG_INSTALLED", "{CFG_INST}");

?>