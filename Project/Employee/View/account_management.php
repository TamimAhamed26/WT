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
    <a href="../Controller/logout.php" class="logout-btn" style="width: 65px; height: 20px; float: right;">Logout ⤿</a>
    <center>
    <table><tr><td><br></td></tr><tr><td><br></td></tr><tr>
    <tr><td>
    <img src="customer.png" alt="customer" style="width: 300px; height: auto; padding-right:250px">
    </td>
    <td>
    <img src="merchant.png" alt="merchant" style="width: 300px; height: auto;">
    </td></tr>
    <td>
    <form action="manage_customer.php" method="POST">
        <input type="submit" class="customer-btn" name="customer" value="Manage Customer">
    </form>

</td><td>
    <form action="manage_merchant.php" method="POST">
        <input type="submit" class="merchant-btn" name="merchant" value="Manage Merchant">
    </form></td> </tr><tr><td><br></td></tr><tr><td><br></td></tr></table>
    </center>  

    <?php include 'footer.html'; ?>
    
</body>
</html>
