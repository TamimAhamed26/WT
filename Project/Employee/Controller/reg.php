<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../Model/database_model.php';
require_once '../Controller/validation_model.php';

$username = $password = $confirmPassword = $firstName = $lastName = $gender = $phoneNumber = $dateOfBirth =$email = $streetAddress = $city = $state = $postalCode = "";

if (isset($_POST['Save'])) {
    // Handle the draft saving process here
    foreach ($_POST as $key => $value) {
        setcookie($key, test_input($value), time() + (86400 * 1), "/"); // 
    }
    // Set last_modified cookie
    date_default_timezone_set('Asia/Dhaka');
    setcookie('lastModified', date("Y-m-d H:i:s"), time() + (86400 * 1), "/"); 

    // Clear the session after saving the draft
    session_unset();
    session_destroy();

    header("Location: ../View/Registration.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password=test_input($_POST['password']);
    $confirmPassword=test_input($_POST['confirmPassword']);
    $firstName = validateField("firstName", "First name is empty!");
    $lastName = validateField("lastName", "Last name is empty!");
    $gender = validateRadioButton("gender", "Gender is empty!");
    $phoneNumber = validatePhone("phoneNumber", "Phone is empty!");
    $email = validateEmail("email", "Email is empty!");
    $streetAddress = validateField("streetAddress", "Street Address is empty!");
    $city = validateField("city", "City is empty!");
    $state = validateField("state", "State/Province is empty!");
    $postalCode = validatePostField("postalCode", "Postal/Zip code is empty!");
    $username = validateField("username", "Username is empty!");
    $password = validatePassword($password, $confirmPassword);
    $dateOfBirth = validateDOB("dateOfBirth", "Date of Birth is empty!");

    $existingUser = getEmployee($username);
       if ($existingUser) {
           $_SESSION['username_error'] = "Username already exists. Please, choose a different username.";
           header("Location: ../View/Registration.php");
           exit();
       }

    // Check for existing email
    $existingEmail = getEmployeeEmail($email);
    if ($existingEmail) {
        $_SESSION['email_error'] = "Email already exists. Please use a different email.";
    }

    if (empty($_SESSION)) {
        $employee = array(
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
            'username' => $username,
            'password' => $password,
        );

        // Register the user
        if (registerEmployee($employee)) {
            $_SESSION['success_message'] = "Registration successful!";
            header("Location: ../View/Login.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Registration failed. Please try again!";
            echo"error";
            header("Location: ../View/Registration.php");
            exit();
        }
    } else {
        // Validation errors occurred, redirect back to signup page with error messages
        header("Location: ../View/Registration.php");
        exit();
    }
}
else {
    header("Location: ../View/Login.php");
    exit();
}
?>