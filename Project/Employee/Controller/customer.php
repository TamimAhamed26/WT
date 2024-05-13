<?php
require_once '../Model/database_model.php';
require_once '../Controller/validation_model.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userinfo = getCustomer($_SESSION['username']);
$currentEmail = $userinfo['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteCustomer'])) {
    $id = $_POST['deleteCustomer'];
    deleteCustomer($id);
    header("Location: ../View/manage_customer.php");
    exit();
}
// Check if form submitted and Add button clicked
else if  ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addCustomer'])) {
    // Validate form fields
    $password = test_input($_POST['password']);
    $confirmPassword = test_input($_POST['confirmPassword']);
    $holderName = validateField("holderName", "Holder name is a required field");
    $fatherName = validateField("fatherName", "Father name is required");
    $motherName = validateField("motherName", "Mother name is required");
    $msg = validateField("message", "Details are required");
    $postcode = validatePostField("postCode", "Postcode is required");
    $username = validateField("username", "Username is required");
    $password = validatePassword($password, $confirmPassword);
    $email = validateEmail("email", "Email is required");
    $website = validateWebsite("website", "Website is required");
    $phone = validatePhone("phone", "Phone is required");
    $gender = validateField("gender", "Gender is required");
    $bloodGroup = $_POST['bloodGroup'];
    $city = validateField("city", "City is required");
    $religion = validateField("religion", "Religion is required");
    $country = validateField("country", "Country is required");
    $createdAt = $_POST['createdAt']; // No need to validate, as it's automatically generated

    // Check for existing username
    $existingUser = getCustomerById($username);
    if ($existingUser) {
        $_SESSION['username_error'] = "Username already exists. Please choose a different username.";
    }

    // Check for existing email
    $existingEmail = getCustomerEmail($email);
    if ($existingEmail) {
        $_SESSION['email_error'] = "Email already exists. Please use a different email.";
    }

    if (
        empty($_SESSION['username_error']) && empty($_SESSION['email_error'])
    ) {
        $customer = array(
            'holder_name' => $holderName,
            'father_name' => $fatherName,
            'mother_name' => $motherName,
            'message' => $msg,
            'postCode' => $postcode,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'website' => $website,
            'phone' => $phone,
            'gender' => $gender,
            'blood_group' => $bloodGroup,
            'religion' => $religion,
            'city' => $city,
            'country' => $country,
            'created_at' => $createdAt
        );

        if (addCustomer($customer)) {
            $_SESSION['success_message'] = "Customer added successfully!";
            header("Location: ../View/manage_customer.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Adding customer failed. Please try again!";
            header("Location: ../View/add_customer.php");
            exit();
        }
    } else {
        header("Location: ../View/add_customer.php");
       //header("Location: ../View/manage_customer.php");
        exit();
    }
}


 else {
    header("Location: ../View/manage_customer.php");
    exit();
}
?>