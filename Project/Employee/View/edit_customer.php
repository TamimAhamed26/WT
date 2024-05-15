<?php

session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

$user = $_SESSION['user'];
$id=$user['customer_id'];
$holder=$user['holder_name'];
$father=$user['father_name'];
$mother=$user['mother_name'];
$msg=$user['message'];
$post=$user['postcode'];
$username=$user['username'];
$pass=$user['password'];
$email=$user['email'];
$website=$user['website'];
$phone=$user['gender'];
$blood=$user['blood_group'];
$religion=$user['religion'];
$city=$user['city'];
$country=$user['country'];
$phone=$user['phone'];
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
    <fieldset>
    <form method="POST" action="../Controller/editCustomer.php" novalidate autocomplete="off" style= "background-color: #d2f5f6;">
   
    <table>
    <tr>
                <td>Customer ID</td>
                <td><input type="text" name="CustomerId" value="<?php echo $id; ?>" readonly></td></tr>
            
    <tr>
    <td>Holder Name</td>
    <td>
        <input type="text" name="holderName" value="<?php echo $holder; ?>">
        <?php echoErrorMessage('holderName'); ?>
    </td>
</tr>
<tr>
    <td>Father's Name</td>
    <td>
        <input type="text" name="fatherName" value="<?php echo $father; ?>">
        <?php echoErrorMessage('fatherName'); ?>
    </td>
</tr>
<tr>
    <td>Mother's Name</td>
    <td>
        <input type="text" name="motherName" value="<?php echo $mother; ?>">
        <?php echoErrorMessage('motherName'); ?>
    </td>
</tr>



<tr>
    <td>Email</td>
    <td>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <?php echoErrorMessage('email'); ?>
    </td>
</tr>
<tr>
    <td>Website</td>
    <td>
        <input type="text" name="website" value="<?php echo $website; ?>">
        <?php echoErrorMessage('website'); ?>
    </td>
</tr>
<tr>
    <td>Phone</td>
    <td>
        <input type="text" name="phone" value="<?php echo $phone; ?>">
        <?php echoErrorMessage('phone'); ?>
    </td>
</tr>
<tr>
    <td>Gender</td>
    <td>
                <input type="radio" id="male" name="gender" value="male" <?php if ($customer['gender'] == 'Male') echo 'checked'; ?>>
                <label for="male">Male</label>

                <input type="radio" id="female" name="gender" value="female" <?php if ($customer['gender'] == 'Female') echo 'checked'; ?>>
                <label for="female">Female</label>
                <?php echoErrorMessage('gender'); ?>
    </td>
<tr>
    <td>Blood Group</td>
    <td>
        <select name="bloodGroup">
            <option value="-">-</option>
            <option value="A+" <?php if ($customer['bloodGroup'] == 'A+') echo 'selected'; ?>>A+</option>
            <option value="A-" <?php if ($customer['bloodGroup'] == 'A-') echo 'selected';?>>A-</option>
            <option value="B+" <?php if ($customer['bloodGroup'] == 'B+') echo 'selected';?>>B+</option>
            <option value="B-" <?php if ($customer['bloodGroup'] == 'B-') echo 'selected';?>>B-</option>
            <option value="AB+" <?php if ($customer['bloodGroup'] == 'AB+') echo 'selected';?>>AB+</option>
            <option value="AB-" <?php if ($customer['bloodGroup'] == 'AB-') echo 'selected';?>>AB-</option>
            <option value="O+" <?php if ($customer['bloodGroup'] == 'O+') echo 'selected';?>>O+</option>
            <option value="O-" <?php if ($customer['bloodGroup'] == 'O-') echo 'selected';?>>O-</option>
        </select>
        <?php echoErrorMessage('bloodGroup'); ?>
    </td>
</tr>
<tr>
    <td>Religion</td>
    <td>
        <input type="text" name="religion" value="<?php echo $religion; ?>">
        <?php echoErrorMessage('religion'); ?>
    </td>
</tr>
<tr>
    <td>Details Address</td>
    <td>
        <input type="text" name="message" value="<?php echo $msg; ?>">
        <?php echoErrorMessage('message'); ?>
    </td>
</tr>
<tr>
    <td>City</td>
    <td>
        <input type="text" name="city" value="<?php echo $city; ?>">
        <?php echoErrorMessage('city'); ?>
    </td>
</tr>
<tr>
    <td>Country</td>
    <td>
        <input type="text" name="country" value="<?php echo $country; ?>">
        <?php echoErrorMessage('country'); ?>
    </td>
</tr>
<tr>
    <td>Post Code</td>
    <td>
        <input type="text" name="postCode" value="<?php echo $post; ?>">
        <?php echoErrorMessage('postCode'); ?>
    </td>
</tr>
<tr>
    <td>Username</td>
    <td>
        <input type="text" name="username" value="<?php echo $username; ?>" readonly>
        <?php echoErrorMessage('username'); ?>
    </td>
</tr>
<tr>
    <td>Password</td>
    <td>
        <input type="text" name="password" value="<?php echo $pass; ?>">
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
