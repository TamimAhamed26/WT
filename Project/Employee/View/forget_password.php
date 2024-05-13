<?php
session_start();
?>
<html>
    <center>
    <head>
        <title>Forget Password</title>
        <script src="../View/JS/forget_pass.js"></script>
    </head>
    

    <body style = "margin:0">
    <?php include 'header.html'; ?>
    <?php include 'Menu.html'; ?>
    <p>Go back to Login?<a href="Login.php" class="login-link">Click Here!👈🏻</a></p>

    <table><tr><td>
    <form method="POST" action="../Controller/forgetPassCheck.php" novalidate onsubmit=" return validateForgetPassword()">
     
     
    <table>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <th><label for="username">👤 Username:</label>
                    <input type="text" id="username" name="username" >
                    <span id="error1" style="color: red;"></span>
                </th>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                
                <td>
                    <center><input type="submit" value="Get OTP" class="get-otp-btn"></center>
                    <span class="error-message">
                        <?php if (isset($_SESSION['user_error'])) {
                    echo $_SESSION['user_error'];
                    unset($_SESSION['user_error']);
                } ?>    
                   </span>  
                </td>
                
            </tr>
        </table>

        
    
 </form>
 </td>
<td>
        <p><img src="forgot.png" alt="reg" style="width: 650; height: auto; float: right;"></p>
</td></tr></table>  
 <?php include 'footer.html'; ?>
</body>
</center>
    </html>









