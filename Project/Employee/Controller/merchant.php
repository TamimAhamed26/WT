<?php
require_once '../Model/database_model.php';
require_once '../Controller/validation_model.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userinfo = getMerchant($_SESSION['Username']);
$currentEmail = $userinfo['Email'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteMerchant'])) {
    $id = $_POST['deleteMerchant'];
    deleteMerchant($id);
    header("Location: ../View/manage_merchant.php");
    exit();
}
// Check if form submitted and Add button clicked
else if  ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addMerchant'])) {
    // Validate form fields
    $Password = test_input($_POST['Password']);
    $confirmPassword = test_input($_POST['confirmPassword']);
    $FirstName = validateField("FirstName", "First name is a required field");
    $LastName = validateField("LastName", "Last name is required");
    $NID = validateNID("NID", "NID is required");
    $PresentAddress= validateField("PresentAddress", "Present Address is required");
    $PermanentAddress = validateField("PermanentAddress", "Permanent Address is required");
    $Username = validateField("Username", "Username is required");
    $Password = validatePassword($Password, $confirmPassword);
    $Email = validateEmail("Email", "Email is required");
    $PhoneNumber = validatePhone("PhoneNumber", "Phone is required");
    // Check for existing username
    $existingUser = getMerchantById($Username);
    if ($existingUser) {
        $_SESSION['Username_error'] = "Username already exists. Please choose a different username.";
    }

    // Check for existing email
    $existingEmail = getMerchantEmail($Email);
    if ($existingEmail) {
        $_SESSION['Email_error'] = "Email already exists. Please use a different email.";
    }

    if (
        empty($_SESSION['Username_error']) && empty($_SESSION['Email_error'])
    ) {
        $merchant = array(
            'FirstName' => $FirstName,
            'LastName' => $LastName,
            'NID' => $NID,
            'PresentAddress' => $PresentAddress,
            'PermanentAddress' => $PermanentAddress,
            'Username' => $Username,
            'Password' => $Password,
            'Email' => $Email,
            'PhoneNumber' => $PhoneNumber
        );

        if (addMerchant($merchant)) {
            $_SESSION['success_message'] = "Merchant added successfully!";
            header("Location: ../View/manage_merchant.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Adding merchant failed. Please try again!";
            header("Location: ../View/add_merchant.php");
            exit();
        }
    } else {
        header("Location: ../View/add_merchant.php");
       //header("Location: ../View/manage_customer.php");
        exit();
    }
}

 else {
    header("Location: ../View/manage_merchant.php");
    exit();
}
?>