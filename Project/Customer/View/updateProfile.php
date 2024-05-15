<?php
session_start();
// Check if the user is logged in
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
    <link rel="stylesheet" href="styles-updateprofile.css"> <!-- Link to external CSS file -->
</head>
<body>
<center>

<header class="header">
    <nav class="navbar">
        <ul class="nav-list">
            <p1 class="nav-item">Home    </p1> 
            <p1 class="nav-item">Information    </p1>
            <p1 class="nav-item">Contact us</p1>

        </ul>
    </nav>
</header>
</center>


<div class="container">
    <div class="aiub">
        <h1>🔰AiubVault</h1>
        <h5>Banking & Beyond</h5>  <br> 
        <div class="user">
        Logged in as User:<b>  <?= $_SESSION['username'] ?></b> 
        </div>
    </div>

    <form method="post" action="../controller/edit_profilecheck.php" autocomplete="off" novalidate method="post" onsubmit="return updateProfileValidate()">
        <fieldset class="border">
            <legend class="legend">For Change Password</legend>
            <a class="link" href="changePassword.php">Change Password</a>
        </fieldset>

        <table> 
            <tr>
                <td>
                    <fieldset class="border">
                        <legend class="legend">First Name:</legend>
                        <input type="text" id= "first-name" name="first-name" value="<?php echo $userinfo['first_name']; ?>" >
                        <span class="error-message">
                      
                        <span id="error1" style="color: red;"></span> 
                            
                    <?php echoErrorMessage('first-name'); ?></span> <!-- Apply class for error message -->
                   
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset class="border">
                        <legend class="legend">Last Name</legend>
                        <input type="text" id="last-name" name="last-name" value="<?php echo $userinfo['last_name']; ?>" >
                        <span class="error-message">
                        <span id="error2" style="color: red;"></span>  
                        <?php echoErrorMessage('last-name'); ?></span> <!-- Apply class for error message -->
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset class="border">
                        <legend class="legend">Email</legend>
                        <input type="email" id="email" name="email" value="<?php echo $userinfo['email']; ?>" >
                        <span class="error-message">
                        <span id="error6" style="color: red;"></span>  
                        <?php echoErrorMessage('email'); ?></span> <!-- Apply class for error message -->
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset class="border">
                        <legend class="legend">Address</legend>
                        <input type="text" id="message"  name="message" value="<?php echo $userinfo['message']; ?>" >
                        <span class="error-message">
                        <span id="error15" style="color: red;"></span>  
                        <?php echoErrorMessage('message'); ?></span> <!-- Apply class for error message -->
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset class="border">
                        <legend class="legend">Phone</legend>
                        <input type="text" id="phone" name="phone" value="<?php echo $userinfo['phone']; ?>">
                        <span class="error-message">
                        <span id="error12" style="color: red;"></span>   
                        <?php echoErrorMessage('phone'); ?></span> <!-- Apply class for error message -->
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset class="border">
                        <legend class="legend">Father</legend>
                        <input type="text" id="father-name" name="father-name" value="<?php echo $userinfo['father_name']; ?>">
                        <span class="error-message">
                        <span id="error3" style="color: red;"></span>  
                        <?php echoErrorMessage('father-name'); ?></span> <!-- Apply class for error message -->
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset class="border">
                        <legend class="legend">Website</legend>
                        <input type="text" name="website" id="website" value="<?php echo $userinfo['website']; ?>">
                        <span class="error-message">
                        <span id="error13" style="color: red;"></span>  
                        <?php echoErrorMessage('website'); ?></span> <!-- Apply class for error message -->
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset class="border">
                        <legend class="legend">City</legend>
                        <select id="city" name="city">
                            <option value="Dinajpur" <?php if ($userinfo['city'] == 'Dinajpur') echo 'selected'; ?>>Dinajpur</option>
                            <option value="Dhaka" <?php if ($userinfo['city'] == 'Dhaka') echo 'selected'; ?>>Dhaka</option>
                            <option value="Potuakhali" <?php if ($userinfo['city'] == 'Potuakhali') echo 'selected'; ?>>Potuakhali</option>
                            <option value="Sylhet" <?php if ($userinfo['city'] == 'Sylhet') echo 'selected'; ?>>Sylhet</option>
                        </select>
                        <span class="error-message">
                        <span id="error11" style="color: red;"></span>    
                        <?php echoErrorMessage('city'); ?></span> <!-- Apply class for error message -->
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset class="border">
                        <legend class="legend">Gender</legend>
                        <input type="radio" id="male" name="gender" value="male" <?php if ($userinfo['gender'] == 'Male') echo 'checked'; ?>>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female" <?php if ($userinfo['gender'] == 'Female') echo 'checked'; ?>>
                        <label for="female">Female</label>
                        <span class="error-message">
                        <span id="error7" style="color: red;"></span> 
                        <?php echoErrorMessage ('gender'); ?></span> <!-- Apply class for error message -->
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="update" value="Update">
                </td>
            </tr>
        </table>
    </form>
    <br>
    <form method="post" action="../controller/logout.php">
        <button type="submit">Logout</button>
    </form>
</div>

<footer>Copyright © 2024, AiubVault</footer>

<script src="js/updateprofile.js"></script>
</body>
</html>
