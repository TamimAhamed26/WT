<?php session_start(); ?>
<html>
<head>
    <title>Forget Password</title>
    <header><?php include 'header.php'; ?></header>
    <link rel="stylesheet" href="CSS/Forget_Pass.css">
</head>
<body>
    <div class="table-container">
        <h2>Forget Password</h2>
        <form action="../controller/forgetPassCheck.php" autocomplete="off" novalidate method="post" onsubmit=" return validateForgetPassword()">
            <table>
                <tr>
                    <th><label for="username">Username</label></th>
                    <td>:</td>
                    <td>
                        <input type="text" id="username" name="username">
                        <span id="error1" style="color: red;"></span>
                
                       
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                    
                        <center><input type="submit" value="Get OTP"></center>
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
    </div>
    <br>
    <?php include 'Footer.html'; ?>
    <script src="../JS/forget_pass.js"></script>

</body>
</html>
