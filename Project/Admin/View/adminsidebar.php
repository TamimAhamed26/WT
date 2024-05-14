<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Navigation Menu</title>
</head>
<body>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['username'])) {
        header("Location:../View/login.php");
        exit;
    }
    ?>
    <div class="sidebar">
     
        <a href="#" class="home">Home</a>
        <a href="../View/updateProfile.php" class="updateProfile">Update Profile</a>
        <span class="label adminWorkspace">Admin Workspace</span>
        <a href="../View/modify_emp.php" class="manageEmployees">Manage Employees</a>
        <a href="../View/transcation_monitoring.php" class="transactionMonitoring">Transaction Monitoring</a>
        <a href="../View/access_control.php" class="accessControl">Access Control</a>
        <a href="../View/report_gen.php" class="reports">Reports</a>
        <a href="../View/usermanage.php" class="manageUser">Manage User</a>
        <span class="label websiteManagement">Website Management</span>
        <a href="../View/posttime.php" class="postNews">Post time</a>
    </div>
  
</body>
</html>
