<?php

require_once '../Model/database_model.php';
require_once '../Controller/validation_model.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userinfo = getEmployee($_SESSION['username']);
$currentEmail = $userinfo['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = validateField("firstName", "First name is empty!");
    $lastName = validateField("lastName", "Last name is empty!");
    $gender = validateRadioButton("gender", "Gender is empty!");
    $phoneNumber = validatePhone("phoneNumber", "Phone is empty!");
    $email = validateEmail("email", "Email is empty!");
    $streetAddress = validateField("streetAddress", "Street Address is empty!");
    $city = validateField("city", "City is empty!");
    $state = validateField("state", "State/Province is empty!");
    $postalCode = validatePostField("postalCode", "Postal/Zip code is empty!");
    $dateOfBirth= validateDOB("dateOfBirth", "DOB is empty!");

    $existingEmail = getEmployeeEmailExcept($email, $_SESSION['username']);
    if ($existingEmail && $email !== $currentEmail) {
        $_SESSION['email_error'] = "Email already exists. Please use a different email.";
        header("Location: ../View/updateProfile.php");
        exit();
    }

    if (empty($_SESSION['firstName_error'])  && empty($_SESSION['lastName_error']) && empty($_SESSION['gender_error']) && empty($_SESSION['phoneNumber_error']) && empty($_SESSION['email_error']) && empty($_SESSION['dateOfBirth_error']) && empty($_SESSION['streetAddress_error']) && empty($_SESSION['city_error']) && empty($_SESSION['state_error']) && empty($_SESSION['postalCode_error'])){
            $user = array(
                'first_name' => $firstName,
                'last_name' => $lastName,
                'gender'=> $gender,
                'phone_number'=> $phoneNumber,
                'date_of_birth' => $dateOfBirth,
                'email' => $email,
                'street_address'=> $streetAddress,
                'city'=> $city,
                'State'=> $state,
                'postal_code'=> $postalCode,
        );

        $username = $_SESSION['username'];
        if (updateEmployeeProfile($username, $user)) {
            $updatedUserInfo = getEmployee($username);
            $_SESSION['userInfo'] = $updatedUserInfo;
            header("Location: ../View/employee_dashboard.php");
            exit();
        } 
    }
    else {
        header("Location: ../View/updateProfile.php");
        exit();
    }
} else {
    header("Location: ../View/Login.php");
    exit();
}
?>