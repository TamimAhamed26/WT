<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        header("location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Monitoring</title>
    <link rel="stylesheet" type="text/css" href="CSS/trans_monit.css">
</head>
<body>
<div align="right">
        <a href="user_dashboard.php">Back</a>
    </div>
    
    <h1>Transaction Monitoring</h1>
    <form action="../controller/trans_process.php" method="POST" novalidate>
        <fieldset>
            <legend>Transaction Details</legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Customer ID</th>
                        <th>Transcation Type</th>
                        <th>Amount</th>
                        <th>Transaction Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../model/user_model.php'; 
                    $transactions = getAllTransactions();
                    foreach ($transactions as $transaction) {
                        ?>
                        <tr>
                            <td><?php echo $transaction['transc_id']; ?></td>
                            <td><?php echo $transaction['customer_id']; ?></td>
                            <td><?php echo $transaction['transc_type']; ?></td>
                            <td><?php echo $transaction['amount']; ?></td>
                            <td><?php echo $transaction['transaction_date']; ?></td>
                            <td><?php echo $transaction['status']; ?></td>

                            <td>
                                    <button type="submit" name="block" value="<?php echo $transaction['transc_id']; ?>">Block</button>
                                    <button type="submit" name="unblock" value="<?php echo $transaction['transc_id'];?>">Unblock</button>
                              
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </fieldset>
    </form>
</body>
</html>
