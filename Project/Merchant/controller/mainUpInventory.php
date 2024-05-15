<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../model/querry.php';
require_once 'validation.php';

$userinfo=$_SESSION['userInfo'];
$username=$userinfo['Username'];

$inventory = $_SESSION['SIngle_inventory'];
$serial = $inventory['Serial'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productInventory = validateNIDNumber("productInventory", "Can not be empty");
    $sold = validateNIDNumber("sold", "Can not be empty");
    
         
    if (empty($_SESSION['productInventoryerror']) && empty($_SESSION['solderror']) ) {
        if (updateinventory($productInventory, $sold, $serial)==true) {
            $_SESSION['success_message'] = "Registration successful!";
            header("Location: ../view/inventory.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Registration failed. Please try again later.";
            header("Location: ../view/upinventory.php");
            exit();
        }
    } 
    else {
      
        header("Location: ../view/upinventory.php");
        exit();
    }
}
else{
    header("Location: ../view/login.php");
        exit();
}

?>