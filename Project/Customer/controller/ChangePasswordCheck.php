<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}
require_once '../model/user_model.php';
require_once '../model/validation_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cur_password = test_input($_POST["cur-passwd"]);
    $new_password = test_input($_POST["new-passwd"]);
    $retype_password = test_input($_POST["re-new-passwd"]);

    if (empty($cur_password) || empty($new_password) || empty($retype_password)) {
        $_SESSION['change_password_error'] = "All fields are required";
        header("Location: ../View/changePassword.php");
        exit();
    }


    validatePassword($new_password, $retype_password);
    if (isset($_SESSION['password_error'])) {
        $_SESSION['change_password_error'] = "Passwords do not match or do not meet requirements.";
        unset($_SESSION['password_error']); 
        header("Location: ../View/changePassword.php");
        exit();
    }

    $username = $_SESSION['username'];
    if (login($username, $cur_password)) {
        // Update the password
        if (updatePassword($username, $new_password)) { 
            $_SESSION['change_password_success'] = "Password changed successfully";
            header("Location:../View/login.php");
            exit();
        } else {
            $_SESSION['change_password_error'] = "Failed to change password. Please try again later.";
            header("Location: ../View/changePassword.php");
            exit();
        }
    } else {
        $_SESSION['change_password_error'] = "Incorrect current password";
        header("Location: ../View/changePassword.php");
        exit();
    }
} else {
    header("Location:../View/changePassword.php");
    exit();
}
?>
