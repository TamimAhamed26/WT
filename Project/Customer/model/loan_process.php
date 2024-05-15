<?php
// Validate form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $amount = $_POST["amount"];

    // Basic validation
    if (empty($name) || empty($email) || empty($amount)) {
        echo "Please fill in all fields.";
    } else {
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "AiubVault";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind SQL statement with placeholders
        $sql = "INSERT INTO loan (name, email, amount) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssd", $name, $email, $amount);

        // Execute the statement
        if ($stmt->execute() === TRUE) {
            echo "Loan application submitted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

