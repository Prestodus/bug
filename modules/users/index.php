<?php defined('START')||die(header("HTTP/1.1 403 Forbidden")); ?>

<header>Admin center</header>

<?php

if (loggedin()) {
    
    $userinfo = user();
    if (userrights("admin")) {
        
        echo "You have admin rights.<br />Your current role is \"".$userinfo["rolename"]."\".";
        
    } else {
        
        echo "You have no right to be here.<br />Your current role is \"".$userinfo["rolename"]."\".";
        
    }
    
} else {

    ?>
    
    <form method="POST" action="<?php show(CFG_PATH) ?>?p=users/login">
    
        <div class="form_description">
            Username<br />
            Password
        </div>
        <div class="form_input">
            <input type="text" name="username" /><br />
            <input type="password" name="password" /><br />
            <input type="submit" value="Log in" class="button" />
        </div>
    
    </form>
    
    <?php
    
}

?>