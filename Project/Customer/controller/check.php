<?php
include  '../model/withdrawl.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $type = $_POST['type'];

    // Validate input
    if (!is_numeric($amount) || $amount <= 0) {
        echo "Invalid amount!";
        exit;
    }

    // Perform transaction
    if ($type === "withdrawal") {
        $result = withdrawAmount($amount);
    } elseif ($type === "deposit") {
        $result = depositAmount($amount);
    }

    if ($result) {
        echo "Transaction successful!";
    } else {
        echo "Transaction failed!";
    }
}
?>
