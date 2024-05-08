<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
?>
<html>
    <head>
    <title>Forget Password</title>
    <header><?php include 'header.php'; ?></header>
    <link rel="stylesheet" href="CSS/Forget_Pass.css">
    </head>
    
    <body>
    <div class="table-container">

    <form method="POST" action="../controller/forgetPassCheck.php" novalidate onsubmit=" return validateOTPForm()">
     
     <br><br><br>
     <table>
        <div align='center'>
         Change password for User: <b><span style="color: red;"><?= $_SESSION['username'] ?></span></b></div>
       
          <tr>
             <th><label for="OTP">OTP</label></th>
             <td>:</td>
             <td>
             <input type="text" id="OTP" name="otp" >
             <span id="error1" style="color: red;"></span>

            <span class="error-message">
                <?php 
                if(isset($_SESSION['otp_error'])) {
                    echo $_SESSION['otp_error'];
                    unset($_SESSION['otp_error']);
                }
                ?>
            </span>
    
             </td>
             
         </tr>
         <tr>
                    <td></td>
                    <td></td>
                    <td>
                    <input type="submit" value="Submit" >
                    </td>
          </tr>


    </table>

    
 </form>  
 </div>
    <br>
     <?php include 'Footer.html'; ?>
     <script src="../JS/forget_pass.js"></script>

</body>

    </html>









