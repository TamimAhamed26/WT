<?php
    session_start();
    session_unset();
    session_destroy();
    //setcookie('username', '', time() - 60, '/');
    //setcookie('last_modified', '', time() - 60, '/');
    //setcookie($key, '', time() - 60, '/');
    header('location: ../View/login.php');
?>
