<?php
require_once '../Model/database_model.php';
require_once '../Controller/validation_model.php';

session_start(); 


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editCustomer'])) {
    $holder = validateField("holderName", "Holder name is a required field");
    $father = validateField("fatherName", "Father name is required");
    $mother = validateField("motherName", "Mother name is required");
    $msg = validateField("message", "Details are required");
    $post = validatePostField("postCode", "Postcode is required");
    $email = validateEmail("email", "Email is required");
    $website = validateWebsite("website", "Website is required");
    $phone = validatePhone("phone", "Phone is required");
    $gender = validateField("gender", "Gender is required");
    $blood =  validateField("bloodGroup", "Blood Group is required");
    $city = validateField("city", "City is required");
    $religion = validateField("religion", "Religion is required");
    $country = validateField("country", "Country is required");
    $pass=test_input($_POST['password']);
    $password = validatePassword($pass, $pass);
    $user = $_POST['username'];

    if (getCustomerEmailExcept($email, $username)) {
        $_SESSION['email_error'] = "Email already exists. Please use a different email.";
    }
    $id=$_POST['customer_id'];

    if (empty($_SESSION['password_error']) && empty($_SESSION['username_error']) && empty($_SESSION['holderName_error']) && empty($_SESSION['religion_error']) && empty($_SESSION['phone_error']) && empty($_SESSION['bloodGroup_error']) && empty($_SESSION['fatherName_error']) && empty($_SESSION['motherName_error']) && empty($_SESSION['message_error']) && empty($_SESSION['email_error']) && empty($_SESSION['postcode_error']) && empty($_SESSION['city_error']) && empty($_SESSION['country_error']) && empty($_SESSION['website_error']) && empty($_SESSION['gender_error'])) {
        $user = array(
            'username' => $username,
            'password' => $pass,
            'holder_name' => $holder,
            'father_name' => $father,
            'mother_name' => $mother,
            'message' => $msg,
            'postcode' => $post,
            'email' => $email,
            'website' => $website,
            'phone' => $phone,
            'gender' => $gender,
            'blood_group' => $blood,
            'religion' => $religion,
            'city' => $city,
            'country' => $country,
            'customer_id' => $id
        );

        if (editCustomer($user, $id)) {
            header("Location: ../View/manage_customer.php");
            exit();
        } 
    } else {
        header("Location: ../View/edit_customer.php");
       
        exit();
    }
} else {
    header("Location: ../View/Login.php");
    exit();
}
?>
