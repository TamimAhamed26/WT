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
    <title>Funds Transfer</title>
    <link rel="stylesheet" href="styles_transfer.css">
</head>
<body>
    <div class="container">
        <h2>Funds Transfer</h2>
        <form action="../model/transfer_process.php" method="post">
            <label for="from_account">From ID:</label>
            <input type="text" id="from_account" name="from_account" >
            <label for="to_account">To Account:</label>
            <input type="text" id="to_account" name="to_account" >
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" >
            <button type="submit">Transfer Funds</button>
        </form>
    </div>
</body>
<footer class="footer">Copyright © 2024, AiubVault</footer>
</html>
