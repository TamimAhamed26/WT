<?php
require_once '../Model/database_model.php';
require_once '../Controller/validation_model.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$accountNo = $amount = $description = $type = "";

if  ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
    $accountNo = validateNID("accountNo", "Account number invalid");
    $amount = validateAmount("amount", "Amount has to be between 500 to 50000");
    $description = validateField("description", "Write atleast NULL");
    $type = validateField("type", "Select a type");

    if (empty($_SESSION)) {
    $transaction = array(
        'accountNo' => $accountNo,
        'amount' => $amount,
        'description' => $description,
        'type' => $type,
    );

    if (addTransaction($transaction)) {
        $_SESSION['success_message'] = "Transaction added successfully!";
        header("Location: ../View/employee_dashboard.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Adding failed. Please try again!";
        header("Location: ../View/WithdrawDeposit.php");
        exit();
    }
}
 else {
    header("Location: ../View/WithdrawDeposit.php");
    exit();
}
}
else {
    header("Location: ../View/WithdrawDeposit.php");
    exit();
}

?>
