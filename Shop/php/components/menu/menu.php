<?php
if (isset($_REQUEST['logout']) && $_REQUEST['logout'] == 1) {
    session_destroy();
    header('Location: /index.php');
}
include ($_SERVER["DOCUMENT_ROOT"].'/php/components/menu/menu-html.php');
?>