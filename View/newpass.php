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

    <form method="POST" action="../controller/forgetPassCheck.php" novalidate onsubmit=" return validateNewPasswordForm()">
     
     <br><br><br>
     <table>
        <div align='center'>
         Change password for User: <b><span style="color: red;"><?= $_SESSION['username'] ?></span></b></div>
   
             <br>
             <tr>
                <th><label for="password">New Pass</label></th>
                <td>:</td>
                <td>
                    <div>
                <input type="password"  id=password name="Pass"  >
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
            <tr>
                    <td></td>
                    <td></td>
                    <td>
                    <input type="submit" value="Set Password" >
                    </td>
             </tr>

       </table>
   
    </form>
<div>

    <br>
     <?php include 'Footer.html'; ?>
    <script src="../JS/forget_pass.js"></script> 
</body>
</center>
    </html>

















