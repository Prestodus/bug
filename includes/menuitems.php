<?php

function menuitem($name, $url = "") {
    
    $url = CFG_PATH."?p=$url";
    $defaults = array(
        array("title" => "home", "url" => CFG_PATH.""),
        array("title" => "contact", "url" => CFG_PATH."?p=users/contact"),
        array("title" => "login", "url" => CFG_PATH."".(loggedin()?"?p=users/login&action=logout":"?p=users/login")));
    foreach ($defaults AS $default) {
        
        if ($default["title"] == $name) {
            
            if ($default["title"] == "login") {
                
                $default["title"] = (loggedin()?"logout":"login");
                
            }
            $url = $default["url"];
            $name = $default["title"];
            break;
            
        }
        
    }
    $name = ucfirst($name);
    echo "<li><a href='$url'>$name</a></li>";
    
}

?>