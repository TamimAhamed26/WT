<?php

session_start(); 


$fieldNames = array(
    'purpose' => '',
    'monthlyIncome' => '',
    'amount' => '',
    'phone'=>'',
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

$purpose = isset($_COOKIE['purpose']) ? $_COOKIE['purpose'] : '';
$monthlyIncome = isset($_COOKIE['monthlyIncome']) ? $_COOKIE['monthlyIncome'] : '';
$amount = isset($_COOKIE['amount']) ? $_COOKIE['amount'] : '';
$phone = isset($_COOKIE['phone']) ? $_COOKIE['phone'] : '';
?>

<html>
<head>
    <title>Application for Loan</title>
    <link rel="stylesheet" type="text/css" href="../View/external.css">
    <script src="../View/JS/loan.js"></script>
</head>

<body style = "margin:0">
    <?php include 'header.html'; ?>
    <?php include 'navigation.html'; ?>
    <center>
    
    <table><tr><td><img src="loan.png" alt="reg" style="width: 250; height: auto; "></td>
    <td><p style="font-size: 40px; color: #4d68b4;">Application for loan<p></td></tr></table><hr>
    <form action="../Controller/loan.php" method="POST" onsubmit="return validateLoan()" novalidate autocomplete="off" style= "background-color: #d2f5f6;">
    <fieldset>
    <table>
    <tr>
    <td>Purpose</td>
    <td>
        <input type="text" id="purpose" name="purpose" value="<?= $purpose ?>">
        <span id="errorPurpose" style="color: red;"></span>
        <?php echoErrorMessage('purpose'); ?>
    </td>
</tr>
<tr>
    <td>Monthly Income</td>
    <td>
        <input type="text" id="monthlyIncome" name="monthlyIncome" value="<?= $monthlyIncome ?>">
        <span id="errorMonthlyIncome" style="color: red;"></span>
        <?php echoErrorMessage('monthlyIncome'); ?>
    </td>
</tr>
<tr>
    <td>Loan Amount</td>
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
    <td>Phone</td>
    <td>
        <input type="text" id="phone" name="phone" value="<?= $phone ?>">
        <span id="errorPhone" style="color: red;"></span>
        <?php echoErrorMessage('phone'); ?>
    </td>
</tr>

<tr>
    <td><input type="submit" name="confirm" value="Apply" class="addCustomer-btn"></td>
    
</tr>
</table>
</fieldset>
</form>
</center>

<a href="../Controller/logout.php" class="logout-btn" style="width: 65px; height: 20px;">Logout ⤿</a>

<?php include 'footer.html'; ?>

</body>
</html>
