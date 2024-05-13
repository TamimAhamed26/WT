<?php

session_start(); 


$fieldNames = array(
    'holderName' => '',
    'fatherName' => '',
    'motherName' => '',
    'message'=>'',
    'postCode'=>'',
    'username' => '',
    'password' => '',
    'confirmPassword' => '',
    'email'=>'',
    'website'=>'',
    'phone'=>'',
    'gender'=>'',
    'bloodGroup'=>'',
    'religion'=>'',
    'city'=>'',
    'country'=>'',
    'createdAt'=>'',
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

$holderName = isset($_COOKIE['holderName']) ? $_COOKIE['holderName'] : '';
$fatherName = isset($_COOKIE['fatherName']) ? $_COOKIE['fatherName'] : '';
$motherName = isset($_COOKIE['motherName']) ? $_COOKIE['motherName'] : '';
$msg = isset($_COOKIE['message']) ? $_COOKIE['message'] : '';
$postcode = isset($_COOKIE['postcode']) ? $_COOKIE['postcode'] : '';
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
$confirmPassword = isset($_COOKIE['confirmPassword']) ? $_COOKIE['confirmPassword'] : '';
$email = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
$website = isset($_COOKIE['website']) ? $_COOKIE['website'] : '';
$phone = isset($_COOKIE['phone']) ? $_COOKIE['phone'] : '';
$gender = isset($_COOKIE['gender']) ? $_COOKIE['gender'] : '';
$bloodGroup = isset($_COOKIE['bloodGroup']) ? $_COOKIE['bloodGroup'] : '';
$city = isset($_COOKIE['city']) ? $_COOKIE['city'] : '';
$religion = isset($_COOKIE['religion']) ? $_COOKIE['religion'] : '';
$country = isset($_COOKIE['country']) ? $_COOKIE['country'] : '';
?>

<html>
<head>
    <title>Add New Customer</title>
    <link rel="stylesheet" type="text/css" href="../View/external.css">
    <script src="../View/JS/customer.js"></script>
</head>

<body style = "margin:0">
    <?php include 'header.html'; ?>
    <?php include 'navigation.html'; ?>
    <center>
    
    <table><tr><td><img src="addCustomer.png" alt="reg" style="width: 150; height: auto; "></td>
    <td><p style="font-size: 40px; color: #4d68b4;">Add new customer<p></td></tr></table><hr>
    <form action="../Controller/customer.php" method="POST" onsubmit="return validateAddCustomer()" novalidate autocomplete="off" style= "background-color: #d2f5f6;">
    <fieldset>
    <table>
    <tr>
    <td>Holder Name</td>
    <td>
        <input type="text" id="holderName" name="holderName" value="<?= $holderName ?>">
        <span id="errorHolderName" style="color: red;"></span>
        <?php echoErrorMessage('holderName'); ?>
    </td>
</tr>
<tr>
    <td>Father's Name</td>
    <td>
        <input type="text" id="fatherName" name="fatherName" value="<?= $fatherName ?>">
        <span id="errorFatherName" style="color: red;"></span>
        <?php echoErrorMessage('fatherName'); ?>
    </td>
</tr>
<tr>
    <td>Mother's Name</td>
    <td>
        <input type="text" id="motherName" name="motherName" value="<?= $motherName ?>">
        <span id="errorMotherName" style="color: red;"></span>
        <?php echoErrorMessage('motherName'); ?>
    </td>
</tr>

<tr>
    <td>Email</td>
    <td>
        <input type="text" id="email" name="email" value="<?= $email ?>" placeholder="example@email.com">
        <span id="errorEmail" style="color: red;"></span>
        <?php echoErrorMessage('email'); ?>
    </td>
</tr>
<tr>
    <td>Website</td>
    <td>
        <input type="text" id="website" name="website" value="<?= $website ?>" placeholder="https://example.com">
        <span id="errorWebsite" style="color: red;"></span>
        <?php echoErrorMessage('website'); ?>
    </td>
</tr>
<tr>
    <td>Phone</td>
    <td>
        <input type="text" id="phone" name="phone" value="<?= $phone ?>" placeholder="+8801XXXXXXXXX">
        <span id="errorPhone" style="color: red;"></span>
        <?php echoErrorMessage('phone'); ?>
    </td>
</tr>
<tr>
    <td>Gender</td>
    <td>
        <input type="radio" id="male" name="gender" value="male" <?= $gender == 'male' ? 'checked' : '' ?>>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" <?= $gender == 'female' ? 'checked' : '' ?>>
        <label for="female">Female</label>
        <span id="errorGender" style="color: red;"></span>
        <?php echoErrorMessage('gender'); ?>
    </td>
</tr>
<tr>
    <td>Blood Group</td>
    <td>
        <select id="bloodGroup" name="bloodGroup">
            <option value="-">-</option>
            <option value="A+" <?= $bloodGroup == 'A+' ? 'selected' : '' ?>>A+</option>
            <option value="A-" <?= $bloodGroup == 'A-' ? 'selected' : '' ?>>A-</option>
            <option value="B+" <?= $bloodGroup == 'B+' ? 'selected' : '' ?>>B+</option>
            <option value="B-" <?= $bloodGroup == 'B-' ? 'selected' : '' ?>>B-</option>
            <option value="AB+" <?= $bloodGroup == 'AB+' ? 'selected' : '' ?>>AB+</option>
            <option value="AB-" <?= $bloodGroup == 'AB-' ? 'selected' : '' ?>>AB-</option>
            <option value="O+" <?= $bloodGroup == 'O+' ? 'selected' : '' ?>>O+</option>
            <option value="O-" <?= $bloodGroup == 'O-' ? 'selected' : '' ?>>O-</option>
        </select>
        <span id="errorBloodGroup" style="color: red;"></span>
        <?php echoErrorMessage('bloodGroup'); ?>
    </td>
</tr>
<tr>
    <td>Religion</td>
    <td>
        <input type="text" id="religion" name="religion" value="<?= $religion ?>">
        <span id="errorReligion" style="color: red;"></span>
        <?php echoErrorMessage('religion'); ?>
    </td>
</tr>
<tr>
    <td>Details Address</td>
    <td>
        <input type="text" id="message" name="message" value="<?= $msg ?>">
        <span id="errorMessage" style="color: red;"></span>
        <?php echoErrorMessage('message'); ?>
    </td>
</tr>
<tr>
    <td>City</td>
    <td>
        <input type="text" id="city" name="city" value="<?= $city ?>">
        <span id="errorCity" style="color: red;"></span>
        <?php echoErrorMessage('city'); ?>
    </td>
</tr>
<tr>
    <td>Country</td>
    <td>
        <input type="text" id="country" name="country" value="<?= $country ?>">
        <span id="errorCountry" style="color: red;"></span>
        <?php echoErrorMessage('country'); ?>
    </td>
</tr>
<tr>
    <td>Post Code</td>
    <td>
        <input type="text" id="postCode" name="postCode" value="<?= $postcode ?>">
        <span id="errorPostCode" style="color: red;"></span>
        <?php echoErrorMessage('postCode'); ?>
    </td>
</tr>
<tr>
    <td>Username</td>
    <td>
        <input type="text" id="username" name="username" value="<?= $username ?>">
        <span id="errorUsername" style="color: red;"></span>
        <?php echoErrorMessage('username'); ?>
    </td>
</tr>
<tr>
    <td>Password</td>
    <td>
        <input type="password" id="password" name="password" value="<?= $password ?>">
        <span id="errorPassword" style="color: red;"></span>
        <?php echoErrorMessage('password'); ?>
    </td>
</tr>
<tr>
    <td>Confirm Password</td>
    <td>
        <input type="password" id="confirmPassword" name="confirmPassword" value="<?= $confirmPassword ?>">
        <span id="errorConfirmPassword" style="color: red;"></span>
        <?php echoErrorMessage('confirmPassword'); ?>
    </td>
</tr>
<tr>
    <td>Created At</td>
    <td>
        <input type="text" id="createdAt" name="createdAt" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
        <span id="errorCreatedAt" style="color: red;"></span>
        <?php echoErrorMessage('createdAt'); ?>
    </td>
</tr>

<tr>
    <td><input type="submit" name="addCustomer" value="Add" class="addCustomer-btn"></td>
    <td><a href="../View/manage_customer.php" class="cancelcustomer-btn">Cancel</a></td>
</tr>
</table>
</fieldset>
</form>
</center>

<a href="../Controller/logout.php" class="logout-btn" style="width: 65px; height: 20px;">Logout ⤿</a>

<?php include 'footer.html'; ?>

</body>
</html>
