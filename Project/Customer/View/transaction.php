<?php
session_start();

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
    <title>Transaction History</title>
    <link rel="stylesheet" href="styles-tran.css"> <!-- Link to external CSS file -->
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

        <h1>Transaction History</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Payment Method</th>
                </tr>
            </thead>
            <tbody>
               
                <?php
                   
                    include '../model/database_model.php';

                
                    $conn = getDatabaseConnection();

                    
                    $sql = "SELECT id, balance, debit, credit FROM transactions";

                    // Execute 
                    $result = mysqli_query($conn, $sql);

                  
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row and display data in table rows
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['balance'] . "</td>";
                            echo "<td>" . $row['debit'] . "</td>";
                            echo "<td>" . $row['credit'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No transactions found</td></tr>";
                    }

                    // Close connection
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>

        <h1>Bills History</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Payment Method</th>
                </tr>
            </thead>
            <tbody>
               
                <?php
                   
                    $conn = getDatabaseConnection();

                 
                    $sql = "SELECT id, amount, type, payment_method FROM bills";

                    // Execute 
                    $result = mysqli_query($conn, $sql);

                    // Check if there are any rows returned
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row and display data in table rows
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['amount'] . "</td>";
                            echo "<td>" . $row['type'] . "</td>";
                            echo "<td>" . $row['payment_method'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No bills found</td></tr>";
                    }

                    // Close connection
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>  
    <footer class="footer">Copyright © 2024, AiubVault</footer>
   </center>
</body>

</html>
