<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: Login.php");
}
?>
<html>
    <center>
    <head>
        <title>Verify Otp</title>
        <script src="../View/JS/forget_pass.js"></script>
    </head>

    <body style = "margin:0">
    <?php include 'header.html'; ?>
    <?php include 'Menu.html'; ?>
    <p>Go back to Login?<a href="Login.php" class="login-link">Click Here!👈🏻</a></p>
    <table><tr><td>
    <form method="POST" action="../Controller/forgetPassCheck.php" novalidate onsubmit=" return validateOTPForm()">
     
   
     <table>
     <p>🔒Change password for User:<b>  <?= $_SESSION['username'] ?></b></p> 
          <br>
          <tr>
             <th><label for="OTP">📲 OTP</label></th>
             <td>:</td>
             <td>
             <input type="text" id="OTP" name="otp" >
             <span id="error1" style="color: red;"></span>
             span class="error-message">
                <?php 
                if(isset($_SESSION['otp_error'])) {
                    echo $_SESSION['otp_error'];
                    unset($_SESSION['otp_error']);
                }
                ?>
            </span>
             </td>
             
         </tr>

    </table>
    <br><br>
    <input type="submit" value="Submit" class="get-otp-btn">
    
 </form>  
 </td>
<td>
        <p><img src="forgot.png" alt="reg" style="width: 650; height: auto; float: right;"></p>
</td></tr></table>

 <?php include 'footer.html'; ?>
</body>
</center>
    </html>









