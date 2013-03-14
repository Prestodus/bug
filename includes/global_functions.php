<?php

defined('START')||die(header("HTTP/1.1 403 Forbidden"));

// ------

if (CFG_INSTALLED == "true") showinstalled();
else showsettings();

// ------

class Conn {
    
    private static $_instance = array();
    static function getInstance ($dbName = DB_DATABASE) {
        
        if (! array_key_exists($dbName, self::$_instance)) {
            
            $dbtype = 'mysql';
            $username = DB_USER;
            $password = DB_PASSWORD;
            $hostname = DB_PATH;
            $dsn = $dbtype . ":host=" . $hostname . ";dbname=" . $dbName;
            try {
                
                self::$_instance[$dbName] = new PDO($dsn, $username, $password);
                
            } catch (PDOException $e) {
                
                echo "Error!: " . $e->getMessage();
                die();
                
            }
            
        }
        
        return self::$_instance[$dbName];
        
    }
    
}

// ------

function loggedin() {
    
    $dbh = Conn::getInstance();
    
    if (isset($_COOKIE["login"]) AND isset($_COOKIE["userid"])) {
        
        $sql = $dbh->prepare("SELECT * FROM ".DB_PREFIX."login WHERE id = ?");
        $sql->execute(array($_COOKIE["userid"]));
        $logininfo = $sql->fetch();
        if ($logininfo["hash"] !== $_COOKIE["login"]) {
            
            setcookie("login", "", time()-1000);
            setcookie("userid", "", time()-1000);
            return false;
            
        } else {
            
            return true;
            
        }
        
    } else return false;
    
}

// ------

function logout() {
        
    setcookie("login", "", time()-1000, "/");
    setcookie("userid", "", time()-1000, "/");
    echo "<p>You are now logged out.<br />You will be redirected in a few seconds.</p>";
    echo "<meta http-equiv=\"refresh\" content=\"1;URL=".CFG_PATH."\" />";
    
}

// ------

function user() {
    
    if (loggedin() === false) return false;
    else {
        
        $dbh = Conn::getInstance();
        $sql = $dbh->prepare("SELECT ".DB_PREFIX."users.*, ".DB_PREFIX."roles.name AS rolename FROM ".DB_PREFIX."users, ".DB_PREFIX."roles WHERE ".DB_PREFIX."users.role = ".DB_PREFIX."roles.id AND ".DB_PREFIX."users.id = ?");
        $sql->execute(array($_COOKIE["userid"]));
        $userinfo = $sql->fetch();
        return $userinfo;
    
    }    
    
}

// ------

function userrights($var) {
    
    if (loggedin() === false) return false;
    else {
        
        $dbh = Conn::getInstance();
        $userinfo = user();
        $sql = $dbh->prepare("SELECT * FROM ".DB_PREFIX."roles WHERE id = ?");
        $sql->execute(array($userinfo["role"]));
        $rights = $sql->fetch();
        $rights = explode(",", $rights["rights"]);
        if (in_array($var, $rights)) {
            
            return true;
        
        } else return false;
        
    }
    
}

// ------

function showinstalled() {
    
    $dbh = Conn::getInstance();
    $year = date("Y"); // Get the current year
    
    foreach (new DirectoryIterator("./templates") as $file) {
        
        if($file->isDot()) continue;
        if(is_dir("./templates/".$file->getFilename()) AND file_exists("./templates/".$file->getFilename()."/config.php")) {
            
            include("./templates/".$file->getFilename()."/config.php");
            
        }
        
    }
    
    $sql = $dbh->prepare("SELECT ".DB_PREFIX."settings.*, ".DB_PREFIX."template.tplpath FROM ".DB_PREFIX."settings, ".DB_PREFIX."template WHERE ".DB_PREFIX."settings.template = ".DB_PREFIX."template.id AND ".DB_PREFIX."settings.id = '1'");
    $sql->execute();
    $row = $sql->fetch();
    define_multi(array(
        "CFG_NAME" =>       $row["name"],
        "CFG_TITLE" =>      $row["title"],
        "CFG_SLOGAN" =>     $row["slogan"],
        "CFG_PATH" =>       $row["path"],
        "CFG_CONTACT" =>    $row["contact"],
        "CFG_OWNER" =>      $row["owner"],
        "TPL_FOLDER" =>     $row["tplpath"],
        "TPL_ID" =>         $row["template"]
    ));
    $sql = $dbh->prepare("SELECT * FROM ".DB_PREFIX."template WHERE id = '".$row["template"]."'");
    $sql->execute();
    $template = $sql->fetch();
    
}

// ------

function showsettings() {
    
    //$sql = $dbh->prepare("SELECT COUNT(id) FROM fw_settings LIMIT 1");
    //$sql->execute();
    //if ($sql->fetchColumn() < 1 OR !$sql) {
        
        $includesetup = 1;
        require_once("./includes/setup/setup.php");
        exit;
        
    //}
    
} // Includes the setup if the website has not been setup yet

// ------

function show($toshow) {
    
    $constants = array(CFG_NAME, CFG_SLOGAN, CFG_TITLE, CFG_PATH, CFG_CONTACT, CFG_OWNER, TPL_FOLDER, "content", "year");
    if (!in_array($toshow, $constants)) {
        
        if (file_exists("./templates/".TPL_FOLDER."/".$toshow.".tpl.php"))
            include("./templates/".TPL_FOLDER."/".$toshow.".tpl.php");
        
    } else {
        
        if ($toshow == "content") include(CONTENT);
        else {
            
            if ($toshow == "year") $toshow = date("Y");
            print($toshow);
        
        }
        
    }
    
} // Shows constants in templates

// ------

function block($toshow) {
    
    $dbh = Conn::getInstance();
    $sql = $dbh->prepare("SELECT ".DB_PREFIX."settings.* FROM ".DB_PREFIX."settings, ".DB_PREFIX."template WHERE ".DB_PREFIX."settings.template = ".DB_PREFIX."template.id AND ".DB_PREFIX."settings.id = '1'");
    $sql->execute();
    $row = $sql->fetch();
    $sql = $dbh->prepare("SELECT * FROM ".DB_PREFIX."template WHERE id = '".$row["template"]."'");
    $sql->execute();
    $template = $sql->fetch();
    $array_vars = explode(",", $template["vars"]);
    foreach($array_vars AS $value) {
        
        $setting = explode(":", $value);
        if ($setting[0] == $toshow) {
            
            $showit = $setting[1];
            
        }
        
    }
    if (!isset($showit)) $showit = "1";
    if ($showit !== "1") echo "<div style='display: none;'>";
    
}

// ------

function endblock($toshow) {
    
    $dbh = Conn::getInstance();
    $sql = $dbh->prepare("SELECT ".DB_PREFIX."settings.* FROM ".DB_PREFIX."settings, ".DB_PREFIX."template WHERE ".DB_PREFIX."settings.template = ".DB_PREFIX."template.id AND ".DB_PREFIX."settings.id = '1'");
    $sql->execute();
    $row = $sql->fetch();
    $sql = $dbh->prepare("SELECT * FROM ".DB_PREFIX."template WHERE id = '".$row["template"]."'");
    $sql->execute();
    $template = $sql->fetch();
    $array_vars = explode(",", $template["vars"]);
    foreach($array_vars AS $value) {
        
        $setting = explode(":", $value);
        if ($setting[0] == $toshow) {
            
            $showit = $setting[1];
            break;
            
        }
        
    }
    if (!isset($showit)) $showit = "1";
    if ($showit !== "1") echo "</div>";
    
}

// ------

function getSaltedHash($password, $salt) {
    
    $hash = $password . $salt;
    for ($i = 0; $i < 50; $i++) {
        
        $hash = hash('sha256', $password . $hash . $salt);
        
    }
    return $hash;
    
}

// ------

function textblock($toshow) {
    
    $dbh = Conn::getInstance();
    $sql = $dbh->prepare("SELECT * FROM ".DB_PREFIX."template WHERE id = ? LIMIT 1");
    $sql->execute(array(TPL_ID));
    $template = $sql->fetch();
    $sql = $dbh->prepare("SELECT * FROM ".DB_PREFIX."textblock WHERE template = ? AND name = ? LIMIT 1");
    $sql->execute(array($template["id"], $toshow));
    $textblock = $sql->fetch();
    echo nl2br($textblock["text"]);
    
    
}

// ------


?>