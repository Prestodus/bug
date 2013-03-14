<?php

if ($includesetup === 1) {
    
    ?>

    <!doctype html>
    <html>
    
        <head>
        
            <meta charset="utf_8" />
            <title>Framework installation - Database settings</title>
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
                
                    <div style="height: 35px; line-height: 35px;">Database path</div>
                    <div style="height: 35px; line-height: 35px;">Database username</div>
                    <div style="height: 35px; line-height: 35px;">Database password</div>
                    <div style="height: 35px; line-height: 35px;">Database name</div>
                    <div style="height: 35px; line-height: 35px;">Database table prefix</div>
                
                </section>
                <section id="section_right">
                
                    <form method="POST" action="./" id="databaseform">
                    <div style="height: 35px; line-height: 35px;"><input type="text" id="db_path" name="db_path" value="localhost" />
                    <script type="text/javascript">
                    var db_path = new LiveValidation('db_path');
                    db_path.add( Validate.Presence );
                    db_path.add( Validate.Length, { minimum: 1, maximum: 25 } );
                    </script></div>
                    <div style="height: 35px; line-height: 35px;"><input type="text" id="db_user" name="db_user" />
                    <script type="text/javascript">
                    var db_user = new LiveValidation('db_user');
                    db_user.add( Validate.Presence );
                    db_user.add( Validate.Length, { minimum: 1, maximum: 25 } );
                    </script></div>
                    <div style="height: 35px; line-height: 35px;"><input type="text" id="db_pass" name="db_pass" />
                    <script type="text/javascript">
                    var db_pass = new LiveValidation('db_pass');
                    db_pass.add( Validate.Length, { minimum: 0, maximum: 25 } );
                    </script></div>
                    <div style="height: 35px; line-height: 35px;"><input type="text" id="db_name" name="db_name" />
                    <script type="text/javascript">
                    var db_name = new LiveValidation('db_name');
                    db_name.add( Validate.Presence );
                    db_name.add( Validate.Length, { minimum: 1, maximum: 25 } );
                    </script></div>
                    <div style="height: 35px; line-height: 35px;"><input type="text" id="db_pref" name="db_pref" />
                    <script type="text/javascript">
                    var db_pref = new LiveValidation('db_pref');
                    db_pref.add( Validate.Length, { minimum: 0, maximum: 4 } );
                    </script></div>
                
                </section>
                <section style="clear: both; padding: 10px;">
                
                    <textarea readonly=""><?php include_once("./includes/setup/license.php"); ?></textarea><br />
                    <?php if (!preg_match('/MSIE/i', $_SERVER["HTTP_USER_AGENT"])) { ?>
                        <input type="checkbox" onclick="checker(this);" id="terms" name="terms" class="regular-checkbox" />
                        <label for="terms" style="padding-left: 40px;">I accept the terms and conditions</label>
                        <div id="toggle" style="display:none;"><br /><input type="submit" value="Proceed to step 2" /></div>
                    <?php } else { ?>
                        <input type="checkbox" id="terms2" name="terms" />
                        <label for="terms2">I accept the terms and conditions</label>
                        <div><br /><input type="submit" value="Proceed to step 2" /></div>
                    <?php } ?>
                    </form>
                
                </section>
                
            </section>
        
        </body>
    
    </html>

    <?php
    
}

?>