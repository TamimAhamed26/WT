<?php

session_start(); 


$fieldNames = array(
    'fromAccount' => '',
    'toAccount' => '',
    'amount' => '',
    'description'=>'',
);

foreach ($fieldNames as $fieldName => $value) {
    if (isset($_SESSION[$fieldName . '_error'])) {
        $fieldNames[$fieldName] = $_SESSION[$fieldName . '_error'];
        unset($_SESSION[$fieldName . '_error']);
    }
      
}

function echoErrorMessage($fieldName) {
    global $fieldNames;
    if (($fieldNames[$fieldName])) {
        echo $fieldNames[$fieldName];
    }
}

$fromAccount = isset($_COOKIE['fromAccount']) ? $_COOKIE['fromAccount'] : '';
$toAccount = isset($_COOKIE['toAccount']) ? $_COOKIE['toAccount'] : '';
$amount = isset($_COOKIE['amount']) ? $_COOKIE['amount'] : '';
$description = isset($_COOKIE['description']) ? $_COOKIE['description'] : '';
?>

<html>
<head>
    <title>Transfer Money</title>
    <link rel="stylesheet" type="text/css" href="../View/external.css">
    <script src="../View/JS/transfer.js"></script>
</head>

<body style = "margin:0">
    <?php include 'header.html'; ?>
    <?php include 'navigation.html'; ?>
    <center>
    
    <table><tr><td><img src="transfer.jpg" alt="reg" style="width: 250; height: auto; "></td>
    <td><p style="font-size: 40px; color: #4d68b4;">Transfer Money<p></td></tr></table><hr>
    <form action="../Controller/transfer.php" method="POST" onsubmit="return validateTransfer()" novalidate autocomplete="off" style= "background-color: #d2f5f6;">
    <fieldset>
    <table>
    <tr>
    <td>From Account</td>
    <td>
        <input type="text" id="fromAccount" name="fromAccount" value="<?= $fromAccount ?>">
        <span id="errorFromAccount" style="color: red;"></span>
        <?php echoErrorMessage('fromAccount'); ?>
    </td>
</tr>
<tr>
    <td>To Account</td>
    <td>
        <input type="text" id="toAccount" name="toAccount" value="<?= $toAccount ?>">
        <span id="errorToAccount" style="color: red;"></span>
        <?php echoErrorMessage('toAccount'); ?>
    </td>
</tr>
<tr>
    <td>Amount</td>
    <td>
        <input type="text" id="amount" name="amount" value="<?= $amount ?>">
        <span id="errorAmount" style="color: red;"></span>
        <?php echoErrorMessage('amount'); ?>
    </td>
    <td>
        BDT
    </td>
</tr>

<tr>
    <td>Description</td>
    <td>
        <input type="text" id="description" name="description" value="<?= $description ?>">
        <span id="errorDescription" style="color: red;"></span>
        <?php echoErrorMessage('description'); ?>
    </td>
</tr>

<tr>
    <td><input type="submit" name="confirm" value="Confirm" class="addCustomer-btn"></td>
    <td><a href="../View/WithdrawDeposit.php" class="cancelcustomer-btn">Back</a></td>
</tr>
</table>
</fieldset>
</form>
</center>

<a href="../Controller/logout.php" class="logout-btn" style="width: 65px; height: 20px;">Logout ⤿</a>

<?php include 'footer.html'; ?>

</body>
</html>
