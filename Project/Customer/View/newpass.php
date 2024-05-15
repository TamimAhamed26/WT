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
    <title>AiubVault - Set New Password</title>
    <link rel="stylesheet" href="styles_newpass.css"> <!-- Link to external CSS file -->
</head>
<body>
    <div class="container">
        <center>
            <h1 class="title">🔰AiubVault</h1>
            <h5 class="subtitle">Banking & Beyond</h5>
            <form class="form" method="POST" action="../controller/forgetPassCheck.php" novalidate autocomplete="off" onsubmit="return validate()">
                <p class="info">Change password for Account No: <b><?= $_SESSION['username'] ?></b></p>
                <br>
                <table class="table">
                    <tr>
                        <td>
                            <fieldset class="fieldset">
                                <legend class="legend">Type New Password</legend>
                                <input class="input" type="password" id="PASS" name="Pass">
                                <span id="error1" style="color: red;"></span>
                            </fieldset>
                        </td>
                    </tr>
                </table>
                <input class="submit-btn" type="submit" value="Set Password">
            </form>
        </center>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer class="footer">Copyright © 2024, AiubVault</footer>

    <script src="js/newPass.js"></script>
</body>
</html>
