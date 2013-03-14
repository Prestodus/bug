<?php

$websitepath = str_replace("http://", "", CFG_PATH);
$websitepath = str_replace("www.", "", $websitepath);
$url = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$url = str_replace("www.", "", $url);
$minus = str_replace($websitepath, "", $url);
$explosion = explode("/", $minus);
$url_vars = array();
$number = 0;
foreach($explosion AS $exploded) {
    
    if ($number === 0);
    elseif ($number === 1) $url_vars["folder"] = $exploded;
    elseif ($number === 2) $url_vars["file"] = $exploded;
    else $url_vars["var".($number-2)] = $exploded;
    $number++;
    
}
echo "<pre>"; var_dump($url_vars); echo "</pre>";

?>