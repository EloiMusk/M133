<?php
session_start();
include 'userFunc.php';
//userlogin handeling
if (isset($_REQUEST['act'])) {
    if($_REQUEST['act'] == 'login') {
        try {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = authenticateUser($username, $password);
            if($user) {
                $_SESSION['user'] = $user;
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $_POST['redirect']);
                } else {
                    header('Location: /index.php');
                }
            } else {
                header('Location: /login.php?error=wrongLogin');
            }
        }catch (Exception $e) {
            print $e->getMessage();
            header('Location: /login.php?error=failed');
        }
    }
    if ($_REQUEST['act'] == 'register'){
        try {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $user = createUser($firstname, $lastname, $username, $password, $email);
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: /index.php');
            } else {
                header('Location: /signin.php?error=wrongRegister');
            }
        }catch (Exception $e) {
            header('Location: /signin.php?error=failed');
        }
    }
}else{
    header('Location: /login.php');
}
?>
