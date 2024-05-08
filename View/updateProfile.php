
<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$userinfo=$_SESSION['userInfo'];

$fields=array(
    'first-name' => '',
    'last-name'=>'',
    'father-name'=>'',
    'email'=>'',
    'message'=>'',
    'phone'=>'',
    'city'=>'',
    'gender'=>'',
    'website'=>'',
);

foreach ($fields as $fieldName => $value) {
    if (isset($_SESSION[$fieldName . '_error'])) {
        $fields[$fieldName] = $_SESSION[$fieldName . '_error'];
        unset($_SESSION[$fieldName . '_error']);
    }
      
}

function echoErrorMessage($fieldName) {
    global $fields;
    if (($fields[$fieldName])) {
        echo $fields[$fieldName];
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="CSS/up_prof.css">
    
</head>
<header>
        XYZ Bank
        Update Profile Page
</header>
<body>
    
<div align="right" style="margin-top: 10px;">
    <div style="display: inline-block;">
        <a href="changePassword.php" style="color: violet;">Change Password</a>
    </div>
    <div style="display: inline-block; margin-left: 10px;">
        <a href="user_dashboard.php" style="color: violet;">Dashboard</a>
    </div>
</div>


<div class="container">
Logged in as Admin:<b><span style="color: purple;"><?php echo $_SESSION['username']; ?></span></b> 
<form method="post" action="../controller/edit_profilecheck.php" novalidate  onsubmit="return validateAllFields()">
    <fieldset>
        <legend>Edit Profile</legend>
        <table>
            
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?php echo $userinfo['username']; ?>" readonly></td>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="last-name"  id="last-name" value="<?php echo $userinfo['last_name']; ?>" >
                <span id="error2" style="color: red;"></span>
                <?php echoErrorMessage('last-name'); ?>
            </td>
                
            </tr>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="first-name" id="first-name" value="<?php echo $userinfo['first_name']; ?>" >
                <span id="error1" style="color: red;"></span>
               <?php echoErrorMessage('first-name'); ?>
            </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" id="email" name="email" value="<?php echo $userinfo['email']; ?>" >
                <span id="error6" style="color: red;"></span>
                <?php echoErrorMessage('email'); ?>
            </td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="message" id="message" value="<?php echo $userinfo['message']; ?>" >
                <span id="error15" style="color: red;"></span>
                <?php echoErrorMessage('message'); ?>
            </td>
            </tr>
       
            <tr>
                <td>Phone:</td>
                <td><input type="text" name="phone" id="phone" value="<?php echo $userinfo['phone']; ?>">
                <span id="error12" style="color: red;"></span>
                <?php echoErrorMessage('phone'); ?>
            </td>
            </tr>
            <tr>
                <td>Father-:</td>
                <td><input type="text" name="father-name" id="father-name" value="<?php echo $userinfo['father_name']; ?>"> 
                <span id="error3" style="color: red;"></span>
                <?php echoErrorMessage('father-name'); ?>
            </td>
               
            </tr>
            <tr>
                <td>Website:</td>
                <td><input type="text" name="website" id="website" value="<?php echo $userinfo['website']; ?>">
                <span id="error16" style="color: red;"></span>
                <?php echoErrorMessage('website'); ?></td>
             
            </tr>
            <tr>
                <td>City:</td>
                <td>
                <select name="city" id="city">
            <option value="Dinajpur" <?php if ($userinfo['city'] == 'Dinajpur') echo 'selected'; ?>>Dinajpur</option>
            <option value="Dhaka" <?php if ($userinfo['city'] == 'Dhaka') echo 'selected'; ?>>Dhaka</option>
            <option value="Potuakhali" <?php if ($userinfo['city'] == 'Potuakhali') echo 'selected'; ?>>Potuakhali</option>
            <option value="Sylhet" <?php if ($userinfo['city'] == 'Sylhet') echo 'selected'; ?>>Sylhet</option>
             </select>
             <?php echoErrorMessage('city'); ?>
             <span id="error11" style="color: red;"></span>
                </td>
            </tr>
            <tr>
                <td>Gender:</td>
     <td>
                <input type="radio" id="male" name="gender" value="male" <?php if ($userinfo['gender'] == 'Male') echo 'checked'; ?>>
                <label for="male">Male</label>

                <input type="radio" id="female" name="gender" value="female" <?php if ($userinfo['gender'] == 'Female') echo 'checked'; ?>>
                <label for="female">Female</label>
    </td>
            <?php echoErrorMessage ('gender'); ?>
            <span id="error7" style="color: red;"></span>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="update" value="Update">
                
            </tr>
            
        </table>
    </fieldset>
</form>
</div>
<footer>
<?php include 'Footer.html'; ?>
</footer>
<script src="../JS/up_prof.js"></script>
</body>
</html>


