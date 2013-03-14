<?php

if ($includesetup === 1) {
    
    $http = 'http';
    if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") $http .= "s";
    $full_path = $http."://".$_SERVER['HTTP_HOST']."".dirname($_SERVER['PHP_SELF'])."/";
                        
    ?>

    <!doctype html>
    <html>
    
        <head>
        
            <meta charset="utf_8" />
            <title>Framework installation - Website settings</title>
            <link rel="stylesheet" href="./includes/setup/style.css" />
            <script type="text/javascript" src="./includes/setup/formvalidation.js"></script>
            <script type="text/javascript" src="./includes/setup/modernizr.js"></script>
            <script type="text/javascript">
            function checker(that) {
                if (that.checked) {
                    toggle.style.display = "";
                } else {
                    toggle.style.display = "none";
                }
            }
            </script>
            
        </head>
        <body>
        
            <section id="container">
            
                <header id="header">
                <h2 style="font-size: 1.9em; font-weight: bold; margin: 0px;">Setup</h2>
                <?php echo $error; ?>
                </header>
            
                <section id="section_left">
                
                    <div style="height: 35px; line-height: 35px;">Website name</div>
                    <div style="height: 35px; line-height: 35px;">Website title</div>
                    <div style="height: 35px; line-height: 35px;">Website slogan</div>
                    <div style="height: 35px; line-height: 35px;">Website path</div>
                    <div style="height: 35px; line-height: 35px;">Website contact address</div>
                    <div style="height: 35px; line-height: 35px;">Website owner name</div>
                
                </section>
                <section id="section_right">
                
                    <form method="POST" action="./" id="websiteform">
                    <div style="height: 35px; line-height: 35px;"><input type="text" id="web_name" name="web_name" />
                    <script type="text/javascript">
                    var web_name = new LiveValidation('web_name');
                    web_name.add( Validate.Presence );
                    web_name.add( Validate.Length, { minimum: 1, maximum: 25 } );
                    </script></div>
                    <div style="height: 35px; line-height: 35px;"><input type="text" id="web_title" name="web_title" />
                    <script type="text/javascript">
                    var web_title = new LiveValidation('web_title');
                    web_title.add( Validate.Presence );
                    web_title.add( Validate.Length, { minimum: 1, maximum: 50 } );
                    </script></div>
                    <div style="height: 35px; line-height: 35px;"><input type="text" id="web_slogan" name="web_slogan" />
                    <script type="text/javascript">
                    var web_slogan = new LiveValidation('web_slogan');
                    web_slogan.add( Validate.Length, { minimum: 0, maximum: 50 } );
                    </script></div>
                    <div style="height: 35px; line-height: 35px;"><input type="text" id="web_path" name="web_path" value="<?php echo $full_path; ?>" />
                    <script type="text/javascript">
                    var web_path = new LiveValidation('web_path');
                    web_path.add( Validate.Presence );
                    web_path.add( Validate.Length, { minimum: 1, maximum: 100 } );
                    </script></div>
                    <div style="height: 35px; line-height: 35px;"><input type="text" id="web_contact" name="web_contact" />
                    <script type="text/javascript">
                    var web_contact = new LiveValidation('web_contact');
                    web_contact.add( Validate.Presence );
                    web_contact.add( Validate.Length, { minimum: 0, maximum: 50 } );
                    </script></div>
                    <div style="height: 35px; line-height: 35px;"><input type="text" id="web_owner" name="web_owner" />
                    <script type="text/javascript">
                    var web_owner = new LiveValidation('web_owner');
                    web_owner.add( Validate.Presence );
                    web_owner.add( Validate.Length, { minimum: 0, maximum: 40 } );
                    </script></div>
                
                </section>
                <section style="clear: both; padding: 10px;">
                
                    <br /><input type="submit" value="Proceed to step 3" /></form>
                
                </section>
                
            </section>
        
        </body>
    
    </html>

    <?php
    
}

?>