<?php

    $dbh = Conn::getInstance();
    $phpass = new PasswordHash(8, FALSE);
    $password = 'Athuglife1';
    $hash = $phpass->HashPassword($password);
    $sql = $dbh->prepare("UPDATE ".DB_PREFIX."users SET password = ? WHERE username = ?");
    $sql->execute(array($hash, "Prestodus"));
    
    if ($sql) echo "success"; else echo "fail";
    
?>