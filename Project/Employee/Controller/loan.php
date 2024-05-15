<?php
require_once '../Model/database_model.php';
require_once '../Controller/validation_model.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if  ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
    // Validate form fields
    $purpose = validateField("purpose", "Purpose is a required field");
    $phone = validatePhone("phone", "phone is required");
    $amount = validateAmount("amount", "amount is required");
    $monthlyIncome = validateAmount("monthlyIncome", "required");

        $customer = array(
            'purpose' => $purpose,
            'phone' => $phone,
            'amount' => $amount,
            'monthlyIncome' => $monthlyIncome,
        );

        if (addLoan($customer)) {
            $_SESSION['success_message'] = "Loanadded successfully!";
            header("Location: ../View/employee_dashboard.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Adding customer failed. Please try again!";
            header("Location: ../View/loan.php");
            exit();
        }
    } else {
        header("Location: ../View/loan.php");
       //header("Location: ../View/manage_customer.php");
        exit();
    }

?>