<?php
require_once '../model/user_model.php';
require_once '../model/validation_model.php';
session_start();

$username = test_input($_POST['username']); 
$password = test_input($_POST['password']);
$remember = isset($_POST['remember']) ? true : false;

//will use it later
$userinfo = getUser($username);
$_SESSION['userInfo'] = $userinfo;


if (empty($username) || empty($password)) {
    if (empty($username) && empty($password)) {
        $_SESSION['login_error'] = "Username and Password are required";
    } elseif (empty($username)) {
        $_SESSION['login_error'] = "Username is required";
    } else {
        $_SESSION['login_error'] = "Password is required";
    }
    header("Location: ../View/login.php");
    exit();
}

if (login($username, $password)) {
    $_SESSION['username'] = $username;

    if ($remember) {
        setcookie('username', $username, time() + (86400 * 30), "/"); 
    }

    header("Location: ../View/user_dashboard.php");
    exit();
} else {
    $_SESSION['login_error'] = "Invalid Credentials";
    header("Location: ../View/login.php");
    exit();
}
?>
