<?php

/******
/
/ PLEASE FOLLOW THE INSTRUCTIONS BELOW FOR SETTING UP YOUR OWN TEMPLATE
/
/ STEP 1:
/ - Edit the variables below. Check their comments for details.
/
/ STEP 2:
/ - Make your template
/ - 
/ - You can use "<?php show(string) ?>" where string is any of the below to insert their respective values:
/ - - CFG_NAME - Returns the name of your website
/ - - CFG_TITLE - Returns the title of your website
/ - - CFG_SLOGAN - Returns the slogan of your website
/ - - CFG_PATH - Returns the path of your website
/ - - CFG_CONTACT - Returns the contact email address
/ - - CFG_OWNER - Returns the websites' owners' name
/ - - You can use your own string (between single or double quotes) to include a file with the name string_name.tpl.php (example: <?php show("header") ?> includes the file header.tpl.php)
/ - 
/ - Another tag you can use is "<?php block(string) ?>Any content<?php endblock() ?>" where string is one of the variables defined in $var below
/ - - Example: <?php block("sidebar") ?><div>Sidebar</div><?php endblock() ?> will only show a sidebar if the setting in $var for sidebar below is 1
/
/ STEP 3:
/ - Profit!
/
/******/

$name = "Default template"; // Name of the template (Note that there can only exist 1 template with this name in the database, else it will be ignored)
$tplpath = "default"; // Path to the template in ./templates/ (example: default leads to ./templates/default/)
$version = "1.0"; // Version of the template
$about = "This template is the default template of my framework."; // A short note about the template, as shown in the admin panel, use \n for line breaks
$vars = "sidebar:1,prefooter:1,slogan:1,sitename:1,menu:1,logo:1,rightbox:1"; // The variables as explained above, seperated by a comma (,) (Example: if you created a second menu called menu2, and you want the administrator to have a choice whether to show or hide it, add ",menu2:1")

/*
/ Do not edit beyond this line
/*/

$sql = $dbh->prepare("SELECT count(id) FROM ".DB_PREFIX."template WHERE name = ?");
$sql->execute(array($name));
if ($sql->fetchColumn() < 1) {
    
    $sql = "INSERT INTO ".DB_PREFIX."template (name, tplpath, version, about, vars) VALUES (?, ?, ?, ?, ?)";
    $insert = $dbh->prepare($sql);
    $insert->execute(array($name, $tplpath, $version, $about, $vars));
        
}

?>