<?php

session_start(); 


$fieldNames = array(
    'FirstName' => '',
    'LastName' => '',
    'NID'=>'',
    'PresentAddress'=>'',
    'PermanentAddress' => '',
    'PhoneNumber' => '',
    'Email' => '',
    'Username'=>'',
    'Password'=>'',
    'confirmPassword'=>'',
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

$FirstName = isset($_COOKIE['FirstName']) ? $_COOKIE['FirstName'] : '';
$LastName = isset($_COOKIE['LastName']) ? $_COOKIE['LastName'] : '';
$NID = isset($_COOKIE['NID']) ? $_COOKIE['NID'] : '';
$PresentAddress = isset($_COOKIE['PresentAddress']) ? $_COOKIE['PresentAddress'] : '';
$PermanentAddress = isset($_COOKIE['PermanentAddress']) ? $_COOKIE['PermanentAddress'] : '';
$PhoneNumber = isset($_COOKIE['PhoneNumber']) ? $_COOKIE['PhoneNumber'] : '';
$Password = isset($_COOKIE['Password']) ? $_COOKIE['Password'] : '';
$confirmPassword = isset($_COOKIE['confirmPassword']) ? $_COOKIE['confirmPassword'] : '';
$Email = isset($_COOKIE['Email']) ? $_COOKIE['Email'] : '';
$PhoneNumber = isset($_COOKIE['PhoneNumber']) ? $_COOKIE['PhoneNumber'] : '';
$Username = isset($_COOKIE['Username']) ? $_COOKIE['Username'] : '';
?>

<html>
<head>
    <title>Add New Merchant</title>
    <link rel="stylesheet" type="text/css" href="../View/external.css">
    <script src="../View/JS/merchant.js"></script>
</head>

<body style = "margin:0">
    <?php include 'header.html'; ?>
    <?php include 'navigation.html'; ?>
    <center>
    
    <table><tr><td><img src="addMerchant.png" alt="reg" style="width: 150; height: auto; "></td>
    <td><p style="font-size: 40px; color: #4d68b4;">Add new Merchant<p></td></tr></table><hr>
    <form action="../Controller/merchant.php" method="POST" onsubmit="return validateAddMerchant()" novalidate autocomplete="off" style= "background-color: #d2f5f6;">
    <fieldset>
    <table>
    <tr>
    <td>First Name</td>
    <td>
        <input type="text" id="FirstName" name="FirstName" value="<?= $FirstName ?>">
        <span id="errorFirstName" style="color: red;"></span>
        <?php echoErrorMessage('FirstName'); ?>
    </td>
</tr>
<tr>
    <td>Last Name</td>
    <td>
        <input type="text" id="LastName" name="LastName" value="<?= $LastName ?>">
        <span id="errorLastName" style="color: red;"></span>
        <?php echoErrorMessage('LastName'); ?>
    </td>
</tr>

<tr>
    <td>Email</td>
    <td>
        <input type="text" id="Email" name="Email" value="<?= $Email ?>" placeholder="example@email.com">
        <span id="errorEmail" style="color: red;"></span>
        <?php echoErrorMessage('Email'); ?>
    </td>
</tr>
<tr>
    <td>NID</td>
    <td>
        <input type="text" id="NID" name="NID" value="<?= $NID?>" placeholder="XXXXXXXX">
        <span id="errorNID" style="color: red;"></span>
        <?php echoErrorMessage('NID'); ?>
    </td>
</tr>
<tr>
    <td>Phone Number</td>
    <td>
        <input type="text" id="PhoneNumber" name="PhoneNumber" value="<?= $PhoneNumber ?>" placeholder="+8801XXXXXXXXX">
        <span id="errorPhoneNumber" style="color: red;"></span>
        <?php echoErrorMessage('PhoneNumber'); ?>
    </td>
</tr>
<tr>
    <td>Present Address</td>
    <td>
        <input type="text" id="PresentAddress" name="PresentAddress" value="<?= $PresentAddress ?>" >
        <span id="errorPresentAddress" style="color: red;"></span>
        <?php echoErrorMessage('PresentAddress'); ?>
    </td>
</tr>
<tr>
    <td>Permanent Address</td>
    <td>
        <input type="text" id="PermanentAddress" name="PermanentAddress" value="<?= $PermanentAddress ?>" >
        <span id="errorPermanentAddress" style="color: red;"></span>
        <?php echoErrorMessage('PermanentAddress'); ?>
    </td>
</tr>
<tr>
    <td>Username</td>
    <td>
        <input type="text" id="Username" name="Username" value="<?= $Username ?>">
        <span id="errorUsername" style="color: red;"></span>
        <?php echoErrorMessage('Username'); ?>
    </td>
</tr>
<tr>
    <td>Password</td>
    <td>
        <input type="password" id="Password" name="Password" value="<?= $Password ?>">
        <span id="errorPassword" style="color: red;"></span>
        <?php echoErrorMessage('Password'); ?>
    </td>
</tr>
<tr>
    <td>Confirm Password</td>
    <td>
        <input type="password" id="onfirmPassword" name="confirmPassword" value="<?= $confirmPassword ?>">
        <span id="errorConfirmPassword" style="color: red;"></span>
        <?php echoErrorMessage('confirmPassword'); ?>
    </td>
</tr>

<tr>
    <td><input type="submit" name="addMerchant" value="Add" class="addCustomer-btn"></td>
    <td><a href="../View/manage_merchant.php" class="cancelcustomer-btn">Cancel</a></td>
</tr>
</table>
</fieldset>
</form>
</center>

<a href="../Controller/logout.php" class="logout-btn" style="width: 65px; height: 20px;">Logout ⤿</a>

<?php include 'footer.html'; ?>

</body>
</html>
