<?php
session_start();
require_once '../model/validation_model.php';
require_once '../model/user_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Update_emp'])) {
    // Validate form fields
    $email = validateEmail("email", "Email is a required field");
    $first_name = validateField("firstname", "First name is empty");
    $last_name = validateField("lastname", "Last name is empty");
    $phone = validatePhone("phone_number", "Phone is empty");
    $gender = validateRadioButton("gender", "Gender is empty");
    $address = validateAddressField("street_address", "Address is empty");
    $city = validateField("city", "City is empty");
    $postcode = validatePostField("postal_code", "Postcode is empty");
    $state = validateField("State", "State is empty");
    $pass=test_input($_POST['password']);
    $password = validatePassword($pass, $pass);
    $dob = validateDOB("date_of_birth", "Date of birth is empty");
    $username = $_POST['username'];
    if (getEmpEmailExcept($email, $username)) {
        $_SESSION['email_error'] = "Email already exists. Please use a different email.";
    }
    $id=$_POST['emp_id'];
    if (empty($_SESSION['username_error']) && empty($_SESSION['email_error']) && empty($_SESSION['firstname_error']) && empty($_SESSION['lastname_error']) 
        && empty($_SESSION['phone_number_error']) && empty($_SESSION['password_error'])  && empty($_SESSION['street_address_error']) 
        && empty($_SESSION['city_error']) && empty($_SESSION['postal_code_error']) && empty($_SESSION['State_error']) && empty($_SESSION['date_of_birth_error'])) {
        
        $employee = array(
            'username' => $username,
            'password' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'gender' => $gender,
            'phone_number' => $phone,
            'date_of_birth' => $dob,
            'email' => $email,
            'street_address' => $address,
            'city' => $city,
            'State' => $state,
            'postal_code' => $postcode,
            'emp_id'=>$id
        );

        // Update employee
        if (updateEmp($employee, $id)) {
            header("Location: ../View/modify_emp.php");
            exit();
        } 
    } else {
        header("Location: ../View/update_emp.php");
       
        exit();
    }
} else {
    header("Location: ../View/login.php");
    exit();
}
?>
