<?php

session_start(); 


$fieldNames = array(
    'type' => '',
    'threshold' => '',
    'notificationMethod' => '',
    'accountNo'=>'',
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

$type= isset($_COOKIE['type']) ? $_COOKIE['type'] : '';
$threshold= isset($_COOKIE['threshold']) ? $_COOKIE['threshold'] : '';
$notificationMethod = isset($_COOKIE['notificationMethod']) ? $_COOKIE['notificationMethod'] : '';
$accountNo = isset($_COOKIE['accountNo']) ? $_COOKIE['accountNo'] : '';
?>

<html>
<head>
    <title>Send Alert</title>
    <link rel="stylesheet" type="text/css" href="../View/external.css">
    <script src="../View/JS/alert.js"></script>
</head>

<body style = "margin:0">
    <?php include 'header.html'; ?>
    <?php include 'navigation.html'; ?>
    <center>
    
    <table><tr><td><img src="alert.png" alt="reg" style="width: 250; height: auto; "></td>
    <td><p style="font-size: 40px; color: #4d68b4;">Send Alert<p></td></tr></table><hr>
    <form action="../Controller/alert.php" method="POST" onsubmit="return validateAlert()" novalidate autocomplete="off" style= "background-color: #d2f5f6;">
    <fieldset>
    <table>
    <tr>
    <td>Alert Type</td>
    <td>
        <input type="text" id="type" name="type" value="<?= $type ?>">
        <span id="errorType" style="color: red;"></span>
        <?php echoErrorMessage('type'); ?>
    </td>
</tr>
<tr>
    <td>Account Number</td>
    <td>
        <input type="text" id="accountNo" name="accountNo" value="<?= $accountNo ?>">
        <span id="errorAccountNo" style="color: red;"></span>
        <?php echoErrorMessage('accountNo'); ?>
    </td>
</tr>
<tr>
    <td>Threshold</td>
    <td>
        <input type="text" id="threshold" name="threshold" value="<?= $threshold ?>">
        <span id="errorThreshold" style="color: red;"></span>
        <?php echoErrorMessage('threshold'); ?>
    </td>
</tr>

<tr>
    <td>Notification Method</td>
    <td>
        <input type="text" id="notificationMethod" name="notificationMethod" value="<?= $notificationMethod ?>">
        <span id="errorNotificationMethod" style="color: red;"></span>
        <?php echoErrorMessage('notificationMethod'); ?>
    </td>
</tr>

<tr>
    <td><input type="submit" name="confirm" value="Send" class="addCustomer-btn"></td>
</tr>
</table>
</fieldset>
</form>
</center>

<a href="../Controller/logout.php" class="logout-btn" style="width: 65px; height: 20px;">Logout ⤿</a>

<?php include 'footer.html'; ?>

</body>
</html>
