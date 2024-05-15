<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../model/db.php';
require_once '../model/querry.php';
require_once '../controller/validation.php';

$username = test_input($_POST['username']); 
$password = test_input($_POST['password']);


if (empty($username) || empty($password)) {
    if (empty($username) && empty($password)) {
        $_SESSION['usernameerror'] = "Username is required";
        $_SESSION['passworderror'] = "Password is required";
    } elseif (empty($username)) {
        $_SESSION['usernameerror'] = "Username is required";
    } else {
        $_SESSION['passworderror'] = "Password is required";
    }
    header("Location: ../view/login.php");
    exit();
}


if (login($username, $password)) {
    $_SESSION['username'] = $username;
    
    $_SESSION['userInfo']=getUser($username);
    
    header("Location: ../view/profile.php");
    exit();
    
}
 else {
    $_SESSION['passworderror'] = "Invalid Credentials";
    header("Location: ../view/login.php");
    exit();
}




?>