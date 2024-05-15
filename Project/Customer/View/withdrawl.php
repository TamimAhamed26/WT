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
    <title>Money Withdrawal and Deposit</title>
    <link rel="stylesheet" href="styles_withdrawl.css">
</head>
<div class="container1">
    <div class="aiub">
        <h1>🔰AiubVault</h1>
        <h5>Banking & Beyond</h5>  <br> 
        <div class="user">
        Logged in as User:<b>  <?= $_SESSION['username'] ?></b> 
        </div>
<body>
    <div class="container">
        <h2>Money Withdrawal and Deposit</h2>
        <form action="../controller/check.php" method="post">
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" >
            <label for="type">Transaction Type:</label>
            <select id="type" name="type">
                <option value="withdrawal">Withdrawal</option>
                <option value="deposit">Deposit</option>
            </select>
            <button type="submit">Submit</button>
        </form>
    </div>
  
</body>
<footer class="footer">Copyright © 2024, AiubVault</footer>
</html>
