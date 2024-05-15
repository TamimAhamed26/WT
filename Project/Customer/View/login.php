<?php
session_start();
$username_cookie = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AiubVault</title>
    <link rel="stylesheet" href="styles-login.css"> <!-- Link to external CSS file -->
</head>

<body>
    <div class="container">
        <h1>🔰AiubVault</h1>
        <h5>Banking & Beyond</h5>

        <form method="POST" action="../controller/auth.php" novalidate autocomplete="off" onsubmit="return validate()">
            <fieldset class="border">
                <legend>Account Name 👤</legend>
                <input type="text" id="username" name="username" value="<?= $username_cookie ?>"> <br>
                <span id="error1" style="color: red;"></span>
            </fieldset>

            <fieldset class="border">
                <legend>Password 🔒</legend>
                <input type="password" id="password" name="password">
                <span id="error2" style="color: red;"></span>
            </fieldset>

            <label>
                <input type="checkbox" name="remember"> Stay signed in
            </label>
<br> <br>
            <input type="submit" name="submit" value="Sign In">

            <div class="links">
    <a href="forgetpass.php" class="forgetpass-link">Can't access your account?</a><br>
    <a href="signup.php" class="signup-link">New user? Sign Up</a><br>
</div>


            <?php 
            if(isset($_SESSION['login_error'])) {
                echo $_SESSION['login_error'];
                unset($_SESSION['login_error']);
            }
            ?>
        </form>
    </div>
<br><br><br><br><br>   
<center>
        <footer>Copyright © 2024, AiubVault</footer>
    </center>
    <script src="js/login.js"></script>
</body>

</html>
