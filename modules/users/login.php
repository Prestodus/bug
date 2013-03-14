<?php defined('START')||die(header("HTTP/1.1 403 Forbidden")); ?>

<header>Admin center</header>

<?php

if (isset($_GET["action"]) AND $_GET["action"] == "logout") {
        
    logout();
        
} else {
    
    if (loggedin()) {
        
        $userinfo = user();
        echo "You are logged in as ".$userinfo["username"].".<br>Your current role is ".$userinfo["rolename"].".";
        
    } else {

        $showform = 1;
        if (isset($_POST["username"])) {
        
            $phpass = new PasswordHash(8, FALSE);
            $dbh = Conn::getInstance();
            $sql = $dbh->prepare("SELECT * FROM ".DB_PREFIX."users WHERE username = ?");
            $sql->execute(array($_POST["username"]));
            if ($user = $sql->fetch()) {
                
                if ($phpass->CheckPassword($_POST["password"], $user["password"])) {
                    
                    $salt = uniqid(mt_rand(), true);
                    $hash = getSaltedHash($user["password"], $salt);
                    $sql = $dbh->prepare("UPDATE ".DB_PREFIX."login SET salt = ?, login = NOW(), hash = ? WHERE id = ?");
                    $sql->execute(array($salt, $hash, $user["id"]));
                    setcookie("login", $hash, time()+60*60*24*30, "/");
                    setcookie("userid", $user["id"], time()+60*60*24*30, "/");
                    $showform = 0;
                    echo "<p>You are now logged in.<br />You will be redirected within a few seconds.</p>";
                    echo "<meta http-equiv=\"refresh\" content=\"1;URL=".CFG_PATH."\" />";
                    
                } else {
                    
                    echo "<p>The password you entered is incorrect.</p>";
                    
                }
            
            } else {
                
                echo "<p>The username you entered does not exist.</p>";
                
            }
            
        }
        if ($showform === 1) {
        
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
    
    }

}

?>