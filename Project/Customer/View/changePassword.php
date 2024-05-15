<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        header("location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="styles-changepassword.css"> <!-- Link to external CSS file -->
</head>

<body> 
<center>

<header class="header">
    <nav class="navbar">
        <ul class="nav-list">
            <p1 class="nav-item">Home    </p1> 
            <p1 class="nav-item">Information    </p1>
            <p1 class="nav-item">Contact us</p1>

        </ul>
    </nav>
</header>
</center>

    <div class="container">
        <div class="aiub">
            <h1>🔰AiubVault</h1>
            <h5>Banking & Beyond</h5>
            <div class="user">
                Change password for User: <?= $_SESSION['username'] ?>
            </div>
        </div>

        <form class="form" method="post" action="../controller/ChangePasswordCheck.php" novalidate  onsubmit="return validate()">
            <fieldset class="border">
                <legend class="legend">Current Password</legend>
                <input class="input" type="password" id="password" name="cur-passwd">
                <span id="error1" style="color: red;"></span>
            </fieldset>

            <fieldset class="border">
                <legend class="legend">New Password</legend>
                <input class="input" id ="npassword" type="password" name="new-passwd">
                <span id="error2" style="color: red;"></span>
            </fieldset>

            <fieldset class="border">
                <legend class="legend">Retype New Password</legend>
                <input class="input" id="rnpassword" type="password" name="re-new-passwd">
                <span id="error3" style="color: red;"></span>
            </fieldset>
            <br>
            <input class="submit-btn" type="submit" name="submit">
        </form>

        <?php
        if (isset($_SESSION['change_password_error'])) {
            echo $_SESSION['change_password_error'];
            unset($_SESSION['change_password_error']); // Clear the error message from session to avoid displaying it multiple times
        }
        ?>

        <br>
        <form method="post" action="../controller/logout.php">
            <button class="logout-btn" type="submit">Logout</button>
        </form>
    </div>

    <footer>
        Copyright © 2024, AiubVault
    </footer>
    <script src="js/changePassword.js"></script>
</body>

</html>
