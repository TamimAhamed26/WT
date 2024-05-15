<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../model/querry.php';
require_once 'validation.php';

$userinfo=$_SESSION['userInfo'];
$username=$userinfo['Username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = validateField("firstname", "First name is empty");
    $lastname = validateField("lastname", "Last name is empty");
    $nid=validateNIDNumber("nid", "NID is empty"); 
    $presentaddress = validateAddressField("presentaddress", "Present address is empty");
    $permanentaddress = validateAddressField("permanentaddress", "Permanent address is empty");
    $phonenumber = validatePhone("phonenumber", "Phone number is empty");
    $email = validateEmail("email", "Email is empty");
         
    if (empty($_SESSION['firstnameerror']) && empty($_SESSION['lastnameerror']) && empty($_SESSION['presentaddresserror']) && empty($_SESSION['permanentaddresserror']) && empty($_SESSION['phonenumbererror']) && empty($_SESSION['emailerror'])) {
        if (updateUser($username, $firstname, $lastname, $nid, $presentaddress, $permanentaddress, $phonenumber, $email)==true) {
            $_SESSION['success_message'] = "Registration successful!";
            header("Location: ../view/login.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Registration failed. Please try again later.";
            header("Location: ../view/updateprofile.php");
            exit();
        }
    } 
    else {
      
        header("Location: ../view/updateprofile.php");
        exit();
    }
}
else{
    header("Location: ../view/login.php");
        exit();
}

?>