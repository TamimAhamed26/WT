<?php
session_start(); 

// Function to set error message in session variable
function setErrorMessage($fieldName, $message) {
    $_SESSION[$fieldName . '_error'] = $message;
}

// Function to retrieve error message from session variable
function getErrorMessage($fieldName) {
    return isset($_SESSION[$fieldName . '_error']) ? $_SESSION[$fieldName . '_error'] : '';
}

$fieldNames = array(
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
    'username' => '',
    'password' => '',
);

foreach ($fieldNames as $fieldName => $value) {
    $fieldNames[$fieldName] = getErrorMessage($fieldName);
    unset($_SESSION[$fieldName . '_error']);
}

// Retrieve form data from cookies
$firstName = isset($_COOKIE['firstName']) ? $_COOKIE['firstName'] : '';
$lastName = isset($_COOKIE['lastName']) ? $_COOKIE['lastName'] : '';
$gender = isset($_COOKIE['gender']) ? $_COOKIE['gender'] : '';
$phoneNumber = isset($_COOKIE['phoneNumber']) ? $_COOKIE['phoneNumber'] : '';
$dateOfBirth = isset($_COOKIE['date_of_birth']) ? $_COOKIE['date_of_birth'] : '';
$email = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
$streetAddress = isset($_COOKIE['streetAddress']) ? $_COOKIE['streetAddress'] : '';
$city = isset($_COOKIE['city']) ? $_COOKIE['city'] : '';
$state = isset($_COOKIE['state']) ? $_COOKIE['state'] : '';
$postalCode = isset($_COOKIE['postalCode']) ? $_COOKIE['postalCode'] : '';
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';

?>

<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="../View/external.css">
    <script src="../View/JS/registration.js"></script>
</head>

<body style="margin:0">
    <?php include 'header.html'; ?>
    <?php include 'Menu.html'; ?>
    <center>
    <table><tr>
        <td>
            <table>
                <tr>
                    <td>Have an account?<a href="Login.php" class="login-link">Login Here! 🔐</a></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
            </table>

            <p>Welcome!</p>
        </td>
        <td><img src="reg2.png" alt="reg" style="width: 250; height: auto; float: right;"></td>
    </tr></table>
    <table><tr><td>
        <form method="POST" action="../Controller/reg.php" novalidate onsubmit="return validate()" autocomplete="off" style="background-color: #d2f5f6;">
            <fieldset>
                <legend><b>👥 Registration as Employee</b></legend>
                <hr>
                <table>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <th><label for="fullName">Full Name</label></th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="firstName" name="firstName" value="<?= $firstName ?>">
                            <span id="error1" style="color: red;"><?= getErrorMessage('firstName'); ?></span>
                        </td>
                        <td>
                            <input type="text" id="lastName" name="lastName" value="<?= $lastName ?>">
                            <span id="error2" style="color: red;"><?= getErrorMessage('lastName'); ?></span>
                        </td>
                    </tr>
                    <tr>
                    <th><label for="firstName">First Name</label></th>
                        <th><label for="lastName">Last Name</label></th>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    
                        <td>
                            <input type="radio" id="male" name="gender" value="male" <?= $gender == 'male' ? 'checked' : '' ?>>
                            <label for="male">Male ♂</label>
                            <input type="radio" id="female" name="gender" value="female" <?= $gender == 'female' ? 'checked' : '' ?>>
                            <label for="female">Female ♀</label>
                            <span id="errorGender" style="color: red;"><?= getErrorMessage('gender'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="gender">Gender</label></th>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="phoneNumber" name="phoneNumber" value="<?= $phoneNumber ?>" placeholder="+8801...">
                            <span id="error12" style="color: red;"><?= getErrorMessage('phoneNumber'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="phoneNumber">Phone Number</label></th>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="date" id="dateOfBirth" name="dateOfBirth" value="<?= $dateOfBirth ?>">
                            <span id="error13" style="color: red;"><?= getErrorMessage('dateOfBirth'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="dateOfBirth">Date of birth</label></th>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="email" name="email" value="<?= $email ?>" placeholder="...@example.com">
                            <span id="error6" style="color: red;"><?= getErrorMessage('email'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="email">Email</label></th>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="streetAddress" name="streetAddress" value="<?= $streetAddress ?>" placeholder="use only letters & spaces">
                            <span id="error15" style="color: red;"><?= getErrorMessage('streetAddress'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="streetAddress">Street Address</label></th>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <input type="text" id="city" name="city" value="<?= $city ?>">
                            <span id="error11" style="color: red;"><?= getErrorMessage('city'); ?></span>
                        </td>
                        <td>
                            <input type="text" id="state" name="state" value="<?= $state ?>">
                            <span id="error10" style="color: red;"><?= getErrorMessage('state'); ?></span>
                        </td>
                    </tr>
                    <tr>
                    <th><label for="city">City</label></th>
                        <th><label for="state">State</label></th>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="postalCode" name="postalCode" value="<?= $postalCode ?>">
                            <span id="error14" style="color: red;"><?= getErrorMessage('postalCode'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="postalCode">Postal Code</label></th>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="username" name="username" value="<?= $username ?>">
                            <span id="error5" style="color: red;"><?= getErrorMessage('username'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="username">Username</label></th>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" id="password" name="password">
                            <span id="error16" style="color: red;"><?= getErrorMessage('password'); ?></span>
                        </td>
                        <td>* use at least 1 capital letter, small letter, number, special symbol</td>
                    </tr>
                    <tr>
                        <th><label for="password">Password</label></th>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" id="confirmPassword" name="confirmPassword">
                            <span id="error17" style="color: red;"><?= getErrorMessage('confirmPassword'); ?></span>
                        </td></tr><tr>
                        <th><label for="confirmPassword">Confirm Password</label></th>
                    </tr>
                </table>
            </fieldset>
            <input type="submit" name="Register" value="Register" class="register-btn">
            <input type="submit" name="Save" value="Save" class="save-btn">
        </form>
    </td></tr></table>
    </center>
    <?php include 'footer.html'; ?>
</body>
</html>
