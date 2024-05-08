<?php
session_start();
require_once '../model/user_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['block'])) {
        $transaction_id = $_POST['block'];
        $transaction = getTransactionById($transaction_id);

        // transaction type is 'Deposit' and amount is less than 500
        if ($transaction['transc_type'] == 'Deposit' && $transaction['amount'] < 500) {
            updateTransactionStatus($transaction_id, 'Inactive');
        }
        
        //  transaction type is 'Transfer' and amount is not within the range
        if ($transaction['transc_type'] == 'Transfer' && ($transaction['amount'] < 100 || $transaction['amount'] > 100000)) {
            updateTransactionStatus($transaction_id, 'Inactive');
        }

        // transaction type is 'Withdrawal' and amount is not within the range
        if ($transaction['transc_type'] == 'Withdrawal' && ($transaction['amount'] < 100 || $transaction['amount'] > 40000)) {
            updateTransactionStatus($transaction_id, 'Inactive');
        }
    }

    if (isset($_POST['unblock'])) {
        $transaction_id = $_POST['unblock'];
        $transaction = getTransactionById($transaction_id);

        //  transaction type is 'Deposit' and amount is greater than or equal to 500
        if ($transaction['transc_type'] == 'Deposit' && $transaction['amount'] >= 500) {
            updateTransactionStatus($transaction_id, 'Active');
        }
        
        // transaction type is 'Transfer' and amount is within the range
        if ($transaction['transc_type'] == 'Transfer' && ($transaction['amount'] >= 100 && $transaction['amount'] <= 100000)) {
            updateTransactionStatus($transaction_id, 'Active');
        }

        // transaction type is 'Withdrawal' and amount is within the range
        if ($transaction['transc_type'] == 'Withdrawal' && ($transaction['amount'] >= 100 && $transaction['amount'] <= 40000)) {
            updateTransactionStatus($transaction_id, 'Active');
        }
    }

   
    header("Location: ../View/transcation_monitoring.php");
    exit();
} else {
    header("Location: ../View/user_dashboard.php");
    exit();
}
?>
