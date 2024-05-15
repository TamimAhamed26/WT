<?php
$db = [
    "host"=> "localhost",
    "user"=> "root",
    "passwd"=> "",
    "database"=> "AiubVault"
];

function getDatabaseConnection() {
    $db = $GLOBALS['db'];
    $conn = mysqli_connect($db['host'], $db['user'], $db['passwd'], $db['database']);
    if (!$conn) {
        die("Failed to connect to the database!");
    }
    return $conn;
}

function payBill($amount, $type, $paymentMethod) {
    $conn = getDatabaseConnection();
    
    // Check if database connection is successful
    if (!$conn) {
        die("Failed to connect to the database!");
    }
    
    // Prepare SQL statement with placeholders
    $stmt = mysqli_prepare($conn, "INSERT INTO bills (amount, type, payment_method) VALUES (?, ?, ?)");
    
    
    if (!$stmt) {
        die("Error: " . mysqli_error($conn));
    }
    
    
    mysqli_stmt_bind_param($stmt, "dss", $amount, $type, $paymentMethod);
    
   
    $success = mysqli_stmt_execute($stmt);
    
    
    if (!$success) {
        die("Error: " . mysqli_stmt_error($stmt));
    }
    
    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    return $success;
}
?>