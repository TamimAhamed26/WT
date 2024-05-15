<?php

include '../model/database.php';


$errorMsg = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $amount = $_POST["amount"];
    $type = $_POST["type"];
    $paymentMethod = $_POST["paymentMethod"];

   
    if (empty($amount) || empty($type) || empty($paymentMethod)) {
        $errorMsg = "Please fill out all fields.";
    } else {
    
        $success = payBill($amount, $type, $paymentMethod);
        
        if ($success) {
            echo "Payment  successful!";

        } else {
            echo "Failed to process payment.";
        }
    }
}
?>

