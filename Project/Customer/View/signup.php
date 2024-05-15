<?php
session_start(); 

$fieldNames = array(
    'first-name' => '',
    'last-name' => '',
    'father-name' => '',
    'mother-name' => '',
    'message' => '',
    'postcode' => '',
    'user-name' => '',
    'password' => '',
    'email' => '',
    'website' => '',
    'phone'=>'',
    'gender'=>'',
    'blood-group'=>'',
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
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="styles-signup.css">
</head>
<body>
<div class="aiub">
<center>
    <h1>🔰AiubVault</h1>
    <h5>Banking & Beyond</h5>
</center>
</div>
<form method="post" action="../controller/reg.php" autocomplete="off" novalidate method="post" onsubmit="return jsvalidate()">

    <?php
    if (isset($_COOKIE['last_modified'])) {
        echo $_COOKIE['last_modified'];
    } else {
        echo ""; 
    }
    ?>
    <table>
        <tr>
            <td>
                <fieldset class="container">
                    <table>
                        <legend class="legend">General Information:</legend>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <th><label for="first-name">First Name</label></th>
                            <td>:</td>
                            <td>
                                <input type="text" id="first-name" name="first-name" value="">
                                <span id="error1" style="color: red;"></span>
                                <?php echoErrorMessage('first-name'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <th><label for="last-name"> Last Name</label></th>
                            <td>:</td>
                            <td>
                                <input type="text" id="last-name" name="last-name" value="">
                                <span id="error2" style="color: red;"></span>
                                <?php echoErrorMessage('last-name'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>

                        <tr>
                            <th>Gender</th>
                            <td>:</td>
                            <td>
                                <input type="radio" name="gender" value="Male" id="male">
                                <label for="male">Male</label>
                                <input type="radio" id="female" name="gender" value="Female">
                                <label for="female">Female</label>
                                <span id="error7" style="color: red;"></span>
                                <?php echoErrorMessage("gender")?>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <th><label for="father-name"> Father's Name</label></th>
                            <td>:</td>
                            <td>
                                <input type="text" id="father-name" name="father-name" value="">
                                <?php echoErrorMessage('father-name'); ?>
                                <span id="error3" style="color: red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>

                        <tr>
                            <th><label for="mother-name"> Mother's Name</label></th>
                            <td>:</td>
                            <td>
                                <input type="text" id="mother-name" name="mother-name" value="">
                                <?php echoErrorMessage('mother-name'); ?>
                                <span id="error4" style="color: red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <th> <label for="blood-group"> Blood Group</label></th>
                            <td>:</td>
                            <td>
                                <select id="blood-group" name="blood-group">
                                    <option value="" selected>Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                                <?php echoErrorMessage('blood-group') ?>
                                <span id="error8" style="color: red;"></span>
                            </td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr>
                            <th> <label for="religion"> Religion </label></th>
                            <td>:</td>
                            <td>
                                <select id="religion" name="religion">
                                    <option value="" selected>Please select religion</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Other">Other</option>
                                </select>
                                <?php echoErrorMessage('religion') ?>
                                <span id="error9" style="color: red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                    </table>
                </fieldset>
                <input type="submit" name="register" value="Register">
            </td>
            <td>
                <fieldset class="container">
                    <table>
                        <legend class="legend">Contact Information:</legend>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <th><label for="email"> Email</label></th>
                            <td>:</td>
                            <td>
                                <input type="email" id="email" name="email" placeholder="example@example.com">
                                <?php echoErrorMessage('email') ?>
                                <span id="error6" style="color: red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <th><label for="phone">Phone</label></th>
                            <td>:</td>
                            <td>
                                <input type="tel" id="phone" name="phone" placeholder="+880..">
                                <?php echoErrorMessage('phone') ?>  
                                <span id="error12" style="color: red;"></span>                                                          
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <th><label for="website"> Website</label></th>
                            <td>:</td>
                            <td>
                                <input type="url" id="website" name="website" placeholder="http://www.example.com">
                                <?php echoErrorMessage('website') ?>  
                                <span id="error13" style="color: red;"></span>

                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <th><label for="address">Address</label></th>
                            <td>:</td>
                            <td>
                                <fieldset class="container">
                                    <legend class="legend">Present Address</legend>
                                    <select id="country" name="country">
                                        <option value="" selected>Select a country</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Canada">Canada</option>
                                        <option value="India">India</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="United States of America">United States of America</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <?php echoErrorMessage('country') ?>  
                                    <span id="error10" style="color: red;"></span>

                                    <select id="city" name="city">
                                        <option value="" selected>Select a City</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Dinajpur">Dinajpur</option>
                                        <option value="Potuakhali">Potuakhali</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <span id="error11" style="color: red;"></span>
                                    <?php echoErrorMessage('city') ?>  
                                    <br>
                                    <textarea name="message" id="message" rows="6" cols="30" placeholder="Road/Street/City" ></textarea>
                                    <span id="error15" style="color: red;"></span>
                                    <?php echoErrorMessage('message') ?>
                                    <input type="text" id="postcode" name="postcode" placeholder="Post Code">
                                    <?php echoErrorMessage('postcode') ?>
                                    <span id="error14" style="color: red;"></span>
                                </fieldset>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </td>
            <td>
                <fieldset class="container">
                    <table>
                        <legend class="legend">Account Information:</legend>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <th><label for="user-name">User Name</label></th>
                            <td>:</td>
                            <td>
                                <input type="text" id="user-name" name="user-name">
                                <span id="error5" style="color: red;"></span>
                                <?php echoErrorMessage('user-name') ?>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <th><label for="password">Password</label></th>
                            <td>:</td>
                            <td>
                                <input type="password" id="password" name="password">
                                <span id="error16" style="color: red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>
                        <tr>
                            <th><label for="confirm-password">Confirm Password</label></th>
                            <td>:</td>
                            <td>
                                <input type="password" id="confirm-password" name="confirm-password">
                                <span id="error17" style="color: red;"></span>
                                <?php echoErrorMessage('password') ?>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </td>
        </tr>
    </table>

    <?php
    if (isset($_SESSION['error_message'])) {
        $error_message = $_SESSION['error_message'];
        unset($_SESSION['error_message']); // Clear the error message from session to avoid displaying it multiple times
    }
    ?>
</form>

<br><br><br><br><br><br>
<center>
    <footer>Copyright © 2024, AiubVault</footer>
</center>
<script src="js/signup.js"></script>
</body>
</html>
