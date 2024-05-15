<?php
require_once '../Model/database_model.php';
require_once '../Controller/validation_model.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if  ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
    // Validate form fields
    $type = validateField("type", "type is a required field");
    $accountNo = validateNID("accountNo", "Account number is required");
    $threshold = validateAmount("threshold", "thresholdis required");
    $notificationMethod = validateField("notificationMethod", "Write atleast null");

        $customer = array(
            'type ' => $type ,
            'accountNo' => $accountNo,
            'threshold' => $threshold,
            'notificationMethod' => $notificationMethod,
        );

        if (addAlert($customer)) {
            $_SESSION['success_message'] = "Alert added successfully!";
            header("Location: ../View/employee_dashboard.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Adding alert failed. Please try again!";
            header("Location: ../View/alert.php");
            exit();
        }
    } else {
        header("Location: ../View/alert.php");
       //header("Location: ../View/manage_customer.php");
        exit();
    }

?>