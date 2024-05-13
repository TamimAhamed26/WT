<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

require_once '../model/user_model.php';

if (isset($_POST['block'])) {
    $employeeId = $_POST['block'];
    $result = updateEmployeeStatus($employeeId, 'Inactive');
    if ($result) {
 
        header("Location: ../View/access_control.php");
        exit();
    } else {
      
        echo "Failed to block employee.";
        exit();
    }
} elseif (isset($_POST['unblock'])) {
    $employeeId = $_POST['unblock'];
    $result = updateEmployeeStatus($employeeId, 'Active');
    if ($result) {
      
        header("Location: ../View/access_control.php");
        exit();
    } else {
   
        echo "Failed to unblock employee.";
        exit();
    }
} else {
  
    echo "Invalid action.";
    exit();
}
?>
