<?php
try {

    $dblink = new PDO('mysql:host=localhost;dbname=' . $dbname, $dbuser, $dbpass);

    echo 'Connection successfully';

} catch (PDOException $exception) {

    echo 'Connection failed: ' . $exception->getMessage();

}
?>
