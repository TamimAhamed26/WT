<?php
session_start();
require_once '../model/user_model.php';
require_once '../model/validation_model.php';


$userinfo = getUser($_SESSION['username']);
$currentEmail = $userinfo['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = validateEmail("email", "Email is a required field");
    $website = validateWebsite("website", "Website is a required field");
    $first_name = validateField("first-name", "First name is empty");
    $last_name = validateField("last-name", "Last name is empty");
    $father_name = validateField("father-name", "Father name is empty");

    $existingEmail = getUserEmailExcept($email, $_SESSION['username']);
    if ($existingEmail && $email !== $currentEmail) {
        $_SESSION['email_error'] = "Email already exists. Please use a different email.";
        header("Location: ../View/updateProfile.php");
        exit();
    }

    $phone = validatePhone("phone", "Phone is empty");
    $gender = validateRadioButton("gender", "Gender is empty");
    $address = validateAddressField("message", "Address is empty");
    $city = validateSelect("city", "Please select a city");

    if (empty($_SESSION['first-name_error']) && empty($_SESSION['last-name_error']) && empty($_SESSION['website_error']) && empty($_SESSION['phone_error']) && empty($_SESSION['email_error']) && empty($_SESSION['gender_error']) && empty($_SESSION['message_error']) && empty($_SESSION['city_error']) && empty($_SESSION['father-name_error'])) {
        $user = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'father_name' => $father_name,
            'message' => $address,
            'email' => $email,
            'website' => $website,
            'phone' => $phone,
            'gender' => $gender,
            'city' => $city,
        );

        $username = $_SESSION['username'];
        if (updateUserProfile($username, $user)) {
            $updatedUserInfo = getUser($username);
            $_SESSION['userInfo'] = $updatedUserInfo;
            header("Location: ../View/user_dashboard.php");
            exit();
        } 
    }
    else {
        header("Location: ../View/updateProfile.php");
        exit();
    }
} else {
    header("Location: ../View/login.php");
    exit();
}
?>