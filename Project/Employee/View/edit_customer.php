<?php

session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

$userinfo = $_SESSION['cusInfo'];

$fieldNames = array(
    'customerId' => '',
    'holderName' => '',
    'fatherName' => '',
    'motherName' => '',
    'message'=>'',
    'postCode'=>'',
    'username' => '',
    'password' => '',
    'email'=>'',
    'website'=>'',
    'phone'=>'',
    'gender'=>'',
    'bloodGroup'=>'',
    'religion'=>'',
    'city'=>'',
    'country'=>'',
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

?>

<html>
<head>
    <title>Edit Customer Information</title>
    <link rel="stylesheet" type="text/css" href="../View/external.css">
</head>

<body style = "margin:0">
    <?php include 'header.html'; ?>
    <?php include 'navigation.html'; ?>
    <center>
    <table><tr><td><img src="editCustomer.png" alt="reg" style="width: 150; height: auto; "></td>
    <td><p style="font-size: 40px; color: #4d68b4;">Edit Customer Information<p></td></tr></table><hr>
    <form action="../Controller/editCustomer.php" method="POST" novalidate autocomplete="off" style= "background-color: #d2f5f6;">
    <fieldset>
    <table>
    <tr>
                <td>Customer ID</td>
                <td><input type="text" name="CustomerId" value="<?php echo $userinfo['customer_id']; ?>" readonly></td></tr>
            
    <tr>
    <td>Holder Name</td>
    <td>
        <input type="text" name="holderName" value="<?php echo $userinfo['holder_name']; ?>">
        <?php echoErrorMessage('holderName'); ?>
    </td>
</tr>
<tr>
    <td>Father's Name</td>
    <td>
        <input type="text" name="fatherName" value="<?php echo $userinfo['father_name']; ?>">
        <?php echoErrorMessage('fatherName'); ?>
    </td>
</tr>
<tr>
    <td>Mother's Name</td>
    <td>
        <input type="text" name="motherName" value="<?php echo $userinfo['mother_name']; ?>">
        <?php echoErrorMessage('motherName'); ?>
    </td>
</tr>



<tr>
    <td>Email</td>
    <td>
        <input type="text" name="email" value="<?php echo $userinfo['email']; ?>">
        <?php echoErrorMessage('email'); ?>
    </td>
</tr>
<tr>
    <td>Website</td>
    <td>
        <input type="text" name="website" value="<?php echo $userinfo['website']; ?>">
        <?php echoErrorMessage('website'); ?>
    </td>
</tr>
<tr>
    <td>Phone</td>
    <td>
        <input type="text" name="phone" value="<?php echo $userinfo['phone']; ?>">
        <?php echoErrorMessage('phone'); ?>
    </td>
</tr>
<tr>
    <td>Gender</td>
    <td>
                <input type="radio" id="male" name="gender" value="male" <?php if ($userinfo['gender'] == 'Male') echo 'checked'; ?>>
                <label for="male">Male</label>

                <input type="radio" id="female" name="gender" value="female" <?php if ($userinfo['gender'] == 'Female') echo 'checked'; ?>>
                <label for="female">Female</label>
                <?php echoErrorMessage('gender'); ?>
    </td>
<tr>
    <td>Blood Group</td>
    <td>
        <select name="bloodGroup">
            <option value="-">-</option>
            <option value="A+" <?php if ($userinfo['bloodGroup'] == 'A+') echo 'selected'; ?>>A+</option>
            <option value="A-" <?php if ($userinfo['bloodGroup'] == 'A-') echo 'selected';?>>A-</option>
            <option value="B+" <?php if ($userinfo['bloodGroup'] == 'B+') echo 'selected';?>>B+</option>
            <option value="B-" <?php if ($userinfo['bloodGroup'] == 'B-') echo 'selected';?>>B-</option>
            <option value="AB+" <?php if ($userinfo['bloodGroup'] == 'AB+') echo 'selected';?>>AB+</option>
            <option value="AB-" <?php if ($userinfo['bloodGroup'] == 'AB-') echo 'selected';?>>AB-</option>
            <option value="O+" <?php if ($userinfo['bloodGroup'] == 'O+') echo 'selected';?>>O+</option>
            <option value="O-" <?php if ($userinfo['bloodGroup'] == 'O-') echo 'selected';?>>O-</option>
        </select>
        <?php echoErrorMessage('bloodGroup'); ?>
    </td>
</tr>
<tr>
    <td>Religion</td>
    <td>
        <input type="text" name="religion" value="<?php echo $userinfo['religion']; ?>">
        <?php echoErrorMessage('religion'); ?>
    </td>
</tr>
<tr>
    <td>Details Address</td>
    <td>
        <input type="text" name="message" value="<?php echo $userinfo['message']; ?>">
        <?php echoErrorMessage('message'); ?>
    </td>
</tr>
<tr>
    <td>City</td>
    <td>
        <input type="text" name="city" value="<?php echo $userinfo['city']; ?>">
        <?php echoErrorMessage('city'); ?>
    </td>
</tr>
<tr>
    <td>Country</td>
    <td>
        <input type="text" name="country" value="<?php echo $userinfo['country']; ?>">
        <?php echoErrorMessage('country'); ?>
    </td>
</tr>
<tr>
    <td>Post Code</td>
    <td>
        <input type="text" name="postCode" value="<?php echo $userinfo['postcode']; ?>">
        <?php echoErrorMessage('postCode'); ?>
    </td>
</tr>
<tr>
    <td>Username</td>
    <td>
        <input type="text" name="username" value="<?php echo $userinfo['username']; ?>" readonly>
        <?php echoErrorMessage('username'); ?>
    </td>
</tr>
<tr>
    <td>Password</td>
    <td>
        <input type="text" name="password" value="<?php echo $userinfo['password']; ?>">
        <?php echoErrorMessage('password'); ?>
    </td>
</tr>



            <tr>
            <td><input type="submit" name="editCustomer" value="Edit" class="addCustomer-btn"></td>
            <td><a href="../View/manage_customer.php" class="cancelcustomer-btn">Cancel</a></td>
            </tr>
        </table>
</form>
</fieldset>
</center>

    <a href="../Controller/logout.php" class="logout-btn"style="width: 65px; height: 20px;">Logout ⤿</a>

    <?php include 'footer.html'; ?>

</body>
</html>