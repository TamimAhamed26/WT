<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Aiubvault";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST["amount"];
    $account_id = $_POST["id"]; // Assuming you have an input field for account ID in your HTML form

    // Basic validation
    if (empty($amount) || empty($account_id) || !is_numeric($amount)) {
        echo "Please provide a valid amount and account ID.";
    } else {
        // Prepare and bind SQL statement with placeholders
        $stmt = $conn->prepare("UPDATE accounts SET balance = balance - ? WHERE id = ?");
        $stmt->bind_param("di", $amount, $account_id);

        // Execute statement
        $stmt->execute();

        // Check if update was successful
        if ($stmt->affected_rows > 0) {
            echo "Balance reduced successfully.";
        } else {
            echo "Error reducing balance: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>
