<?php

use App\Models\User;

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include 'Header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Welcome</title>

</head>

<body>
     

    <table align="center" cellpadding="2">
 
        <tr>
            <td colspan="2">
                <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
            </td>
        </tr>
    </table>
    <div style="text-align: center;" cellspadding="150">
        <?php
         include '../model/user_model.php';
    
        $customerCount = 
        $transactionCount = TransactionCount();
        $userCount = UserCount();
        $employeeCount = empCount();
        // Output the counts
        echo "admin count: " . $userCount . "<br>";
        echo "Customer Count: " . $customerCount . "<br>";
        echo "Employee Count: " . $employeeCount . "<br>";
        echo "Transaction Count: " . $transactionCount . "<br>";
        ?>
    </div>

</body>

    <?php include 'adminsidebar.php'; ?>
  
</html>
