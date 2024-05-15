<?php
require_once '../Model/database_model.php';
require_once '../Controller/validation_model.php';
session_start();


$username = test_input($_POST['username']); 
$password = test_input($_POST['password']);
$remember = isset($_POST['rememberPassword']) ? true : false;

$userinfo = getEmployee($username);
$_SESSION['userInfo'] = $userinfo;


if (empty($username) || empty($password)) {
    if (empty($username) && empty($password)) {
        $_SESSION['login_error'] = "Enter Username and Password!";
    } elseif (empty($username)) {
        $_SESSION['login_error'] = "Enter Username!";
    } else {
        $_SESSION['login_error'] = "Enter Password!";
    }
    header("Location: ../View/Login.php");
    exit();
}

if (loginEmployee($username, $password)) {
    $_SESSION['username'] = $username;

    if ($remember) {
        setcookie('username', $username, time() + (86400 * 30), "/"); 
    }

    header("Location: ../View/employee_dashboard.php");
    exit();
} else {
    $_SESSION['login_error'] = "Error! Invalid Credentials!";
    header("Location: ../View/Login.php");
    exit();
}
?>
