<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../model/db.php';
require_once '../model/querry.php';
require_once '../controller/validation.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = validateField("firstname", "First name is empty");
    $lastname = validateField("lastname", "Last name is empty");
    $nid=validateNIDNumber("nid", "NID is empty"); 
    $presentaddress = validateAddressField("presentaddress", "Present address is empty");
    $permanentaddress = validateAddressField("permanentaddress", "Permanent address is empty");
    $phonenumber = validatePhone("phonenumber", "Phone number is empty");
    $email = validateEmail("email", "Email is empty");
    $username = validateusername("username", "Username is empty");
    $password = validatePassword($_POST['password'], $_POST['confirmpassword']); 
         
    if (empty($_SESSION['firstnameerror']) && empty($_SESSION['lastnameerror']) && empty($_SESSION['presentaddresserror']) && empty($_SESSION['permanentaddresserror']) && empty($_SESSION['phonenumbererror']) && empty($_SESSION['emailerror']) && empty($_SESSION['usernameerror']) && empty($_SESSION['passworderror'])) {
        if (addmarchent($firstname, $lastname, $nid, $presentaddress, $permanentaddress, $phonenumber, $email, $username, $password)) {
            $_SESSION['success_message'] = "Registration successful!";
            header("Location: ../view/login.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Registration failed. Please try again later.";
            header("Location: ../view/signup.php");
            exit();
        }
    } else {
      
        header("Location: ../view/signup.php");
        exit();
    }
}
else{
    header("Location: ../view/signup.php");
        exit();
}
?>