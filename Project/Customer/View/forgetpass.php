<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AiubVault - Recover Password</title>
    <link rel="stylesheet" href="styles_forget_password.css"> <!-- Link to external CSS file -->
</head>

<body >
    <div class="container">
    <center>
        <h1>🔰AiubVault</h1>
        <h5>Banking & Beyond</h5>
        <h2>Recover Password</h2>
        <form class="form" action="../controller/forgetPassCheck.php" autocomplete="off" novalidate method="post"  onsubmit="return validate()">
            <fieldset>
                <legend class="legend">Account Name</legend>
                <input class="input" id="account" type="text" id="username" name="username">
                <span id="error1" style="color: red;"></span>
            </fieldset>
            <?php if(isset($_SESSION['user_error'])) {
                echo $_SESSION['user_error'];
                unset($_SESSION['user_error']);
            }?>
            <br><br>
            <input class="submit-btn" type="submit" value="Get OTP">
        </form>
    </center>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <footer>
        Copyright © 2024, AiubVault
    </footer>
    <script src="js/forgotPassword.js"></script>
</body>

</html>
