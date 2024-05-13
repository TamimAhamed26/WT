<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../Controller/validation_model.php';
require_once '../Model/database_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $username = test_input($_POST['username']);
    $_SESSION['username'] = $username;

    if (empty(getEmployee($username))) {
        $_SESSION['user_error'] = "Username is not correct";
        header("Location:../View/forget_password.php");
        exit();
    } else {
        generateAndSavePassword();
        header("Location:../View/otp.php");
        exit();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['otp'])) {
    $otp = test_input($_POST['otp']);
    $v1 = file_get_contents('password.txt');

    if ($otp == $v1) {
        header("Location:../View/newpass.php");
        exit();
    } else {
        $_SESSION['otp_error'] = "OTP is not correct";
        header("Location:../View/otp.php");
        exit();
    }
}

// newpasscheck.php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password'])) {
    $temp = test_input($_POST['password']);
    validatePassword($temp, $temp);
    if (isset($_SESSION['password_error'])) {
      
        $_SESSION['newpass_error'] = "Password does not meet requirements.";
        unset($_SESSION['password_error']); 
        header("Location:../View/newpass.php");
        exit();
    }

    $newpass = $temp; 
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
    if ($username !== null) {
        if (updatePasswordEmployee($username, $newpass)) {
            header("Location:../View/Login.php");
            exit();
        } else {
            $_SESSION['newpass_error'] = "Failed to update password. Please try again later.";
            header("Location:../View/newpass.php");
            exit();
        }
    } else {
        header("Location:../View/forget_password.php");
        exit();
    }
} else {
    header("Location:../View/Login.php");
    exit();
}
?>