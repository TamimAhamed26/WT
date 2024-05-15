<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../model/db.php';
require_once '../model/querry.php';
require_once '../controller/validation.php';

$userinfo=$_SESSION['userInfo'];

$id = $userinfo['Serial'];
$name = $userinfo['FirstName'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = validatedropbox("product", "Product name is empty");
    $price = validateNIDNumber("price", "Price is empty");
    $customernmbr=validatePhone("customernmbr", "NID is empty"); 
    $method = validatedropbox("method", "Select one method");
    $billingaddress = validateAddressField("billingaddress", "Billing address is empty");
    $inventory=getsingleinventoryforpay($product);
    $soldproduct = $inventory['Sold_product'];
    $inventoryproduct = $inventory['Product_inventory'];
    $serial = $inventory['Serial'];

    if($inventoryproduct!=0){
            
        if (empty($_SESSION['producterror']) && empty($_SESSION['priceeerror']) && empty($_SESSION['customernmbrerror']) && empty($_SESSION['methoderror']) && empty($_SESSION['billingaddresserror'])) {
            if (addnewpayment($id, $name, $product, $price, $customernmbr, $method, $billingaddress)) {
                $_SESSION['success_message'] = "Registration successful!";

                $soldproduct = $soldproduct+1;
                $inventoryproduct = $inventoryproduct-1;
                if(updateinventory($inventoryproduct, $soldproduct, $serial)){

                header("Location: ../view/paymentview.php");
                exit();
                }
            }
            else {
                $_SESSION['error_message'] = "Registration failed. Please try again later.";
                header("Location: ../view/signup.php");
                exit();
            }
        }
        else {
        
            header("Location: ../view/paymentview.php");
            exit();
        }
    }
    else{
        $_SESSION['inventoryError'] = "You don't have enough product in inventory.";
    }
}
else{
    header("Location: ../view/login.php");
            exit();
}

?>