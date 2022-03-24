<?php
function getDB()
{
    if (strpos(php_uname(), 'vtxhosting.ch') == true) {
        include 'prod.php';
    } else {
        include 'dev.php';
    }

    try {

        $dblink = new PDO('mysql:host=localhost;dbname=' . $dbname, $dbuser, $dbpass);
        return $dblink;

    } catch (PDOException $exception) {

        echo 'Connection failed: ' . $exception->getMessage();

    }
}
?>
