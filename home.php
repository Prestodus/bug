<?php defined('START')||die(header("HTTP/1.1 403 Forbidden")); ?>

<header>Home</header>

The code below says it all.<br />
If you're looking for a PHP developer, I'm your guy.

<?php

codeblock('A little bit of code with information about me.', '<?php

$lookingfor = $_POST["openjob"];
if ($lookingfor == "PHP Developer") {

    $hire = array(
        "Name" => "Ruben Coolen",
        "Telephone" => "0493 030 724",
        "Email address" => "rubencoolen@live.be",
        "Skills" => "PHP, OOP, MVC, SQL, HTML, CSS, JavaScript, jQuery, ..."
    );

}

?>');

?>