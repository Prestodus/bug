<?php

if ($includesetup === 1) {

	$error = "";
	$toshow = "database";
	if (isset($_POST["db_path"])) {

		$db_path = $_POST["db_path"];
		$db_user = $_POST["db_user"];
		$db_pass = $_POST["db_pass"];
		$db_name = $_POST["db_name"];
		$db_pref = $_POST["db_pref"];
		try {

			$dbh = new PDO("mysql:host=" . $db_path . ";dbname=" . $db_name, $db_user, $db_pass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
			$go_on = 1;

		}
		catch (PDOException $e) {

			$error .= "<h3>A database connection could not be established.</h3>";
			$go_on = 0;
			$toshow = "database";

		}
		if ($go_on === 1) {

			$search = array("{DB_PATH}", "{DB_USER}", "{DB_PASS}", "{DB_NAME}", "{DB_PREF}");
			$replace = array( $db_path, $db_user, $db_pass, $db_name, $db_pref);
			$file = "./includes/config.php";
			$str = implode("", file($file));
			$fp = fopen($file, 'w');
			$str = str_replace($search, $replace, $str);
			fwrite($fp, $str, strlen($str));
			//$sqlfile = file_get_contents("./includes/setup/setup.sql");
			$create = $dbh->query("
                CREATE TABLE IF NOT EXISTS `".$db_pref."settings` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `name` varchar(25) NOT NULL,
                  `title` varchar(50) NOT NULL,
                  `slogan` varchar(50) NOT NULL,
                  `path` varchar(100) NOT NULL,
                  `contact` varchar(50) NOT NULL,
                  `owner` varchar(40) NOT NULL,
                  `template` int(7) NOT NULL DEFAULT '1',
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
                
                CREATE TABLE IF NOT EXISTS `".$db_pref."template` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `name` varchar(50) NOT NULL,
                  `tplpath` varchar(25) NOT NULL,
                  `version` varchar(15) NOT NULL,
                  `about` text NOT NULL,
                  `vars` varchar(500) NOT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
            ");
			if (!$create) {

				$error .= "<h3>Could not insert into the database.</h3>";
				$toshow = "database";

			} else {

				$toshow = "website";

			}

		}

	}
    if (isset($_POST["web_name"])) {
        
        $toshow = "website";
        $web_name = $_POST["web_name"];
        $web_title = $_POST["web_title"];
        $web_slogan = $_POST["web_slogan"];
        $web_path = $_POST["web_path"];
        $web_contact = $_POST["web_contact"];
        $web_owner = $_POST["web_owner"];
		try {

			$dbh = new PDO("mysql:host=" . DB_PATH . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
			$go_on = 1;

		}
		catch (PDOException $e) {

			$error .= "<h3>A database connection could not be established.</h3>";
			$go_on = 0;
			$toshow = "website";

		}
		if ($go_on === 1) {

			$file = "./includes/config.php";
			$str = implode("", file($file));
			$fp = fopen($file, 'w');
			$str = str_replace("{CFG_INST}", "true", $str);
			fwrite($fp, $str, strlen($str));
            $sql = $dbh->prepare("INSERT INTO ".DB_PREFIX."settings (name, title, slogan, path, contact, owner) VALUES (?, ?, ?, ?, ?, ?)");
			if (!$sql->execute(array($web_name, $web_title, $web_slogan, $web_path, $web_contact, $web_owner))) {

				$error .= "<h3>Could not insert into the database.</h3>";
				$toshow = "website";

			} else {

				$toshow = "success";

			}

		}
        
    }

	if ($toshow == "database") {

		include_once ("./includes/setup/database.php");

	} elseif ($toshow == "website") {

        include_once ("./includes/setup/website.php");

    } elseif ($toshow == "success") {
        
        include_once ("./includes/setup/success.php");
        
    }

}

?>