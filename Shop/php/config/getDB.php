<?php
if (strpos(php_uname(), 'vtxhosting.ch') == true) {
    include "prod.php";
    echo "Using Prod";
} else {
    include "dev.php";
    echo "Using Dev";
}

try {

    $dblink = new PDO('mysql:host=localhost;dbname=' . $dbname, $dbuser, $dbpass);

    echo 'Connection successfully';

} catch (PDOException $exception) {

    echo 'Connection failed: ' . $exception->getMessage();

}
?>
