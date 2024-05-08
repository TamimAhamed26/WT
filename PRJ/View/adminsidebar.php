<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['username'])) {
        header("Location: ../View/login.php");
        exit; 
    }
?>
DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">


    <title>Navigation Menu</title>
</head>
<body>
    <div class="sidebar">
        <a href="#"></a>
        <a href="../View/updateProfile.php">Update Profile</a>
        <span class="label">Admin Workspace</span>
        <a href="../View/modify_emp.php">Manage Employees</a>
        <a href="../View/transcation_monitoring.php">Transaction Monitoring</a>
        <a href="../View/access_control.php">Access control </a>
        <a href="../View/addemp.php">Manage Employee ADD/DELETE</a>
        <a href="../View/usermanage.php">Manage User</a>
        <span class="label">Website Management</span>
        <a href="../View/postnews.php">Post News</a>
    </div>
</body>
</html>
