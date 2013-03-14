<?php

defined('START')||die(header("HTTP/1.1 403 Forbidden"));

if (isset($_GET["p"]) AND $_GET["p"] !== "") {
    
    $_GET["p"] = str_replace(".", "", $_GET["p"]);
    if (file_exists("./modules/".$_GET["p"].".php")) define("CONTENT", "./modules/".$_GET["p"].".php");
    else define("CONTENT", "./404.php");
    
} else define("CONTENT", "./home.php");

?>