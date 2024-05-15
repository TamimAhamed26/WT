<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Bills</title>
    <link rel="stylesheet" href="styles_paybills.css"> <!-- Link to external CSS file -->
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

    <div class="container">
    <div class="aiub">
        <h1>🔰AiubVault</h1>
        <h5>Banking & Beyond</h5>  <br> 
        <div class="user">
        Logged in as User:<b>  <?= $_SESSION['username'] ?></b> 
        </div>

    <div class="container">
        <h1>Pay Bills</h1>
        <!-- Display error message if exists -->
        <?php if (!empty($errorMsg)): ?>
            <p style="color: red;"><?php echo $errorMsg; ?></p>
        <?php endif; ?>
        <!-- Form for paying bills -->
        <form action="../controller/paybills.php" method="post" autocomplete="off" novalidate onsubmit="return validate()">
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount"><br><br>
            <span id="error1" style="color: red;"></span>
            

            <label for="type">Type:</label>
            <select id="type" name="type">
                <option value="school">School</option>
                <option value="college">College</option>
                <option value="gas">Gas</option>
                <option value="internet">Internet</option>
                <option value="other">Other</option>
            </select><br><br>
            <label for="paymentMethod">Payment Method:</label>
            <select id="paymentMethod" name="paymentMethod">
                <option value="bankAccount">Bank Account</option>
                <option value="card">Card</option>
            </select><br><br>
            <input type="submit" value="Pay">
        </form>
    </div>
    
    <footer class="footer">Copyright © 2024, AiubVault</footer>
    <script src="js/paybill.js"></script>
</body>
</html>