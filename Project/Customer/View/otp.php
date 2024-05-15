<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AiubVault - Verify OTP</title>
    <link rel="stylesheet" href="styles_otp.css"> <!-- Link to external CSS file -->
</head>
<body>
    <div class="container">
        <center>
            <h1 class="title">🔰AiubVault</h1>
            <h5 class="subtitle">Banking & Beyond</h5>
            <h2 class="heading">Verify OTP</h2>
            <form class="form" method="POST" action="../controller/forgetPassCheck.php" novalidate autocomplete="off" onsubmit="return validate()">
                <table>
                    <tr>
                        <th><label for="OTP">OTP</label></th>
                        <td>:</td>
                        <td>
                            <input class="input" type="text" id="OTP" name="otp">
                            <span id="error1" style="color: red;"></span>


                            <?php if(isset($_SESSION['otp_error'])) {
                                echo $_SESSION['otp_error'];
                                unset($_SESSION['otp_error']);
                            }?>
                        </td>
                    </tr>
                </table>
                <input class="submit-btn" type="submit" value="Submit">
            </form>
        </center>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer class="footer">Copyright © 2024, AiubVault</footer>
    <script src="js/otp.js"></script>
</body>
</html>
