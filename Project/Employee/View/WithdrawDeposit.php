<?php

session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

// Function to set error message in session variable
function setErrorMessage($fieldName, $message) {
    $_SESSION[$fieldName . '_error'] = $message;
}

// Function to retrieve error message from session variable
function getErrorMessage($fieldName) {
    return isset($_SESSION[$fieldName . '_error']) ? $_SESSION[$fieldName . '_error'] : '';
}

$fieldNames = array(
    'accountNo' => '',
    'amount' => '',
    'description' => '',
    'type' => '',
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

$accountNo = isset($_COOKIE['accountNo']) ? $_COOKIE['accountNo'] : '';
$amount= isset($_COOKIE['amount']) ? $_COOKIE['amount'] : '';
$description = isset($_COOKIE['description']) ? $_COOKIE['description'] : '';
$type = isset($_COOKIE['type']) ? $_COOKIE['type'] : '';
?>

<html>
<head>
    <title>Withdraw Or Deposit Money</title>
    <link rel="stylesheet" type="text/css" href="../View/external.css">
    <script src="../View/JS/withdrawDeposit.js"></script>
</head>

<body style = "margin:0">
    <?php include 'header.html'; ?>
    <?php include 'navigation.html'; ?>
    <center>
    
    <table><tr><td><img src="deposit.jpg" alt="reg" style="width: 150; height: auto; "></td>
    <td><p style="font-size: 40px; color: #4d68b4;">Withdraw Or Transfer<p></td></tr></table><hr>
    <form action="../Controller/transaction.php" method="POST"  novalidate onsubmit="return validateDeposit()"  autocomplete="off" style= "background-color: #d2f5f6;">
    <fieldset>
    <table>
    <tr><td></td>
    <td style="text-align: right;">
        <a href="../View/Transfer.php" class="edit-customer-btn" style="width: 65px; height: 20px;">Transfer</a>
    </td>
</tr>
<tr><td><br></td></tr>
    <tr>
    <td>Account Number</td>
    <td>
        <input type="text" id="accountNo" name="accountNo" value="<?= $accountNo ?>">
        <span id="errorAccountNo" style="color: red;"><?= getErrorMessage('accountNo'); ?></span>
        <?php echoErrorMessage('accountNo'); ?>
    </td>
</tr>
<tr>
    <td>Amount</td>
    <td>
        <input type="text" id="amount" name="amount" value="<?= $amount ?>">
        <span id="errorAmount" style="color: red;"><?= getErrorMessage('amount'); ?></span>
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
        <span id="errorDescription" style="color: red;"><?= getErrorMessage('description'); ?></span>
        <?php echoErrorMessage('description'); ?>
    </td>
</tr>

<tr>
    <td>Type</td>
    <td>
        <input type="radio" id="withdraw" name="type" value="withdraw" <?= $type == 'withdraw' ? 'checked' : '' ?>>
        <label for="withdraw">Withdraw</label>
        <input type="radio" id="deposit" name="type" value="deposit" <?= $type == 'deposit' ? 'checked' : '' ?>>
        <label for="deposit">Deposit</label>
        <span id="errorType" style="color: red;"></span>
        <?php echoErrorMessage('type'); ?>
    </td>
</tr>

<tr><td><br></td></tr>

<tr>
    <td><input type="submit" name="confirm" value="Confirm" class="addCustomer-btn"></td>
</tr>
</table>
</fieldset>
</form>
</center>

<a href="../Controller/logout.php" class="logout-btn" style="width: 65px; height: 20px;">Logout ⤿</a>

<?php include 'footer.html'; ?>

</body>
</html>