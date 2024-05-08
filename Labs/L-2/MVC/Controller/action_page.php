<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'validation_functions.php';
require_once 'cookie_controller.php';

$user_name = $password = $confirm_password = $first_name = $last_name = $father_name = $mother_name = $blood_group = $religion = $email = $phone = $website = $country = $city = $address = $postcode = "";



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

    if (empty($_SESSION['first-name_error']) && 
    empty($_SESSION['last-name_error']) && 
    empty($_SESSION['father-name_error']) && 
    empty($_SESSION['mother-name_error']) && 
    empty($_SESSION['blood-group_error']) && 
    empty($_SESSION['religion_error']) && 
    empty($_SESSION['email_error']) && 
    empty($_SESSION['phone_error']) && 
    empty($_SESSION['website_error']) && 
    empty($_SESSION['country_error']) && 
    empty($_SESSION['city_error']) && 
    empty($_SESSION['message_error']) && 
    empty($_SESSION['postcode_error']) && 
    empty($_SESSION['user-name_error']) && 
    empty($_SESSION['gender_error']) &&
    empty($_SESSION['password_error'])) {

    header("Location: ../Views/Registration_page.php");
    exit();
} else {
 
    $_SESSION['validated_values'] = [
        'first-name' => $first_name,
        'last-name' => $last_name,
        'father-name' => $father_name,
        'mother-name' => $mother_name,
        'blood-group' => $blood_group,
        'religion' => $religion,
        'email' => $email,
        'phone' => $phone,
        'website' => $website,
        'country' => $country,
        'city' => $city,
        'message' => $address,
        'postcode' => $postcode,
        'user-name' => $user_name,
        'gender' => $gender,
        'password' => $password
    ];
    
    header("Location: ../Views/l-2.php");
    exit();
} 
}
?>