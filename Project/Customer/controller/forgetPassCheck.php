<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../model/validation_model.php';
require_once '../model/user_model.php';

// forgetpassmerchant.php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $username = test_input($_POST['username']);
    $_SESSION['username'] = $username;

    if (empty(getuser($username))) {
        $_SESSION['user_error'] = "Username is not correct";
        header("Location:../View/forgetpass.php");
        exit();
    } else {
        $otp = generateOTP(); // Generate a new OTP
        saveOTP($otp); // Save the OTP to file
        header("Location:../View/otp.php");
        exit();
    }
}

// otpcheck.php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['otp'])) {
    $otp = test_input($_POST['otp']);
    $saved_otp = getSavedOTP(); // Retrieve the saved OTP from file

    if ($otp == $saved_otp) {
        header("Location:../View/newpass.php");
        exit();
    } else {
        $_SESSION['otp_error'] = "OTP is not correct";
        header("Location:../View/otp.php");
        exit();
    }
}

// newpasscheck.php
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

// Function to generate a new 4-digit OTP
function generateOTP() {
    $otp = mt_rand(1000, 9999); // Generate a random 4-digit OTP
    return $otp;
}

// Function to save OTP to file
function saveOTP($otp) {
    if (file_put_contents('../controller/password.txt', $otp) !== false) {
        echo "OTP saved successfully<br>"; // Debug output
    } else {
        echo "Failed to save OTP<br>"; // Debug output
    }
}

// Function to retrieve the saved OTP from file
function getSavedOTP() {
    return file_get_contents("password.txt");
}
?>
