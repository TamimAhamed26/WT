<?php
require_once '../model/user_model.php';
require_once '../model/validation_model.php';
session_start();

$username = test_input($_POST['username']);
$password = test_input($_POST['password']);
$remember = isset($_POST['remember']) ? true : false;

$userinfo = getUser($username);
$_SESSION['userInfo'] = $userinfo;

if (login($username, $password, 'user') || login($username, $password, 'employee')) {
    $_SESSION['username'] = $username;

    if ($remember) {
        setcookie('username', $username, time() + (86400 * 1), "/");
    }

    header("Location: ../View/user_dashboard.php");
    exit();
} else {
    $employeeStatus = getEmployeeStatus($username);
    if ($employeeStatus === 'Inactive') {
        $_SESSION['login_error'] = "Your access is revoked. Please contact the administration.";
    } else {
        $_SESSION['login_error'] = "Invalid Credentials";
    }
    header("Location: ../View/login.php");
    exit();
}
?>