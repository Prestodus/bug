<?php

if ($includesetup === 1) {
                        
    ?>

    <!doctype html>
    <html>
    
        <head>
        
            <meta charset="utf_8" />
            <title>Framework installation - Done</title>
            <link rel="stylesheet" href="./includes/setup/style.css" />
            <script type="text/javascript" src="./includes/setup/modernizr.js"></script>
            
        </head>
        <body>
        
            <section id="container">
            
                <header id="header"><h2 style="font-size: 1.9em; font-weight: bold; margin: 0px;">Setup</h2></header>
                <section style="padding: 10px;">
                
                    <p>Done!<br />
                    <a href="./">Click here to go to your website.</a></p>
                
                </section>
                
            </section>
        
        </body>
    
    </html>

    <?php
    
}

$create_name = "./includes/setup/.htaccess";
$file_handle = fopen($create_name, 'w') or die("Error: Can't open file");
$content_string = "order deny,allow\n";
fwrite($file_handle, $content_string);
$content_string = "deny from all\n";
fwrite($file_handle, $content_string);
fclose($file_handle);

?>