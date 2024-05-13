<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        header("location: Login.php");
        exit();
    }
?>

<html>

<head>
    <title>Change Password</title>
    <script src="../View/JS/change_pass.js"></script>
</head>
<body style = "margin:0">
<?php include 'header.html'; ?>
<?php include 'navigation.html'; ?>
<div class="container">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <span class="logged-in-text">👨‍💼 Change password for User: <b><?= $_SESSION['username'] ?></b></span>
    
</div>
<form method="POST" action="../Controller/ChangePassCheck.php" novalidate onsubmit="return validateChangePassword()">
    <table>
        <tr><td><br></td></tr>
        <tr><td><br></td></tr>
        <tr><td><img src="pass.png" alt="pass" style="width: 550; height: auto; padding-left: 80px; padding-right: 30px;"></td>
    <td>
<center>
    
        
            <h2>CHANGE PASSWORD 🔐</h2>
            <fieldset>
            <table>
            <tr>
    <td colspan="2">
        <p>🔑 Current Password </td><td> <input type="password" id="cur-passwd" name="cur-passwd"> </p>
        <span id="error1" style="color: red;"></span>
    </td>
</tr>
<tr>
    <td colspan="2">
        <p>🗝️ New Password </td><td> <input type="password" id="new-passwd" name="new-passwd"> </p>
        <span id="error2" style="color: red;"></span>
    </td>
</tr>
<tr>
    <td colspan="2">
        <p>🗝 Retype New Password </td><td> <input type="password" id="re-new-passwd" name="re-new-passwd"> </p>
        <span id="error3" style="color: red;"></span>
    </td>

</tr>
          <tr><td><br></td></tr>
          <tr>
                
    <td colspan="2">

                    
            
            <input type="submit" name="Submit" value="Save" class="register-btn"> 
            
</td>
<td><a href="../View/updateProfile.php" class="cancelcustomer-btn">Cancel</a></td>
            </td>
                </tr>
            </table>
            </form>
            </fieldset>
        
    
</center>
</td></tr>
<tr><td><br></td></tr></table>

    <?php

if (isset($_SESSION['change_password_error'])) {
     echo $_SESSION['change_password_error'];
     unset($_SESSION['change_password_error']); 
       }
       ?>
       <a href="../Controller/logout.php" class="logout-btn"style="width: 65px; height: 20px;">Logout ⤿</a>
<?php include 'footer.html'; ?>
</body>

</html>
