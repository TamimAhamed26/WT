<?php
session_start();
require_once '../model/user_model.php';
require_once '../model/validation_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['delete'];
    deleteEmployee($id);
    header("Location: ../View/modify_emp.php");
    exit();
}
// Check if form submitted and Add button clicked
elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Add'])) {
    // Validate form fields
    $email = validateEmail("email", "Email is a required field");
    $first_name = validateField("first_name", "First name is empty");
    $last_name = validateField("last_name", "Last name is empty");
    $phone = validatePhone("phone_number", "Phone is empty");
    $gender = validateRadioButton("gender", "Gender is empty");
    $address = validateAddressField("street_address", "Address is empty");
    $city = validateField("city", "City is empty");
    $postcode = validatePostField("postal_code", "Postcode is empty");
    $state = validateField("State", "State is empty");
    $username = validateField("username", "Username is empty");
    $password = validatePassword($_POST['password'], $_POST['password']);
    $dob = validateDOB("date_of_birth", "Date of birth is empty");

    // Check for existing username
    $existingUser = getEmp($username);
    if ($existingUser) {
        $_SESSION['username_error'] = "Username already exists. Please choose a different username.";
    }

    // Check for existing email
    $existingEmail = getEmpEmail($email);
    if ($existingEmail) {
        $_SESSION['email_error'] = "Email already exists. Please use a different email.";
    }

    // If no errors, add the employee
    if(empty($_SESSION['username_error']) && empty($_SESSION['email_error']) && empty($_SESSION['first_name_error']) && empty($_SESSION['last_name_error']) 
    && empty($_SESSION['phone_error']) && empty($_SESSION['password_error']) && empty($_SESSION['email_error']) && empty($_SESSION['street_address_error']) && empty($_SESSION['city_error']) && empty($_SESSION['postal_code_error']) && empty($_SESSION['State_error']) && empty($_SESSION['date_of_birth_error'])) {
        $emp = array(
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
            'postal_code' => $postcode
        );

        addEmployee($emp);
    }

    
    header("Location: ../View/modify_emp.php");
    exit();
}
elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['update'];
  
    $employee = getEmpById($id);
        $_SESSION['employee'] = $employee;
        header("Location: ../View/update_emp.php");
        exit();
    } else {
        // Handle error, perhaps employee not found
    }

?>
