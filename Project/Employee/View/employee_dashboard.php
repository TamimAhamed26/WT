<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="external.css">
</head>
<body style = "margin:0">
    <?php include 'header.html'; ?>
    
    <?php include 'navigation.html'; ?>
    <table><tr><td>
    <img src="dashboard.jpg" alt="Dashboard" style="width: 250; height: auto;">
</td>
<td>
    <div class="welcome-message">
    <h2 style=" padding-left: 140px; ">Hi, <?php echo $_SESSION['username'];?>!</h2>
</div>
</td></tr></table>
<a href="../Controller/logout.php" class="logout-btn"style="width: 65px; height: 20px;">Logout ⤿</a>
    <?php include 'footer.html'; ?>
    
</body>
</html>
