
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

$userinfo = $_SESSION['userInfo'];

$fields=array(
    'firstName' => '',
    'lastName' => '',
    'gender'=>'',
    'phoneNumber'=>'',
    'dateOfBirth' => '',
    'email' => '',
    'streetAddress'=>'',
    'city'=>'',
    'state'=>'',
    'postalCode'=>'',
    'employeeId'=>'',
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
        echo "<span class='error'>" . $fields[$fieldName] . "</span>";
    }
}

?>

<html>
<head>
    <title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="../View/external.css">
    <script src="../View/JS/update_profile.js"></script> <!-- Include the JavaScript file -->
</head>
<body style = "margin:0">
<?php include 'header.html'; ?>   
<?php include 'navigation.html'; ?>
<a href="changePassword.php" class="change-password-link">🔑 Change Password</a>
<a href="../Controller/logout.php" class="logout-btn"style="width: 65px; height: 20px;">Logout ⤿</a>

        

        <center><table><tr>
        <td style="padding-right: 150px;">
    <img src="updateProfile.png" alt="profile" style="width: 550px; height: auto;">
    <center><p><span class="logged-in-text">Logged in as employee: <b><?= $_SESSION['username'] ?></b></span></p></center>
</td>


<td style="padding-right: 150px;">
<form method="POST" action="../Controller/editProfileCheck.php" style= "background-color: #acadd8; padding: 20px;" novalidate onsubmit="return validateUpdateProfile()">
    <fieldset style="padding: 0 20px;">
        <legend>Edit Profile</legend>
        <table>
        <tr>
                <td>Employee ID</td>
                <td><input type="text" name="employeeId" value="<?php echo $userinfo['employee_id']; ?>" readonly></td></tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $userinfo['username']; ?>"></td></tr>
            <tr><td>First Name</td>
            <td>
                                        <input type="text" name="firstName" value="<?php echo $userinfo['first_name']; ?>">
                                        <!-- Error message for first name -->
                                        <span id="errorFirstName" style="color: red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td>
                                        <input type="text" name="lastName" value="<?php echo $userinfo['last_name']; ?>">
                                        <!-- Error message for last name -->
                                        <span id="errorLastName" style="color: red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <input type="text" name="email" value="<?php echo $userinfo['email']; ?>">
                                        <!-- Error message for email -->
                                        <span id="errorEmail" style="color: red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>
                                        <input type="date" name="dateOfBirth" value="<?php echo $userinfo['date_of_birth']; ?>">
                                        <!-- Error message for date of birth -->
                                        <span id="errorDateOfBirth" style="color: red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>
                                        <input type="text" name="phoneNumber" value="<?php echo $userinfo['phone_number']; ?>">
                                        <!-- Error message for phone number -->
                                        <span id="errorPhoneNumber" style="color: red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>
                                        <input type="radio" id="male" name="gender" value="male" <?php if ($userinfo['gender'] == 'Male') echo 'checked'; ?>>
                                        <label for="male">Male</label>
                                        <input type="radio" id="female" name="gender" value="female" <?php if ($userinfo['gender'] == 'Female') echo 'checked'; ?>>
                                        <label for="female">Female</label>
                                        <!-- Error message for gender -->
                                        <span id="errorGender" style="color: red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Street Address</td>
                                    <td>
                                        <input type="text" name="streetAddress" value="<?php echo $userinfo['street_address']; ?>">
                                        <!-- Error message for street address -->
                                        <span id="errorStreetAddress" style="color: red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>
                                        <input type="text" name="city" value="<?php echo $userinfo['city']; ?>">
                                        <!-- Error message for city -->
                                        <span id="errorCity" style="color: red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td>
                                        <input type="text" name="state" value="<?php echo $userinfo['State']; ?>">
                                        <!-- Error message for state -->
                                        <span id="errorState" style="color: red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Postal code</td>
                                    <td>
                                        <input type="text" name="postalCode" value="<?php echo $userinfo['postal_code']; ?>">
                                        <!-- Error message for postal code -->
                                        <span id="errorPostalCode" style="color: red;"></span>
                                    </td>
                                </tr>  
                                <tr><td><br></td></tr>  
            <tr>
                <td></td>
                <td ><input class="update-btn" type="submit" name="update" value="Update"></td>
                
            </tr>
            <tr><td><br></td></tr>  
        </table>
    </fieldset>
</form>
</td>
</tr><tr><td><br></td></tr></table></center>


<?php include 'footer.html'; ?>
</body>
</html>


