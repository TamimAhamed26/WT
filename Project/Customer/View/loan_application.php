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
    <title>Loan Application</title>
    <link rel="stylesheet" href="styles_loan.css">
</head>
<body>
    <div class="container">
        <h2>Loan Application</h2>
        <form action="../model/loan_process.php" method="post">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" >
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" >
            <label for="amount">Loan Amount:</label>
            <input type="number" id="amount" name="amount" >
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
<footer class="footer">Copyright © 2024, AiubVault</footer>
</html>
