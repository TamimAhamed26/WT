<?php
session_start(); 
require_once 'validation_functions.php';

$user_name = $password = $confirm_password = $first_name = $last_name = $father_name = $mother_name = $blood_group = $religion = $email = $phone = $website = $country = $city = $address = $postcode = "";


if (isset($_POST['save_draft'])) {
    foreach ($_POST as $key => $value) {
        setcookie($key, test_input($value), time() + (86400 * 30), "/");
    }
 //to local time
    date_default_timezone_set('Asia/Dhaka');
    setcookie('last_modified', date("Y-m-d H:i:s"), time() + (86400 * 30), "/");
   
    header("Location: ../Views/l-2.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = validatePassword($password, $confirm_password);
    $email = validateEmail("email", "Email is a required field");
    $website = validateWebsite("website", "Website is a required field");
    $first_name = validateField("first-name", "First name is empty");
    $last_name = validateField("last-name", "Last name is empty");
    $father_name = validateField("father-name", "Father name is empty");
    $mother_name = validateField("mother-name", "Mother name is empty");
    $user_name = validateField("user-name", "User name is empty");
    $postcode = validatePostField("postcode", "Postcode is empty");
    $phone = validatePhone("phone", "Phone is empty");
    $gender = validateRadioButton("gender", "Gender is empty");
    $address = validateAddressField("message", "Address is empty");
    $blood_group = validateSelect("blood-group", "Please select a blood group");
    $religion = validateSelect("religion", "Please select a religion");
    $country = validateSelect("country", "Please select a country");
    $city = validateSelect("city", "Please select a city");

    if (!empty($_SESSION)) {
        header("Location: ../Views/l-2.php");
        exit();
}
}























if (!empty($_SESSION)) {
    header("Location: ../Views/l-2.php");
    exit();
}
?>