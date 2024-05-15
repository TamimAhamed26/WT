<?php
require_once '../Model/database_model.php';
require_once '../Controller/validation_model.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if  ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
    // Validate form fields
    $toAccount = validateNID("toAccount", "Account number is a required field");
    $fromAccount = validateNID("fromAccount", "Account number is required");
    $amount = validateAmount("amount", "amount is required");
    $description = validateField("description", "Write atleast null");

        $customer = array(
            'toAccount' => $toAccount,
            'fromAccount' => $fromAccount,
            'amount' => $amount,
            'description' => $description,
        );

        if (addTransfer($customer)) {
            $_SESSION['success_message'] = "Transfer added successfully!";
            header("Location: ../View/employee_dashboard.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Adding customer failed. Please try again!";
            header("Location: ../View/transfer.php");
            exit();
        }
    } else {
        header("Location: ../View/transfer.php");
       //header("Location: ../View/manage_customer.php");
        exit();
    }

?>