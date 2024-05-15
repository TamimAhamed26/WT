<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include '../model/user_model.php'; // Include the user_model.php file

// Get the username from the session
$username = $_SESSION['username'];

// Get the balance for the user
$balance = getUserBalance($username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to AiubVault</title>
    <link rel="stylesheet" href="styles_dashboard.css"> <!-- Link to external CSS file -->
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
    </center>
    <center>
        <h1 class="title">🔰AiubVault</h1>
        <h5 class="subtitle">Banking & Beyond</h5>
    </center>

    <table class="table" align="center" cellpadding="10">
        <tr>
            <td colspan="2">
                <h1 class="welcome-message">Hi <?php echo $_SESSION['username']; ?> !</h1>
            </td>
            <td>
                <h1 class="balance"><h1 class="balance">Available Balance: <?php echo $balance; ?> $</h1>

 </h1>
            </td>
        </tr>
        <tr>
            <td align="center">
                <form class="update-profile-form" method="post" action="updateProfile.php">
                    <button class="update-profile-btn" type="submit">Update Profile</button>
                </form>
                <td align="center">
                <form class="update-profile-form" method="post" action="transaction.php">
                    <button class="update-profile-btn" type="submit">Account Access</button>
                </form>

                <td>
                <form class="update-profile-form" method="post" action="pay_bills.php">
                    <button class="update-profile-btn" type="submit">Pay Bill</button>
                </form>
            </td>

            <td>
                <form class="update-profile-form" method="post" action="withdrawl.php">
                    <button class="update-profile-btn" type="submit">Withdrawl/Deposite</button>
                </form>
            </td>

            <td>
                <form class="update-profile-form" method="post" action="loan_application.php">
                    <button class="update-profile-btn" type="submit">Loan request</button>
                </form>
            </td>

            <td>
                <form class="update-profile-form" method="post" action="transfer_funds.php">
                    <button class="update-profile-btn" type="submit">Transfer Fund</button>
                </form>
            </td>
            <td></td>
            <td align="right">
                <form class="logout-form" method="post" action="../controller/logout.php">
                    <button class="logout-btn" type="submit">Logout</button>
                </form>
            </td>
        </tr>
    </table>
    
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    <footer class="footer">Copyright © 2024, AiubVault</footer>
</body>
</html>
