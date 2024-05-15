<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['username'])) {
    header("Location: ../View/user_dashboard.php"); 
}
require_once '../model/user_model.php';
require_once '../model/validation_model.php';


$user_name = $password = $confirm_password = $first_name = $last_name = $father_name = $mother_name = $blood_group = $religion = $email = $phone = $website = $country = $city = $address = $postcode = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password=test_input($_POST['password']);
    $confirm_password=test_input($_POST['confirm-password']);
    $password = validatePassword($password, $confirm_password);
    $user_name = validateField("user-name", "User name is empty");
    $email = validateEmail("email", "Email is a required field");
    $website = validateWebsite("website", "Website is a required field");
    $first_name = validateField("first-name", "First name is empty");
    $last_name = validateField("last-name", "Last name is empty");
    $father_name = validateField("father-name", "Father name is empty");
    $mother_name = validateField("mother-name", "Mother name is empty");
       //  username already exists
       $existingUser = getUser($user_name);
       if ($existingUser) {
           $_SESSION['user-name_error'] = "Username already exists. Please choose a different username.";
           header("Location: ../View/signup.php");
           exit();
       }
       // email already exists
       $existingEmail = getUserEmail($email);
       if ($existingEmail) {
           $_SESSION['email_error'] = "Email already exists. Please use a different email.";
           header("Location: ../View/signup.php");
           exit();
       }
    $postcode = validatePostField("postcode", "Postcode is empty");
    $phone = validatePhone("phone", "Phone is empty");
    $gender = validateRadioButton("gender", "Gender is empty");
    $address = validateAddressField("message", "Address is empty");
    $blood_group = validateSelect("blood-group", "Please select a blood group");
    $religion = validateSelect("religion", "Please select a religion");
    $country = validateSelect("country", "Please select a country");
    $city = validateSelect("city", "Please select a city");
    if (empty($_SESSION)) {
        $user = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'father_name' => $father_name,
            'mother_name' => $mother_name,
            'message' => $address,
            'postcode' => $postcode,
            'username' => $user_name,
            'password' => $password,
            'email' => $email,
            'website' => $website,
            'phone' => $phone,
            'gender' => $gender,
            'blood_group' => $blood_group,
            'religion' => $religion,
            'city' => $city,
            'country' => $country
        );

        // Register user
        if (registerUser($user)) {
            $_SESSION['success_message'] = "Registration successful!";
            header("Location: ../View/login.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Registration failed. Please try again later.";
            echo"error";
            header("Location: ../View/signup.php");
            exit();
        }
    } else {
        // Validation errors 
        header("Location: ../View/signup.php");
        exit();
    }
}



else {
    header("Location: ../View/login.php");
    exit();
}
?>