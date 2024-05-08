<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../model/validation_model.php';
require_once '../model/user_model.php';

// forgetpass
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $username = test_input($_POST['username']);
    $_SESSION['username'] = $username;

    if (!getuser($username)) { 
        $_SESSION['user_error'] = "Username is not correct";
        header("Location:../View/forgetpass.php");
        exit();
    } else {
        generateAndSavePassword();
        header("Location:../View/otp.php");
        exit();
    }
}


// otpcheck
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

// newpasscheck
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Pass'])) {
    $temp = test_input($_POST['Pass']);
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
        if (updatePassword($username, $newpass)) {
            header("Location:../View/login.php");
            exit();
        } else {
            $_SESSION['newpass_error'] = "Failed to update password. Please try again later.";
            header("Location:../View/newpass.php");
            exit();
        }
    } else {
        header("Location:../View/forgetpass.php");
        exit();
    }
} else {
    header("Location:../View/login.php");
    exit();
}
?>