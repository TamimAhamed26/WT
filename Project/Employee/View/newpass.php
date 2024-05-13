<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: Login.php');
    exit();
}
?>

<html>
    <center>
    <head>
        <title>Set New Password</title>
        <script src="../View/JS/forget_pass.js"></script> 
    </head>
    

    <body style = "margin:0">
    <?php include 'header.html'; ?>
    <?php include 'Menu.html'; ?>
    <p>Go back to Login?<a href="Login.php" class="login-link">Click Here!👈🏻</a></p>
    <table><tr><td>
    
    <form method="POST" action="../Controller/forgetPassCheck.php"  novalidate onsubmit=" return validateNewPasswordForm()">
     
    <p>🔓 Change password for User:<b>  <?= $_SESSION['username'] ?></b> </p>
    <br>
    <table>
             
             <tr>
                <th><label for="password">🗝️ New Password</label></th>
                <td>:</td>
                <td>
                <input type="password" id="password" name="password" >
                <span id="error1" style="color: red;"></span>
                </div>   
                    <?php 
                    if(isset($_SESSION['newpass_error'])) {
                        echo $_SESSION['newpass_error'];
                        unset($_SESSION['newpass_error']);
                    }
                    ?>
                </td>
            </tr>
       
       </table>
       <br><br>
       <input type="submit" value="Set Password" class="get-otp-btn">
    </form>
    </td>
<td>
        <p><img src="forgot.png" alt="reg" style="width: 650; height: auto; float: right;"></p>
</td></tr></table>
    <?php include 'footer.html'; ?>
</body>
</center>
    </html>

















