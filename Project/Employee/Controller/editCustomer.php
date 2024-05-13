<?php
require_once '../Model/database_model.php';
require_once '../Controller/validation_model.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userinfo = getCustomer($_SESSION['username']);
$currentEmail = $userinfo['email'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $holderName = validateField("holderName", "Holder name is a required field");
    $fatherName = validateField("fatherName", "Father name is required");
    $motherName = validateField("motherName", "Mother name is required");
    $msg = validateField("message", "Details are required");
    $postcode = validatePostField("postCode", "Postcode is required");
    $email = validateEmail("email", "Email is required");
    $website = validateWebsite("website", "Website is required");
    $phone = validatePhone("phone", "Phone is required");
    $gender = validateField("gender", "Gender is required");
    $bloodGroup =  validateField("bloodGroup", "Blood Group is required");
    $city = validateField("city", "City is required");
    $religion = validateField("religion", "Religion is required");
    $country = validateField("country", "Country is required");

    $existingEmail = getCustomerEmailExcept($email, $_SESSION['username']);
    if ($existingEmail && $email !== $currentEmail) {
        $_SESSION['email_error'] = "Email already exists. Please use a different email.";
        header("Location: ../View/edit_customer.php");
        exit();
    }
    if (empty($_SESSION['holderName_error']) && empty($_SESSION['religion_error']) && empty($_SESSION['bloodGroup_error']) && empty($_SESSION['fatherName_error']) && empty($_SESSION['motherName_error']) && empty($_SESSION['message_error']) && empty($_SESSION['email_error']) && empty($_SESSION['postcode_error']) && empty($_SESSION['city_error']) && empty($_SESSION['country_error']) && empty($_SESSION['website_error']) && empty($_SESSION['gender_error'])){
        $user = array(
            'holder_name' => $holderName,
            'father_name' => $fatherName,
            'mother_name' => $motherName,
            'message' => $msg,
            'postCode' => $postcode,
            'email' => $email,
            'website' => $website,
            'phone' => $phone,
            'gender' => $gender,
            'blood_group' => $bloodGroup,
            'religion' => $religion,
            'city' => $city,
            'country' => $country
    );

    $username = $_SESSION['username'];
    if (editCustomer($username, $user)) {
        $updatedUserInfo = getCustomer($username);
        $_SESSION['cusInfo'] = $updatedUserInfo;
        header("Location: ../View/manage_customer.php");
        exit();
    } 
}
else {
    header("Location: ../View/edit_customer.php");
    exit();
}

} else {
    header("Location: ../View/Login.php");
    exit();
}
?>